<x-app-layout>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{session('success')}}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <div class="card-header ">
                            <span class="badge badge-danger">Trash Category</span> 
                        </div>
                            <table class="table">
                                <thead>
                                        <tr>
                                        <th scope="col">SL No</th>
                                        <th scope="col">User ID</th>
                                        <th scope="col">Category Name</th>
                                        <th scope="col">Created At</th>
                                        <th scope='col'>Action</th>
                                        </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach($trashCan as $category)
                                    <tr>
                                        <th scope="row">{{$trashCan->firstItem()+$loop->index}}</th>
                                        <td>{{$category->user->name}}</td>
                                        <td>{{$category['category_name']}}</td>
                                        @if($category['created_at'] === null)
                                            <td><span class='text text-danger'>No date set</span></td>
                                            @else
                                            <td>{{$category['created_at']->diffForHumans()}}</td>
                                        @endif
                                        <td>
                                         <a  class='btn btn-info' href="{{'restore/'.$category->id}}" >Restore</a>
                                         <a  class='btn btn-danger' href="{{'delete/'.$category->id}}">Delete</a>

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{$trashCan->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
