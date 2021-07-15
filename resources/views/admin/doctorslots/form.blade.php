@extends('admin.dashboard')
@section('content')

                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Day</label>
                    <select name="day" class="form-control">
                      <option  value="saturday">Saturday</option>
                      <option  value="sunday">Sunday</option>
                      <option  value="monday"> Monday</option>
                      <option  value="tuesday">Tuesday</option>
                      <option  value="wednesday">Wednesday</option>
                      <option  value="thursday">Thursday</option>
                      <option  value=" friday">Friday</option>

                    </select>
                  </div>
                 
                    <div class="form-group">
                    <label for="exampleInputEmail1">Time</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                  <div class="form-group">

                    <input type="hidden" class="form-control" value="auth()->user()->id"  name="user_id" >
                  </div>
                </div>

               <div class="card-footer">

                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              

@endsection