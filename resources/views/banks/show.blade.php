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
          </ol>

          <!-- Page Content -->

          <p>
              <div class="jumbotron jumbotron-fluid">
                  <div class="container">
                        <a href="{{ route('banks.index') }}" class="btn btn-outline-primary pull-right float-right align-baseline ">
                                <i class="fas fa-backward    ">Back</i>
                        </a>

                      <h1 class="display-3">{{ $bank->name }}</h1>
                      <p class="lead">{{ $bank->description }} </p>
                      <hr class="my-2">

                      <p class="lead">
                           <div class="card">
                               <div class="card-header">
                                   account detials
                               </div>
                               <div class="card-body">
                                   <h5 class="card-title">Please Read carefully before you request  a loan</h5>


                                   <p class="card-text">
                                       <table class="table table-hover table-responsive table-bordered">
                                           <thead class="thead-light">
                                               <tr>
                                                   <th> <i class="fas fa-credit-card    "></i> credit Card Number</th>
                                                   <th> <i class="fas fa-money-bill    "></i> Maximum Amount to borrow</th>
                                                   <th> <i class="fas fa-money-bill    "></i> Minimum Amount to borrow</th>
                                                   <th> <i class="fas fa-procedures    ">Action</i> </th>
                                               </tr>
                                           </thead>
                                           <tbody>
                                               @foreach ($bank->accounts as $acc)
                                               <tr>
                                                   <td>{{ $acc->creditCardNumber }}</td>
                                                   <td>{{ $acc->max }}</td>
                                                   <td>{{ $acc->min }}</td>
                                                   <td> <a name="" id="" class="btn btn-primary" href="{{ route('loans.create') }}" role="button">Take loan</a> </td>

                                               </tr>
                                               @endforeach
                                           </tbody>
                                           <tfoot>
                                               <tr>
                                                   <th>#</th>
                                               </tr>
                                           </tfoot>
                                       </table>
                                   </p>


                               </div>
                               <div class="card-footer">
                                   Footer
                               </div>
                           </div>

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
