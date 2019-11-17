
@extends('layouts.dashboard')

@section('content')
<div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="{{ route('home') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Show Single Loan</li>
          </ol>

          <!-- Page Content -->
          {{--  <h1>SIngle Loan request</h1>  --}}
          <hr>
          <p>
              <div class="jumbotron jumbotron-fluid">
                  <div class=" pull-right float-right" >
                      <a class=" btn btn-primary pr-3" href="{{ route('loans.index') }}"><i class="fas fa-fast-backward    "> Back</i></a>
                  </div>
                  <div class="container">
                      <h1 class="display-3">SIngle Loan request</h1>
                      <p class="lead">More information </p>
                      <hr class="my-2">
                      <p class=" lead" >
                          <ul class="list-group list-group-horizontal">
                              <li class="list-group-item ">Bank name : {{ $loan->bank->name }}</li>
                              <li class="list-group-item ">Amount requested : {{ $loan->amount }}</li>
                              <li class="list-group-item ">Loan status :
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
                              </li>
                              <li class="list-group-item ">Loan Description <div>
                                     {{ $loan->description }}
                                  </div></li>
                          </ul>
                      </p>

                  </div>
              </div>
          </p>

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Your Website 2018</span>
            </div>
          </div>
        </footer>

      </div>
@stop
