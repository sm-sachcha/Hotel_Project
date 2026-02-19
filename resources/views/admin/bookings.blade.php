<!DOCTYPE html>
<html>

<head>
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
    overflow-x: auto;   /* Responsive scroll */
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

/* Table */
.custom-table {
    width: 100%;
    border-collapse: collapse;
    border-radius: 12px;
    table-layout: auto;
    min-width: 1100px; /* Prevent collapse */
}

/* Header */
.custom-table thead {
    background: linear-gradient(90deg, #00b894, #00d084);
}

.custom-table th {
    padding: 14px;
    text-align: center;
    font-weight: 600;
    color: #fff;
    white-space: nowrap;
}

/* Table Cells */
.custom-table td {
    padding: 12px;
    text-align: center;
    border-bottom: 1px solid #444;
    word-wrap: break-word;
    white-space: normal;
}

/* Row Hover */
.custom-table tbody tr {
    transition: 0.3s;
}

.custom-table tbody tr:hover {
    background-color: #333;
}

/* Status Styling */
.status-approved {
    color: #00d084;
    font-weight: 600;
}

.status-rejected {
    color: #e74c3c;
    font-weight: 600;
}

.status-pending {
    color: #f1c40f;
    font-weight: 600;
}

/* Buttons Container */
.action-buttons {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 6px;
    flex-wrap: nowrap;
}

/* Base Button */
.action-btn {
    padding: 5px 12px;
    border-radius: 20px;
    font-size: 13px;
    font-weight: 600;
    border: none;
    cursor: pointer;
    transition: 0.3s;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
}

/* Accept */
.accept-btn {
    background: #00b894;
    color: white;
}

.accept-btn:hover {
    background: #019875;
    box-shadow: 0 4px 12px rgba(0, 184, 148, 0.5);
}

/* Reject */
.reject-btn {
    background: #e74c3c;
    color: white;
}

.reject-btn:hover {
    background: #c0392b;
    box-shadow: 0 4px 12px rgba(231, 76, 60, 0.5);
}

/* Delete */
.delete-btn {
    background: #ff7675;
    color: white;
}

.delete-btn:hover {
    background: #d63031;
}

/* Room Image */
.custom-table td img {
    width: 80px;
    height: 50px;
    object-fit: cover;
    border-radius: 8px;
}
</style>
</head>

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
                            <th>Image</th>
                            <th>Action</th>
                            <th>Delete</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($data as $data)
                        <tr>
                            <td>{{ $data->room->room_title }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->email }}</td>
                            <td>{{ $data->phone }}</td>
                            <td>${{ $data->room->price }}</td>
                            <td>{{ $data->arrival_date }}</td>
                            <td>{{ $data->leaving_date }}</td>

                        
                            <!-- Image -->
                            <td>
                                <img src="/room/{{ $data->room->image }}" alt="Room Image">
                            </td>

                            <!-- Status -->
                            <td>
                                @if($data->status == 'Approved')
                                    <span class="status-approved">Approved</span>
                                @elseif($data->status == 'Rejected')
                                    <span class="status-rejected">Rejected</span>
                                @else
                                    <span class="status-pending">Pending</span>
                                @endif
                            </td>

                            <!-- Accept / Reject -->
                            <td>
                                <div class="action-buttons">
                                   <a href="{{ url('approve_book/'.$data->id) }}"
                                      onclick="return confirm('Are you sure you want to Approve this booking?')">
                                        <button class="action-btn accept-btn">✔ Approve</button>
                                    </a>
                                    <a href="{{ url('reject_book/'.$data->id) }}"
                                       onclick="return confirm('Are you sure you want to Reject this booking?')">
                                        <button class="action-btn reject-btn">✖ Rejected</button>
                                    </a>
                                </div>
                            </td>

                            <!-- Delete -->
                            <td>
                                <a href="{{ url('delete_booking/'.$data->id) }}"
                                   onclick="return confirm('Are you sure you want to delete this booking?')">
                                    <button class="action-btn delete-btn">Delete</button>
                                </a>
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
