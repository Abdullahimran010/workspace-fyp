@csrf
<div class="form-row">
    <div class="col-md-6">
        <label for="name" class="col-form-label">{{ __('Name') }}</label>
        <input type="text" name="name" id="name" class="form-control"
               value="{{ isset($vendor) ? $vendor->name : ''}}">
    </div>

    <div class="col-md-6">
        <label for="email" class="col-form-label">{{ __('Email') }}</label>
        <input type="email" name="email" id="email" class="form-control"
               value="{{ isset($vendor) ? $vendor->email : ''}}">
    </div>

    <div class="col-md-6">
        <label for="phone" class="col-form-label">{{ __('Contact No.') }}</label>
        <input type="text" name="phone" id="phone" class="form-control"
               value="{{ isset($vendor) ? $vendor->phone : ''}}">
    </div>
    <div class="col-md-6">
        <label for="department" class="col-form-label">{{ __('department') }}</label>
        <input type="text" name="department" id="department" class="form-control"
               value="{{ isset($vendor) ? $vendor->department : ''}}">
    </div>
</div>


