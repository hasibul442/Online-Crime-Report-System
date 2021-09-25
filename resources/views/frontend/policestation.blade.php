@extends('frontend.layout.master')
@section('content')
  <!-- Categories section-->
  <section class="pb-5 pt-5">
    <div class="container pb-5">
        <header class="mb-5">
            <h2 class="h3 mb-1">কাছের পুলিশ স্টেশন খুজুন</h2>
            {{-- <p class="text-muted text-small mb-5">Lorem ipsum dolor sit amet, consetetur sadipscing elitr.</p> --}}
          </header>

          <div class="card ">
              <div class="card-body">
                <div class="table-responsive">
                    <table id="table" class="display table2 table table-hover " >
                        <thead>
                            <th>#</th>
                            <th>Police Station Name</th>
                            <th>Address</th>
                            <th>Phone Number</th>
                            <th>Email</th>

                        </thead>
                        <tbody>
                            @php
                                    $i = 0;
                                @endphp
                            @foreach (App\Models\Policestation::get() as $item)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td style="max-width:100px;" class="text-wrap">{{ $item->name }}</td>
                                <td style="max-width:100px;" class="text-wrap">{{ $item->division->bn_name }}, {{ $item->district->bn_name }}, {{ $item->upazila->bn_name }}, {{ $item->address }}</td>
                                <td class="text-right"><a href="tel:{{ $item->phone_no }}">{{ $item->phone_no }}</a></td>
                                <td class="text-right"><a href="mailto:{{ $item->email }}">{{ $item->email }}</a></td>
                                {{-- <td>
                                    <a type="button" class="btn  btn-outline-view btn-sm"><i class="mdi mdi-eye"></i></a>
                                    <a type="button" class="btn  btn-outline-edit btn-sm"><i class="mdi mdi-grease-pencil"></i></a>
                                    <a class="btn  btn-outline-delete btn-sm deletebtn" href="javascript:void(0);" data-id="{{ $item->id }}"><i class="mdi mdi-delete-forever"></i></a>
                                </td> --}}
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
