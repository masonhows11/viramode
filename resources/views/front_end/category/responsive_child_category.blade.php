@foreach( $category as $child )
        <li class="">
            <a class="font-12 child-category link-dark d-inline text-decoration-none" href="{{ route('category',['slug' => $child->slug]) }}">{{ $child->title_persian }}</a>
            <ul>
            @if( $child->children != null  )
                @include('front_end.category.responsive_child_category',['category' => $child->children])
            @endif
            </ul>
        </li>
        {{-- {{ $child->children()->count() > 0 ? 'sub-menu' : '' }}  --}}
@endforeach

