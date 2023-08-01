<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit User</h4>
                    @can('User access')
                        <a href="{{route('users.index')}}" class="btn btn-sm btn-primary"><i class="fa fa-reply"></i><span class="btn-icon-add"></span>Back</a>
                    @endcan
                </div>
                <div class="card-body d-flex justify-content-center">
                    <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data" class="col-12">
                        @csrf
                        @method('PUT')
                        <div class="form-group col-md-6">
                            <label>Full Name</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" placeholder="Enter your full name">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label>Email</label>
                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" placeholder="Type your email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label>Batch</label>
                            <input type="text" name="batch" id="batch" class="form-control @error('batch') is-invalid @enderror" value="{{ old('batch', $user->batch) }}" placeholder="Your batch number">
                            @error('batch')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label>Contact Number</label>
                            <input type="text" name="contact_number" id="contact_number" class="form-control @error('contact_number') is-invalid @enderror" value="{{ old('contact_number', $user->contact_number) }}" placeholder="Type your number">
                            @error('contact_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- <div class="form-group col-md-6">
                            <label>password</label>
                            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter your password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div> --}}

                        
                        <div class="form-group col-md-6">
                            <div class="role-management-checkbox">
                                <input type="hidden" name="cm_adviser" value="0">
                                <input type="checkbox" class="form-check-input" name="cm_adviser" value="1"  @if($user->cm_adviser) checked @endif>
                                <label class="form-check-label">Adviser</label>
                            </div>
                            <div class="role-management-checkbox">
                                <input type="hidden" name="cm_ecommittee" value="0">
                                <input type="checkbox" class="form-check-input" name="cm_ecommittee" value="1" @if($user->cm_ecommittee) checked @endif>
                                <label class="form-check-label">Executive committee</label>
                            </div>
                            <div class="role-management-checkbox">
                                <input type="hidden" name="cm_welfare" value="0">
                                <input type="checkbox" class="form-check-input" name="cm_welfare" value="1" @if($user->cm_welfare) checked @endif>
                                <label class="form-check-label">Pune Welfare Trust</label>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="profile_photo_path">Profile Photo</label>
                            <input type="file" name="profile_photo_path">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Select Role</label>
                            <select class="form-control default-select" id="roles" name="roles">
                                <option value="0" selected>None</option>
                                @foreach($roles as $role)
                                <option value="{{ $role->name }}" @if(in_array($role->id, $data)) selected @endif> {{ $role->name }}</option>
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
                                        <input class="form-check-input" type="radio" value="1" name="status" @if($user->status) checked @endif>
                                        <label class="form-check-label">Active</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="0" name="status" @if(!$user->status) checked @endif>
                                        <label class="form-check-label">Inactive</label>
                                    </div>
                                </div>
                                <div class="col-sm-6 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary ">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>