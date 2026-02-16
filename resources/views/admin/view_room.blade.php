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
    </tr>

    @foreach ($data as $data)
    <tr>
        <td>{{ $data->room_title }}</td>
        <td>{{Str::limit($data -> description,90)}}</td>
        <td>{{$data-> price }}</td>
        <td>{{$data->wifi}}</td>
        <td>{{$data->room_type}}</td>
        <td><img width="60" src="room/{{ $data->image }}"></td>
    </tr>
    @endforeach


</table>



            </div>
            </div>
        </div>
        @include('admin.footer')
  </body>
</html>