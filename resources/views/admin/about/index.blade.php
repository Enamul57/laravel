@extends('admin.admin-static')

@section('admin')
        
<div class="row">
    <div class="col-md-12">
    <div class="card">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{session('success')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <div class="card-header">
            <h4> About Panel</h4>
            <a href="{{url('admin/about/add')}}"><button class='btn btn-primary btn-md float-right'>Add About</button></a>
        </div>
            <table class="table">
                <thead>
                        <tr>
                            <th scope="col" width='5%'>SL No</th>
                            <th scope="col" width='15%'>Title</th>
                            <th scope='col' width='25%'>Short Description</th>
                            <th scope="col" width='25%'>Long Description</th>
                            <th scope='col' width='15%'>Created At</th>
                            <th scrope='col'width='15%'>Action</th>
                        </tr>
                </thead>
                <tbody>
                    @php($i = 1)
                    @foreach($abouts as $about)
                    <tr>
                        <th scope="row">{{$i++}}</th>
                        <td>{{$about['title']}}</td>
                        <td>{{$about['short_desc']}}</td>
                        <td>{{$about['long_desc']}}</td>
                        <td>{{$about['created_at']->diffForHumans()}}</td>
                        <td>
                            <a href="{{url('about/edit/'.$about->id)}}" class='btn btn-primary'>Edit</a>
                            <a href="{{url('about/delete/'.$about->id)}}" class='btn btn-danger' onclick="return confirm('are you sure to delete?');">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection