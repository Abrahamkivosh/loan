@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class=" col-12">
                    <form action="" method="post">
                            <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" id="basic-addon1">Name</span>
                                    </div>
                                    <input  name="name" type="text" class="form-control" placeholder="Type your full name" aria-label="Username" aria-describedby="basic-addon1">
                                  </div>

                                  <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="your job email" aria-label="your job email" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                          <span class="input-group-text" id="basic-addon2">@example.com</span>
                                        </div>
                                      </div>
                                      <div class="input-group flex-nowrap">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text" id="addon-wrapping">Phone</span>
                                            </div>
                                            <input type="text" name="phone" class="form-control" placeholder="Your phone number" aria-label="Username" aria-describedby="addon-wrapping">
                                          </div>

                                          <div class="form-group">
                                            <label for="">Old Password</label>
                                            <input type="password" class="form-control" name="" id="" placeholder="">
                                          </div>
                                          <div class="form-group">
                                                <label for="">new Password</label>
                                                <input type="password" class="form-control" name="" id="" placeholder="">
                                              </div>
                                              <div class="form-group">
                                                    <label for="">Confirm Password</label>
                                                    <input type="password" class="form-control" name="" id="" placeholder="">
                                                  </div>



                                          <div class="form-group">
                                                <button type="submit" class="btn btn-primary p-3 py-3 mb-3"> <i class="fas fa-upload    ">Update profile</i> </button>
                                          </div>

                    </form>
            </div>
        </div>
    </div>
</div>
@stop
