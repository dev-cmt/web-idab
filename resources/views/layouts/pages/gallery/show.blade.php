<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Show Gallery</h4>
                    <a href="{{ url()->previous() }}" class="btn btn-sm btn-primary"><i class="fa fa-reply"></i><span class="btn-icon-add"></span>Back</a>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-xl-4">
                            <div style="margin: 10px; border:3px solid red">
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