@extends('admin.admin-static')
@section('admin')
    <div class="row">
        <div class="col-md-12">
            <form action="{{url('about/update')}}" method='POST'>
                @csrf
                <input type="hidden" name="id" value="{{$abouts->id}}">
                <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" class="form-control" name ='title' value='{{$abouts->title}}' id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <input class="form-control" name='short_desc'  value='{{$abouts->short_desc}}' id="exampleInputPassword1" >
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <input class="form-control" name='long_desc'  value='{{$abouts->long_desc}}' id="exampleInputPassword1" >
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection