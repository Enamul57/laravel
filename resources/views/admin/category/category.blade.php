<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          All Category 
        </h2>

    </x-slot>
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
                        <div class="card-header">
                            All Category
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
                                    
                                    @foreach($categories as $category)
                                    <tr>
                                        <th scope="row">{{$categories->firstItem()+$loop->index}}</th>
                                        <td>{{$category->user->name}}</td>
                                        <td>{{$category['category_name']}}</td>
                                        @if($category['created_at'] === null)
                                            <td><span class='text text-danger'>No date set</span></td>
                                            @else
                                            <td>{{$category['created_at']->diffForHumans()}}</td>
                                        @endif
                                        <td>
                                         <a  class='btn btn-info' href="{{'edit/'.$category->id}}" >Edit</a>
                                         <a  class='btn btn-danger' href="{{'softdeletes/'.$category->id}}">Move to Trash</a>

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{$categories->links()}}
                            <div>
                                <a href="{{url('category/trash')}}"><span class='btn btn-secondary'>Trash Lists</span></a>
                            </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Add Category
                        </div>
                        <div class="card-body">
                            <form action="{{route('store.category')}}" method='POST'>
                                @csrf
                                <div class="form-group">
                                        <label>Category Name</label><br/>
                                        @error('category_name')
                                            <span class='text-danger'>{{$message}}</span>
                                        @enderror
                                        <input type="text" class="form-control" name='category_name'  placeholder="Enter Category">
                                </div>
                                <button type="submit" class="btn btn-primary">Add</button>
                            </form>                      
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
