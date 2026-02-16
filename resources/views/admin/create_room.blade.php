<!DOCTYPE html>
<html>
  @include('admin.css')
  @include('admin.style')
  </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')  

    <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

            <div class="form-wrapper">
                <div class="form-box">
                    <form action="{{url('add_room') }}" method="Post" enctype="multipart/form-data">
                        @csrf

                        <h1 class="center-block">Add Room</h1>

                        <div class="div_deg">
                            <label>Room Title</label>
                            <input type="text" name="title">
                        </div>

                        <div class="div_deg">
                            <label>Description</label>
                            <textarea name="description"></textarea>
                        </div>

                        <div class="div_deg">
                            <label>Price</label>
                            <input type="number" name="price">
                        </div>

                        <div class="div_deg">
                            <label>Room Type</label>
                            <select name="type">
                                <option value="regular">Regular</option>
                                <option value="premium">Premium</option>
                                <option value="delux">Delux</option>
                            </select>
                        </div>

                        <div class="div_deg">
                            <label>Free Wifi</label>
                            <select name="wifi">
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>

                        <div class="div_deg">
                            <label>Upload Image</label>
                            <input type="file" name="image">
                        </div>

                        <div class="submit-row">
                            <input type="submit" value="Add Room" class="btn-border btn-full">
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