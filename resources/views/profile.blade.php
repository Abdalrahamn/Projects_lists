@extends('layouts.app')

@section('title','profile')

@section('content')
    <div class="row">
        <div class="co-ml-6 mx-auto">
            <div class="card p-5">
                <div class="text-center">
                    <img src="{{asset('storage/'. auth()->user()->image)}}" alt="" style="border-radius:20px" width="82px" hight="82px">
                    <h3 class="mt-4" style="font-weight: bold">
                        {{auth()->user()->name}}
                    </h3>
                </div>
                <div class="card-body">
                    <form action="/myProject/public/profile" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method("PATCH")
                        <div class="form-group">
                            <label for="name">name</label>
                            <input type="text" name="name" id="name" class="form-control" value={{ auth()->user()->name }}>
                            @error('name')
                                <div class="text-danger">
                                    <small>{{$message}}</small>
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">email</label>
                            <input type="email" name="email" id="email" class="form-control" value={{ auth()->user()->email }}>
                            @error('email')
                                <div class="text-danger">
                                    <small>{{$message}}</small>
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">password</label>
                            <input type="password" name="password" id="password" class="form-control" >
                            @error('paassword')
                                <div class="text-danger">
                                    <small>{{$message}}</small>
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password-confirmation">password-confirmation</label>
                            <input type="password" name="password-confirmation" id="password-confirmation" class="form-control" >
                            @error('password-confirmation')
                                <div class="text-danger">
                                    <small>{{$message}}</small>
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="image">change photo</label>
                            <div class="custom-file">
                                <input type="file" name="image" id="image" class="custom-file-input">
                                <label for="image" id="image-label" class="custom-file-label" data-brows="view"></label>
                            </div>
                        </div>

                        <div class="form-group mt-5 d-flex">
                            <button type="submit" class="btn btn-primary mr-2">save</button>
                            <button type="submit" class="btn btn-primary mr-2" form="projects">cancele</button>
                            <button type="submit" class="btn btn-info" form="logout">logout</button>
                        </div>
                    </form>

                    <form action="/myProject/public/logout" id="logout" method="POST">
                        @csrf
                    </form>
                    <form action="/myProject/public/projects/" id="projects" method="POST">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('image').onchange = uploadOnChange;

        function uploadOnChange(){
            let filename = this.value;
            let lastIndex = filename.lastIndexOf("\\");

            if (lastIndex >= 0){
                filename = filename.substring(lastIndex +1);
            }
            document.getElementById('image-label').innerHTML = filename;
        }
    </script>
@endsection