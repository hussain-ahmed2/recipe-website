@if ($paginator->hasPages())
    <nav class="flex items-center justify-between mx-auto max-w-7xl p-6">
        <div class="flex justify-between flex-1 md:hidden">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <span class="mobile-page-link-disabled">@lang('pagination.previous')</span>
            @else
                <a class="mobile-page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a class="mobile-page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a>
            @else
                <span class="mobile-page-link-disabled">@lang('pagination.next')</span>
            @endif
        </div>

        <div class="max-md:hidden flex-1 flex items-center justify-between">
            <div>
                <p class="text-sm text-neutral-600">
                    {!! __('Showing') !!}
                    <span class="font-semibold">{{ $paginator->firstItem() }}</span>
                    {!! __('to') !!}
                    <span class="font-semibold">{{ $paginator->lastItem() }}</span>
                    {!! __('of') !!}
                    <span class="font-semibold">{{ $paginator->total() }}</span>
                    {!! __('results') !!}
                </p>
            </div>

            <div class="flex flex-wrap space-x-0.5">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <span class="page-link-disabled" aria-hidden="true">&lsaquo;</span>
                @else
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev"
                        aria-label="@lang('pagination.previous')">&lsaquo;</a>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <span class="px-2">{{ $element }}</span>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <span class="page-link-active">{{ $page }}</span>
                            @else
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next"
                        aria-label="@lang('pagination.next')">&rsaquo;</a>
                @else
                    <span class="page-link-disabled" aria-hidden="true">&rsaquo;</span>
                @endif
            </div>
        </div>
    </nav>
@endif
