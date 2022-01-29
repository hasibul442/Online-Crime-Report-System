@extends('frontend.layout.master')
@section('content')
<img src="{{ asset('admin/assets/images/default/police-com-banner.jpg') }}" alt="" class="img-fluid">
<section class="pb-5 pt-5">
  <div class="container pb-5">
     <div class="ml-5 mr-5">
      <div class="card shadow border-0">
          <div class="card-body border-0 rounded" style="background-color: #B2F9FC">
              <p class="text-center text-primary">জিডি (GD) এর পূর্ণরুপ হল জেনারেল ডায়েরি (General Diary); যাকে বাংলায় বলে সাধারণ ডায়েরি। আইনি সহায়তা পেতে চাইলে কোনো বিষয়ে যে সাধারণ বিবরণ দিতে হয় তাই হলো জিডি। এটি পুলিশি বা আইনি পদক্ষেপের প্রথম ধাপ। যেকোনো বিষয়ে ভবিষ্যতে আইনি পদক্ষেপ নিতে হলেও জিডি করে রাখাটা জরুরী।</p>
          </div>
      </div>
     </div>

     <div class="mt-5">
      <div class="row">
          <div class="col-sm-9">
              <div class="card">
                  <div class="card-header">
                      <p><b class="text-success">এবার আসুন জেনে নেই জিডিতে কী কী উল্লেখ করতে হবে:</b></p>
                  </div>
                  <div class="card-body">
                      <ol>
                          <li>থানার ভারপ্রাপ্ত কর্মকর্তাকে সম্বোধন করে লিখতে হবে এবং থানার নাম ও ঠিকানা লিখতে হবে।</li>
                          <li>বিষয় : ‘জিডি করার জন্য আবেদন’- এভাবে লিখতে হবে।</li>
                          <li>অপরাধ সংঘটিত হওয়ার আশঙ্কা করলে জিডিতে আশঙ্কার কারণ উল্লেখ করতে হবে।</li>
                          <li>হুমকি দিলে হুমকি দেওয়ার স্থান, তারিখ, সময়, সাক্ষী থাকলে তাদের নাম, পিতার নাম ও পূর্ণ ঠিকানা উল্লেখ করতে হবে।</li>
                          <li>হুমকি প্রদানকারী পরিচিত হলে তার/তাদের নাম, পিতার নাম ও পূর্ণ ঠিকানা উল্লেখ করতে হবে।</li>
                          <li>অপরিচিত হলে তাদের শনাক্তকরণের বর্ণনা দিতে হবে।</li>
                          <li>জিডি নথিভুক্ত করে বিষয়টি সুষ্ঠু তদন্তপূর্বক আইনানুগ ব্যবস্থা গ্রহণের জন্য আবেদন করতে হবে।</li>
                          <li>সর্বশেষ জিডিকারীর নাম, স্বাক্ষর, পিতার নাম, পূর্ণ ঠিকানা ও তারিখ লিখতে হবে।</li>
                      </ol>

                      <div class="float-right">
                          <a href="{{route('gd_sample')}}" class="btn btn-info">জিডির নমুনা</a>
                          <a href="{{ route('general_diary_register') }}" class="btn btn-primary">জিডি</a>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-sm-3">
              <div class="card">
                  <div class="card-header">
                      <p><b class="text-success">Important Links</b></p>
                  </div>
                  <div class="card-body">
                      <ul>
                          <li><a href="#" class="">Near Police Station</a></li>
                          <hr>
                          <li><a href="#" class="">Hotlines</a></li>
                          <hr>
                          <li><a href="#" class="">Wanted List</a></li>
                          <hr>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
     </div>
  </div>
</section>
@endsection
