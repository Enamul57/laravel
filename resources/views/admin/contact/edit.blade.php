@extends('admin.admin-static')

@section('admin')
    <div class="row">
        <div class="col-md-12">
                <form action="{{route('contact.post')}}" method="POST" >
                @csrf

                <div class="form-row">
                    <div class="col-md-6 form-group">
                        <input type="hidden" name="id" value="{{$contacts->id}}">
                        <label for="">Location</label>
                    <input type="text" name="location" class="form-control" id="name" value="{{$contacts->location}}" />
                    </div>
                    <div class="col-md-6 form-group">
                    <label for="">Email</label>

                    <input type="email" class="form-control" name="email" id="email"  value="{{$contacts->email}}">
                    </div>
                </div>
                <div class="form-group">
                <label for="">Phone</label>

                    <input type="text" class="form-control" name="phone" id="subject"  value="{{$contacts->phone}}"/>
                </div>

                <div class="text-center"><button type="submit" class='btn btn-success'>Send Message</button></div>
                </form>

        </div>
    </div>    

@endsection