@if ($paginator->hasPages())
        <div class="pagination d-flex justify-content-center">

            @if ($paginator->onFirstPage())
                    <a class="disabled" style="pointer-events:none" role="button" aria-disabled="true" href="javascript:void(0)" tabindex="-1">
                        <i  class="mdi mdi-chevron-double-right"></i>
                    </a>
            @else
                    <a class="" href="{{ $paginator->previousPageUrl() }}"><i  class="mdi mdi-chevron-double-right"></i></a>
            @endif

            @foreach ($elements as $element)
                @if (is_string($element))
                    <a class="disabled">{{ $element }}</a>
                @endif
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                                <a class="active-page">{{ $page }}</a>
                        @else
                            <a class="" href="{{ $url }}">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                    <a class="" href="{{ $paginator->nextPageUrl() }}" rel="next"><i class="mdi mdi-chevron-double-left"></i></a>
            @else
                    <a class="disabled" style="pointer-events:none" role="button" aria-disabled="true" href="javascript:void(0)"><i class="mdi mdi-chevron-double-left"></i></a>
            @endif

        </div>
@endif
