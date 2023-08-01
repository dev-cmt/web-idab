<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Committee Member</h4>
                    @can('User access')
                        <a href="{{route('committee.index')}}" class="btn btn-sm btn-primary"><i class="fa fa-reply"></i><span class="btn-icon-add"></span>Back</a>
                    @endcan
                </div>
                <div class="card-body d-flex justify-content-center">
                    <form action="{{ route('committee.update', $user->id) }}" method="POST" enctype="multipart/form-data" class="col-12">
                        @csrf
                        @method('PUT')
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Full Name</label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" placeholder="Enter your full name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" placeholder="Type your email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Batch</label>
                                <input type="text" name="batch" id="batch" class="form-control @error('batch') is-invalid @enderror" value="{{ old('batch', $user->batch) }}" placeholder="Your batch number">
                                @error('batch')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Contact Number</label>
                                <input type="text" name="contact_number" id="contact_number" class="form-control @error('contact_number') is-invalid @enderror" value="{{ old('contact_number', $user->contact_number) }}" placeholder="Type your number">
                                @error('contact_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {{-- <div class="form-group">
                                <div class="role-management-checkbox">
                                    <input class="form-check-input" type="checkbox" name="cm_advisor" value="1">
                                    <label class="form-check-label">Advisor</label>
                                </div>
                                <div class="role-management-checkbox">
                                    <input class="form-check-input" type="checkbox" name="cm_ecommittee" value="1">
                                    <label class="form-check-label">Executive committee</label>
                                </div>
                                <div class="role-management-checkbox">
                                    <input class="form-check-input" type="checkbox" name="cm_welfare" value="1">
                                    <label class="form-check-label">Welfare</label>
                                </div>
                            </div> --}}
                            <div class="form-group">
                                @foreach ($committees as $committee)
                                    <div>
                                        <label>
                                            <input type="text" name="user_id" value="{{$user->id}}">
                                            <input type="checkbox" name="committees[]" value="{{ $committee->id }}" {{ $user->committees->contains($committee->id) ? 'checked' : '' }}>
                                            {{ $committee->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="1" name="status" @if($user->status) checked @endif>
                                            <label class="form-check-label">Active</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="0" name="status" @if(!$user->status) checked @endif>
                                            <label class="form-check-label">Inactive</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary ">Update</button>
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