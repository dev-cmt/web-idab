<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Lose Member</h4>
                    @can('User access')
                        <a href="{{route('lose_member.index')}}" class="btn btn-sm btn-primary"><i class="fa fa-reply"></i><span class="btn-icon-add"></span>Back</a>
                    @endcan
                </div>
                <div class="card-body d-flex justify-content-center">
                    <form action="{{ route('lose_member.update', $data->id) }}" method="POST" enctype="multipart/form-data" class="col-12">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-name">Name
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" id="val-name" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Enter name.." value="{{$data->name}}">                                     
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Location</label>
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
                                    <label class="col-lg-4 col-form-label">Description</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Enter description.." value="{{$data->description}}">                                     
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
                                    <label class="col-lg-4 col-form-label">Batch
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="number" class="form-control @error('batch') is-invalid @enderror" name="batch" placeholder="Enter batch.." value="{{$data->batch}}">                                     
                                        @error('batch')
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
                                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" value="{{$data->image}}">
                                        @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <button type="submit" class="btn btn-sm btn-primary">Update</button>
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