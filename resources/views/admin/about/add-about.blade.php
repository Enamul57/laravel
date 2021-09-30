@extends('admin.admin-static')
@section('admin')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            Add Brand
        </div>
        <div class="card-body">
            <form action="{{url('admin/about/store')}}" method="POST">
            @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        @error('title')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                </div>


                <div class="form-group">
                    <label for="exampleInputEmail1">Short Description</label>
                    <input type="text" name="short_desc" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Long Description</label>
                    <input type="text" name="long_desc" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>

        <button type="submit" class="btn btn-primary">Add About</button>
        </form>    
    </div>
</div>
@endsection