@extends('layouts.dashboard')

@section('content')

<div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="{{ route('home') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Request Loan</li>
          </ol>

          <!-- Page Content -->
          <h1>Request Loan</h1>
          <hr>
          <p class=" lead">
              <form class=" col-8" action="{{ route('loans.store') }}" method="post">
                  @csrf
                  {{ csrf_field() }}
                    <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <label class="input-group-text" for="inputGroupSelect01">Select Bank</label>
                            </div>
                            <select  class="my-bank custom-select" name="bank" id="inputGroupSelect01" >
                                    <option selected>Choose bank you want to get loan from</option>
                              @foreach ($banks as $bank)

                              <option   value="{{ $bank->id }}">{{ $bank->name }}</option>

                              @endforeach
                            </select>
                          </div>
                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input id="amount" class="form-control" placeholder="Amount you want to borrow" type="number" name="amount">
                    </div>

                    <div class="form-group">
                      <label for="description">Reason for loan</label>
                      <textarea class="form-control" name="description"  rows="3"></textarea>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
              </form>
          </p>

        </div>
        <!-- /.container-fluid -->

      </div>

@stop

@section('script')
    <script src="{{ asset('js/app.js') }}"></script>
@stop

