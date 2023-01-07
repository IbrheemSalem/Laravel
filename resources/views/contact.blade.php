@extends('layout.master')
@section('content')
      <!-- contact section start -->
      <div class="contact_srction layout_padding">
         <div class="container">
            <h1 class="contact_taital">Requeste A call Back</h1>
            <div class="contact_srction_2">
               <div class="mail_main">
                  <div class="row">
                     <div class="col-md-6">
                        <input type="text" class="mail_text" placeholder="Full Name" name="Full Name">
                        <input type="text" class="mail_text" placeholder="Phone Number" name="Phone Number">
                     </div>
                     <div class="col-md-6">
                        <input type="text" class="mail_text" placeholder="Email" name="Email">
                        <textarea class="massage-bt" placeholder="Massage" rows="5" id="comment" name="Massage"></textarea>
                     </div>
                  </div>
                  <div class="send_bt"><a href="#">SEND</a></div>
               </div>
            </div>
         </div>
      </div>
      <!-- contact section end -->
@endsection
