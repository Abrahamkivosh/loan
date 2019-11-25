@extends('layouts.dashboard')

@section('content')
<div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="{{ route('home') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">All loan requests</li>
          </ol>

          <!-- Page Content -->
          <h1>All my loan Request</h1>
          <hr>
          <p>
                <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                            <tr>
                              <th>Bank Name</th>
                              <th>Amount</th>
                              <th>Status</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tfoot>
                                <tr>
                                    <th>Bank Name</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                          </tfoot>
                          <tbody>

                                @if (count($loans) >0)
                                    @foreach ($loans as $loan)
                                    <tr>



                                            @if (($loan->bank->name) !=  null )
                                                <th>{{ $loan->bank->name }}</th>
                                            @else
                                            <th class=" text text-danger  " >No Manager</th>
                                            @endif

                                            <th>{{ $loan->amount }}</th>
                                            {{--  //padding == 0  cancelled == 1 approved == 2  --}}

                                            @switch($loan->status)
                                                @case(0)
                                                <th class=" text text-warning" > Pedding </th>
                                                    @break
                                                @case(1)
                                                <th class=" text text-danger" > Cancelled </th>
                                                    @break
                                                @case(2)
                                                <th class=" text text-success" > Approved </th>
                                                @break
                                                @default

                                            @endswitch


                                            <th>
                                                <!-- Button trigger modal -->


                                                <!-- Modal -->



                                                <a  class="btn btn-primary" href="{{ route('loans.show', $loan->id) }}" role="button"><i class="fas fa-eye">View</i> </a>
                                                <a  class="btn btn-primary" role="button" btn-lg" data-toggle="modal" data-target="#my-modal"> <i class="fas fa-edit    "></i> Edit</a>

                                                <div id="my-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="my-modal-title">Edit Loan detials</h5>
                                                                    <button class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>
                                                                        <form action="{{ route('loans.update',$loan->id) }}" method="post">
                                                                            @method("PUT")
                                                                            @csrf
                                                                            {{ csrf_field() }}
                                                                            <div class="form-group">
                                                                              <label for="bank">Bank Selected</label>
                                                                              <select  class="custom-select " name="bank" >
                                                                                    <option selected  value="{{ $loan->bank->id }}" > {{ $loan->bank->name }}</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="status">Status</label>
                                                                                <input id="status" disabled aria-disabled="true" class="form-control disabled  hidden " value="{{ $loan->status }}" type="text" name="status">
                                                                            </div>
                                                                            <div class="form-group">
                                                                              <label for="amount">Amount</label>
                                                                              <input type="text"
                                                                                class="form-control" name="amount" id="amount" aria-describedby="helpId" placeholder="Amount you wish to borrow in Ksh">
                                                                              <small id="helpId" class="form-text text-muted">Amount you wish to borrow in Ksh</small>
                                                                            </div>
                                                                            <div class="form-group">
                                                                              <label for="description">Why do you want the loan</label>
                                                                              <textarea class="form-control" name="description" id="" rows="3">{{ $loan->description }}</textarea>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                                            </div>
                                                                        </form>
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
                                                                    <form id="delete" action="{{ route('loans.destroy', $loan->id) }}" method="post">
                                                                        @method('DELETE')
                                                                        {{ csrf_field() }}
                                                                    </form>


                                            </th>
                                        </tr>
                                    @endforeach
                                @else

                                @endif

                          </tbody>
                        </table>
                      </div>
          </p>

        </div>
        <!-- /.container-fluid -->

      </div>
      <script>
            function deleteUser(){
              var result = confirm("Are you sure you want to delete this Loan request?")
              if(result){

                  event.preventDefault();
                  document.getElementById("delete").submit();
              }else{
                  alert("Thank you for keeping client!!")
              }

            }

        </script>
@stop
