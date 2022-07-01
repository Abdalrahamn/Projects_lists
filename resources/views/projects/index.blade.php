@extends('layouts.app')

@section('content')
    <header class="d-flex justify-content-between align-items-center my-5">

        <div class="h6 text-dark">
            <a href="/myProject/public/projects" style="text-decoration-line: none;">projects</a>
        </div>

        <div>
            <a href="/myProject/public/projects/create" class="btn btn-primary px-4" role="button">new project</a>
        </div>

    </header>

    <section>
<div class="row">
    @forelse ($projects as $project)
        <div class="col-4 mb-4">
            <div class="card card-head">
                <div class="card-body">
                    <div class="status">
                        @switch($project->status)
                        @case(1)
                            <span class="text-success">completed</span>
                        @break
                        @case(2)
                            <span class="text-danger">canceled</span>
                        @break
                        @default
                            <span class="text-warning">in progress</span>
                        @endswitch

                        <h5 class="font-weight-bold card-title">
                            <a href="/myProject/public/projects/{{$project->id}}" style="text-decoration-line: none;"> {{  $project->title  }} </a>
                        </h5>
                        <div class="card-text text-desc mt-4">
                            {{ Str::limit($project->description,150) }}
                        </div>

                        @include('projects.footer')
                    </div>
                </div>
            </div>
        </div>

        @empty
        <div class="m-auto align-content-center text-center">
            <p>Projects list is empty </p>
            <div class="mt-4">
                <a href="/myProject/public/projects/create" class="btn btn-primary btn-lg align-items-center d-inline-flex" role="button"> create new project</a>
            </div>
        </div>
    @endforelse
</div>
    </section>
@endsection