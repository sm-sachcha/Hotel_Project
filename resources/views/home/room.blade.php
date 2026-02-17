     <style>
         td {
            white-space: normal; /* allow multiple lines */
            overflow: visible;
            text-overflow: unset;
            }
      </style>


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


<div class="row">
    @foreach ($room as $rooms)
        <div class="col-md-4 col-sm-6">
            <div id="serv_hover" class="room">
                <div class="room_img">
                    <figure>
                        <img style="height: 200px; width: 350px;" src="room/{{ $rooms->image }}" alt="#"/>
                    </figure>
                </div>
                <div class="bed_room">
                    <h3>{{ $rooms->room_title }}</h3>

                    @php
                        $fullText = $rooms->description;
                        $shortText = Str::limit($fullText, 70);
                    @endphp

                    <p>
                        <span class="short-text">{{ $shortText }}</span>
                        <span class="full-text" style="display:none;">{{ $fullText }}</span>
                        @if(strlen($fullText) > 70)
                            <a href="#" class="toggle-text">See More</a>
                        @endif
                    </p>
                </div>
            </div>
        </div>
    @endforeach
</div>

<!-- JS for toggle -->
@include('home.script')




         </div>
      </div>