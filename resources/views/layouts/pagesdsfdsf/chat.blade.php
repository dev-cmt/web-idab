<x-app-layout>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Baby Joies</h4>
                </div>
                <div class="card-body">
                    <div id="DZ_W_Todo3" class="widget-media dz-scroll height370 ps ps--active-y">
                        <ul class="timeline">
                            @foreach ($message as $row)
                            <li>
                                <div class="timeline-panel">
                                    <div class="media mr-2">
                                        <img alt="image" width="50" src="{{asset('public')}}/profile/{{$row->image}}">
                                    </div>
                                    <div class="media-body">
                                        <h5 class="mb-1">{{$row->name}} <small class="text-muted">{{date("j F Y", strtotime($row->created_at))}}</small></h5>
                                        <p class="mb-1">{{$row->description}}</p>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 370px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 190px;"></div></div></div>
                
                    @if (session()->has('success'))
                        <strong class="text-success">{{session()->get('success')}}</strong>
                    @endif
                    <form action="{{route('admin_reply.contact',$to_id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3">
                            <div class="col-9">
                                <textarea class="form-control border-0 bg-light px-4 py-3 @error('description') is-invalid @enderror" name="description" value="{{old('description')}}" rows="4" placeholder="Message"></textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-3">
                                <button class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>