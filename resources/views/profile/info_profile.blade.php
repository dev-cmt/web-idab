
    <form action="{{ route('profile.update', Auth::user()->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Name</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{Auth::user()->name}}" placeholder="">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label>Email</label>
                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{Auth::user()->email}}" placeholder="">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group  col-md-6">
                <label>Batch</label>
                <input type="text" name="batch" id="batch" class="form-control @error('batch') is-invalid @enderror" value="{{Auth::user()->batch}}" placeholder="">
                @error('batch')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label>Contact Number</label>
                <input type="text" name="contact_number" id="contact_number" class="form-control @error('contact_number') is-invalid @enderror" value="{{Auth::user()->contact_number}}" placeholder="">
                @error('contact_number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        {{-- <div class="col-sm-6">
            <div class="form-check">
                <input class="form-check-input" type="hidden" value="1" name="status" @if(Auth::user()->status) checked @endif>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="hidden" value="0" name="status" @if(!Auth::user()->status) checked @endif>
            </div>
        </div> --}}
        <div class="form-group">
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary ">Update</button>
            </div>
        </div>
    </form>