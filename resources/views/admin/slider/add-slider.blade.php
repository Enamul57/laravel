
@extends('admin.admin-static')
@section('admin')
        
          <div class="content">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card card-default">
                        <div class="card-header card-header-border-bottom">
                            <h2>Basic Form Controls</h2>
                        </div>
                        <div class="card-body">
                            <form action="{{route('slider.store')}}" method='POST' enctype='multipart/form-data'>
                                @csrf
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Slider Title</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" name='title' placeholder="Enter Title">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Description</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" name='description' rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Image</label>
                                    <input type="file" class="form-control-file" name='image' id="exampleFormControlFile1">
                                </div>
                                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                                    <button type="submit" class="btn btn-primary btn-default">Submit</button>
                                    <button type="submit" class="btn btn-secondary btn-default">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
          </div>

          

@endsection
