@extends('layouts.dashboard')
@section('content')
<div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/home">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Banks</li>
          </ol>

          <!-- Page Content -->
          <h1>
              Your Banks
          </h1>
          <hr>
          <p>
                <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                            <tr>
                              <th>Image</th>
                              <th>Name</th>
                              <th>Manager</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tfoot>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Manager</th>
                                    <th>Action</th>
                                </tr>
                          </tfoot>
                          <tbody>

                                @if (count($banks) >0)
                                    @foreach ($banks as $bank)
                                    <tr>
                                            <th> <img src="{{ $bank->image }}" alt="{{ $bank->image }}" srcset="{{ $bank->image }}"> </th>
                                            <th>{{{ $bank->name }}}</th>

                                            @if (($bank->admin) !=  null )
                                                <th>{{ $bank->admin->name }}</th>
                                            @else
                                            <th class=" text text-danger" >No Manager</th>
                                            @endif


                                            <th>
                                                <a  class="btn btn-primary" href="{{ route('banks.show', $bank->id) }}" role="button"><i class="fas fa-eye    ">View</i> </a>
                                                <a  class="btn btn-primary" href="{{ route('banks.edit', $bank->id) }}" role="button"> <i class="fas fa-edit    "></i> Edit</a>



                                                <a href="#" class=" btn btn-danger pl-2 align-content-between  justify-content-center" onclick="deleteUser()" >
                                                        <i class="fas fa-trash-alt    ">Delete Bank</i></a><br />
                                                                    <form id="delete" action="{{ route('banks.destroy', $bank->id) }}" method="post">
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
              var result = confirm("Are you sure you want to delete ?")
              if(result){

                  event.preventDefault();
                  document.getElementById("delete").submit();
              }else{
                  alert("Thank you for keeping!!")
              }

            }

        </script>

@endsection
