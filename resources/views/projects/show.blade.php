@extends('layouts.app')

@section('content')
    <header class="d-flex justify-content-between align-items-center my-5">

        <div class="h6 text-dark">
            <a href="/myProject/public/projects" style="text-decoration-line: none;">projects / {{$project->title}}</a>
        </div>

        <div>
            <a href="/myProject/public/projects/{{$project->id}}/edit" class="btn btn-primary px-4" role="button">Edit project</a>
        </div>

    </header>

    <section class="row text-right">
        <div class="col-lg-8">
            @foreach ($project->tasks as $task)
                <div class="card d-flex mt-3 ">
                    <div class="{{$task->done?'checked muted':''}} bodytask col-lg-6" >
                        {{$task->body}}
                    </div>
                    <div class="mr-auto">
                        <form action="/myProject/public/projects/{{$project->id}}/tasks/{{$task->id}}" method="POST" class="d-flex" >
                            @csrf
                            @method("PATCH")
                            <input type="checkbox" name="done" class=" form-check-input  checkted" {{$task->done ? 'checked': ''}} onchange="this.form.submit()">
                        </form>
                    </div>
                    <div class="d-flex align-items-center delete">
                        <form action="/myProject/public/projects/{{$task->project_id}}/tasks/{{$task->id}}" method="POST">
                            @method('Delete')
                            @csrf 
                            <input type="submit" class="btn-delete" value="_">
                        </form>
                    </div>
                </div>
            @endforeach


            <div class="card mt-3" >
                <form action="/myProject/public/projects/{{$project->id}}/tasks" method="POST">
                    @csrf
                    <input type="text" name="body" class="form-control p-2 col-lg-6 border-0" style=" width: 86%;
                    margin: 14px 0 0px 8px;" placeholder="add new task">
                    <button class="btn btn-primary" style="margin:-65px 0 0 645px;" type="submit">Add</button>
                </form>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
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
                        <div class="card-text mt-4">
                            {{ $project->description }}
                        </div>

                        @include('projects.footer')
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="" method="POST">
                        @csrf
                        @method("PATCH")
                        <select name="status" class="custom-select" onchange="this.form.submit()">
                            <option>Status</option>
                            <option value="0"{{($project->status == 0) ? 'seleted' : ""}}>in process</option>
                            <option value="1"{{($project->status == 1) ? 'seleted' : ""}}>completed</option>
                            <option value="2"{{($project->status == 2) ? 'seleted' : ""}}>cancele</option>
                        </select>
                    </form>
                </div>
            </div>
        </div>

        
    </section>
@endsection