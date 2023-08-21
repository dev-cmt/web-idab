<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Event</h4>
                    @can('User access')
                        <a href="{{route('event.index')}}" class="btn btn-sm btn-primary"><i class="fa fa-reply"></i><span class="btn-icon-add"></span>Back</a>
                    @endcan
                </div>
                <div class="card-body d-flex justify-content-center">
                    <form action="{{ route('event.update', $data->id) }}" method="POST" enctype="multipart/form-data" class="col-12">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-6 col-form-label">Self fee
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="number" class="form-control @error('self') is-invalid @enderror" name="self" placeholder="Enter self fee.." value="{{$data->self}}">                                     
                                        @error('self')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-6 col-form-label">Spouse Fee</label>
                                    <div class="col-lg-6">
                                        <input type="number" class="form-control @error('price') is-invalid @enderror" name="spouse" placeholder="Enter spouse fee.." value="{{$data->spouse}}">                                     
                                        @error('spouse')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-6 col-form-label">Child (Above 12 Year)</label>
                                    <div class="col-lg-6">
                                        <input type="number" class="form-control @error('child_above') is-invalid @enderror" name="child_above" placeholder="Child Fee (Above 12 Year).." value="{{$data->child_above}}">                                     
                                        @error('child')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-6 col-form-label">Child (Bellow 12 Year)</label>
                                    <div class="col-lg-6">
                                        <input type="number" class="form-control @error('child_bellow') is-invalid @enderror" name="child_bellow" placeholder="Child Fee (Bellow 12 Year)" value="{{$data->child_bellow}}">                                     
                                        @error('child')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-6 col-form-label">Guest Fee</label>
                                    <div class="col-lg-6">
                                        <input type="number" class="form-control @error('guest') is-invalid @enderror" name="guest" placeholder="Enter guest fee.." value="{{$data->guest}}">                                     
                                        @error('guest')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-6 col-form-label">Driver Fee</label>
                                    <div class="col-lg-6">
                                        <input type="number" class="form-control @error('driver') is-invalid @enderror" name="driver" placeholder="Enter driver fee.." value="{{$data->driver}}">                                     
                                        @error('driver')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-6 col-form-label">Status</label>
                                    <div class="col-sm-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="1" name="status" {{$data->status == '1' ? 'checked':''}}>
                                            <label class="form-check-label">Active</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="0" name="status"  {{$data->status == '0' ? 'checked':''}}>
                                            <label class="form-check-label">Inactive</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-6 col-form-label" for="val-name">Title
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" id="val-title" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Enter name.." value="{{$data->title}}">                                     
                                        @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-6 col-form-label">Caption</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control @error('caption') is-invalid @enderror" name="caption" placeholder="Enter caption.." value="{{$data->caption}}">                                     
                                        @error('caption')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-6 col-form-label">Image
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" placeholder="Enter image .." value="{{$data->image}}">
                                        @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-6 col-form-label">Event Date</label>
                                    <div class="col-lg-6">
                                        <input type="date" class="form-control @error('event_date') is-invalid @enderror" name="event_date" placeholder="Enter event date.." value="{{$data->event_date}}">                                     
                                        @error('event_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-lg-6 col-form-label">Location</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control @error('location') is-invalid @enderror" name="location" placeholder="Enter location.." value="{{$data->location}}">                                     
                                        @error('location')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-6 col-form-label">Description</label>
                                    <div class="col-lg-6">
                                        <textarea class="form-control @error('description') is-invalid @enderror" id="val-suggestions" name="description" rows="2" placeholder="What would you like to see?">{{$data->description}}</textarea>                                  
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
</x-app-layout>
