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
                            All Contact
                            <a href="{{route('contact.form')}}"><button type="button" class="btn btn-primary btn-md float-right">Add Contact</button></a>
                        </div>
                            <table class="table">
                                <thead>
                                        <tr>
                                        <th scope="col" width='5%'>SL No</th>
                                        <th scope="col" width='25%'>Location</th>
                                        <th scope="col" width='25%'>Email</th>
                                        <th scope="col" width='20%'>Phone</th>
                                        <th scope='col' width='25%'>Action</th>
                                        </tr>
                                </thead>
                                <tbody>
                                    @php($i = 1)
                                    @foreach($contacts as $contact)
                                    <tr>
                                        <th scope="row">{{$i++}}</th>
                                        <td>{{$contact->location}}</td>
                                        <td>{{$contact['email']}}</td>
                                        <td>{{$contact['phone']}}</td>
                                        <td>
                                         <a  class='btn btn-info' href="{{url('contactaccount/edit/'.$contact->id)}}" >Edit</a>
                                         <a  class='btn btn-danger' href="{{url('contactaccount/delete/'.$contact->id)}}">Delete</a>

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
@endsection