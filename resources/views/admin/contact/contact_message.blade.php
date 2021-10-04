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
                            <a href="{{url('contact/trashList')}}"><button type="button" class="btn btn-warning btn-md float-right">Trash Lists</button></a>
                        </div>
                            <table class="table">
                                <thead>
                                        <tr>
                                        <th scope="col" width='5%'>SL No</th>
                                        <th scope="col" width='15%'>Name</th>
                                        <th scope="col" width='15%'>Email</th>
                                        <th scope="col" width='15%'>Phone</th>
                                        <th scope="col" width='20%'>Subject</th>
                                        <th scope="col" width='20%'>Message</th>
                                        <th scope='col' width='25%'>Action</th>
                                        </tr>
                                </thead>
                                <tbody>
                                    @php($i = 1)
                                    @foreach($contacts as $contact)
                                    <tr>
                                        <th scope="row">{{$i++}}</th>
                                        <td>{{$contact->name}}</td>
                                        <td>{{$contact['email']}}</td>
                                        <td>{{$contact['phone']}}</td>
                                        <td>{{$contact['subject']}}</td>
                                        <td>{{$contact['message']}}</td>
                                        <td>
                                         <a  class='btn btn-danger' href="{{url('contactaccount/softdelete/'.$contact->id)}}">Move to trash</a>

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
@endsection