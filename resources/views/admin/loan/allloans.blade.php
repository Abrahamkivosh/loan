@extends('layouts.admin')

@section('content')
      <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800 text-capitalize ">Bank Name  : {{ $bank->name }}</h1>
        <div class="card text-left">
          <img class="card-img-top" src="holder.js/100px180/" alt="">
          <div class="card-body">
            <h4 class="card-title">All Loans request </h4>
            <p class="card-text">
                    <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                                <tr>
                                  <th>Client Name</th>
                                  <th>Amount</th>
                                  <th>Status</th>
                                  <th>Action</th>

                                </tr>
                              </thead>
                              <tfoot>
                                <tr>
                                <th>Client Name</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Action</th>
                                </tr>
                              </tfoot>
                              <tbody>
                                @if (count($bank->loans) > 0)

                                     @foreach ($bank->loans as $loan)
                                     <tr>
                                        <td>{{ $loan->user->name }}</td>
                                        <td>{{ $loan->amount }}</td>
                                        <td>
                                                @switch($loan->status)
                                                @case(0)
                                                <span class=" text text-warning" > Pedding </span>
                                                    @break
                                                @case(1)
                                                <span class=" text text-danger" > Cancelled </span>
                                                    @break
                                                @case(2)
                                                <span class=" text text-success" > Approved </span>
                                                @break
                                                @default

                                            @endswitch
                                        </td>
                                        <td class=" d-flex">


                                                <!-- Modal -->

                                                <!--  <approve-loan loan-id="{{ $loan->id }}" current-status ="{{ $loan->status }}" ></approve-loan>  -->
                                                <form class=" d-flex pr-2" action="{{ route('approve',$loan->id) }}" method="post">
                                                        @csrf
                                                        {{ csrf_field() }}
                                                        @method("PUT")
                                                        <input type="text" hidden class="hidden" name="status" value="2" >
                                                        <button type="submit" class="btn btn-primary">Approve</button>
                                                </form>

                                                <a  class="btn btn-primary pl-3" href="{{ "" }}" role="button" data-toggle="modal" data-target="#my-modal"> <i class="fas fa-eye">View</i> </a>

                                                <div id="my-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="my-modal-title">View Loan detials</h5>
                                                                    <button class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>
                                                                      <div class="card">
                                                                        <div class="card-body">
                                                                          <h5 class="card-title">{{ $loan->user->name }}</h5>
                                                                          <p class="card-text">
                                                                            <ul class="list-group">
                                                                              <li class="list-group-item ">Amount requested : {{ $loan->amount }}</li>
                                                                              <li class="list-group-item " >Description <p>{{ $loan->description }}</p> </li>

                                                                            </ul>
                                                                          </p>
                                                                        </div>
                                                                      </div>
                                                                    </p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    Footer
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>
                                                <a class="btn btn-danger pl-2 align-content-between  justify-content-center" onclick="deleteUser()"  href="#" >
                                                        <i class="fas fa-trash-alt    ">Delete loan</i></a><br />
                                                                    <form id="delete" action="" method="post">
                                                                        @method('DELETE')
                                                                        {{ csrf_field() }}
                                                                    </form>

                                        </td>
                                     </tr>
                                     @endforeach

                                @endif

                              </tbody>
                            </table>
                          </div>
            </p>
          </div>
        </div>

      </div>
@stop
@section('script')
<script src="{{ asset('js/app.js') }}" defer></script>
@endsection
