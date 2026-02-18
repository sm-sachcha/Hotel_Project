<!DOCTYPE html>
<html>

<style>
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: #2c2c2c;
    color: #fff;
    margin: 0;
    padding: 0;
}

/* Table Container */
.table-container {
    background: #1f1f1f;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.5);
    max-width: 1300px;
    margin: 40px auto;
}

/* Table Title */
.table-title {
    font-size: 26px;
    font-weight: 700;
    margin-bottom: 25px;
    text-align: center;
    color: #00d084;
    letter-spacing: 1px;
}

/* Table Styles */
.custom-table {
    width: 100%;
    border-collapse: collapse;
    overflow: hidden;
    border-radius: 12px;
}

.custom-table thead {
    background: linear-gradient(90deg, #00b894, #00d084);
}

.custom-table th {
    padding: 14px;
    text-align: center;
    font-weight: 600;
    color: #fff;
}

.custom-table td {
    padding: 12px;
    text-align: center;
    border-bottom: 1px solid #444;
}

/* Row Hover */
.custom-table tbody tr {
    transition: 0.3s;
}

.custom-table tbody tr:hover {
    background-color: #333;
}

/* Action Buttons Container */
.action-buttons {
    display: flex;
    justify-content: center; /* Center horizontally */
    gap: 5px; /* Space between buttons */
}

/* Buttons - small, attractive, pill style */
.action-btn {
    padding: 5px 12px;
    border-radius: 20px;
    font-size: 14px;
    font-weight: 600;
    border: none;
    cursor: pointer;
    transition: 0.3s;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
}

/* Accept Button */
.accept-btn {
    background: #00b894;
    color: white;
}

.accept-btn:hover {
    background: #019875;
    box-shadow: 0 4px 12px rgba(0, 184, 148, 0.5);
}

/* Reject Button */
.reject-btn {
    background: #e74c3c;
    color: white;
}

.reject-btn:hover {
    background: #c0392b;
    box-shadow: 0 4px 12px rgba(231, 76, 60, 0.5);
}

/* Room Image */
.custom-table td img {
    width: 80px;
    height: 50px;
    object-fit: cover;
    border-radius: 8px;
}
</style>

@include('admin.css')

<body>
@include('admin.header')
@include('admin.sidebar')

<div class="page-content">
    <div class="page-header">
        <div class="container-fluid">

            <div class="table-container">
                <div class="table-title">Booking List</div>

                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>Room Title</th>
                            <th>Customer Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Price</th>
                            <th>Arrival Date</th>
                            <th>Departure Date</th>
                            <th>Status</th>
                            <th>Action</th>
                            <th>Image</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($data as $booking)
                        <tr>
                            <td>{{ $booking->room->room_title }}</td>
                            <td>{{ $booking->name }}</td>
                            <td>{{ $booking->email }}</td>
                            <td>{{ $booking->phone }}</td>
                            <td>{{ $booking->room->price }}</td>
                            <td>{{ $booking->arrival_date }}</td>
                            <td>{{ $booking->leaving_date }}</td>
                            <td>{{ $booking->status }}</td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ url('accept_booking/'.$booking->id) }}">
                                        <button class="action-btn accept-btn">✔ Accept</button>
                                    </a>
                                    <a href="{{ url('reject_booking/'.$booking->id) }}">
                                        <button class="action-btn reject-btn">✖ Reject</button>
                                    </a>
                                </div>
                            </td>
                            <td>
                                <img src="/room/{{ $booking->room->image }}" alt="Room Image">
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

@include('admin.footer')

</body>

</html>
