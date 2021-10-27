@extends('admin.layouts.admin_master')

@section('content')
    <div class="card">
              <div class="card-header">
                <h3 class="card-title">Work History Search</h3>
              </div>
              <div class="container d-flex justify-content-around mt-3">
                  <div class="left">
                      <label for="reg_no">Registration Number: </label>
                        <input type="text" name="" id="reg_no" height="30px" placeholder=" Enter Registration Number"><br><br>

                        <label for="period">Period:</label>
                        <table>
                            <tr>
                                <td><input type="date" name="" id="period" height="50px"></td>
                                <td>TO</td>
                                <td><input type="date" name="" id="reg_no" height="50px"></td>
                            </tr>
                        </table><br>
                        <input type="text" name="callsing" id="" placeholder=" Enter Call Sign">
                        <button type="submit" class="btn btn-primary">Search</button>
                        <input type="text" name="ship_name" id="" placeholder="Enter Ship Name">
                  </div>
                  <div class="right">
                      <br>
                      <br>
                        <label for="nextflight">Next Flight:</label>
                        <input type="text" name="nextflight" id="nextflight" placeholder="Enter Next Flight">
                  </div>
              </div>
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                        <th>Rendering engine</th>
                        <th>Browser</th>
                        <th>Platform(s)</th>
                        <th>Engine version</th>
                        <th>CSS grade</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                        <td>Trident</td>
                        <td>Internet
                        Explorer 4.0
                        </td>
                        <td>Win 95+</td>
                        <td> 4</td>
                        <td>X</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

<style>
    
</style>
@endsection