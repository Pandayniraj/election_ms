@extends('admin.layouts.admin_master')

@section('content')
    <div class="card">
              <div class="card-header">
                <h3 class="card-title">Bulk Correction of Vessel</h3>
              </div>
              <div class="container">
                  <div class="row mb-5">
                      <div class="col-4">
                          <h3 class="s">Before Change</h3>
                      </div>
                      <div class="col-8">
                          <div class="row my-4">
                              <div class="col-4 text-right">
                                <label for="callsing">Ship</label><br>
                              </div>
                              <div class="col-8">
                                    <input type="text" name="callsign" id="callsing"><br>
                              </div>
                          </div>

                          <div class="row mb-4">
                              <div class="col-4 text-right">
                                <label for="name">Ship Name</label><br>
                              </div>
                              <div class="col-8">
                                    <input type="text" name="shipname" id="name" height="10px"><br>
                              </div>
                          </div>

                          <div class="row">
                              <div class="col-4 text-right">
                                <label for="next">Next Flight</label>
                              </div>
                              <div class="col-8">
                                    <input type="text" name="nextflight" id="next">
                              </div>
                          </div>
                         
                      </div>
                  </div>

                  <hr>

                  <div class="row my-4">
                      <div class="col-4">
                          <h3 class="s">After Change</h3>
                      </div>
                      <div class="col-8">
                          <div class="row mb-4">
                              <div class="col-4 text-right">
                                <label for="callsing">Ship</label><br>
                              </div>
                              <div class="col-8">
                                    <input type="text" name="callsign" id="callsing"><br>
                              </div>
                          </div>

                          <div class="row mb-4">
                              <div class="col-4 text-right">
                                <label for="name">Ship Name</label><br>
                              </div>
                              <div class="col-8">
                                    <input type="text" name="shipname" id="name" height="10px"><br>
                              </div>
                          </div>

                          <div class="row">
                              <div class="col-4 text-right">
                                <label for="next">Next Flight</label>
                              </div>
                              <div class="col-8">
                                    <input type="text" name="nextflight" id="next">
                              </div>
                          </div>
                         
                      </div>
                  </div>


                  <div class="row my-5 justify-content-center">
                      <button class="btn btn-success mr-5">Renewal</button>
                      <button class="btn btn-primary">Return</button>
                  </div>

              </div>

    </div>


    <style>
        h3.s {
            line-height: 145px;
            margin: auto;
            text-align: right;
        }
    </style>
@endsection