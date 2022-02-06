@extends('frontend.layout.master')
@section('content')
<img src="{{ asset('admin/assets/images/default/en.png') }}" alt="" class="img-fluid w-100">
  <!-- Categories section-->
  <section class="pb-5 pt-5">
    <div class="container pb-5">
      <header class="text-center mb-5">
        <h2 class="mb-1">All Service</h2>
        {{-- <p class="text-muted text-small">Lorem ipsum dolor sit amet, consetetur sadipscing elitr.</p> --}}
      </header>
      <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-8">
            <div class="row text-center">

                <div class="col-lg-4 px-lg-2">
                  <div class="categories-item card border-0 shadow mb-4 reset-anchor hover-transition">
                    <div class="card-body px-4 py-5">
                          <svg class="svg-icon mb-3">
                            <use xlink:href="#pie-chart-1"> </use>
                          </svg>
                      <h2 class="h5"> <a class="stretched-link reset-anchor-inherit" href="{{ route('general.diary') }}">সাধারন ডায়েরী</a></h2>
                      {{-- <p class="categories-item-number small mb-0">2 Items</p> --}}
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 px-lg-2">
                    <div class="categories-item card border-0 shadow mb-4 reset-anchor hover-transition">
                      <div class="card-body px-4 py-5">
                            <svg class="svg-icon mb-3">
                              <use xlink:href="#mental-health-1"> </use>
                            </svg>
                        <h2 class="h5"> <a class="stretched-link reset-anchor-inherit" href="{{ route('complaint') }}">অভিযোগ</a></h2>
                        {{-- <p class="categories-item-number small mb-0">2 Items</p> --}}
                      </div>
                    </div>
                </div>
                <div class="col-lg-4 px-lg-2">
                  <div class="categories-item card border-0 shadow mb-4 reset-anchor hover-transition">
                    <div class="card-body px-4 py-5">
                          <svg class="svg-icon mb-3">
                            <use xlink:href="#design-1"> </use>
                          </svg>
                      <h2 class="h5"> <a class="stretched-link reset-anchor-inherit" href="{{ route('casestatus') }}">Case Status</a></h2>
                      {{-- <p class="categories-item-number small mb-0">2 Items</p> --}}
                    </div>
                  </div>
                </div>

                <div class="col-lg-4 px-lg-2">
                  <div class="categories-item card border-0 shadow mb-4 reset-anchor hover-transition">
                    <div class="card-body px-4 py-5">
                          <svg class="svg-icon mb-3">
                            <use xlink:href="#mental-health-1"> </use>
                          </svg>
                      <h2 class="h5"> <a class="stretched-link reset-anchor-inherit" href="{{ route('policestation') }}">Station Location</a></h2>
                      {{-- <p class="categories-item-number small mb-0">2 Items</p> --}}
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 px-lg-2">
                  <div class="categories-item card border-0 shadow mb-4 reset-anchor hover-transition">
                    <div class="card-body px-4 py-5">
                          <svg class="svg-icon mb-3">
                            <use xlink:href="#mental-health-1"> </use>
                          </svg>
                      <h2 class="h5"> <a class="stretched-link reset-anchor-inherit" href="{{ route('helpline') }}">Help Line</a></h2>
                      {{-- <p class="categories-item-number small mb-0">2 Items</p> --}}
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 px-lg-2">
                    <div class="categories-item card border-0 shadow mb-4 reset-anchor hover-transition">
                      <div class="card-body px-4 py-5">
                            <svg class="svg-icon mb-3">
                              <use xlink:href="#stack-1"> </use>
                            </svg>
                        <h2 class="h5"> <a class="stretched-link reset-anchor-inherit" href="{{ route('wantedlist') }}">Wanted Criminal</a></h2>
                        {{-- <p class="categories-item-number small mb-0">2 Items</p> --}}
                      </div>
                    </div>
                </div>
                {{-- <div class="col-lg-12 text-center pt-4"><a class="btn btn-primary" href="#">Show more categories</a></div> --}}
              </div>
          </div>
      </div>
    </div>
  </section>
  <!-- Resources section-->
@endsection
