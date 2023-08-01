<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Role</h4>
                    @can('Role access')
                        <a href="{{route('users.index')}}" class="btn btn-sm btn-primary"><i class="fa fa-reply"></i><span class="btn-icon-add"></span>Back</a>
                    @endcan
                </div>
                <div class="card-body d-flex justify-content-end">
                    <form action="{{ route('users.store') }}" method="POST" class="col-8">
                        @csrf
                        <div class="form-group col-md-6">
                            <label>Full Name</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" placeholder="">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label>Email</label>
                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}" placeholder="">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label>Batch</label>
                            <input type="text" name="batch" id="batch" class="form-control @error('batch') is-invalid @enderror" value="{{old('batch')}}" placeholder="">
                            @error('batch')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label>Contact Number</label>
                            <input type="text" name="contact_number" id="contact_number" class="form-control @error('contact_number') is-invalid @enderror" value="{{old('contact_number')}}" placeholder="">
                            @error('contact_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label>password</label>
                            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" value="{{old('password')}}" placeholder="">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label>Confirm Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" value="{{old('password_confirmation')}}" placeholder="">
                            @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label>Select Role</label>
                            <select class="form-control default-select" id="roles" name="roles">
                                <option selected value="" style="display: none">Choose a role</option>
                                @foreach($roles as $role)
                                <option value="{{ $role->name }}"> {{ $role->name }}</option>
                                @endforeach
                            </select>
                            @error('roles')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label>Status</label>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="1" name="status" checked>
                                        <label class="form-check-label">Active</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="0" name="status">
                                        <label class="form-check-label">Inactive</label>
                                    </div>
                                </div>
                                <div class="col-sm-6 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary ">User Create</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>