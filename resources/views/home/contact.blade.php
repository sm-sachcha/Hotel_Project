<div class="contact" style="margin-top:30px; padding:40px 0; background:#fff;">
    <div class="container">
        <!-- Section Title -->
        <div class="row">
            <div class="col-md-12">
                <div class="titlepage">
                    <h2 style="color:#000;">Contact Us</h2>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Contact Form -->
            <div class="col-md-6">
                <form id="request" class="main_form">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <input class="contactus form-control" placeholder="Name" type="text" name="Name" style="color:#000;">
                        </div>
                        <div class="col-md-12 mb-3">
                            <input class="contactus form-control" placeholder="Email" type="email" name="Email" style="color:#000;">
                        </div>
                        <div class="col-md-12 mb-3">
                            <input class="contactus form-control" placeholder="Phone Number" type="tel" name="PhoneNumber" style="color:#000;">
                        </div>
                        <div class="col-md-12 mb-3">
                            <textarea class="textarea form-control" placeholder="Message" name="Message" rows="5" style="color:#000;"></textarea>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="send_btn">Send</button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Map -->
            <div class="col-md-6">
                <div class="map_main">
                    <div class="map-responsive" style="overflow:hidden; padding-bottom:56.25%; position:relative; height:0;">
                        <iframe 
                            src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&q=Eiffel+Tower+Paris+France" 
                            style="border:0; position:absolute; top:0; left:0; width:100%; height:100%;" 
                            frameborder="0" 
                            allowfullscreen>
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.contact {
    background-color: #fff; /* white background */
    margin-top: 30px; 
    padding-top: 40px;
    padding-bottom: 40px;
    color: #000; /* default text black */
}

.contactus, .textarea {
    background: #f9f9f9; /* light grey input background for visibility */
    border-radius: 5px;
    border: 1px solid #ccc;
    padding: 12px;
    width: 100%;
    color: #000; /* input text black */
}

/* Full-width Send Button Design */
.send_btn {
    width: 100%;
    padding: 16px;
    font-size: 18px;
    font-weight: 600;
    border-radius: 30px;
    background: linear-gradient(90deg, #00b894, #00d084); /* green gradient */
    color: #fff;
    border: none;
    cursor: pointer;
    transition: 0.3s;
}

.send_btn:hover {
    background: linear-gradient(90deg, #00d084, #00b894); /* gradient reverse on hover */
    transform: translateY(-2px);
    box-shadow: 0 6px 12px rgba(0,208,132,0.4);
}

.titlepage h2 {
    margin-top: 0;
    margin-bottom: 20px;
    color: #000; /* heading black */
}
</style>
