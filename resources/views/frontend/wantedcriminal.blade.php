@extends('frontend.layout.master')
@section('content')
  <!-- Categories section-->
  <section class="pb-5 pt-5">
    <div class="container pb-5">
        <header class="mb-5">
            {{-- <h2 class="h3 mb-1 text-center text-danger">Wanted Criminal</h2> --}}
            {{-- <p class="text-muted text-small mb-5">Lorem ipsum dolor sit amet, consetetur sadipscing elitr.</p> --}}
          </header>

          <div class="card ">
              <div class="card-header">
                <h1>List of Most Wanted Criminal</h1>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                    <table id="table" class="display table2 table table-hover " >
                        <thead>
                            <th>#</th>
                            <th>Details</th>
                            <th>Photo</th>

                        </thead>
                        <tbody>
                            @php
                                    $i = 0;
                                @endphp
                            @foreach (App\Models\Wanted::get()->where('status',1) as $item)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>
                                    <span class="font-weight-bold">Name: </span> {{ $item->name }} <br>
                                    <span class="font-weight-bold">S/O : </span> {{ $item->father_name }} <br>
                                    <span class="font-weight-bold">Address : </span>{{ $item->address}} <br> <br>
                                    <span class="font-weight-bold">Details : </span>{{ $item->details}}
                                </td>

                                <td>
                                    @if($item->photo != NULL)
                                        <img src="{{ asset('admin/assets/images/wantedlist/'.$item->photo) }}" alt="" style="height:200px;width:200px; round: none">
                                    @else
                                        <img src="{{ asset('admin/assets/images/default/images.png') }}" alt="">
                                    @endif
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
              </div>
          </div>
    </div>
  </section>
  <!-- Resources section-->

  <script>

    $(document).ready(function() {
      var table =$('.table2').DataTable({
            "autoWidth": true,
            "processing": true,
            //"serverSide": true,
            "lengthMenu": [20, 25, 50, 100, 200,500,1000,1500,2000],
        });
    });


</script>
@endsection
