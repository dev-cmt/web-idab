<style>
    /*__________________Image Profile______________________*/
    .avatar-upload {
        position: relative;
        max-width: 192px;
        margin: 10px auto;
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
        width: 192px;
        height: 192px;
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
<x-guest-layout>
    
    <div class="bg-dark p-4" style="min-height:100%; background-image: url('{{asset('public/images')}}/pages/registation-bg.avif'); background-repeat: no-repeat; background-size: cover; background-attachment: fixed; overflow:hidden;">
        <!-- STAR ANIMATION -->
        <div class="bg-animations">
            <div id='stars'></div>
            <div id='stars2'></div>
            <div id='stars3'></div>
            <div id='stars4'></div>
        </div><!-- / STAR ANIMATION -->
        <div class="wrapper wrapper--w960">
            <div class="card-6">
                <div class="card-heading">
                    <h2 class="title">Apply For Membership</h2>
                </div>
                <form class="card-body" data-action="{{ route('member_register.store') }}" method="POST" enctype="multipart/form-data" id="add-user-form">
                    @csrf
                    <div class="d-flex justify-content-center mb-4">
                        <a href="{{route('/')}}"><img src="{{asset('public/images')}}/logo.png" alt="" width="150"></a>
                    </div>
                    <!--__________________  Account __________________-->
                    <div class="bar_account"></div>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="row mb-2">
                                <label for="name" class="form-label col-md-5">Applicant Name <span class="text-danger">*</span></label>
                                <div class="col-md-7">
                                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" required {{old('name') ?? 'autofocus'}}>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="email" class="form-label col-md-5">Email Address <span class="text-danger">*</span></label>
                                <div class="col-md-7">
                                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}" required {{old('name') ?? 'autofocus'}}>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="formFile" class="form-label col-md-5">Password <span class="text-danger">*</span></label>
                                <div class="col-md-7">
                                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" value="{{old('password')}}" required autocomplete="new-password" autofocus>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="formFile" class="form-label col-md-5">Confirm Password <span class="text-danger">*</span></label>
                                <div class="col-md-7">
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" value="{{old('password_confirmation')}}" required autocomplete="new-password" autofocus>
                                    @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <label for="formFile" class="form-label col-md-5">Member Type <span class="text-danger">*</span></label>
                                <div class="col-md-7">
                                    <select class="form-control form-select @error('member_type_id') is-invalid @enderror" name="member_type_id" id="member_type_id" required>
                                        <option disabled selected>Please select</option>
                                        @foreach ($memberType as $item)
                                        <option value="{{$item->id}}" {{old('member_type_id')== $item->id ? 'selected' : ''}}>{{$item->name}}</option>
                                        @endforeach
                                    </select>                                                    
                                    @error('member_type_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="avatar-upload">
                                <div class="avatar-edit">
                                    <input type='file' name="profile_photo_path" class="@error('profile_photo_path') is-invalid @enderror form-control" id="imageUpload" accept=".png,.jpg,.jpeg,.gif,.svg" value="{{old('profile_photo_path')}}"/>                                    <label for="imageUpload"><i class="fa fa-camera"></i></label>
                                    @error('profile_photo_path')
                                        <span class="invalid-feedback" role="alert" style="position: absolute;top: 195px;left: -180px;width: 300px;">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <label for="imageUpload">
                                    <div class="avatar-preview">
                                        <div id="imagePreview" style="background-image: url('{{asset('public/images')}}/pages/user.png');"></div>
                                    </div>
                                </label>
                            </div>

                        </div>
                    </div>
                    <!--__________________  Personal __________________-->
                    <div id="personal" class="row" style="display: none">
                        <div class="bar_personal"></div>
                        <div class="col-md-6 mb-2">
                            <div class="row">
                                <label for="contact_number" class="form-label col-md-5">Phone Number
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-md-7">
                                    <input type="text" name="contact_number" id="contact_number"class="form-control @error('contact_number') is-invalid @enderror" value="{{old('contact_number')}}">
                                    @error('contact_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="row">
                                <label for="nid_no" class="form-label col-md-5">NID No.</label>
                                <div class="col-md-7">
                                    <input type="text" name="nid_no" id="nid_no"class="form-control @error('nid_no') is-invalid @enderror" value="{{old('nid_no')}}">
                                    @error('nid_no')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="row">
                                <label for="formFile" class="form-label col-md-5">Father's Name</label>
                                <div class="col-md-7">
                                    <input type="text" name="father_name" id="father_name"class="form-control @error('father_name') is-invalid @enderror" value="{{old('name')}}">
                                    @error('father_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="row">
                                <label for="mother_name" class="form-label col-md-5">Mother's Name</label>
                                <div class="col-md-7">
                                    <input type="text" name="mother_name" id="mother_name"class="form-control @error('mother_name') is-invalid @enderror" value="{{old('mother_name')}}">
                                    @error('mother_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="row">
                                <label for="dob" class="form-label col-md-5">Date Of Birth</label>
                                <div class="col-md-7">
                                    <input type="date" name="dob" id="formFile"class="form-control @error('dob') is-invalid @enderror" value="{{old('dob')}}">
                                    @error('dob')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="row">
                                <label for="gender" class="form-label col-md-5">Gender</label>
                                <div class="col-md-7">
                                    <select name="gender" id="gender" class="form-control form-select @error('gender') is-invalid @enderror">
                                        <option value="1">Male</option>
                                        <option value="2">Female</option>
                                    </select>
                                    @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="row">
                                <label for="marrital_status" class="form-label col-md-5">Marrital Status</label>
                                <div class="col-md-7">
                                    <select name="marrital_status" class="form-control form-select  @error('marrital_status') is-invalid @enderror">
                                        <option value="0" selected>Unmarried</option>
                                        <option value="1" {{ old('marrital_status') == '1' ? 'selected' : '' }}>Married</option>
                                        <option value="2" {{ old('marrital_status') == '2' ? 'selected' : '' }}>Divorce</option>
                                        <option value="3" {{ old('marrital_status') == '3' ? 'selected' : '' }}>Widowed</option>
                                    </select>
                                    @error('marrital_status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="row">
                                <label for="blood_group" class="form-label col-md-5">Blood Group</label>
                                <div class="col-md-7">
                                    <select name="blood_group" id="blood_group" class="form-control form-select @error('blood_group') is-invalid @enderror">
                                        <option value="" selected>Select</option>
                                        <option value="1" {{ old('blood_group') == '1' ? 'selected' : '' }}>A Positive (A+)</option>
                                        <option value="2" {{ old('blood_group') == '2' ? 'selected' : '' }}>A Negative (A-)</option>
                                        <option value="3" {{ old('blood_group') == '3' ? 'selected' : '' }}>B Positive (B+)</option>
                                        <option value="4" {{ old('blood_group') == '4' ? 'selected' : '' }}>B Negative (B-)</option>
                                        <option value="5" {{ old('blood_group') == '5' ? 'selected' : '' }}>AB Positive (AB+)</option>
                                        <option value="6" {{ old('blood_group') == '6' ? 'selected' : '' }}>AB Negative (AB-)</option>
                                        <option value="7" {{ old('blood_group') == '7' ? 'selected' : '' }}>O Positive (0+)</option>
                                        <option value="8" {{ old('blood_group') == '8' ? 'selected' : '' }}>O Negative (0-)</option>
                                    </select>
                                    @error('blood_group')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="row">
                                <label for="present_address" class="form-label col-md-5">Present Address</label>
                                <div class="col-md-7">
                                    <textarea name="present_address" id="present_address" class="form-control @error('present_address') is-invalid @enderror" rows="2">{{old('present_address')}}</textarea>
                                    @error('present_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="row">
                                <label for="formFile" class="form-label col-md-5">Permanent Address</label>
                                <div class="col-md-7">
                                    <textarea name="parmanent_address" id="parmanent_address" class="form-control @error('parmanent_address') is-invalid @enderror" rows="2">{{old('parmanent_address')}}</textarea>
                                    @error('parmanent_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>


                    </div>
                    
                    <!--__________________  Academic __________________-->
                    <div id="academic" class="row" style="display: none">
                        <div class="bar_academic"></div>
                        <div class="col-md-6 mb-2">
                            <div class="row">
                                <label for="institute" class="form-label col-md-5">University/ Institute
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-md-7">
                                    <input type="text" name="institute" id="institute" class="form-control @error('institute') is-invalid @enderror" value="{{old('institute')}}">
                                    @error('institute')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="row">
                                <label for="mast_qualification_id" class="form-label col-md-5">Qualification
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-md-7">
                                    <select name="mast_qualification_id" id="mast_qualification_id" class="form-control form-select @error('mast_qualification_id') is-invalid @enderror">
                                        <option disabled selected>Please select</option>
                                        @foreach ($qualification as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>                                                    
                                    @error('mast_qualification_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="row">
                                <label for="subject" class="form-label col-md-5">Subject</label>
                                <div class="col-md-7">
                                    <input type="text" name="subject" id="subject" class="form-control @error('subject') is-invalid @enderror" value="{{old('subject')}}">
                                    @error('subject')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="row">
                                <label for="passing_year" class="form-label col-md-5">Passing Year</label>
                                <div class="col-md-7">
                                    <input type="text" name="passing_year" id="passing_year" class="form-control @error('passing_year') is-invalid @enderror" value="{{old('passing_year')}}">
                                    @error('passing_year')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <label for="other_qualification" class="form-label col-md-5">Other Qualification</label>
                                <div class="col-md-7">
                                    <textarea name="other_qualification" id="other_qualification" class="form-control @error('other_qualification') is-invalid @enderror" rows="1">{{old('other_qualification')}}</textarea>
                                    @error('other_qualification')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--__________________  Business __________________-->
                    <div id="business_job" class="row" style="display: none;">
                        <div class="bar_business" id="bar_business" style="display: none;"></div>                            
                        <div class="bar_job" id="bar_job" style="display: none;"></div>                            
                        <div class="col-md-6 mb-2">
                            <div class="row">
                                <label for="company_name" class="form-label col-md-5">Company Name</label>
                                <div class="col-md-7">
                                    <input type="text" name="company_name" id="company_name"class="form-control @error('company_name') is-invalid @enderror" value="{{old('company_name')}}">
                                    @error('company_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="row">
                                <label for="designation" class="form-label col-md-5">Designation</label>
                                <div class="col-md-7">
                                    <input type="text" name="designation" id="designation"class="form-control @error('designation') is-invalid @enderror" value="{{old('designation')}}">
                                    @error('designation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="row">
                                <label for="company_email" class="form-label col-md-5">Company Email</label>
                                <div class="col-md-7">
                                    <input type="text" name="company_email" id="company_email"class="form-control @error('company_email') is-invalid @enderror" value="{{old('company_email')}}">
                                    @error('company_email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="row">
                                <label for="company_phone" class="form-label col-md-5">Company Phone</label>
                                <div class="col-md-7">
                                    <input type="text" name="company_phone" id="company_phone"class="form-control @error('company_phone') is-invalid @enderror" value="{{old('company_phone')}}">
                                    @error('company_phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="row">
                                <label for="address" class="form-label col-md-5">Company Address</label>
                                <div class="col-md-7">
                                    <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror" value="{{old('address')}}">
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="row">
                                <label for="web_url" class="form-label col-md-5">Company Website</label>
                                <div class="col-md-7">
                                    <input type="text" name="web_url" id="web_url"class="form-control @error('web_url') is-invalid @enderror" value="{{old('web_url')}}">
                                    @error('web_url')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--__________________ Student  __________________-->
                    <div id="student" class="row" style="display: none;">
                        <div class="bar_student"></div>
                        <div class="col-md-6 mb-2">
                            <div class="row">
                                <label for="student_institute" class="form-label col-md-5">University/ Institute</label>
                                <div class="col-md-7">
                                    <input type="text" name="student_institute" id="institute"class="form-control @error('student_institute') is-invalid @enderror" value="{{old('student_institute')}}">
                                    @error('student_institute')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="row">
                                <label for="formFile" class="form-label col-md-5">Semester</label>
                                <div class="col-md-7">
                                    <input type="text" name="semester" id="semester"class="form-control @error('semester') is-invalid @enderror" value="{{old('semester')}}">
                                    @error('semester')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="row">
                                <label for="head_faculty_name" class="form-label col-md-5">Head Faculty Name</label>
                                <div class="col-md-7">
                                    <input type="text" name="head_faculty_name" id="head_faculty_name" class="form-control @error('head_faculty_name') is-invalid @enderror" value="{{old('head_faculty_name')}}">
                                    @error('head_faculty_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="row">
                                <label for="formFile" class="form-label col-md-5">Head Faculty Number</label>
                                <div class="col-md-7">
                                    <input type="text" name="head_faculty_number" id="head_faculty_number" class="form-control @error('head_faculty_number') is-invalid @enderror" value="{{old('head_faculty_number')}}">
                                    @error('head_faculty_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--__________________ Document Candidate  __________________-->
                    <div id="document">
                        <div class="bar_document"></div>
                        <div class="row">
                            {{-- <div class="col-lg-4 col-sm-12 px-4" style="margin: 0 auto">
                                <div class="upload-file-cover mb-4">
                                    <div class="upload-file-title"><h1>Profile Photo</h1></div>
                                    <div class="dropzone">
                                        <img src="http://100dayscss.com/codepen/upload.svg" class="upload-icon" />
                                        <input type="file" class="upload-input" />
                                    </div>
                                    <button type="button" class="btn-upload" name="uploadbutton">Upload file</button>
                                </div>
                            </div> --}}
                            <div class="col-md-12 mb-2" id="passport_photo">
                                <div class="row">
                                    <label for="passport_photo" class="form-label col-md-5">Passport size photo</label>
                                    <div class="col-md-7">
                                        <input type="file" name="passport_photo" id="passport_photo" class="form-control @error('passport_photo') is-invalid @enderror" value="{{old('passport_photo')}}">
                                        @error('passport_photo')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-2" id="educational_certificates">
                                <div class="row">
                                    <label for="edu_certificate" class="form-label col-md-5">Educational Certificates
                                        (SSC/HSC/ID/IAR/ARCH)</label>
                                    <div class="col-md-7">
                                        <input type="file" name="edu_certificate" id="edu_certificate" class="form-control @error('edu_certificate') is-invalid @enderror" value="{{old('edu_certificate')}}">
                                        @error('edu_certificate')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-2" id="student_id">
                                <div class="row">
                                    <label for="stu_id_copy" class="form-label col-md-5">Copy of Student ID</label>
                                    <div class="col-md-7">
                                        <input type="file" name="stu_id_copy" id="stu_id_copy" class="form-control @error('stu_id_copy') is-invalid @enderror" value="{{old('stu_id_copy')}}">
                                        @error('stu_id_copy')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-2" id="trade_lisence">
                                <div class="row">
                                    <label for="trade_licence" class="form-label col-md-5">Valid Trade Lisence</label>
                                    <div class="col-md-7">
                                        <input type="file" name="trade_licence" id="trade_licence" class="form-control @error('trade_licence') is-invalid @enderror" value="{{old('trade_licence')}}">
                                        @error('trade_licence')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-2" id="experience_certificate">
                                <div class="row">
                                    <label for="experience_certificate" class="form-label col-md-5">Job Experience Certificate</label>
                                    <div class="col-md-7">
                                        <input type="file" name="experience_certificate" id="experience_certificate" class="form-control @error('experience_certificate') is-invalid @enderror" value="{{old('experience_certificate')}}">
                                        @error('experience_certificate')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-2" id="tin_certificate">
                                <div class="row">
                                    <label for="tin_certificate" class="form-label col-md-5">Valid TIN Certificate</label>
                                    <div class="col-md-7">
                                        <input type="file" name="tin_certificate" id="tin_certificate" class="form-control @error('tin_certificate') is-invalid @enderror" value="{{old('tin_certificate')}}">
                                        @error('tin_certificate')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-2" id="nid_photo">
                                <div class="row">
                                    <label for="nid_photo_copy" class="form-label col-md-5">NID Photo Copy</label>
                                    <div class="col-md-7">
                                        <input type="file" name="nid_photo_copy" id="nid_photo_copy" class="form-control @error('nid_photo_copy') is-invalid @enderror" value="{{old('nid_photo_copy')}}">
                                        @error('nid_photo_copy')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-2" id="recomendation_letter">
                                <div class="row">
                                    <label for="recoment_letter" class="form-label col-md-5">Recomendation Letter</label>
                                    <div class="col-md-7">
                                        <input type="file" name="recoment_letter" id="recoment_letter" class="form-control @error('recoment_letter') is-invalid @enderror" value="{{old('recoment_letter')}}">
                                        @error('recoment_letter')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--__________________ SUBMIT  __________________-->
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="d-flex justify-content-end">                            
                                <button class="btn btn-register" id="btn-submit" disabled>Submit</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
 
    @push('script')   
        <script>
            $(document).ready(function() {
                $("#document").hide();
                $("#member_type_id").change(function() {
                    var selectedOption = $(this).val();
                    // Hide all sections
                    $("#business, #bar_job, #student").hide();

                    // Show the corresponding section based on the selected option
                    if (selectedOption === "1") { //Student
                        $("#personal").show();
                        $("#academic").show();
                        $("#student").show();
                        $("#business_job").hide();
                        $("#bar_business").hide();
                        $("#bar_job").hide();

                        $("#document").show();
                        $("#passport_photo").hide();
                        $("#educational_certificates").show();
                        $("#student_id").show();
                        $("#recomendation_letter").show();
                        $("#trade_lisence").hide();
                        $("#experience_certificate").hide();
                        $("#tin_certificate").hide();
                        $("#nid_photo").hide();

                        $("#btn-submit").prop("disabled", false);
                    } else if (selectedOption === "2") {//Candidate
                        $("#personal").show();
                        $("#academic").show();
                        $("#student").hide();
                        $("#business_job").show();
                        $("#bar_business").hide();
                        $("#bar_job").show();

                        $("#document").show();
                        $("#passport_photo").hide();
                        $("#educational_certificates").show();
                        $("#student_id").hide();
                        $("#recomendation_letter").hide();
                        $("#experience_certificate").hide();
                        $("#trade_lisence").show();
                        $("#tin_certificate").show();
                        $("#nid_photo").show();

                        $("#btn-submit").prop("disabled", false);
                    } else if (selectedOption === "3") { // Professional
                        $("#personal").show();
                        $("#academic").show();
                        $("#student").hide();
                        $("#business_job").show();
                        $("#bar_business").hide();
                        $("#bar_job").show();

                        $("#document").show();
                        $("#passport_photo").hide();
                        $("#educational_certificates").show();
                        $("#student_id").hide();
                        $("#recomendation_letter").hide();
                        $("#experience_certificate").show();
                        $("#trade_lisence").show();
                        $("#tin_certificate").show();
                        $("#nid_photo").show();

                        $("#btn-submit").prop("disabled", false);
                    } else if (selectedOption === "4") {// Associate
                        $("#personal").show();
                        $("#academic").show();
                        $("#student").hide();
                        $("#business_job").show();
                        $("#bar_business").show();
                        $("#bar_job").hide();

                        $("#document").show();
                        $("#passport_photo").hide();
                        $("#educational_certificates").show();
                        $("#student_id").hide();
                        $("#recomendation_letter").hide();
                        $("#experience_certificate").show();
                        $("#trade_lisence").show();
                        $("#tin_certificate").show();
                        $("#nid_photo").show();

                        $("#btn-submit").prop("disabled", false);
                    } else if (selectedOption === "5") {// Trade
                        $("#personal").show();
                        $("#academic").show();
                        $("#student").hide();
                        $("#business_job").show();
                        $("#bar_business").show();
                        $("#bar_job").hide();

                        $("#document").show();
                        $("#passport_photo").hide();
                        $("#educational_certificates").hide();
                        $("#student_id").hide();
                        $("#recomendation_letter").hide();
                        $("#experience_certificate").hide();
                        $("#trade_lisence").show();
                        $("#tin_certificate").show();
                        $("#nid_photo").show();

                        $("#btn-submit").prop("disabled", false);
                    } else if (selectedOption === "6") {// Corporate LEFT
                        $("#personal").show();
                        $("#academic").show();
                        $("#student").hide();
                        $("#business_job").show();
                        $("#bar_business").show();
                        $("#bar_job").hide();

                        $("#document").show();
                        $("#passport_photo").hide();
                        $("#educational_certificates").show();
                        $("#student_id").hide();
                        $("#trade_lisence").show();
                        $("#experience_certificate").show();
                        $("#tin_certificate").show();
                        $("#nid_photo").hide();
                        $("#recomendation_letter").hide();

                        $("#btn-submit").prop("disabled", false);
                    }
                });
            });
        </script>
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
        <script>
            $(document).ready(function() {
                $("#preloader").hide();
                var form = '#add-user-form';
                $(form).on('submit', function(event) {
                    event.preventDefault();
                    var url = $(this).attr('data-action');
                    
                    // Show loading indicator
                    $("#preloader").show();
                    $.ajax({
                        url: url,
                        method: 'POST',
                        data: new FormData(this),
                        dataType: 'JSON',
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(response) {                            
                            $("#preloader").hide();
                            // Show success message using SweetAlert2
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: 'Data saved successfully.',
                            }).then((result) => {
                                // Redirect to the registration payment page
                                if (result.isConfirmed) {
                                    window.location.href = '{{ route("registation-payment.create") }}';
                                }
                            });
                        },
                        error: function(xhr) {
                            // Hide loading indicator
                            $("#preloader").hide();
                            if (xhr.responseJSON && xhr.responseJSON.error) {
                                var errorMessage = xhr.responseJSON.message;
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error!',
                                    html:  errorMessage,
                                    text: 'All input values are not null or empty.',
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error!',
                                    text: 'An error occurred. Please try again later.',
                                });
                            }
                            // Validaton
                            var errors = xhr.responseJSON.errors;
                            var errorHtml = '';
                            $.each(errors, function(field, messages) {
                                $.each(messages, function(key, value) {
                                    errorHtml += '<li style="color:red">' + value + '</li>';
                                });
                            });
        
                            // Display error message using Swal or your preferred method
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                html: '<ul>' + errorHtml + '</ul>',
                                text: 'All input values are not null or empty.',
                            });
                        }
                    });
                });
            });
        </script>
    @endpush


    <div id='preloader' style="background-color: #252525cc;">
        <div id='loader'>
            <span class='loader'>
                <span class='loader-inner'></span>
            </span>
        </div>
    </div>




</x-guest-layout>