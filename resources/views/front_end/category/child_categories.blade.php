@foreach( $category as $subCategory )
    <ul class="mr-1">
        <li class="{{ $subCategory->children()->count() > 0 ? 'sublist--title' : 'sublist--item' }}">
            <a href="{{ route('category',['slug' => $subCategory->slug ]) }}">{{ $subCategory->title_persian }}</a>
        </li>
        @if( $subCategory->children != null  )
            @include('front_end.category.child_categories',['category' => $subCategory->children ])
        @endif
    </ul>
@endforeach





