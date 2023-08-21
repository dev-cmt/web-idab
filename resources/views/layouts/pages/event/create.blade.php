<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Create New Event</h4>
                    <a href="{{route('event.index')}}" class="btn btn-sm btn-primary"><i class="fa fa-reply"></i><span class="btn-icon-add"></span>Back</a>
                </div>
                <div class="card-body">
                    <div class="form-validation">
                        @if (session()->has('success'))
                            <strong class="text-success">{{session()->get('success')}}</strong>
                        @endif
                        <form class="form-valide" action="{{route('event.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Self fee
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="number" class="form-control @error('self') is-invalid @enderror" name="self" placeholder="" value="{{old('self')}}">                                     
                                            @error('self')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Spouse Fee </label>
                                        <div class="col-lg-6">
                                            <input type="number" class="form-control @error('price') is-invalid @enderror" name="spouse" placeholder="" value="{{old('spouse')}}">                                     
                                            @error('spouse')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Child (Above 12 Year)</label>
                                        <div class="col-lg-6">
                                            <input type="number" class="form-control @error('child_above') is-invalid @enderror" name="child_above" placeholder="" value="{{old('child_above')}}">                                     
                                            @error('child')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Child (Bellow 12 Year)</label>
                                        <div class="col-lg-6">
                                            <input type="number" class="form-control @error('child_bellow') is-invalid @enderror" name="child_bellow" placeholder="" value="{{old('child_bellow')}}">                                     
                                            @error('child')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Guest Fee</label>
                                        <div class="col-lg-6">
                                            <input type="number" class="form-control @error('guest') is-invalid @enderror" name="guest" placeholder="" value="{{old('guest')}}">                                     
                                            @error('guest')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Driver Fee</label>
                                        <div class="col-lg-6">
                                            <input type="number" class="form-control @error('driver') is-invalid @enderror" name="driver" placeholder="" value="{{old('driver')}}">                                     
                                            @error('driver')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Status</label>
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
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-name">Title
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" id="val-title" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="" value="{{old('title')}}">                                     
                                            @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Caption</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control @error('caption') is-invalid @enderror" name="caption" placeholder="" value="{{old('caption')}}">                                     
                                            @error('caption')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Image
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" placeholder="" value="{{old('image')}}">
                                            @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Event Date</label>
                                        <div class="col-lg-6">
                                            <input type="date" class="form-control @error('event_date') is-invalid @enderror" name="event_date" placeholder="" value="{{old('event_date')}}">                                     
                                            @error('event_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Location</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control @error('location') is-invalid @enderror" name="location" placeholder="" value="{{old('location')}}">                                     
                                            @error('location')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Description</label>
                                        <div class="col-lg-6">
                                            <textarea class="form-control @error('description') is-invalid @enderror" id="val-suggestions" name="description" rows="2" placeholder="What would you like to see?">{{old('description')}}</textarea>                                  
                                            @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-8 ml-auto">
                                            <button type="submit" class="btn btn-sm btn-primary">Submit</button>
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
</x-app-layout>
    