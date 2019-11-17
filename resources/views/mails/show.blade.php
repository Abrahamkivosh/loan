@extends('layouts.dashboard')

@section('content')
<div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="{{ route('home') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Mail Admin</li>
          </ol>

          <!-- Page Content -->
          <h1> Mail Administrator </h1>
          <hr>
          <p>
              <div class="card">
                  <div class="card-body">

                      <p class="card-text">
                          <form action="{{ route('mail.send') }}" method="post">
                              @csrf
                              <div class="form-group">
                                <label for="">Subject</label>
                                <input type="text" name="subject" id="" class="form-control" placeholder="Subject of the email" >
                              </div>
                              <div class="form-group">
                                <label for="message">Message</label>
                                <textarea class="form-control" name="message" cols="5" rows="3"></textarea>
                              </div>
                              <button type="submit" class="btn btn-primary"> <i class="fas fa-mail-bulk    ">Send</i> </button>
                          </form>
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
