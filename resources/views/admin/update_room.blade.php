<!DOCTYPE html>
<html>
    <base href="/public">
  @include('admin.css')
  @include('admin.style')
 
  <body>
    @include('admin.header')
    @include('admin.sidebar')  

    <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

            <div class="form-wrapper">
                <div class="form-box">
                    <form action="{{url('edit_room',$data->id) }}" method="Post" enctype="multipart/form-data">
                        @csrf

                        <h1 class="center-block">Edit Room</h1>

                        <div class="div_deg">
                            <label>Room Title</label>
                            <input type="text" name="title" value="{{ $data->room_title }}">
                        </div>

                        <div class="div_deg">
                            <label>Description</label>
                            <textarea name="description">{{ $data-> description }}</textarea>
                        </div>

                        <div class="div_deg">
                            <label>Price</label>
                            <input type="number" name="price" value="{{ $data->price }}">
                        </div>

                        <div class="div_deg">
                            <label>Room Type</label>
                            <select name="type">
                                <option selected value="{{ $data->room_type }}">{{ $data->room_type }}</option>
                                <option value="regular">Regular</option>
                                <option value="premium">Premium</option>
                                <option value="delux">Delux</option>
                            </select>
                        </div>

                        <div class="div_deg">
                            <label>Free Wifi</label>
                            <select name="wifi">
                                <option selected value="{{ $data->wifi }}">{{ $data->wifi }}</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>

                        <div class="div_deg">
                            <label>Current Image</label>
                            <img style="margin-right: 100px;" width="80" src="/room/{{ $data->image }}">
                        </div>

                        <div class="div_deg">
                            <label>Upload Image</label>
                            <input type="file" name="image">
                        </div>                       

                        

                        <div class="submit-row">
                            <input type="submit" value="Update Room" class="btn-border btn-full">
                        </div>



                    </form>
                </div>
            </div>

         </div>
            </div>  
                </div>
        @include('admin.footer')
    </body>
            </html>