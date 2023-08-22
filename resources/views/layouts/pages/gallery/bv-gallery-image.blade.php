<x-app-layout>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{$posts->title}}</h4>
                </div>
                <div class="card-body pb-1">
                    <div id="lightgallery" class="row">
                        @if (count($posts->images)>0)
                        @foreach ($posts->images as $img)
                        <a href="{{asset('public/images')}}/gallery/img/{{ $img->image}}" data-exthumbimage="{{asset('public/images')}}/gallery/img/{{ $img->image}}" data-src="images/big/img1.jpg" class="col-lg-4 col-md-6 mb-4">
                            <img src="{{asset('public/images')}}/gallery/img/{{ $img->image}}" alt="" style="width:100%;">
                        </a>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <!-- /# card -->
        </div>
    </div>
</x-app-layout>