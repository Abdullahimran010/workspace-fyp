@section('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/tagsinput.css')}}">
@endsection

@csrf
<div class="row py-2">
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label for="title" class="bmd-label-floating">Title</label>
            <input type="hidden" value="admin" name="added_by">
            <input type="hidden" value="{{ auth()->user()->id }}" name="admin_id">
            <input type="text" autofocus autocomplete="off"
                   class="form-control" name="name"
                   id="title" value="{{ old('name', isset($department) ? $department->name : '' ) }}" required>
        </div>
        
    </div>
</div>

@section('scripts')
    <script src="{{asset('assets/js/tagsinput/tagsinput.js')}}"></script>
    <script>
        $("select.eventList").change(function () {
            let selectedEventType = $(this).children("option:selected").val();

            if (selectedEventType == 'Goal') {
                $(".eventTypeLabel").html("Completion Date");
            } else {
                $(".eventTypeLabel").html("Attending Date");
            }
        });
    </script>
@endsection

