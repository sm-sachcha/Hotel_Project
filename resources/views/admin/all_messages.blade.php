{{-- Success Message --}}
@if(session('message'))
    <div class="custom-alert" id="successAlert">
        {{ session('message') }}
    </div>
@endif


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

                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Message</th>
                    <th>Send Email</th>
                    <!-- <th>Delete</th> -->
                </tr>
                @foreach ($data as $data)
                <tr>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->email }}</td>
                    <td>{{ $data->phone }}</td>
                    <td>{{ $data->message }}</td>
                    <td><a href="{{ url('send_mail', $data->id) }}" class="btn btn-success">Reply</a></td>
                </tr>
                @endforeach
                
            </table>

          </div>
        </div>
    </div>


        
    @include('admin.footer')
  </body>
</html>

<style>
/* Contact Section */
.contact {
    background: #fff;
    margin-top: 30px;
    padding: 40px 0;
    color: #000;
}

.titlepage h2 {
    margin-bottom: 20px;
    color: #000;
}

/* Inputs */
.contactus, .textarea {
    background: #f9f9f9;
    border-radius: 5px;
    border: 1px solid #ccc;
    padding: 12px;
    width: 100%;
    color: #000;
}

/* Send Button */
.send_btn {
    width: 100%;
    padding: 16px;
    font-size: 18px;
    font-weight: 600;
    border-radius: 30px;
    background: linear-gradient(90deg, #00b894, #00d084);
    color: #fff;
    border: none;
    cursor: pointer;
    transition: 0.3s;
}

.send_btn:hover {
    background: linear-gradient(90deg, #00d084, #00b894);
    transform: translateY(-2px);
    box-shadow: 0 6px 12px rgba(0,208,132,0.4);
}

/* Map Responsive */
.map-responsive {
    overflow: hidden;
    padding-bottom: 56.25%;
    position: relative;
    height: 0;
}

.map-responsive iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: 0;
}

/* Success Alert */
.custom-alert {
    position: fixed;
    top: 20px;
    right: 20px;
    background: #00b894;
    color: #fff;
    padding: 15px 25px;
    border-radius: 8px;
    font-weight: 500;
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    z-index: 9999;
    opacity: 1;
    transition: opacity 0.5s ease;
}
</style>

<script>
document.addEventListener("DOMContentLoaded", function () {

    let alertBox = document.getElementById("successAlert");

    if (alertBox) {
        setTimeout(function () {
            alertBox.style.opacity = "0";

            setTimeout(function () {
                alertBox.remove();
            }, 500);

        }, 5000); // 5 seconds
    }

});

</script>