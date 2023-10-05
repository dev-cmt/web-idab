<x-app-layout>
    <style>
        /*__________________Image Profile______________________*/
        .avatar-upload {
            position: relative;
            max-width: 240px;
            margin: 0px auto;
        }
        .avatar-upload .avatar-edit {
        position: absolute;
        right: 5px;
        z-index: 1;
        top: 10px;
        }
        .avatar-upload .avatar-edit input {
        display: none;
        }
        .avatar-upload .avatar-edit input + label {
        display: inline-block;
        width: 34px;
        height: 34px;
        margin-bottom: 0;
        border-radius: 0%;
        background: #ff0000;
        border: 1px solid transparent;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
        cursor: pointer;
        font-weight: normal;
        transition: all 0.2s ease-in-out;
        padding: 7px 9px;
        color: #fff;
        }
        .avatar-upload .avatar-edit input + label:hover {
        background: #c00000;
        }
        .avatar-upload .avatar-preview {
            width: 240px;
            height: 240px;
            position: relative;
            border-radius: 0%;
            border: 6px solid #ff0000;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
        }
        .avatar-upload .avatar-preview > div {
            width: 100%;
            height: 100%;
            border-radius: 0%;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
    </style>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Role</h4>
                    @can('Role access')
                        <a href="{{route('users.index')}}" class="btn btn-sm btn-primary"><i class="fa fa-reply"></i><span class="btn-icon-add"></span>Back</a>
                    @endcan
                </div>
                <div class="card-body">
                    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="row">
                            <div class="col-xl-8 col-sm-12">
                                <div class="form-group row">
                                    <label class="col-lg-5 col-form-label">User Name
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-7">
                                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-5 col-form-label">Email
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-7">
                                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-5 col-form-label">Password
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-7">
                                        <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" value="{{old('password')}}" placeholder="">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-5 col-form-label">Confirm Password
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-7">
                                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" value="{{old('password_confirmation')}}" placeholder="">
                                        @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-5 col-form-label">Member Type
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-7">
                                        <select class="form-control default-select @error('member_type_id') is-invalid @enderror" name="member_type_id">
                                            <option disabled selected>None</option>
                                            @foreach($memberType as $item)
                                            <option value="{{ $item->id }}" {{old('member_type_id') == $item->id ? 'selected' : '' }}> {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('member_type_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-5 col-form-label">Committee Type</label>
                                    <div class="col-lg-7">
                                        <select class="form-control default-select" id="committee_type_id" name="committee_type_id">
                                            <option value="" selected>None</option>
                                            @foreach($committeeType as $item)
                                                <option value="{{ $item->id}}" {{ old('committee_type_id') == $item->id ? 'selected' : '' }}> {{ $item->name }} </option>
                                            @endforeach
                                        </select>
                                        @error('committee_type_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-5 col-form-label">Select Role</label>
                                    <div class="col-lg-7">
                                        <select class="form-control default-select" id="roles" name="roles">
                                            <option value="0" selected>None</option>
                                            @foreach($roles as $role)
                                            <option value="{{ $role->name }}" {{ old('roles') == $item->id ? 'selected' : '' }}> {{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('roles')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-5 col-form-label">Status</label>
                                    <div class="col-lg-7 d-flex">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="1" name="status" checked>
                                            <label class="form-check-label">Active</label>
                                        </div>
                                        <div class="form-check ml-4">
                                            <input class="form-check-input" type="radio" value="0" name="status">
                                            <label class="form-check-label">Inactive</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-sm-12 ">
                                <div class="skip-email text-center">
                                    <div class="avatar-upload">
                                        <div class="avatar-edit">
                                            <input type='file' name="profile_photo_path" class="@error('profile_photo_path') is-invalid @enderror form-control" id="imageUpload" accept=".png,.jpg,.jpeg,.gif,.svg" value="{{old('profile_photo_path')}}"/>                                    <label for="imageUpload"><i class="fa fa-camera"></i></label>
                                            @error('profile_photo_path')
                                                <span class="invalid-feedback" role="alert" style="position: absolute;top: 200px;left: -228px;width: 300px;">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <label for="imageUpload">
                                            <div class="avatar-preview">
                                                <div id="imagePreview" style="background-image: url('{{asset('public/images')}}/pages/user.png');"></div>
                                            </div>
                                        </label>
                                        <button type="submit" class="btn btn-primary d-flex" style="width:100%;justify-content: center;">User Create</button>
                                    </div>
                                </div>
                            </div>
                        </div><!--End row-->
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('script')
    <!--Image Profile-->
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imageUpload").change(function() {
            readURL(this);
        });
    </script>
    @endpush
</x-app-layout>