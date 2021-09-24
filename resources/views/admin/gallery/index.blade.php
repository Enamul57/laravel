<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Our Gallery 
        </h2>

    </x-slot>
    <div class="py-12">
        <div class="container">
        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{session('success')}}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                @endif
            <div class="row">
                <div class="col-md-8">
                    <div class="card-group">
                        @foreach($images as $image)
                        <div class="col-md-4 mt-5">
                            <div class="card">                               
                                 <img src="{{asset($image['image'])}}" alt="">
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Multiple Image
                        </div>
                        <div class="card-body">
                          <form action="{{url('gallery/store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                                @error('image')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Multi Image</label>
                                    <input type="file" name="image[]" class="form-control" multiple="" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                    <button type="submit" class="btn btn-primary">Add Brand</button>
                    </form>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
