<!DOCTYPE html>
<html>
    <base href="/public">
  @include('admin.css')
  </head>
    @include('admin.header')
    @include('admin.sidebar')
    
    
<body>

<div class="page-content">
    <div class="page-header">
        <div class="container-fluid">

            <!-- Center Wrapper -->
            <div class="center-box">

                <div class="mail-card">
                    <h2>Send Mail to {{ $data->email }}</h2>

                    <form action="{{ url('mail', $data->id) }}" method="POST">
                        @csrf
                        <input type="text" name="greeting" placeholder="Greeting" required>
                        <input type="text" name="body" placeholder="Body" required>
                        <input type="text" name="action_text" placeholder="Action Text">
                        <input type="text" name="action_url" placeholder="Action URL">
                        <input type="text" name="endpart" placeholder="End Part">

                        <button type="submit">Send Mail</button>
                    </form>
                </div>

            </div>

        </div>
    </div>
</div>


</body>

    @include('admin.footer')
</html>

<style>
/* Center container */
.center-box {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 80vh;
}

/* Card design */
.mail-card {
    background: #fff;
    width: 450px;
    padding: 40px;
    border-radius: 12px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.15);
}

/* Heading */
.mail-card h2 {
    text-align: center;
    margin-bottom: 25px;
    color: #333;
}

/* Inputs */
.mail-card input {
    width: 100%;
    padding: 12px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 6px;
}

/* Button */
.mail-card button {
    width: 100%;
    padding: 14px;
    background: #28a745;
    color: #fff;
    border: none;
    border-radius: 6px;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    transition: 0.3s;
}

.mail-card button:hover {
    background: #218838;
}
</style>
