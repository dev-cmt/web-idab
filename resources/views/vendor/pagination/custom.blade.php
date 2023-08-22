<nav>
    <ul class="pagination pagination-gutter">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item page-indicator disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <a class="page-link" href="javascript:void(0)"><i class="bi bi-chevron-double-left"></i></a>
            </li>
        @else
            <li class="page-item page-indicator"> 
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"><i class="bi bi-chevron-double-left"></i></a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active" aria-current="page"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item page-indicator">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"><i class="bi bi-chevron-double-right"></i></a>
            </li>
        @else
            <li class="page-item page-indicator disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <a class="page-link" href="javascript:void(0)"><i class="bi bi-chevron-double-right"></i></a>
            </li>
        @endif


        {{-- <li class="page-item page-indicator">
            <a class="page-link" href="javascript:void(0)"><i class="la la-angle-left"></i></a>
        </li> --}}
        {{-- <li class="page-item active"><a class="page-link" href="javascript:void(0)">1</a></li> --}}
        {{-- <li class="page-item"><a class="page-link" href="javascript:void(0)">2</a></li>
        <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
        <li class="page-item"><a class="page-link" href="javascript:void(0)">4</a></li> --}}
        {{-- <li class="page-item page-indicator">
            <a class="page-link" href="javascript:void(0)"><i class="la la-angle-right"></i></a>
        </li> --}}
    </ul>
</nav>





