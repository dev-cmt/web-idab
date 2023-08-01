@extends('frontend.layouts.app')
@section('content')
<style>
    #regForm {
      background-color: #34ad542e;
      font-family: Raleway;
      padding: 40px;
    }

    /* Hide all steps by default: */
    .tab {
      display: none;
    }

    button:hover {
      opacity: 0.8;
    }
    
    #prevBtn {
      background-color: #34ad54;
    }
    
    /* Make circles that indicate the steps of the form: */
    .step {
      height: 15px;
      width: 15px;
      margin: 0 2px;
      background-color: #34ad54;
      border: none;  
      border-radius: 50%;
      display: inline-block;
      opacity: 0.5;
    }
    
    .step.active {
      opacity: 1;
    }
    
    /* Mark the steps that are finished and valid: */
    .step.finish {
      background-color: #04AA6D;
    }
    .btn-check:focus+.btn-primary, .btn-primary:focus {
        color: #fff;
        background-color: #091E3E;
        border-color: #091E3E;
        box-shadow: none;
    }

    /*__________________Image Profile______________________*/
    h1 {
        font-size: 20px;
        text-align: center;
        margin: 20px 0;
    }
    h1 small {
        display: block;
        font-size: 15px;
        padding-top: 8px;
        color: gray;
    }
    .avatar-upload {
        position: relative;
        max-width: 205px;
        margin: 20px auto;
    }
        .avatar-upload .avatar-edit {
        position: absolute;
        right: 25px;
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
        border-radius: 100%;
        background: #34ad54;
        border: 1px solid transparent;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
        cursor: pointer;
        font-weight: normal;
        transition: all 0.2s ease-in-out;
        }
        .avatar-upload .avatar-edit input + label:hover {
        background: #f1f1f1;
        border-color: #d6d6d6;
        }
        .bi-pen-fill{
            color: #ffffff;
            position: absolute;
            top: 5px;
            left: 0;
            right: 0;
            text-align: center;
            margin: auto;
        }
        .avatar-upload .avatar-preview {
            width: 192px;
            height: 192px;
            position: relative;
            border-radius: 100%;
            border: 6px solid #34ad54;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
        }
        .avatar-upload .avatar-preview > div {
            width: 100%;
            height: 100%;
            border-radius: 100%;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

</style>
    <!-- Contact Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <form id="regForm" action="{{route('member_register.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- One "tab" for each step in the form: -->
                <div class="tab">
                    <h2 style="text-align: center; margin-bottom:30px;color:#34ad54;">Personal Information</h2>
                    <!--=====// Personal Information//====-->
                    <div class="container">
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' class="@error('profile_photo_path') is-invalid @enderror form-control" name="profile_photo_path" id="imageUpload" accept=".png, .jpg, .jpeg" value="{{old('profile_photo_path')}}"/>
                                <label for="imageUpload"><i class="bi bi-pen-fill"></i></label>
                                @error('profile_photo_path')
                                    <span class="invalid-feedback" role="alert" style="position: absolute;top: 178px;left: -160px;width: 300px;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="avatar-preview">
                                <div id="imagePreview" style="background-image: url('{{asset('public/frontend/images')}}/profile.png');">
                                </div>
                            </div>
                        </div>
                        
                        <h1>Profile Image Upload (Max 2MB File)</h1>
                    </div>
                    <div class="row g-5">
                        <div class="col-lg-6 wow slideInUp" data-wow-delay="0.3s">
                            <div class="row g-3">
                                {{-- <div class="col-12">
                                    <label for="" class="from-label">Your Full Name</label>
                                    <input type="text" name="name" placeholder="" value="{{Auth::user()->name}}" class="@error('name') is-invalid @enderror form-control border-0 bg-light px-4" style="height: 40px;">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div> --}}
                                {{-- <div class="col-12">
                                    <label for="" class="from-label">Designation</label>
                                    <input type="text" name="designation" placeholder="" value="{{old('designation')}}" class="@error('designation') is-invalid @enderror form-control border-0 bg-light px-4" style="height: 40px;">
                                    @error('designation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div> --}}
                                {{-- <div class="col-12">
                                    <label for="" class="from-label">Date Of Birth</label>
                                    <input type="date" name="dob" placeholder="" value="{{old('dob')}}" class="@error('dob') is-invalid @enderror form-control border-0 bg-light px-4" style="height: 40px;">
                                    @error('dob')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div> --}}
                                {{-- <div class="col-12">
                                    <label for="" class="from-label">Your Address</label>
                                    <input type="text" name="address" placeholder="" value="{{old('address')}}" class="@error('address') is-invalid @enderror form-control border-0 bg-light px-4" style="height: 40px;">
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div> --}}
                                {{-- <div class="col-12">
                                    <label for="" class="from-label">Marrital Status</label>
                                    <select id="divId" onchange="marritalStatus()" name="marrital_status" value="{{old('marrital_status')}}" class="@error('degree') is-invalid @enderror form-select border-0 bg-light px-4" style="height: 40px;">
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
                                </div> --}}
                                <div id="divspouse" style="display:none">
                                    <div class="col-12 mb-4">
                                        <label for="" class="from-label">Spouse Name</label>
                                        <input type="text" name="spouse" placeholder="" value="{{old('spouse')}}" class="@error('spouse') is-invalid @enderror form-control border-0 bg-light px-4" style="height: 40px;">
                                        @error('spouse')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="" class="from-label">Number Of Child</label>
                                        <input type="number" id="number_child" name="number_child" placeholder="" value="{{old('number_child')}}" class="@error('number_child') is-invalid @enderror form-control border-0 bg-light px-4" style="height: 40px;">
                                        @error('number_child')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <!--Right-->
                        <div class="col-lg-6 wow slideInUp" data-wow-delay="0.3s">
                            <div class="row g-3">
                                {{-- <div class="col-12">
                                    <label for="" class="from-label">Email</label>
                                    <input type="email" name="email" placeholder="" value="{{Auth::user()->email}}" class="@error('email') is-invalid @enderror form-control border-0 bg-light px-4" style="height: 40px;" disabled>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div> --}}
                                {{-- <div class="col-12">
                                    <label for="" class="from-label">Company Name</label>
                                    <input type="text" name="company_name" placeholder="" value="{{old('company_name')}}" class="@error('company_name') is-invalid @enderror form-control border-0 bg-light px-4" style="height: 40px;">
                                    @error('company_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div> --}}
                                {{-- <div class="col-12">
                                    <label for="" class="from-label">Gender</label>
                                    <select type="text" name="gender" placeholder="" value="{{old('gender')}}" class="@error('gender') is-invalid @enderror form-select border-0 bg-light px-4" style="height: 40px;">
                                        <option value="0" {{ old('gender') == '0' ? 'selected' : '' }}>Male</option>
                                        <option value="1" {{ old('gender') == '1' ? 'selected' : '' }}>Female</option>
                                    </select>
                                    @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div> --}}
                                {{-- <div class="col-12">
                                    <label for="" class="from-label">City</label>
                                    <input type="text" name="city" placeholder="" value="{{old('city')}}" class="@error('city') is-invalid @enderror form-control border-0 bg-light px-4" style="height: 40px;">
                                    @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div> --}}
                                {{-- <div class="col-12">
                                    <label for="" class="from-label">Contact Number</label>
                                    <input type="number" name="contact_number" placeholder="" value="{{Auth::user()->contact_number}}" class="@error('contact_number') is-invalid @enderror form-control border-0 bg-light px-4" style="height: 40px;">
                                    @error('contact_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div> --}}
                                <div class="col-12" id="divspouse_birth"  style="display:none">
                                    <label for="" class="from-label">Spouse DOB</label>
                                    <input type="date" name="birth_day" placeholder="" value="{{old('birth_day')}}" class="@error('birth_day') is-invalid @enderror form-control border-0 bg-light px-4" style="height: 40px;">
                                    @error('birth_day')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    
                <div class="tab">
                    <h2 style="text-align: center; margin-bottom:30px;color:#34ad54;">Child Information</h2>
                    <div id="divFailyMs" style="display:none;">
                        <h3 style="text-align: center; margin-top:30px;color:#eb791c;">Not applicable</h3>
                    </div>
                    <div id="divFamily" style="display:none;">
                        <!--=====// Family Information//====-->
                        <div class="row" id="dynamicAddRemove">
                            <div class="row mb-2">
                                <div class="col-md-3">
                                    <label>Name</label>
                                    <input type="text" name="moreFields[0][child_name]" class="form-control" />
                                </div>
                                <div class="col-md-3">
                                    <label>Date Of Birth</label>
                                    <input type="date" name="moreFields[0][child_dob]" class="form-control" />
                                </div>
                                <div class="col-md-3">
                                    <label>Gender</label>
                                    <select  name="moreFields[0][child_gender]" class="form-control">
                                        <option value="0">Male</option>
                                        <option value="1">Female</option>
                                    </select></div>
                                <div class="col-md-3">
                                    <label>Action</label>
                                    <div>
                                        <button type="button" name="add" id="add-btn" class="btn btn-success">Add More</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="tab">
                    <h2 style="text-align: center; margin-bottom:30px;color:#34ad54;">Academic Information</h2>
                    <!--=====// Academic Information//====-->
                    <div class="row g-5">
                        <div class="col-lg-6">
                            <div class="row g-3">
                                {{-- <div class="col-12">
                                    <label for="" class="from-label">College Name</label>
                                    <input type="text" name="collage" placeholder="" value="{{old('collage')}}" class="@error('collage') is-invalid @enderror form-control border-0 bg-light px-4" style="height: 40px;">
                                    @error('collage')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div> --}}
                                {{-- <div class="col-12">
                                    <label for="" class="from-label">Passing Year</label>
                                    <input type="number" name="passing_year" placeholder="" value="{{old('passing_year')}}" class="@error('passing_year') is-invalid @enderror form-control border-0 bg-light px-4" style="height: 40px;">
                                    @error('passing_year')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div> --}}
                                <div class="col-12">
                                    <label for="" class="from-label">Degree</label>
                                    <select name="degree" placeholder="" class="@error('degree') is-invalid @enderror form-select border-0 bg-light px-4" style="height: 40px;">
                                        <option value="0" selected>--Select--</option>
                                        <option value="1" {{ old('degree') == '1' ? 'selected' : '' }}>12th Stander</option>
                                        <option value="2" {{ old('degree') == '2' ? 'selected' : '' }}>Graduation</option>
                                        <option value="3" {{ old('degree') == '3' ? 'selected' : '' }}>Masters</option>
                                        <option value="4" {{ old('degree') == '4' ? 'selected' : '' }}>Ph.D</option>
                                        {{-- <option value="12th Stander">12th Stander</option>
                                        <option value="Graduation">Graduation</option>
                                        <option value="Masters">Masters</option>
                                        <option value="PSD">PSD</option> --}}
                                    </select>
                                    @error('degree')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!--Right-->
                        <div class="col-lg-6">
                            <div class="row g-3">
                                {{-- <div class="col-12">
                                    <label for="" class="from-label">Batch No.</label>
                                    <input type="number" name="batch" placeholder="" value="{{Auth::user()->batch}}" class="@error('batch') is-invalid @enderror form-control border-0 bg-light px-4" style="height: 40px;">
                                    @error('batch')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div> --}}
                                {{-- <div class="col-12">
                                    <label for="" class="from-label">Subject</label>
                                    <input type="text" name="subject" placeholder="" value="{{old('subject')}}" class="@error('subject') is-invalid @enderror form-control border-0 bg-light px-4" style="height: 40px;">
                                    @error('subject')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div style="overflow:auto;">
                <div style="float:right;margin-top:20px">
                    <button type="button" class="btn btn-primary" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                    <button type="button" class="btn btn-primary" id="nextBtn" onclick="nextPrev(1)">Next</button>
                </div>
                </div>
                <!-- Circles which indicates the steps of the form: -->
                <div style="text-align:center;margin-top:40px;">
                <span class="step"></span>
                <span class="step"></span>
                <span class="step"></span>
                </div>
            </form>
        </div>
    </div>

    <script>
        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab
        
        function showTab(n) {
        // This function will display the specified tab of the form...
        var x = document.getElementsByClassName("tab");
        x[n].style.display = "block";
        //... and fix the Previous/Next buttons:
        if (n == 0) {
            document.getElementById("prevBtn").style.display = "none";
        } else {
            document.getElementById("prevBtn").style.display = "inline";
        }
        if (n == (x.length - 1)) {
            document.getElementById("nextBtn").innerHTML = "Submit";
        } else {
            document.getElementById("nextBtn").innerHTML = "Next";
        }
        //... and run a function that will display the correct step indicator:
        fixStepIndicator(n)
        }
        
        function nextPrev(n) {
        // This function will figure out which tab to display
        var x = document.getElementsByClassName("tab");
        // Exit the function if any field in the current tab is invalid:
        //   if (n == 1 && !validateForm()) return false;
        // Hide the current tab:
        x[currentTab].style.display = "none";
        // Increase or decrease the current tab by 1:
        currentTab = currentTab + n;
        // if you have reached the end of the form...
        if (currentTab >= x.length) {
            // ... the form gets submitted:
            document.getElementById("regForm").submit();
            return false;
        }
        // Otherwise, display the correct tab:
        showTab(currentTab);

        // Child Number Check
        var number_child=document.getElementById('number_child');
        
        if(number_child.value > '0'){
            // document.getElementById("divFamily").classList.remove("tab");
            document.getElementById('divFamily').style.display='block';
            document.getElementById('divFailyMs').style.display='none';
        }else{
            document.getElementById('divFailyMs').style.display='block';
        }
        }
        
        function fixStepIndicator(n) {
        // This function removes the "active" class of all steps...
        var i, x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }
        //... and adds the "active" class on the current step:
        x[n].className += " active";
        }
        
        function marritalStatus(){
            var e= document.getElementById('divId')

            if(e.value!='0'){
                document.getElementById('divspouse').style.display='block';
                document.getElementById('divspouse_birth').style.display='block';
                document.getElementById('info_personal_btn').value='Next';
            }else{
                document.getElementById('divspouse').style.display='none';
                document.getElementById('divspouse_birth').style.display='none';
                document.getElementById('info_personal_btn').value='Submit';
            }
            document.
            alert(e.value);
            
        }
    </script>
    <script type="text/javascript">
        var i = 0;
        $("#add-btn").click(function(){
            ++i;
            $("#dynamicAddRemove").append('<div class="row remove mb-2"><div class="col-md-3"><label>Name</label><input type="text" name="moreFields['+i+'][child_name]" class="form-control" /></div><div class="col-md-3"><label>Date Of Birth</label><input type="date" name="moreFields['+i+'][child_dob]" class="form-control" /></div><div class="col-md-3"><label>Gender</label><select  name="moreFields['+i+'][child_gender]" class="form-control"><option value="0">Male</option><option value="1">Female</option></select></div><div class="col-md-3"><label>Action</label><div><button type="button" class="btn btn-danger remove-tr">Remove</button></div></div></div>');
        });
        $(document).on('click', '.remove-tr', function(){  
            $(this).parents('.remove').remove();
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

@endsection
