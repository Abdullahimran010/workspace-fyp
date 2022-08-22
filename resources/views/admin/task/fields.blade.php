@section('styles')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/tagsinput.css')}}">
@endsection

@csrf
<div class="row py-2">
<div class="col-md-6">
        <div class="form-group">
            <input type="hidden" name="" value="" class="departmentId">
            <label class="col-form-label">Select Project</label>
            <select name="project_id" class="form-control" required>
                <option value="{{ isset($adminTask) ? $adminTask->project_id : '' }}">
                    {{ isset($adminTask) ? $adminTask->project->title : '---Select---'}}
                </option>
                <optgroup label="Projects">
                    @foreach(_getAllProjects() as $project)
                    @if($project != null || $project != '')
                    <option value="{{ $project->id }}">{{ $project->title }}</option>
                    @else
                    <option value="">Please Select project</option>
                    @endif
                    @endforeach
                </optgroup>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label for="title" class="bmd-label-floating">Title</label>
            <input type="hidden" value="admin" name="added_by">
            <input type="hidden" value="{{ auth()->user()->id }}" name="admin_id">
            <input type="text" autofocus autocomplete="off" class="form-control" name="title" id="title" value="{{ old('title', isset($adminTask) ? $adminTask->title : '' ) }}" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label for="description" class="bmd-label-floating">Description</label>
            <textarea type="text" autofocus autocomplete="off" class="form-control" name="description" id="description" required>{{ old('title', isset($adminTask) ? $adminTask->description : '' ) }}</textarea>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label for="points" class="bmd-label-floating">Points</label>
            <input type="text" autofocus autocomplete="off" class="form-control" name="points" id="points" value="{{ old('points', isset($adminTask) ? $adminTask->points : '' ) }}" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label for="completion_date" class="bmd-label-floating eventTypeLabel">Completion Date</label>
            <input type="date" class="form-control" name="completion_date" id="completion_date" value="{{ isset($adminTask) ? \Carbon\Carbon::createFromDate($adminTask->completion_date)->format('Y-m-d') : '' }}" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <input type="hidden" value="" class="experienceNo">
            <label for="experience" class="bmd-label-floating">Required Experience</label>
            <select class="form-control experienceList" name="experience" id="experience">
                <option value="{{ isset($adminTask) ? $adminTask->experience : '' }}">
                    {{ isset($adminTask) ? $adminTask->experience : '---Select---'}}
                </option>
                <optgroup label="Experience">
                    <option value="1">1Year</option>
                    <option value="2">2Year</option>
                    <option value="3">3Year</option>
                    <option value="4">4Year</option>
                    <option value="5">5Year</option>
                    <option value="6">6Year</option>
                    <option value="7">7Year</option>
                    <option value="8">8Year</option>
                    <option value="9">9Year</option>
                    <option value="10">10Year</option>
                </optgroup>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <input type="hidden" name="" value="" class="departmentId">
            <label class="col-form-label">Select Department</label>
            <select name="department_id" class="form-control departmentsList" required>
                <option value="{{ isset($adminTask) ? $adminTask->department_id : '' }}">
                    {{ isset($adminTask) ? $adminTask->department->name : '---Select---'}}
                </option>
                <optgroup label="Department">
                    @foreach(_getAllDepartments() as $department)
                    @if($department != null || $department != '')
                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @else
                    <option value="">Please Select Department</option>
                    @endif
                    @endforeach
                </optgroup>
            </select>
        </div>
    </div>

    <div class="row managersList">
        
    </div>
</div>

@section('scripts')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function () {
            $("select.experienceList").change(function() {
                let selectedExperience = $(this).val();
                let department_id = $("select.departmentsList").val();
                ajaxCallForManagerPrediction(selectedExperience,department_id == null ||department_id == ""? 0 : department_id);
            });

            $("select.departmentsList").change(function() {
                let selectedDepartment = $(this).val();
                let experience = $("select.experienceList").val();
                ajaxCallForManagerPrediction(experience == null || experience == "" ? 0 : experience,selectedDepartment);
            });

            $("select.fypList").change(function() {
                let selectedfyp = $(this).val();
                let fyp = $("select.fypList").val();
                ajaxCallForManagerPrediction(fyp == null || fyp == "" ? 0 : fyp,selectedDepartment);
            });

            function ajaxCallForManagerPrediction(selectedExperience, selectedDepartment)
            {
                $.ajax({
                    type: 'post',
                    url: "{{route('managers.predict') }}",
                    data: {
                        'experience': selectedExperience,
                        'department_id': selectedDepartment,
                    },
                    success: function (data) {
                        $(".managersList").html(data);
                        console.log(data);
                    },
                    error: function (err) {
                        // alert(err);
                        console.log(err);
                    },
                });
            }
        });
    </script>
@endsection
