@extends('admin.admin-static')

@section('admin')

    <div class="row">
        
        <div class="col-md-6">
            @if(session('success'))
                <span>{{session('success')}}</span>
            @endif
        <h4>Update Profile</h4><br/>
            <form action="{{route('update.profile')}}" method='POST'>
                @csrf
                <div class="form-group">
                   
                    <label for="exampleInputPassword1">Name</label>
                    
                    <input type="text" class="form-control" name= 'name' id="exampleInputPassword1" value="{{$users->name}}">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Email</label>
                    <input type="email" class="form-control" name='email' value="{{$users->email}}">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>

@endsection