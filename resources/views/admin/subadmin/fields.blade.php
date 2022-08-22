@csrf
<div class="form-row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="name" class="col-form-label">Name</label>
            <input id="name" class="form-control @error('name') is-invalid @enderror" type="text"
                   placeholder="Enter Name" name="name" value="{{ old('name') }}" required autocomplete="name"
                   autofocus>
            @error('name')
            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="col-form-label">Email</label>
            <input class="form-control @error('email') is-invalid @enderror" type="text" placeholder="Enter Email"
                   name="email" value="{{ old('email') }}" required autocomplete="email">
            @error('email')
            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="col-form-label">Password</label>
            <input class="form-control @error('password') is-invalid @enderror" type="password"
                   placeholder="Enter Password"
                   name="password" required autocomplete="new-password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
            @enderror
        </div>
    </div>
</div>
<br>

