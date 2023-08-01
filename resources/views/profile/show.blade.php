
<x-app-layout>
    <style>
        .table thead th {
            text-transform: capitalize ;
        }
        .avatar-upload .avatar-preview {
            border-radius: 0%;
            width: 200px;
            height: 200px;
        }
        .avatar-upload .avatar-preview > div{
            border-radius: 0%;
        }
        .profile_submit{
            width: 200px;
            margin: 5px auto;
        }
        .profile_submit button{
            display: flex;
            width: 100%;
            justify-content: center;
        }
        .avatar-upload .avatar-edit input + label {
            border-radius: 0%;
            width: 200px;
            position: absolute;
            top: 156px;
            left: -177px;
        }
        .avatar-upload .avatar-edit input + label:hover {
            background: #f98f73;
            border-color: #d6d6d6;
        }
    </style>
    <div class="row">
        <div class="col-md-12 col-sm-10 mx-auto">
            <!-- Profile widget -->
            <div class="bg-white shadow rounded overflow-hidden">
                <div class="p-4 bg-dark">
                    <div class="media align-items-end profile-header">
                        <div class="profile mr-4">
                            <div class="rounded mb-2 img-thumbnail" style="width:150px;height:150px;overflow:hidden">
                                <img src="{{asset('public/images')}}/profile/{{ $user->profile_photo_path }}" alt="..." style="height: 100%;width: 100%;object-fit: cover;">
                            </div>
                            <a href="{{route('info_member.edit', $user->id)}}" class="btn btn-primary light text-white btn-sl-sm btn-block"><i class="fa fa-pencil mr-2"></i> Edit profile</a>
                        </div>
                        <div class="media-body mb-5 text-white">
                            <h4 class="text-white">{{$user->name}}</h4>
                            <p class="small mb-5"><i class="fa fa-calendar-o mr-2"></i>{{date("j F, Y", strtotime($user->created_at))}}</p>
                        </div>
                    </div>
                </div>
    
                <div class="card-body">
                    <div class="profile-tab">
                        <div class="custom-tab-1">
                            <ul class="nav nav-tabs">
                                <li class="nav-item"><a href="#my-posts" data-toggle="tab" class="nav-link {{Session::has('info_update') ? '' : 'active'}}">Employee Information</a></li>
                                <li class="nav-item"><a href="#about-me" data-toggle="tab" class="nav-link {{Session::has('info_update') ? 'active' : ''}}">Other Information</a></li>
                                <li class="nav-item"><a href="#profile-settings" data-toggle="tab" class="nav-link {{Session::has('messege') || $errors->any() ? 'active' : ''}}">Setting</a></li>
                            </ul>
                            

                            <div class="tab-content">
                                <div id="my-posts" class="tab-pane fade {{Session::has('messege') || Session::has('info_update') || $errors->any() ? '' : 'active show'}}">
                                    <!--=====// Personal Information//=====-->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h6 class="text-primary my-3">Personal Information</h6>
                                        </div>
                                        <!--Item-->
                                        <div class="col-xl-6 col-sm-12">
                                            <div class="row mb-2">
                                                <div class="col-sm-6 col-5">
                                                    <h6 class="f-w-500">Name <span class="pull-right">:</span></h6>
                                                </div>
                                                <div class="col-sm-6 col-7"><span>{{$user->name }}</span></div>
                                            </div>
                                        </div>
                                        <!--Item-->
                                        <div class="col-xl-6 col-sm-12">
                                            <div class="row mb-2">
                                                <div class="col-sm-6 col-5">
                                                    <h6 class="f-w-500">Email <span class="pull-right">:</span></h6>
                                                </div>
                                                <div class="col-sm-6 col-7"><span>{{ $user->email }}</span></div>
                                            </div>
                                        </div>
                                        <!--Item-->
                                        <div class="col-xl-6 col-sm-12">
                                            <div class="row mb-2">
                                                <div class="col-sm-6 col-5">
                                                    <h6 class="f-w-500">Gender <span class="pull-right">:</span></h6>
                                                </div>
                                                <div class="col-sm-6 col-7"><span>{{$infoPersonal->gender == '0'? 'Male': 'Female'}}</span></div>
                                            </div>
                                        </div>
                                        <!--Item-->
                                        <div class="col-xl-6 col-sm-12">
                                            <div class="row mb-2">
                                                <div class="col-sm-6 col-5">
                                                    <h6 class="f-w-500">Date Of Birth <span class="pull-right">:</span></h6>
                                                </div>
                                                <div class="col-sm-6 col-7"><span>{{date('d-m-Y', strtotime($infoPersonal->dob))}}</span></div>
                                            </div>
                                        </div>
                                        <!--Item-->
                                        <div class="col-xl-6 col-sm-12">
                                            <div class="row mb-2">
                                                <div class="col-sm-6 col-5">
                                                    <h6 class="f-w-500">Location <span class="pull-right">:</span></h6>
                                                </div>
                                                <div class="col-sm-6 col-7"><span>{{$infoPersonal->address}},
                                                    {{$infoPersonal->city}}</span></div>
                                            </div>
                                        </div>
                                        <!--Item-->
                                        <div class="col-xl-6 col-sm-12">
                                            <div class="row mb-2">
                                                <div class="col-sm-6 col-5">
                                                    <h6 class="f-w-500">College Name <span class="pull-right">:</span></h6>
                                                </div>
                                                <div class="col-sm-6 col-7"><span>{{$infoAcademic->collage}}</span></div>
                                            </div>
                                        </div>
                                        <!--Item-->
                                        <div class="col-xl-6 col-sm-12">
                                            <div class="row mb-2">
                                                <div class="col-sm-6 col-5">
                                                    <h6 class="f-w-500">Subject <span class="pull-right">:</span></h6>
                                                </div>
                                                <div class="col-sm-6 col-7"><span>{{$infoAcademic->subject}}</span></div>
                                            </div>
                                        </div>
                                        <!--Item-->
                                        <div class="col-xl-6 col-sm-12">
                                            <div class="row mb-2">
                                                <div class="col-sm-6 col-5">
                                                    <h6 class="f-w-500">Degree <span class="pull-right">:</span></h6>
                                                </div>
                                                <div class="col-sm-6 col-7">
                                                    <span>
                                                        @if ($infoAcademic->degree == '0') No Degree
                                                        @elseif ($infoAcademic->degree == '1') 12th Stander
                                                        @elseif ($infoAcademic->degree == '2') Graduation
                                                        @elseif ($infoAcademic->degree == '3') Masters
                                                        @elseif ($infoAcademic->degree == '4') Ph.D
                                                        @endif
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Item-->
                                        <div class="col-xl-6 col-sm-12">
                                            <div class="row mb-2">
                                                <div class="col-sm-6 col-5">
                                                    <h6 class="f-w-500">Passing Year <span class="pull-right">:</span></h6>
                                                </div>
                                                <div class="col-sm-6 col-7">
                                                    <span>{{$infoAcademic->passing_year}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Item-->
                                        <div class="col-xl-6 col-sm-12">
                                            <div class="row mb-2">
                                                <div class="col-sm-6 col-5">
                                                    <h6 class="f-w-500">Marrital Status<span class="pull-right">:</span></h6>
                                                </div>
                                                <div class="col-sm-6 col-7">
                                                    <span>
                                                        @if ($infoPersonal->marrital_status=='0')Unmarried
                                                        @elseif ($infoPersonal->marrital_status=='1')Married
                                                        @elseif ($infoPersonal->marrital_status=='2')Divorce
                                                        @elseif ($infoPersonal->marrital_status=='3')Widowed
                                                        @endif
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Item-->
                                        @if ($infoPersonal->marrital_status != '0')
                                        <div class="col-xl-6 col-sm-12">
                                            <div class="row mb-2">
                                                <div class="col-sm-6 col-5">
                                                    <h6 class="f-w-500">Number Of Child<span class="pull-right">:</span></h6>
                                                </div>
                                                <div class="col-sm-6 col-7">
                                                    <span>{{$infoPersonal->number_child}} Person</span>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                    <!--Child Details-->
                                    <div class="row">
                                        <div class="col-md-12">
                                            @if (count($infoFamily))
                                            <div class="table-responsive mt-2">
                                                <table class="table header-border table-hover verticle-middle">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Child Name</th>
                                                            <th scope="col">Gender</th>
                                                            <th scope="col">Birth Day</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($infoFamily as $key=> $row)
                                                        <tr>
                                                            <th>{{++$key}}</th>
                                                            <td>{{$row->child_name}}</td>
                                                            <td>{{$row->child_gender == '0' ? 'Male' : 'Female'}}</td>
                                                            <td>{{date('d M, y', strtotime($row->child_dob))}}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                                <div id="about-me" class="tab-pane fade {{Session::has('info_update') ? 'active show' : ''}}">
                                    <!--=====// Other Information //=====-->
                                    <form action="{{ route('info_other.update', $infoOther->id )}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-lg-12 mt-3">
                                                <div class="form-group row">
                                                    <label class="col-lg-2 col-form-label">About Me</label>
                                                    <div class="col-lg-10">
                                                        <textarea name="about_me" class="form-control @error('about_me') is-invalid @enderror" rows="2" id="comment" placeholder="What would you like to see?">{{$infoOther->about_me}}</textarea>
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
                                                            <input type="text" name="facebook_url" class="form-control @error('facebook_url') is-invalid @enderror" placeholder="https://www.facebook.com" value="{{$infoOther->facebook_url}}">
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
                                                            <input type="text" name="youtube_url" class="form-control @error('facebook_url') is-invalid @enderror" placeholder="https://www.youtube.com" value="{{$infoOther->youtube_url}}">
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
                                                            <input type="text" name="twitter_url" class="form-control @error('twitter_url') is-invalid @enderror" placeholder="https://twitter.com" value="{{$infoOther->twitter_url}}">
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
                                                            <input type="text" name="instagram_url" class="form-control @error('instagram_url') is-invalid @enderror" placeholder="https://www.instagram.com" value="{{$infoOther->instagram_url}}">
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
                                                            <input type="text" name="linkedin_url" class="form-control @error('linkedin_url') is-invalid @enderror" placeholder="https://www.linkedin.com" value="{{$infoOther->linkedin_url}}">
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
                                    </form>
                                </div>
                                <div id="profile-settings" class="tab-pane fade {{Session::has('messege') || $errors->any() ? 'active show' : ''}}">
                                     <!--=====// Change Profile //=====-->
                                     <form method="POST" action="{{ route('change.password', $user->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <!--Item-->
                                            <div class="col-lg-12">
                                                @if ($errors->any())
                                                    <div class="alert alert-danger solid alert-dismissible fade show mt-2">
                                                        @foreach ($errors->all() as $error)
                                                            <svg viewBox="0 0 24 24" width="24 " height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                                                            <strong>Error!</strong> {{$error}}.
                                                            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span></button>
                                                        @endforeach
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-xl-7 col-sm-12 mt-3">
                                                <div class="form-group row">
                                                    <label class="col-lg-5 col-form-label">Email</label>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="" value="{{$user->email }}" disabled>                                     
                                                        @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-5 col-form-label">Employee Name
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="" value="{{$user->name }}">                                     
                                                        @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-5 col-form-label">Contact Number
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="form-control @error('contact_number') is-invalid @enderror" name="contact_number" placeholder="" value="{{$user->contact_number }}">                                     
                                                        @error('contact_number')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="current_password" class="col-lg-5 col-form-label">Current Password
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-7">
                                                        <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" value="{{old('current_password')}}" autocomplete="current-password">
                                                        @error('current_password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-5 col-form-label">New Password
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-7">
                                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{old('password')}}" autocomplete="new-password">
                                                        @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-5 col-sm-12 ">
                                                <div class="skip-email text-center">
                                                    <div class="avatar-upload" style="margin:5px auto">
                                                        <div class="avatar-edit">
                                                            <input type='file' class="@error('profile_photo_path') is-invalid @enderror form-control" name="profile_photo_path" id="imageUpload" accept=".png, .jpg, .jpeg" value="{{$user->profile_photo_path}}"/>
                                                            <label for="imageUpload"><i class="fa fa-camera profile_save_btn"></i></label>
                                                            @error('profile_photo_path')
                                                                <span class="invalid-feedback" role="alert" style="">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <label for="imageUpload" class="avatar-preview">
                                                            <div id="imagePreview" style="background-image: url('{{asset('public/images')}}/profile/{{ $user->profile_photo_path }}');"></div>
                                                        </label>
                                                    </div>
                                                    <div class="profile_submit">
                                                        <button class="btn btn-primary">Save</button>
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
            </div><!-- End profile widget -->
    
        </div>
    </div>
    <!--Image Profile-->
    <script type="text/javascript">
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
            $('.submit-btn').css('background-color', '#68cf29');
            $(".submit-btn").removeAttr('disabled');
        });
    </script>
</x-app-layout>
  

