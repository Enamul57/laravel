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
                            Trash Contact
                        </div>
                            <table class="table">
                                <thead>
                                        <tr>
                                        <th scope="col" width='5%'>SL No</th>
                                        <th scope="col" width='15%'>Name</th>
                                        <th scope="col" width='15%'>Email</th>
                                        <th scope="col" width='20%'>Subject</th>
                                        <th scope="col" width='20%'>Message</th>
                                        <th scope='col' width='25%'>Action</th>
                                        </tr>
                                </thead>
                                <tbody>
                                    @php($i = 1)
                                    @foreach($trashlists as $trashlist)
                                    <tr>
                                        <th scope="row">{{$trashlists->firstItem()+$loop->index}}</th>
                                        <td>{{$trashlist->name}}</td>
                                        <td>{{$trashlist['email']}}</td>
                                        <td>{{$trashlist['phone']}}</td>
                                        <td>{{$trashlist['subject']}}</td>
                                        <td>{{$trashlist['message']}}</td>
                                        <td>
                                         <a  class='btn btn-primary' href="{{url('contactaccount/restore/'.$trashlist->id)}}">Restore</a>
                                         <a  class='btn btn-danger' href="{{url('contactaccount/forcedelete/'.$trashlist->id)}}">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{$trashlists->links()}}
                    </div>
                </div>
            </div>
@endsection