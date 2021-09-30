@extends('admin.admin-static')
@section('admin')
    <div class="row">
        <div class="col-md-12">
            <form action="{{url('admin/slider/update')}}" method='POST' enctype='multipart/form-data'>
                @csrf
                <input type="hidden" name="id" value="{{$slider->id}}">
                <input type="hidden" name="old_image" value="{{$slider->image}}">
                <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" class="form-control" name ='title' value='{{$slider->title}}' id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <input class="form-control" name='description'  value='{{$slider->description}}' id="exampleInputPassword1" >
                </div>
                <div class="form-group">
                    <label for="">Choose Slider Image</label>
                    <input type="file" class="form-control" name='image'>
                </div>
                <div class="form-group">
                    <img src="{{asset($slider->image)}}" width="400px" alt="">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection