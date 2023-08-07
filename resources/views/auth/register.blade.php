<x-guest-layout>
    <div class="bg-dark p-4" style="min-height: 100vh;">
        <div class="wrapper wrapper--w960">
            <div class="card-6">
                <div class="card-heading">
                    <h2 class="title">Apply For Membership</h2>
                </div>
                <form method="POST" class="card-body">
                    <div class="d-flex justify-content-center mb-4">
                        <a href="{{route('/')}}"><img src="{{asset('public/images')}}/logo.png" alt="" width="150"></a>
                    </div>
                    <div class="bar_personal"></div>
                    
                    <!--__________________  Personal __________________-->
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <div class="row">
                                <label for="formFile" class="form-label col-md-5">Applicant Name</label>
                                <div class="col-md-7">
                                    <input type="text" name="name" id="formFile" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="row">
                                <label for="formFile" class="form-label col-md-5">NID No.</label>
                                <div class="col-md-7">
                                    <input type="text" name="name" id="formFile" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="row">
                                <label for="formFile" class="form-label col-md-5">Father's Name</label>
                                <div class="col-md-7">
                                    <input type="text" name="name" id="formFile" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="row">
                                <label for="formFile" class="form-label col-md-5">Mother's Name</label>
                                <div class="col-md-7">
                                    <input type="text" name="name" id="formFile" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="row">
                                <label for="formFile" class="form-label col-md-5">Present Address</label>
                                <div class="col-md-7">
                                    <textarea  name="name" id="formFile" class="form-control" rows="2"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="row">
                                <label for="formFile" class="form-label col-md-5">Permanent Address</label>
                                <div class="col-md-7">
                                    <textarea  name="name" id="formFile" class="form-control" rows="2"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="row">
                                <label for="formFile" class="form-label col-md-5">Date Of Birth</label>
                                <div class="col-md-7">
                                    <input type="date" name="name" id="formFile" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="row">
                                <label for="formFile" class="form-label col-md-5">Gender</label>
                                <div class="col-md-7">
                                    <select name="blood_group" id="blood_group" class="form-control @error('blood_group') is-invalid @enderror" style="height: 40px;">
                                        <option value="1">O Positive (0+)</option>
                                        <option value="2">O Negative (0-)</option>
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
                                <label for="formFile" class="form-label col-md-5">Marrital Status</label>
                                <div class="col-md-7">
                                    <select name="marital_status" class="form-control form-select  @error('marital_status') is-invalid @enderror" style="height: 40px;">
                                        <option value="0" selected>Unmarried</option>
                                        <option value="1" {{ old('marital_status') == '1' ? 'selected' : '' }}>Married</option>
                                        <option value="2" {{ old('marital_status') == '2' ? 'selected' : '' }}>Divorce</option>
                                        <option value="3" {{ old('marital_status') == '3' ? 'selected' : '' }}>Widowed</option>
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
                                <label for="formFile" class="form-label col-md-5">Blood Group</label>
                                <div class="col-md-7">
                                    <select name="blood_group" id="blood_group" class="form-control form-select @error('blood_group') is-invalid @enderror" style="height: 40px;">
                                        <option value="" selected>Select</option>
                                        <option value="1">O Positive (0+)</option>
                                        <option value="2">O Negative (0-)</option>
                                        <option value="3">A Positive (A+)</option>
                                        <option value="4">A Negative (A-)</option>
                                        <option value="5">B Positive (B+)</option>
                                        <option value="6">B Negative (B-)</option>
                                        <option value="7">AB Positive (AB+)</option>
                                        <option value="8">AB Negative (AB-)</option>
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
                                <label for="formFile" class="form-label col-md-5">Email Address</label>
                                <div class="col-md-7">
                                    <input type="text" name="name" id="formFile" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="row">
                                <label for="formFile" class="form-label col-md-5">Phone Number</label>
                                <div class="col-md-7">
                                    <input type="text" name="name" id="formFile" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="row">
                                <label for="formFile" class="form-label col-md-5">Password</label>
                                <div class="col-md-7">
                                    <input type="text" name="name" id="formFile" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="row">
                                <label for="formFile" class="form-label col-md-5">Confirm Password</label>
                                <div class="col-md-7">
                                    <input type="text" name="name" id="formFile" class="form-control">
                                </div>
                            </div>
                        </div>


                    </div>
                    
                    <!--__________________  Academic __________________-->
                    <div class="bar_academic"></div>
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <div class="row">
                                <label for="formFile" class="form-label col-md-5">University/ Institute</label>
                                <div class="col-md-7">
                                    <input type="text" name="name" id="formFile" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="row">
                                <label for="formFile" class="form-label col-md-5">Qualification</label>
                                <div class="col-md-7">
                                    <select class="form-control form-select" name="qualification">
                                        <option disabled selected>Please select</option>
                                        <option value="1">SSC</option>
                                        <option value="2">HSC</option>
                                        <option value="3">12th Stander</option>
                                        <option value="4">Graduation</option>
                                        <option value="5">Masters</option>
                                        <option value="6">Ph.D</option>
                                    </select>                                                    
                                    @error('qualification')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="row">
                                <label for="formFile" class="form-label col-md-5">Subject</label>
                                <div class="col-md-7">
                                    <input type="text" name="name" id="formFile" class="form-control">
                                    @error('qualification')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="row">
                                <label for="formFile" class="form-label col-md-5">Passing Year</label>
                                <div class="col-md-7">
                                    <input type="text" name="name" id="formFile" class="form-control">
                                    @error('qualification')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <label for="formFile" class="form-label col-md-5">Other Qualification</label>
                                <div class="col-md-7">
                                    <textarea name=""  id="formFile" class="form-control" rows="1"></textarea>
                                    @error('qualification')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="row">
                                <label for="formFile" class="form-label col-md-5">Member Type <span class="text-danger">*</span></label>
                                <div class="col-md-7">
                                    <select class="form-control form-select" name="mast_member_type" id="mast_member_type">
                                        <option disabled selected>Please select</option>
                                        <option value="1">Student member</option>
                                        <option value="2">Candidate member</option>
                                        <option value="3">Professional member</option>
                                        <option value="4">Associate member</option>
                                        <option value="5">Trade member</option>
                                        <option value="6">Corporate member</option>
                                    </select>                                                    
                                    @error('qualification')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--__________________  Business __________________-->
                    <div id="business" class="row" style="display: none;">
                        <div class="bar_business"></div>                            
                        <div class="col-md-6 mb-2">
                            <div class="row">
                                <label for="formFile" class="form-label col-md-5">Company Name</label>
                                <div class="col-md-7">
                                    <input type="text" name="name" id="business_name" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="row">
                                <label for="formFile" class="form-label col-md-5">Designation</label>
                                <div class="col-md-7">
                                    <input type="text" name="name" id="business_name" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="row">
                                <label for="formFile" class="form-label col-md-5">Company Email</label>
                                <div class="col-md-7">
                                    <input type="text" name="name" id="business_name" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="row">
                                <label for="formFile" class="form-label col-md-5">Company Phone</label>
                                <div class="col-md-7">
                                    <input type="text" name="name" id="business_name" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="row">
                                <label for="formFile" class="form-label col-md-5">Company Address</label>
                                <div class="col-md-7">
                                    <input type="text" name="name" id="business_name" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="row">
                                <label for="formFile" class="form-label col-md-5">Company Website</label>
                                <div class="col-md-7">
                                    <input type="text" name="name" id="business_name" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--__________________  job __________________-->
                    <div id="job" class="row" style="display: none;">
                        <div class="bar_job"></div>                            
                        <div class="col-md-6 mb-2">
                            <div class="row">
                                <label for="formFile" class="form-label col-md-5">Company Name</label>
                                <div class="col-md-7">
                                    <input type="text" name="name" id="business_name" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="row">
                                <label for="formFile" class="form-label col-md-5">Designation</label>
                                <div class="col-md-7">
                                    <input type="text" name="name" id="business_name" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="row">
                                <label for="formFile" class="form-label col-md-5">Company Email</label>
                                <div class="col-md-7">
                                    <input type="text" name="name" id="business_name" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="row">
                                <label for="formFile" class="form-label col-md-5">Company Phone</label>
                                <div class="col-md-7">
                                    <input type="text" name="name" id="business_name" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="row">
                                <label for="formFile" class="form-label col-md-5">Company Address</label>
                                <div class="col-md-7">
                                    <input type="text" name="name" id="business_name" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="row">
                                <label for="formFile" class="form-label col-md-5">Company Website</label>
                                <div class="col-md-7">
                                    <input type="text" name="name" id="business_name" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                        
                    <!--__________________ Student  __________________-->
                    <div id="student" class="row" style="display: none;">
                        <div class="bar_student"></div>
                        <div class="col-md-6 mb-2">
                            <div class="row">
                                <label for="formFile" class="form-label col-md-5">University/ Institute</label>
                                <div class="col-md-7">
                                    <input type="text" name="name" id="student_name" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="row">
                                <label for="formFile" class="form-label col-md-5">Semester</label>
                                <div class="col-md-7">
                                    <input type="text" name="name" id="student_name" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="row">
                                <label for="formFile" class="form-label col-md-5">Head Faculty Name</label>
                                <div class="col-md-7">
                                    <input type="text" name="name" id="student_name" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="row">
                                <label for="formFile" class="form-label col-md-5">Head Faculty Number</label>
                                <div class="col-md-7">
                                    <input type="text" name="name" id="student_name" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--__________________ Document Candidate  __________________-->
                    <div id="document">
                        <div class="bar_document"></div>
                        <div class="row">
                            <div class="col-lg-4 col-sm-12 px-4" style="margin: 0 auto">
                                <div class="upload-file-cover mb-4">
                                    <div class="upload-file-title">
                                        <h1>Profile Photo</h1>
                                    </div>
                            
                                    <div class="dropzone">
                                        <img src="http://100dayscss.com/codepen/upload.svg" class="upload-icon" />
                                        <input type="file" class="upload-input" />
                                    </div>
                            
                                    <button type="button" class="btn-upload" name="uploadbutton">Upload file</button>
                                </div>
                            </div>
                            <div class="col-md-12 mb-2" id="passport_photo">
                                <div class="row">
                                    <label for="formFile" class="form-label col-md-5">Passport size photo</label>
                                    <div class="col-md-7">
                                        <input class="form-control" type="file" id="formFile">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-2" id="educational_certificates">
                                <div class="row">
                                    <label for="formFile" class="form-label col-md-5">Educational Certificates
                                        (SSC/HSC/ID/IAR/ARCH)</label>
                                    <div class="col-md-7">
                                        <input class="form-control" type="file" id="formFile">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-2" id="student_id">
                                <div class="row">
                                    <label for="formFile" class="form-label col-md-5">Copy of Student ID</label>
                                    <div class="col-md-7">
                                        <input class="form-control" type="file" id="formFile">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-2" id="trade_lisence">
                                <div class="row">
                                    <label for="formFile" class="form-label col-md-5">Valid Trade Lisence</label>
                                    <div class="col-md-7">
                                        <input class="form-control" type="file" id="formFile">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-2" id="experience_certificate">
                                <div class="row">
                                    <label for="formFile" class="form-label col-md-5">Job Experience Certificate</label>
                                    <div class="col-md-7">
                                        <input class="form-control" type="file" id="formFile">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-2" id="tin_certificate">
                                <div class="row">
                                    <label for="formFile" class="form-label col-md-5">Valid TIN Certificate</label>
                                    <div class="col-md-7">
                                        <input class="form-control" type="file" id="formFile">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-2" id="nid_photo">
                                <div class="row">
                                    <label for="formFile" class="form-label col-md-5">NID Photo Copy</label>
                                    <div class="col-md-7">
                                        <input class="form-control" type="file" id="formFile">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-2" id="recomendation_letter">
                                <div class="row">
                                    <label for="formFile" class="form-label col-md-5">Recomendation Letter</label>
                                    <div class="col-md-7">
                                        <input class="form-control" type="file" id="formFile">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--__________________ SUBMIT  __________________-->
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="d-flex justify-content-end">                            
                                <button class="btn-upload" id="btn-submit" disabled>Submit</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    
    <script>
        $(document).ready(function() {
            $("#document").hide();
            $("#mast_member_type").change(function() {
                var selectedOption = $(this).val();
                // Hide all sections
                $("#business, #job, #student").hide();

                // Show the corresponding section based on the selected option
                if (selectedOption === "1") { //Student
                    $("#student").show();
                    $("#business").hide();
                    $("#job").hide();

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
                    $("#student").hide();
                    $("#business").hide();
                    $("#job").show();

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
                    $("#student").hide();
                    $("#business").hide();
                    $("#job").show();

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
                    $("#student").hide();
                    $("#business").show();
                    $("#job").hide();

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
                    $("#student").hide();
                    $("#business").show();
                    $("#job").hide();

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
                    $("#student").hide();
                    $("#business").show();
                    $("#job").hide();

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
</x-guest-layout>