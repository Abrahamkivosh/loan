@extends('layouts.admin')

@section('content')
<div class="container-fluid">

        <h1 class="h3 mb-4 text-gray-800">Email Clients</h1>
        <div class="card text-white bg-info">
          <img class="card-img-top" src="holder.js/100px180/" alt="Loan">
          <div class="card-body">
            <h4 class="card-title">Select client you want to email</h4>
            <p class="card-text">
                <form action="{{ route('admin.mail.send') }}" method="post">
                    @csrf
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="email">Client Email</label>
                        <select id="email" class="custom-select text text-lg-center" autofocus="true" name="email">

                           @if (count($loans) > 0)

                               @foreach ($loans as $loan)
                               <option value="{{ $loan->user->email }}" >{{ "NAME :  ".$loan->user->name . ".         EMAIL :". $loan->user->email }}</option>
                               @endforeach

                           @else

                           @endif

                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Subject</span>
                        </div>
                    <input type="text" class="form-control" name="subject" aria-label="Sizing example input" placeholder="Write subject here...." aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="form-group">
                    <label for="message">Message</label>
                    <textarea class="form-control" name="message" id="message" cols="5" autofocus="true" placeholder="What do you want to tell client ?" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary"> <i class="fab fa-telegram-plane    ">Send Email</i> </button>

                </form>
            </p>
          </div>
        </div>

      </div>
@stop
