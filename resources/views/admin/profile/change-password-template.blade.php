@extends('admin.admin-static')

@section('admin')

    <div class="row">
        <div class="col-md-6">
            @if(session('error'))
                <span>{{session('error')}}</span>
            @endif
            <form action="{{route('update.password')}}" method='POST'>
                @csrf
                <div class="form-group">
                   
                    <label for="exampleInputPassword1">Old Password</label>
                    
                    <input type="password" class="form-control" name= 'old_pass' id="exampleInputPassword1" placeholder="Current Password">
                    @error('old_pass')
                        <span>{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
               
                    <label for="exampleInputPassword1">New Password</label>
                   
                    <input type="password" class="form-control" name= 'password' id="exampleInputPassword1" placeholder="New Password">
                    @error('password')
                        <span>{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">New Password</label>
                    <input type="password" class="form-control" name='password_confirmation' placeholder="Confirm Password">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

@endsection