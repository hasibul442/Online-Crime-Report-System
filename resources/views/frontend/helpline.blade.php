@extends('frontend.layout.master')
@section('content')
  <!-- Categories section-->
  <section class="pb-5 pt-5">
    <div class="container pb-5">
        <header>
          {{-- <h2 class="h3 mb-1">Our essential tools</h2>
          <p class="text-muted text-small mb-5">Lorem ipsum dolor sit amet, consetetur sadipscing elitr.</p> --}}
        </header>
        <div class="row text-center align-items-stretch">
            @foreach ( App\Models\Hotline::get() as $item)
          <div class="col-lg-4 mb-4">
            <div class="card reset-anchor border-0 shadow h-100 hover-transition">
              <div class="card-body ">
                {{-- <div class="essential-tool-img mb-4 mx-auto" style="background: url(img/tool-1.png)"></div> --}}
                <p> <a class="stretched-link reset-anchor" href="tel:{{ $item->phone_number }}">{{ $item->title }}</a></p>
                <h4 class="mb-0"><a href="tel:{{ $item->phone_number }}">{{ $item->phone_number }}</a></h4>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
  </section>
  <!-- Resources section-->
@endsection
