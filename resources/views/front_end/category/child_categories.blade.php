 @foreach ($category as $subCategory)
    {{-- <ul class="mr-1">
         <li class=""> --}}
    <li class="mr-2 my-1">
        <a class="" href="{{ route('category', ['slug' => $subCategory->slug]) }}">{{ $subCategory->title_persian }}</a>
        <ul class="">
            @if ($subCategory->children != null)
                @include('front_end.category.child_categories', ['category' => $subCategory->children])
            @endif
        </ul>
    </li>
    {{-- </li> --}}

         {{--
        @if ($subCategory->children != null)
        @include('front_end.category.child_categories', ['category' => $subCategory->children])
        @endif
         --}}


    {{-- {{ $subCategory->children()->count() > 0 ? 'sublist--title' : 'sublist--item' }} --}}
@endforeach


