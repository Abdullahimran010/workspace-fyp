@csrf
<div class="row py-2">
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label for="client_name" class="bmd-label-floating">Client Name</label>
            <input type="text" autofocus autocomplete="off"
                   class="form-control" name="client_name"
                   id="client_name" value="{{ old('client_name', isset($project) ? $project->client_name : '' ) }}" required>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label for="title" class="bmd-label-floating">Title</label>
            <input type="text" autofocus autocomplete="off"
                   class="form-control" name="title"
                   id="title" value="{{ old('title', isset($project) ? $project->title : '' ) }}" required>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label for="description" class="bmd-label-floating">Description</label>
            <textarea type="text" autofocus autocomplete="off"
                   class="form-control" name="description"
                      id="description" required>{{ old('description', isset($project) ? $project->description : '' ) }}</textarea>
        </div>
    </div>
</div>

@section('scripts')
@endsection

