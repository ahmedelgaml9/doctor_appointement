@extends('admin.dashboard')
@section('content')

  <div class="card">
            <div class="card-header">
              <h3 class="card-title"></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Day</th>
                  <th>Time</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
               @foreach($slots as $slot)
                <tr>
                  <td>{{$slot->id}}</td>
                  <td>{{$slot->day}}</td>
                  <td>{{$slot->time}}</td>
                  <td>{{$slot->status}}</td>
                  <td>
                <a class="btn btn-success" href="{{ url('doctors/slots/'.$slot->id.'/edit') }}" ><span class="fa fa-pencil"></span></a>
			        {!! Form::open(['action'=>['App\Http\Controllers\DoctorslotController@destroy',$slot->id],'method'=>'delete' ,'style'=>'display: inline']) !!}
			        <button type="submit" class="btn btn-danger red " onclick='return confirm("Are You sure!!")' ><span class="fa fa-times"></span></button>
			        {!! Form::close() !!}
                  </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
               
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->


@endsection