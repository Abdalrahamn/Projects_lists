<div class="card-footer">
    <div class="d-flex">

        <div class="d-flex align-items-center">
            <img src="/myProject/public/images/clock.svg" alt="">
            <div class="mr-2" >
                {{ $project->created_at->diffForHumans() }}
            </div>
        </div>

        <div class="d-flex align-items-center">
            <img src="/myProject/public/images/list-check.svg" alt="" class="list-checked">
            <div class="mr-2" style="margin: 0 95px 0 -95px">
                {{count($project->tasks)}}
            </div>
        </div>

        <div class="d-flex align-items-center mr-auto">
            <form action="/myProject/public/projects/{{$project->id}}" method="POST">
                @method('Delete')
                @csrf 
                <input type="submit" class="btn-delete" value="_">
            </form>
        </div>
        
    </div>
</div>
