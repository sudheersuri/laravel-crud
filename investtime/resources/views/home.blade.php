@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <form class="form" action="{{route('add')}}" method="POST">
                            @csrf
                            Activitiy Name:<br>
                            <input type="text" name="activityname" class="form-control" required/>
                            @error('activityname')
                            <span class="text-danger">{{$message}}</span><br>
                            @enderror
                            Time Spent: <br>
                            <input type="number" pattern="/d*" class="form-control" name="timespent" required/>
                            <br><br>
                           <center> <input type="submit" class="btn btn-success" value="Add" /> </center>
                           
                    </form>
                    <hr>
                    <br><center>Activities</center><br>
                    <table class="table">
                    <thead>
                    <tr><th>Activity Name</th><th>Time Spent</th><th>Action</th></tr>
                    </thead>
                    <tbody id="activitiesrows">
                    @foreach($allactivities as $activity)
                    <tr><td>{{$activity->activityname}}</td><td>{{$activity->timespent}}</td><td><a id="editbtn{{$activity->id}}" class="btn btn-primary" data-toggle="modal" data-target="#editModal">  <i class="fas fa-edit"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-danger" href="{{route('delete',$activity->id)}}"><i class="fas fa-trash-alt"></i></a></td></tr>
                    @endforeach
                    </tbody>
                    </table>
                </div>
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit Activity</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class="form" action="{{route('edit')}}" method="POST">
                            @csrf
                            <input type="hidden" name="activityid" id="activityid" class="form-control"/><br>
                            Activitiy Name:<br>
                            <input type="text" name="activityname" id="activityname" class="form-control" required/><br>
                            Time Spent: <br>
                            <input type="number" pattern="/d*" id="timespent" class="form-control" name="timespent" required/>
                            <br><br>
    <center><input type="submit" class="btn btn-primary" value="Save Changes"></center>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    
    </div>
  </div>
</div>
            </div>
        </div>
    </div>
</div>
@endsection
