<x-app-layout>
    <div class="row">
        <div class="col-xl-12 col-xxl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit {{$user->memberType->name ?? 'Member'}} Information</h4>
                    <a href="{{ url()->previous() }}" class="btn btn-sm btn-primary"><i class="fa fa-reply"></i><span class="btn-icon-add"></span>Back</a>
                </div>

                <div class="card-body">
                    <div id="accordion-eleven" class="accordion accordion-primary">
                        @if (session()->has('success'))
                            <strong class="text-success">{{session()->get('success')}}</strong>
                        @endif
                        {{-- <form class="form-valide" data-action="{{ route('info_member.update', $user->id) }}" method="POST" enctype="multipart/form-data" id="add-user-form"> --}}
                        <form class="form-valide" action="{{ route('info_member.update', $user->id) }}" method="POST" enctype="multipart/form-data" id="add-user-form">
                            @csrf
                            <!-- Step 1 input fields {Personal Information}-->
                            <div class="accordion__item">
                                <div class="accordion__header accordion__header--primary collapsed" data-toggle="collapse" data-target="#rounded-stylish_collapseZero" aria-expanded="false">
                                    <span class="accordion__header--icon"></span>
                                    <span class="accordion__header--text">Personal Information</span>
                                    <span class="accordion__header--indicator"></span>
                                </div>
                                <div id="rounded-stylish_collapseZero" class="accordion__body collapse" data-parent="#accordion-eleven" style="">
                                    <!--__________________  Personal __________________-->
                                    <div class="row pb-0 accordion__body--text">
                                        <div class="col-md-6 mb-2">
                                            <div class="row">
                                                <label for="contact_number" class="form-label col-md-5">Phone Number
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-md-7">
                                                    <input type="text" name="contact_number" id="contact_number"class="form-control @error('contact_number') is-invalid @enderror" value="{{ $infoPersonal->contact_number ?? '' }}">
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
                                                <label for="dob" class="form-label col-md-5">Date Of Birth</label>
                                                <div class="col-md-7">
                                                    <input type="date" name="dob" id="formFile"class="form-control @error('dob') is-invalid @enderror" value="{{ $infoPersonal->dob ?? '' }}">
                                                    @error('dob')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-6 mb-2">
                                            <div class="row">
                                                <label for="nid_no" class="form-label col-md-5">NID No.</label>
                                                <div class="col-md-7">
                                                    <input type="text" name="nid_no" id="nid_no"class="form-control @error('nid_no') is-invalid @enderror" value="{{ $infoPersonal->nid_no ?? '' }}">
                                                    @error('nid_no')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div> --}}
                                        <div class="col-md-6 mb-2">
                                            <div class="row">
                                                <label for="formFile" class="form-label col-md-5">Father's Name</label>
                                                <div class="col-md-7">
                                                    <input type="text" name="father_name" id="father_name"class="form-control @error('father_name') is-invalid @enderror" value="{{ $infoPersonal->father_name ?? '' }}">
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
                                                    <input type="text" name="mother_name" id="mother_name"class="form-control @error('mother_name') is-invalid @enderror" value="{{ $infoPersonal->mother_name ?? '' }}">
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
                                                <label for="gender" class="form-label col-md-5">Gender</label>
                                                <div class="col-md-7">
                                                    <select name="gender" id="gender" class="form-control default-select @error('gender') is-invalid @enderror">
                                                        <option value="0" {{ (isset($infoPersonal) && $infoPersonal->gender == '0') ? 'selected' : '' }}>Male</option>
                                                        <option value="1" {{ (isset($infoPersonal) && $infoPersonal->gender == '1') ? 'selected' : '' }}>Female</option>
                                                    </select>
                                                    @error('gender')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-6 mb-2">
                                            <div class="row">
                                                <label for="marrital_status" class="form-label col-md-5">Marrital Status</label>
                                                <div class="col-md-7">
                                                    <select name="marrital_status" class="form-control form-select @error('marrital_status') is-invalid @enderror">
                                                        <option value="0" {{ isset($infoPersonal) && $infoPersonal->marrital_status === '0' ? 'selected' : '' }}>Unmarried</option>
                                                        <option value="1" {{ isset($infoPersonal) && $infoPersonal->marrital_status === '1' ? 'selected' : '' }}>Married</option>
                                                        <option value="2" {{ isset($infoPersonal) && $infoPersonal->marrital_status === '2' ? 'selected' : '' }}>Divorce</option>
                                                        <option value="3" {{ isset($infoPersonal) && $infoPersonal->marrital_status === '3' ? 'selected' : '' }}>Widowed</option>
                                                    </select>
                                                    @error('marrital_status')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div> --}}
                                        <div class="col-md-6 mb-2">
                                            <div class="row">
                                                <label for="blood_group" class="form-label col-md-5">Blood Group</label>
                                                <div class="col-md-7">
                                                    <select name="blood_group" id="blood_group" class="form-control default-select @error('blood_group') is-invalid @enderror">
                                                        <option value="" {{ empty($infoPersonal->blood_group) ? 'selected' : '' }}>Select</option>
                                                        <option value="1" {{ $infoPersonal->blood_group == '1' ? 'selected' : '' }}>A Positive (A+)</option>
                                                        <option value="2" {{ $infoPersonal->blood_group == '2' ? 'selected' : '' }}>A Negative (A-)</option>
                                                        <option value="3" {{ $infoPersonal->blood_group == '3' ? 'selected' : '' }}>B Positive (B+)</option>
                                                        <option value="4" {{ $infoPersonal->blood_group == '4' ? 'selected' : '' }}>B Negative (B-)</option>
                                                        <option value="5" {{ $infoPersonal->blood_group == '5' ? 'selected' : '' }}>AB Positive (AB+)</option>
                                                        <option value="6" {{ $infoPersonal->blood_group == '6' ? 'selected' : '' }}>AB Negative (AB-)</option>
                                                        <option value="7" {{ $infoPersonal->blood_group == '7' ? 'selected' : '' }}>O Positive (O+)</option>
                                                        <option value="8" {{ $infoPersonal->blood_group == '8' ? 'selected' : '' }}>O Negative (O-)</option>
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
                                                    <textarea name="present_address" id="present_address" class="form-control @error('present_address') is-invalid @enderror" rows="2">{{$infoPersonal->present_address ?? ''}}</textarea>
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
                                                    <textarea name="parmanent_address" id="parmanent_address" class="form-control @error('parmanent_address') is-invalid @enderror" rows="2">{{$infoPersonal->parmanent_address ?? ''}}</textarea>
                                                    @error('parmanent_address')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <div class="d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                            </div>
                                        </div>
                
                                    </div>
                                </div>
                            </div>
                            <!-- Step 2 input fields {Academic Information}-->
                            <div class="accordion__item">
                                <div class="accordion__header accordion__header--primary collapsed" data-toggle="collapse" data-target="#rounded-stylish_collapseTwo" aria-expanded="false">
                                    <span class="accordion__header--icon"></span>
                                    <span class="accordion__header--text">Academic Information</span>
                                    <span class="accordion__header--indicator"></span>
                                </div>
                                <div id="rounded-stylish_collapseTwo" class="accordion__body collapse @error('mast_qualification_id') show @enderror " data-parent="#accordion-eleven" style="">
                                    <!--__________________  Academic __________________-->
                                    <div class="row pb-0 accordion__body--text">
                                        <div class="bar_academic"></div>
                                        <div class="col-md-6 mb-2">
                                            <div class="row">
                                                <label for="institute" class="form-label col-md-5">University/ Institute
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-md-7">
                                                    <input type="text" name="institute" id="institute" class="form-control @error('institute') is-invalid @enderror" value="{{$infoAcademic->institute ?? ''}}">
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
                                                    <select name="mast_qualification_id" id="mast_qualification_id" class="form-control default-select @error('mast_qualification_id') is-invalid @enderror">
                                                        <option disabled selected>Please select</option>
                                                        @foreach ($qualification as $item)
                                                            <option value="{{ $item->id }}" {{ isset($infoAcademic) && $infoAcademic->mast_qualification_id == $item->id ? 'selected' : '' }}>
                                                                {{ $item->name }}
                                                            </option>
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
                                                    <input type="text" name="subject" id="subject" class="form-control @error('subject') is-invalid @enderror" value="{{$infoAcademic->subject ?? ''}}">
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
                                                    <input type="number" name="passing_year" id="passing_year" class="form-control @error('passing_year') is-invalid @enderror" value="{{$infoAcademic->passing_year ?? ''}}">
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
                                                    <textarea name="other_qualification" id="other_qualification" class="form-control @error('other_qualification') is-invalid @enderror" rows="1">{{$infoAcademic->other_qualification ?? ''}}</textarea>
                                                    @error('other_qualification')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- Step 3 input fields {Business Information}-->
                            @if (!is_null($infoCompany) && $user->member_type_id != 5 || is_null($user->member_type_id))
                            <div class="accordion__item">
                                <div class="accordion__header accordion__header--primary collapsed" data-toggle="collapse" data-target="#rounded-stylish_collapseThree" aria-expanded="false">
                                    <span class="accordion__header--icon"></span>
                                    <span class="accordion__header--text">Business Information</span>
                                    <span class="accordion__header--indicator"></span>
                                </div>
                                <div id="rounded-stylish_collapseThree" class="accordion__body collapse" data-parent="#accordion-eleven" style="">
                                    <!--__________________  Business __________________-->
                                    <div class="row accordion__body--text">
                                        <div class="bar_business" id="bar_business" style="display: none;"></div>                            
                                        <div class="bar_job" id="bar_job" style="display: none;"></div>                            
                                        <div class="col-md-6 mb-2">
                                            <div class="row">
                                                <label for="company_name" class="form-label col-md-5">Company Name</label>
                                                <div class="col-md-7">
                                                    <input type="text" name="company_name" id="company_name"class="form-control @error('company_name') is-invalid @enderror" value="{{$infoCompany->company_name ?? '' }}">
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
                                                    <input type="text" name="designation" id="designation"class="form-control @error('designation') is-invalid @enderror" value="{{$infoCompany->designation ?? '' }}">
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
                                                    <input type="text" name="company_email" id="company_email"class="form-control @error('company_email') is-invalid @enderror" value="{{$infoCompany->company_email ?? '' }}">
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
                                                    <input type="text" name="company_phone" id="company_phone"class="form-control @error('company_phone') is-invalid @enderror" value="{{$infoCompany->company_phone ?? '' }}">
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
                                                    <textarea name="address" class="form-control @error('address') is-invalid @enderror" rows="2" id="web_url" placeholder="Your office address!">{{$infoCompany->address ?? '' }}</textarea>
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
                                                    <textarea name="web_url" class="form-control @error('web_url') is-invalid @enderror" rows="2" id="web_url" placeholder="Website address!">{{$infoCompany->web_url ?? '' }}</textarea>
                                                    @error('web_url')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>te
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <div class="form-group">
                                                <div class="d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <!-- Step 4 input fields {Student Information}-->
                            @if (!is_null($infoStudent) && $user->member_type_id == 5 || is_null($user->member_type_id) )
                            <div class="accordion__item">
                                <div class="accordion__header accordion__header--primary collapsed" data-toggle="collapse" data-target="#rounded-stylish_collapseFour" aria-expanded="false">
                                    <span class="accordion__header--icon"></span>
                                    <span class="accordion__header--text">Student Information</span>
                                    <span class="accordion__header--indicator"></span>
                                </div>
                                <div id="rounded-stylish_collapseFour" class="accordion__body collapse" data-parent="#accordion-eleven" style="">
                                    <!--__________________ Student  __________________-->
                                    <div class="row accordion__body--text">
                                        <div class="col-md-6 mb-2">
                                            <div class="row">
                                                <label for="student_institute" class="form-label col-md-5">University/ Institute</label>
                                                <div class="col-md-7">
                                                    <input type="text" name="student_institute" id="institute"class="form-control @error('student_institute') is-invalid @enderror" value="{{$infoStudent->student_institute ?? '' }}">
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
                                                    <input type="text" name="semester" id="semester"class="form-control @error('semester') is-invalid @enderror" value="{{$infoStudent->semester ?? '' }}">
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
                                                    <input type="text" name="head_faculty_name" id="head_faculty_name" class="form-control @error('head_faculty_name') is-invalid @enderror" value="{{$infoStudent->head_faculty_name ?? '' }}">
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
                                                    <input type="text" name="head_faculty_number" id="head_faculty_number" class="form-control @error('head_faculty_number') is-invalid @enderror" value="{{$infoStudent->head_faculty_number ?? '' }}">
                                                    @error('head_faculty_number')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <div class="d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <!-- Step 5 input fields {Document}-->
                            <div class="accordion__item">
                                <div class="accordion__header accordion__header--primary {{ Session::has('messege') ? '' :'collapsed'}}" data-toggle="collapse" data-target="#rounded-stylish_collapseFive" aria-expanded="false">
                                    <span class="accordion__header--icon"></span>
                                    <span class="accordion__header--text">Documents</span>
                                    <span class="accordion__header--indicator"></span>
                                </div>
                                <div id="rounded-stylish_collapseFive" class="accordion__body collapse {{ Session::has('messege') ? 'show' :''}}" data-parent="#accordion-eleven" style="">
                                    <!--__________________ Documents  __________________-->
                                    <div class="row pb-0 accordion__body--text">
                                        <div class="col-md-12 mb-4">
                                            <h6 class="text-danger text-center">10 MB Attachment Limit</h6>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <div class="row">
                                                <label for="edu_certificate" class="form-label col-md-4">Educational Certificates
                                                    (SSC/HSC/ID/IAR/ARCH)<span class="text-danger">*</span></label>
                                                <div class="col-md-5">
                                                    <input type="file" name="edu_certificate" id="edu_certificate" class="form-control @error('edu_certificate') is-invalid @enderror" value="{{old('edu_certificate')}}">
                                                    @error('edu_certificate')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-3">
                                                    @if (!empty($user->infoDocument->edu_certificate))
                                                        <a href="{{ route('document-edu-certificate.download', $user->infoDocument->id) }}" target="_blank" class="btn btn-sm btn-secondary p-1 px-2 m-1">
                                                            <i class="flaticon-381-download"></i> Education Certificate
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2" @if($user->member_type_id == 5) style="display: none;" @endif>
                                            <div class="row">
                                                <label for="trade_licence" class="form-label col-md-4">Valid Trade Lisence<span class="text-danger">*</span></label>
                                                <div class="col-md-5">
                                                    <input type="file" name="trade_licence" id="trade_licence" class="form-control @error('trade_licence') is-invalid @enderror" value="{{old('trade_licence')}}">
                                                    @error('trade_licence')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-3">
                                                    @if (!empty($user->infoDocument->trade_licence))
                                                        <a href="{{ route('document-trade-licence.download', $user->infoDocument->id) }}" target="_blank" class="btn btn-sm btn-secondary p-1 px-2 m-1">
                                                            <i class="flaticon-381-download"></i> Trade Licence
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2" @if($user->member_type_id == 5) style="display: none;" @endif>
                                            <div class="row">
                                                <label for="tin_certificate" class="form-label col-md-4">Valid TIN Certificate<span class="text-danger">*</span></label>
                                                <div class="col-md-5">
                                                    <input type="file" name="tin_certificate" id="tin_certificate" class="form-control @error('tin_certificate') is-invalid @enderror" value="{{old('tin_certificate')}}">
                                                    @error('tin_certificate')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-3">
                                                    @if (!empty($user->infoDocument->tin_certificate))
                                                        <a href="{{ route('document-tin-certificate.download', $user->infoDocument->id) }}" target="_blank" class="btn btn-sm btn-secondary p-1 px-2 m-1">
                                                            <i class="flaticon-381-download"></i> TIN Certificate
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2" @if($user->member_type_id == 5) style="display: none;" @endif>
                                            <div class="row">
                                                <label for="nid_photo_copy" class="form-label col-md-4">NID Photo Copy<span class="text-danger">*</span></label>
                                                <div class="col-md-5">
                                                    <input type="file" name="nid_photo_copy" id="nid_photo_copy" class="form-control @error('nid_photo_copy') is-invalid @enderror" value="{{old('nid_photo_copy')}}">
                                                    @error('nid_photo_copy')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-3">
                                                    @if (!empty($user->infoDocument->nid_photo_copy))
                                                        <a href="{{ route('document-nid-photo-copy.download', $user->infoDocument->id) }}" target="_blank" class="btn btn-sm btn-secondary p-1 px-2 m-1">
                                                            <i class="flaticon-381-download"></i> NID Photo Copy
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2" @if($user->member_type_id != 5) style="display: none;" @endif>
                                            <div class="row">
                                                <label for="stu_id_copy" class="form-label col-md-4">Copy of Student ID<span class="text-danger">*</span></label>
                                                <div class="col-md-5">
                                                    <input type="file" name="stu_id_copy" id="stu_id_copy" class="form-control @error('stu_id_copy') is-invalid @enderror" value="{{old('stu_id_copy')}}">
                                                    @error('stu_id_copy')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-3">
                                                    @if (!empty($user->infoDocument->stu_id_copy))
                                                        <a href="{{ route('document-stu-id-copy.download', $user->infoDocument->id) }}" target="_blank" class="btn btn-sm btn-secondary p-1 px-2 m-1">
                                                            <i class="flaticon-381-download"></i> Student Id Copy
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2" @if($user->member_type_id == 1 || $user->member_type_id == 2)  @else style="display: none;" @endif>
                                            <div class="row">
                                                <label for="experience_certificate" class="form-label col-md-4">Job Experience Certificate</label>
                                                <div class="col-md-5">
                                                    <input type="file" name="experience_certificate" id="experience_certificate" class="form-control @error('experience_certificate') is-invalid @enderror" value="{{old('experience_certificate')}}">
                                                    @error('experience_certificate')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-3">
                                                    @if (!empty($user->infoDocument->experience_certificate))
                                                        <a href="{{ route('document-experience-certificate.download', $user->infoDocument->id) }}" target="_blank" class="btn btn-sm btn-secondary p-1 px-2 m-1">
                                                            <i class="flaticon-381-download"></i> Experience Certificate
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2" @if($user->member_type_id != 5) style="display: none;" @endif>
                                            <div class="row">
                                                <label for="recoment_letter" class="form-label col-md-4">Recomendation Letter</label>
                                                <div class="col-md-5">
                                                    <input type="file" name="recoment_letter" id="recoment_letter" class="form-control @error('recoment_letter') is-invalid @enderror" value="{{old('recoment_letter')}}">
                                                    @error('recoment_letter')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-3">
                                                    @if (!empty($user->infoDocument->recoment_letter))
                                                        <a href="{{ route('document-recoment-letter.download', $user->infoDocument->id) }}" target="_blank" class="btn btn-sm btn-secondary p-1 px-2 m-1">
                                                            <i class="flaticon-381-download"></i> Recomend Letter
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-12 mb-2" id="passport_photo">
                                            <div class="row">
                                                <label for="passport_photo" class="form-label col-md-4">Passport size photo</label>
                                                <div class="col-md-5">
                                                    <input type="file" name="passport_photo" id="passport_photo" class="form-control @error('passport_photo') is-invalid @enderror" value="{{old('passport_photo')}}">
                                                    @error('passport_photo')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-3">
                                                    @if (!empty($user->infoDocument->passport_photo))
                                                        <a href="{{ route('document-passport-photo.download', $user->infoDocument->id) }}" target="_blank" class="btn btn-sm btn-secondary p-1 px-2 m-1">
                                                            <i class="flaticon-381-download"></i> Passport Photo
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div> --}}
                                        <div class="col-md-12 mb-2">
                                            <div class="form-group">
                                                <div class="d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Step 6 input fields {Other Information}-->
                            <div class="accordion__item">
                                <div class="accordion__header accordion__header--primary {{ Session::has('messege') ? '' :'collapsed'}}" data-toggle="collapse" data-target="#rounded-stylish_collapseSix" aria-expanded="false">
                                    <span class="accordion__header--icon"></span>
                                    <span class="accordion__header--text">Other Information</span>
                                    <span class="accordion__header--indicator"></span>
                                </div>
                                <div id="rounded-stylish_collapseSix" class="accordion__body collapse {{ Session::has('messege') ? 'show' :''}}" data-parent="#accordion-eleven" style="">
                                    <!--__________________ Student  __________________-->
                                    <div class="row pb-0 accordion__body--text">
                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label">About Me</label>
                                                <div class="col-lg-10">
                                                    <textarea name="about_me" class="form-control @error('about_me') is-invalid @enderror" rows="2" id="comment" placeholder="What would you like to see?">{{$infoOther->about_me ?? ''}}</textarea>
                                                    @error('about_me')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label">Facebook Link</label>
                                                <div class="col-lg-8">
                                                    <div class="input-group mb-3  input-success">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fa fa-facebook"></i></span>
                                                        </div>
                                                        <input type="text" name="facebook_url" class="form-control @error('facebook_url') is-invalid @enderror" placeholder="https://www.facebook.com" value="{{$infoOther->facebook_url ?? ''}}">
                                                        @error('facebook_url')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label">Youtube Link</label>
                                                <div class="col-lg-8">
                                                    <div class="input-group mb-3  input-success">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fa fa-youtube"></i></span>
                                                        </div>
                                                        <input type="text" name="youtube_url" class="form-control @error('facebook_url') is-invalid @enderror" placeholder="https://www.youtube.com" value="{{$infoOther->youtube_url ?? ''}}">
                                                        @error('youtube_url')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label">Twitter Link</label>
                                                <div class="col-lg-8">
                                                    <div class="input-group mb-3  input-success">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fa fa-twitter"></i></span>
                                                        </div>
                                                        <input type="text" name="twitter_url" class="form-control @error('twitter_url') is-invalid @enderror" placeholder="https://twitter.com" value="{{$infoOther->twitter_url ?? ''}}">
                                                        @error('twitter_url')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label">Instagram Link</label>
                                                <div class="col-lg-8">
                                                    <div class="input-group mb-3  input-success">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fa fa-instagram"></i></span>
                                                        </div>
                                                        <input type="text" name="instagram_url" class="form-control @error('instagram_url') is-invalid @enderror" placeholder="https://www.instagram.com" value="{{$infoOther->instagram_url ?? ''}}">
                                                        @error('instagram_url')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label">Linkedin Link</label>
                                                <div class="col-lg-8">
                                                    <div class="input-group mb-3  input-success">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fa fa-linkedin"></i></span>
                                                        </div>
                                                        <input type="text" name="linkedin_url" class="form-control @error('linkedin_url') is-invalid @enderror" placeholder="https://www.linkedin.com" value="{{$infoOther->linkedin_url ?? ''}}">
                                                        @error('linkedin_url')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <div class="d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers:{
                    'x-csrf-token' : $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
        $("body").on('click','#delete_data',function(){
            var id = $(this).data('id');
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this data!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    // Place your delete code here
                    $.ajax({
                        url: "{{ url('info_member/family_info/destroy')}}" + '/' + id,
                        method: 'DELETE',
                        type: 'DELETE',
                        success: function(response) {
                            toastr.success("Record deleted successfully!");
                            $("#row_data_" + id).remove();
                            $('#table-body').closest('tr').remove();
                        },
                        error: function(response) {
                            Swal.fire({
                                title: 'Error!',
                                text: 'An error occurred.',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        }
                    });
                } else {
                    // User clicked "No" button, do nothing
                    swal("Your data is safe!", {
                        icon: "success",
                    });
                }
            });
            
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            var i = 0;
            $("#add-btn").click(function() {
                ++i;
                $("#familySubmit").prop("disabled", true);
                $("#dynamicAddRemoveWrapper").append('<div class="row remove mb-2"><div class="col-md-4"><label>Name</label><input type="text" name="moreFields[' + i + '][child_name]" class="form-control val_child_name" /></div><div class="col-md-3"><label>Date Of Birth</label><input type="date" name="moreFields[' + i + '][child_dob]" class="form-control val_child_dob" /></div><div class="col-md-3"><label>Gender</label><select  name="moreFields[' + i + '][child_gender]" class="form-control default-select"><option value="0">Male</option><option value="1">Female</option></select></div><div class="col-md-2 text-right"><label>Action</label><div><button type="button" class="btn btn-danger remove-tr">Remove</button></div></div></div>');
            });

            $(document).on('click', '.remove-tr', function() {
                $(this).parents('.remove').remove();
            });
        });

        $(document).on('input', '.val_child_name, .val_child_dob', function() {
            var allValuesNotNull = true;
            $('.val_child_name').each(function() {
                var value = $(this).val();
                if (value === null || value === '') {
                    allValuesNotNull = false;
                    return false;
                }
            });
            $('.val_child_dob').each(function() {
                var value = $(this).val();
                if (value === null || value === '') {
                    allValuesNotNull = false;
                    return false;
                }
            });
            if (allValuesNotNull) {
                $("#familySubmit").prop("disabled", false);
            } else {
                // swal("Error!", "All input values are not null or empty.", "error");
                $("#familySubmit").prop("disabled", true);
            }
        });
    </script>


</x-app-layout>