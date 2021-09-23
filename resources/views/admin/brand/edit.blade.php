<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          All Brand 
        </h2>

    </x-slot>
    <div class="py-12">
        <div class="container">
            <div class="row">
                 <div class="col-md-8">
                 <div class="card">
                        <div class="card-header">
                            Update Brand
                        </div>
                        <div class="card-body">
                          <form action="{{url('brand/update')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                                <input type="hidden" name="id" value="{{$brands->id}}">
                                <input type="hidden" name='old_image' value="{{$brands->brand_image}}">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Brand Name</label>
                                    <input type="text" name="brand_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$brands->brand_name}}">
                                        @error('brand_name')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputEmail1">Brand Image</label>
                                    <input type="file" name="brand_image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>

                                <div class="form-group">
                                    <img src="{{asset($brands->brand_image)}}" style='width:70%; height:300px' alt="">
                                </div>

                    <button type="submit" class="btn btn-primary">Update Brand</button>
                    </form>    
                </div>
                <div class="col-md-4">
                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
