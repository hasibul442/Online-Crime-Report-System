@extends('frontend.layout.master')
@section('content')


  <img src="{{ asset('admin/assets/images/default/police-com-banner.jpg') }}" alt="" class="img-fluid">
  <section class="pb-5 pt-5">
    <div class="container pb-5">
       <div class="ml-5 mr-5">
        <div class="card shadow border-0">
            <div class="card-body border-0 rounded" style="background-color: #B2F9FC">
                <p class="text-center text-primary">পুলিশের সেবা প্রাপ্তিতে যেকোনো মতামত অথবা অভিযোগ আপনি সহজেই এ ওয়েবসাইটের মাধ্যমে কর্তৃপক্ষের নিকট উপস্থাপন করতে পারবেন। এটি বাংলাদেশ পুলিশ কর্তৃক পরিচালিত কেন্দ্রীয় অভিযোগ ব্যবস্থাপনার একটি অনলাইন প্ল্যাটফর্ম। বাংলাদেশ পুলিশ সম্পর্কে মতামত অথবা অভিযোগ ব্যবস্থাপনা পুলিশ সম্পর্কে জনগনকে আরো আস্থাশীল করে তুলবে এবং পুলিশকে করে তুলবে আরো দায়িত্ববান। জাতীয় শুদ্ধাচার কৌশলের আলোকে মতামত অথবা অভিযোগ ব্যবস্থাপনা বাংলাদেশ পুলিশের স্বচ্ছতা ও জবাবদিহিতা নিশ্চিত করবে।</p>
            </div>
        </div>
       </div>

       <div class="mt-5">
        <div class="row">
            <div class="col-sm-9">
                <div class="card">
                    <div class="card-header">
                        <p><b class="text-success">মতামত অথবা অভিযোগ প্রেরণের পদ্ধতি</b></p>
                    </div>
                    <div class="card-body">
                        <ul>
                            <li>পুলিশ সংক্রান্ত যে কোন ধরণের মতামত অথবা অভিযোগ পেশ করতে নীচের "আপনার মতামত/অভিযোগ" বাটনটিতে ক্লিক করুন।</li>
                            <li>আপনার মোবাইল নাম্বার সহ প্রয়োজনীয় তথ্যাদি পূরণ করে "সেভ এবং পরবর্তি ধাপ" বাটনটিতে ক্লিক করুন।</li>
                            <li>সিস্টেম আপনাকে একটি অটো জেনারেটেড কোড প্রদান করবে। উক্ত কোডটি আপনার মোবাইল থেকে এসএমএসের মাধ্যমে 6969 নাম্বারে প্রেরন করুন।</li>
                            <li>আপনার মোবাইলে এস এম এস এর মাধ্যমে প্রাপ্ত কোডটি নির্দিষ্ট ঘরে লিখে "সেভ এবং পরবর্তি ধাপ" বাটনটিতে ক্লিক করুন।</li>
                            <li>আপনার মতামত অথবা অভিযোগ সংক্ষেপে লিখে প্রেরণ করুন।</li>
                            <li>নতুন করে মতামত অথবা অভিযোগ করতে চাইলে আবার "আপনার অভিযোগ" বাটনটিতে ক্লিক করুন।</li>
                        </ul>

                        <div class="float-right">
                            <a href="{{ route('complaint_reg')}}" class="btn btn-primary">আপনার অভিযোগ<br>(Complaint)</a>
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
                            <li>Near Police Station</li>
                            <hr>
                            <li>Hotlines</li>
                            <hr>
                            <li>Wanted List</li>
                            <hr>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
       </div>
    </div>
  </section>
  <!-- Resources section-->
@endsection
