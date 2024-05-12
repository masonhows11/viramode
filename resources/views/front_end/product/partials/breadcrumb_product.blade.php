<div class="title-breadcrumb-special dt-sl mb-3">
    <div class="breadcrumb dt-sl">
        <nav>
            <a href="{{ route('home') }}" class="pt-1">{{ __('messages.home') }}</a>
            @if( !empty($productCategories) )
                @foreach( $productCategories as $category)
                    <a href="{{ route('category',['slug' => $category->slug]) }}" class="pt-1">{{ $category->title_persian }}</a>
                @endforeach
            @endif
            <a href="#" class="pt-1">{{ $product->title_persian }}</a>
        </nav>
    </div>
</div>


