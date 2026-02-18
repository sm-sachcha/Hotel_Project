<!DOCTYPE html>
<html lang="en">
    <base href="/public">
    @include("home.css")
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#"/></div>
      </div>
      
      @include("home.header")
      <!-- end header inner -->
      <!-- end header -->
      @include('home.script')
     <div  class="our_room">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Our Room</h2>
                     <p>Lorem Ipsum available, but the majority have suffered </p>
                  </div>
               </div>
            </div>
  
  
  
  <div class="row d-flex">
    <!-- Room Info -->
    <div class="col-md-7 d-flex">
        <div id="serv_hover" class="room flex-fill h-100">
            <div style="padding: 20px;" class="room_img">
                <figure>
                    <img style="height: 100%; width: 100%; object-fit: cover;" src="/room/{{ $room->image }}" alt="#"/>
                </figure>
            </div>
            <div class="bed_room">
                <h2>{{ $room->room_title }}</h2>
                <p style="padding: 12px">{{ $room->description }}</p>
                <h4 style="padding: 12px">Free Wifi: {{ $room->wifi }}</h4>
                <h4 style="padding: 12px">Room Type: {{ $room->room_type }}</h4>
                <h3 style="padding: 12px">Price: {{ $room->price }}</h3>
            </div>
        </div>
    </div>

    <!-- Booking Form -->
    <div class="col-md-4 d-flex">
        <div class="booking-glass light flex-fill h-100 overflow-auto" style="max-height: 100%;">
            <h4 class="box-title">Book a Room</h4>

            @if ($errors)
                @foreach ($errors->all() as $errors)
                    <li style="color: red;">{{ $errors }}</li>
                @endforeach
            @endif

            <form action="{{ url('/add_booking/'.$room->id) }}" method="POST">
                @csrf
                <div class="form-group mb-2">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control glass-input">
                </div>
                <div class="form-group mb-2">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control glass-input">
                </div>
                <div class="form-group mb-2">
                    <label>Phone</label>
                    <input type="number" name="phone" class="form-control glass-input">
                </div>
                <div class="form-group mb-2">
                    <label>Arrival Date</label>
                    <input type="date" name="arrivalDate" class="form-control glass-input" id="arrivalDate">
                </div>
                <div class="form-group mb-2">
                    <label>Leaving Date</label>
                    <input type="date" name="leavingDate" class="form-control glass-input" id="leavingDate">
                </div>

                <button type="submit" class="btn book-btn mt-2">Book Room</button>
            </form>
        </div>
    </div>
</div>

  
  
  
            <!-- JS for toggle -->
            @include('home.script')
            </div>
        </div>  
                @include("home.footer")
                <!-- end footer -->
                <!-- Javascript files-->
                <script src="js/jquery.min.js"></script>
                <script src="js/bootstrap.bundle.min.js"></script>
                <script src="js/jquery-3.0.0.min.js"></script>
                <!-- sidebar -->
                <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
                <script src="js/custom.js"></script>

               <script type="text/javascript">

                $(function() 
                {
                    var dtToday = new Date();
                    var month = dtToday.getMonth() + 1;
                    var day = dtToday.getDate();
                    var year = dtToday.getFullYear();
                    if(month < 10)
                        month = '0' + month.toString();
                    if(day < 10)                        day = '0' + day.toString();
                    var maxDate = year + '-' + month + '-' + day;
                    $('#arrivalDate').attr('min', maxDate);
                    $('#leavingDate').attr('min', maxDate);
                });
               </script>


            </body>
            </html>