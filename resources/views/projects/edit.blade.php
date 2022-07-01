@extends('layouts.app')


@section('title','edit new project')


@section('content')
<div class="row justify-content-center">
    <div class="col-8">
        <div class="card p-5">
            <h3 class="text-center pb-5 font-weight-bold">
                edit new project
            </h3>

            <form action="/myProject/public/projects/{{$project->id}}" method="POST">
                @method("PATCH")
                @include('projects.form')
                
                <div class="form-group">
                    <button class="btn btn-primary" type="submit"> edit </button>
                    <a href="/myProject/public/projects" class="btn btn-light">cancele</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection