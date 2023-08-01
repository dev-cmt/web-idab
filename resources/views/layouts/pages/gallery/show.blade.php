<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Veiw Gallery</h4>
                    <a href="{{ url()->previous() }}" class="btn btn-sm btn-primary"><i class="fa fa-reply"></i><span class="btn-icon-add"></span>Back</a>
                </div>

                <div class="card-body">
                    @if (count($posts->images)>0)
                    <div class="row">
                        @foreach ($posts->images as $img)
                            <div class="col-xl-3">
                                <form action="{{route('gallery.deleteimage',$img->id)}}" method="post">
                                    <button class="btn text-danger">X</button>
                                    @csrf
                                    @method('delete')
                                </form>
                                <img class="img-fluid" src="{{asset('public/images/gallery')}}/img/{{ $img->image}}" style="width:100%; height:150px" alt="">
                                <a href="{{route('gallery.download', $img ->id)}}" class="btn btn-primary btn-sm d-flex justify-content-center" style="border-radius:0;">Download</a>
                            </div>
                        @endforeach
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>