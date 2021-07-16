@extends('admin.dashboard')
@section('content')

<div class="card card-primary">
 <div class="card-header">
 <h3 class="card-title">Edit Time Slot</h3>
       
</div>
{!! Form:: model($row,array('method' => 'PATCH','action' => ['App\Http\Controllers\DoctorslotController@update',$row->id])) !!}
             
                <div class="card-body">
                 
                  <div class="form-group">
                    <label for="exampleInputEmail1">Day</label>
                    <input type="date" class="form-control"  name="day" id="exampleInputEmail1">
                    </div>
                    
                    <div class="form-group">
                    <label for="exampleInputEmail1">Time</label>
                    <input type="text" class="form-control"  name="time" value="{{$row->time}}" id="exampleInputEmail1" placeholder="Enter Time">
                  </div>
                  <div class="form-group">

                    <input type="hidden" class="form-control" value="{{ auth()->user()->id }} "  name="user_id" >
                  </div>
                </div>

               <div class="card-footer">

                  <button type="submit" class="btn btn-primary">Update</button>
                </div>

    {!! Form::close() !!} 
</div>

@endsection