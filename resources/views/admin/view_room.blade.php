<!DOCTYPE html>
<html>
  @include('admin.css')
  </head>
  <body>
    @include('admin.style')
    @include('admin.header')
    @include('admin.sidebar')    

    <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            
          <table>
    <tr>
        <th>Room Title</th>
        <th>Description</th>
        <th>Price</th>
        <th>Wifi</th>
        <th>Room Type</th>
        <th>Image</th>
        <th>Action</th>
        <!-- <th>Delete</th> -->
    </tr>

    @foreach ($data as $data)
    <tr>
        <td>{{ $data->room_title }}</td>
        <td>{{Str::limit($data -> description,90)}}</td>
        <td>{{$data-> price }}</td>
        <td>{{$data->wifi}}</td>
        <td>{{$data->room_type}}</td>
        <td><img width="60" src="room/{{ $data->image }}"></td>

        <td class="text-center">
            <div class="button-group">
                <a href="{{ url('delete_room', $data->id) }}"
                class="btn btn-danger btn-sm"
                title="Delete"
                onclick="return confirm('Are you sure to delete it?');">
                    <i class="bi bi-trash"></i>
                </a>

                <a href="{{ url('update_room', $data->id) }}"
                class="btn btn-warning btn-sm"
                title="Edit">
                    <i class="bi bi-pencil-square"></i>
                </a>
            </div>
        </td>
    </tr>
    @endforeach
</table>
            </div>
            </div>
        </div>
        @include('admin.footer')
  </body>
</html>