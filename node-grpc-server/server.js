const grpc = require('@grpc/grpc-js');
const protoLoader = require('@grpc/proto-loader');
const mysql = require('mysql2/promise');

const packageDef = protoLoader.loadSync('../grpc/proto/room.proto');
const grpcObj = grpc.loadPackageDefinition(packageDef);
const roomPackage = grpcObj.room;

// MySQL connection
const pool = mysql.createPool({
    host: '127.0.0.1',
    user: 'root', 
    password: '', 
    database: 'Hotel_Management',
    waitForConnections: true,
    connectionLimit: 10,
    queueLimit: 0
});

//gRPC room method implementation
async function GetRoom(call, callback) {
    const id = call.request.id;
    try {
        const [rows] = await pool.query('SELECT id, room_title, price FROM rooms WHERE id = ?', [id]);
        if (rows.length > 0) {
            const room = rows[0];
            callback(null, {
                id: room.id,
                title: room.room_title,
                price: room.price.toString()
            });
        } else {
            callback(null, { id: 0, title: "", price: "" });
        }
    } catch (err) {
        callback(err, null);
    }
}

// Start server
const server = new grpc.Server();
server.addService(roomPackage.RoomService.service, { GetRoom });

server.bindAsync('0.0.0.0:50051', grpc.ServerCredentials.createInsecure(), () => {
    console.log('Node gRPC server running on port 50051');
});