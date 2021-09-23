<x-app-layout>
    <x-slot name="header">

    </x-slot>
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            Edit Category
                        </div>
                        <div class="card-body">
                            <form action="{{url('category/update/'.$categories->id)}}" method='POST' enctype='multipart/form-data'>
                                @csrf
                                <input type="hidden" name='$brands'>
                                <div class="form-group">
                                        <label>Update Category Name</label><br/>
                                        <input type="text" class="form-control" name='category_name'  value="{{$categories->category_name}}" placeholder="Enter Category">
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
