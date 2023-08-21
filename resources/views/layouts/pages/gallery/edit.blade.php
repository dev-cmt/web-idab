<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Gallery</h4>
                    <a href="{{route('gallery.index')}}" class="btn btn-sm btn-primary"><i class="fa fa-reply"></i><span class="btn-icon-add"></span>Back</a>
                </div>
                <div class="card-body">
                    <div class="form-validation">
                        @if (session()->has('success'))
                            <strong class="text-success">{{session()->get('success')}}</strong>
                        @endif
                        <form class="form-valide" action="{{route('gallery.update', $posts->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method("put")
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-name">Title
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" id="val-title" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Enter a date name.." value="{{$posts->title}}">                                     
                                            @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-status">Cover
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="file" id="cover-photo" class="form-control @error('cover') is-invalid @enderror" name="cover" placeholder="Enter a date name.." value="{{$posts->cover}}">
                                            @error('cover')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Description</label>
                                        <div class="col-lg-6">
                                            <textarea class="form-control " id="val-suggestions" name="description" rows="3" placeholder="What would you like to see?">{{$posts->description}}</textarea>                                    
                                            @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Date
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="date" class="form-control @error('author') is-invalid @enderror" name="date" placeholder="Enter a date name.." value="{{$posts->date}}">                                     
                                            @error('date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-status">Images
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="file" id="val-images" class="form-control @error('images') is-invalid @enderror" name="images[]" placeholder="Enter a date name.." value="{{$posts->images}}" multiple>
                                            @error('images')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-drive_url">Drive Url</label>
                                        <div class="col-lg-6">
                                            <input type="text" id="val-drive_url" class="form-control @error('drive_url') is-invalid @enderror" name="drive_url" placeholder="https://example.com" value="{{$posts->drive_url}}">                          
                                            @error('drive_url')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="role-management-checkbox ml-4 col-lg-6">
                                            <input type="hidden" name="public" value="0">
                                            <input type="checkbox" class="form-check-input" name="public" value="1"  @if($posts->public) checked @endif>
                                            <label class="form-check-label">Public</label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-8 ml-auto">
                                            <button type="submit" class="btn btn-primary">Submit</button>
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
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Update Images</h4>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-xl-4">
                            <div style="margin: 10px; border:3px solid red">
                                <form action="{{route('gallery.deletecover', $posts->id)}}" method="post" >
                                    <button class="btn btn-primary btn-sm text-center" style="border-radius:0;position: absolute;right: 28px"><i class="flaticon-381-trash-1"></i></button>
                                    @csrf
                                    @method('delete')
                                </form>
                                <img class="img-fluid" src="{{asset('public/images/gallery')}}/{{ $posts->cover}}" style="width:100%; height:80%; object-fit: cover;" alt="">
                            </div>
                        </div>
                    </div>

                    @if (count($posts->images)>0)
                    <p>Images:</p>
                    <div class="row">
                        @foreach ($posts->images as $img)
                            <div class="col-xl-3">
                                <div style="margin: 10px; border:3px solid red">
                                    <form action="{{route('gallery.deleteimage', $img->id)}}" method="post" >
                                        <button class="btn btn-primary btn-sm text-center" style="border-radius:0;position: absolute;"><i class="flaticon-381-trash-1"></i></button>
                                        @csrf
                                        @method('delete')
                                    </form>
                                    <img class="img-fluid" src="{{asset('public/images/gallery')}}/img/{{ $img->image}}" style="width:100%; height:80%;object-fit: cover;" alt="">
                                    <a href="{{route('gallery.download', $img ->id)}}" class="btn btn-secondary btn-sm text-center" style="border-radius:0; width:100%">Download</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                     @endif


                </div>
            </div>
        </div>
    </div>
</x-app-layout>