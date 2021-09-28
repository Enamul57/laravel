@extends('admin.admin-static')
@section('admin')

<div class="py-12">
        <div class="container">
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
                            <h3>Slider Content</h3>
                            <a href="{{route('slider.add')}}"><button type="button" class="btn btn-primary btn-md float-right">Add Slider</button></a>
                        </div>
                            <table class="table">
                                <thead>
                                        <tr class='text-center'>
                                        <th scope="col" width='5%'>SL No</th>
                                        <th scope="col" width='15%'>Title</th>
                                        <th scope="col" width='15%'>Description</th>
                                        <th scope="col" width='15%'>Image</th>
                                        <th scope='col' width='15%'>Action</th>
                                        </tr>
                                </thead>
                                <tbody>
                                    @php($i=1)
                                    @foreach($sliders as $slider)
                                    <tr >
                                        <th scope="row">{{$i++}}</th>
                                        <td>{{$slider->title}}</td>
                                        <td>{{$slider['description']}}</td>
                                        <td><img src="{{asset($slider['image'])}}" style='width:140px;height:80px' alt=""></td>
                                        <td>
                                         <a  class='btn btn-info' href="{{url('admin/slider/edit/'.$slider->id)}}" >Edit</a>
                                         <a  class='btn btn-danger' href="{{url('admin/slider/delete/'.$slider->id)}}">Delete</a>

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection