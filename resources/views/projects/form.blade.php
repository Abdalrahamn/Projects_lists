@csrf
<div class="form-group">
    <label for="title">title</label>
    <input type="text" id="title" name="title" class="form-control" value="{{ $project->title }}">
    @error('title')
        <div class="text-danger">
            <small>{{$message}}</small>
        </div>
    @enderror
</div>
<div class="form-group">
    <label for="description">description</label>
    <textarea type="text" id="description" name="description" class="form-control">{{ $project->description }}</textarea>
    @error('description')
        <div class="text-danger">
            <small>{{$message}}</small>
        </div>
    @enderror
</div>