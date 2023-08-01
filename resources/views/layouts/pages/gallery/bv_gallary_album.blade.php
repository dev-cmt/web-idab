<x-app-layout>
    <div class="row">
        @foreach ($posts as $key=> $row )
        <div class="col-xl-4 col-lg-6 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="new-arrival-product">
                        <div class="new-arrivals-img-contnent">
                            <a href="{{route('layouts.gallery_show', $row ->id)}}"><img class="img-fluid" src="{{asset('public')}}/cover/{{ $row->cover }}" alt=""></a>
                        </div>
                        <div class="new-arrival-content mt-2">
                            <h4>{{$row->title}}</h4>
                            <p class="text-uppercase description_2 mb-2">{{$row->description}}</p>
                            <div class="d-flex justify-content-between">
                                <label class="text-primary">Event Date:</label><span>{{$row->date}}</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <label class="text-primary">Published Date:</label><span>{{$row->created_at->format('Y-m-d')}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</x-app-layout>
