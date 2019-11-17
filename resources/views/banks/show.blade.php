@extends('layouts.dashboard')

@section('content')
<div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="{{ route('home') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Single Bank</li>
            <a href="{{ route('banks.index') }}"><li class="breadcrumb-item pull-right float-right "><button type="button" class="btn btn-outline-primary"> <i class="fas fa-backward    "></i> </button></li></a>
          </ol>

          <!-- Page Content -->

          <p>
              <div class="jumbotron jumbotron-fluid">
                  <div class="container">
                      <h1 class="display-3">{{ $bank->name }}</h1>
                      <p class="lead">{{ $bank->description }} </p>
                      <hr class="my-2">

                      <p class="lead">
                            <ul class="list-group">
                                 <ul class="list-group col-6 offset-1 pt-4 ">
                                        <a class="list-group-item list-group-item-action active" > <i class="fas fa-credit-card    "></i> Accounts</a>
                                        @foreach ($bank->accounts as $acc)
                                              <a class="list-group-item list-group-item-action bg-bottom bg-aqua " href="#"> <i class="fab fa-credit-card-front    "></i> {{ $acc->number }}</a>

                                        @endforeach
                                    </ul>
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
