@extends('admin.admin-static')
@section('admin')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Add Contact
            </div>
            <div class="card-body">
                <form action="{{route('contact.store')}}" method='POST'>
                    @csrf
                    <div class="form-group">
                            <label>Location</label><br/>
                            <input type="text" class="form-control" name='location'  placeholder="Add Location">
                    </div>
                    <div class="form-group">
                    @error('email')
                                <span class='text-danger'>{{$message}}</span>
                    @enderror
                            <label>Email</label><br/>
                            <input type="text" class="form-control" name='email'  placeholder="Enter Email Address">
                    </div>
                    <div class="form-group">
                            <label>Phone</label><br/>
                            <input type="text" class="form-control" name='phone'  placeholder="Enter Phone Number">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>                      
            </div>
        </div>
    </div>
@endsection