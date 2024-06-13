<?php

namespace App\Http\Controllers\Front\Product;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use App\Models\Compare;
// use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    //
    public function show(Product $product)
    {

        $product_id = $product->id;

        // get related product on tag
        $relatedProducts = Product::with('tags')->whereHas('tags', function ($q) use ($product) {
            $q->whereIn('tag_id', $product->tags()->select('tag_id'));
        })->where('status', 1)
            ->where('available_in_stock', '>', 0)
            ->select(['id', 'title_persian', 'origin_price', 'thumbnail_image', 'slug'])
            ->take(4)->get()->except($product->id);
        // get images
        $images = ProductImage::where('product_id', $product_id)->where('is_active', 1)->get();

        // implement category
        $productCategories = $product->categories()->get(['title_persian','slug']);
        $categories = $productCategories->implode('title_persian', ' - ');

        // increase view product
        $product->increment('views',1);


        return view('front_end.product.product')
            ->with([
                'product' => $product,
                'categories' => $categories,
                'product_id' => $product_id,
                'images' => $images,
                'relatedProducts' => $relatedProducts,
                'productCategories' => $productCategories
            ]);
    }

    public function products(Request $request)
    {

        if ($request->search)
        {
            $products = Product::where('title_english', 'LIKE','%'.$request->search.'%')
                ->orWhere('title_persian', 'LIKE','%'.$request->search.'%'  )
                ->orderBy('created_at', 'DESC')
                ->paginate(50);
        } else {
            $products = Product::paginate(50);
        }

        return view('front_end.products.search_products', ['products' => $products]);
    }

    public function searchCategory(Request $request)
    {

        $category_slug = $request->slug;
        $category = Category::where('slug', $category_slug)->select('id')->first();
        $products = $category->products()
            ->select('products.id', 'products.title_persian', 'thumbnail_image', 'products.created_at')
            ->orderBy('created_at', 'DESC')
            ->paginate(50);

        // dd($products);

        return view('front_end.products.category_products', ['products' => $products,]);
    }



    // public function products(Request $request)
    // {
    //     dd('hi');
    //     //// get all brands
    //     $brands = Brand::select('id', 'title_persian')->get();
    //     $colors = Color::all();

    //     $prices = collect(Product::select('origin_price')->get());
    //     $max_price = $prices->max(['origin_price']);
    //     $min_price = $prices->min(['origin_price']);

    //     //// switch for sort
    //     /// filter by sort
    //     switch ($request->sort) {
    //         case "1":
    //             $column = "created_at";
    //             $direction = "DESC";
    //             break;
    //         case "2":
    //             $column = "origin_price";
    //             $direction = "ASC";
    //             break;
    //         case "3":
    //             $column = "origin_price";
    //             $direction = "DESC";
    //             break;
    //         case "4":
    //             $column = "views";
    //             $direction = "DESC";
    //             break;
    //         case "5":
    //             $column = "sold_number";
    //             $direction = "DESC";
    //             break;
    //         default:
    //             $column = "created_at";
    //             $direction = "asc";
    //             break;
    //     }

    //     if ($request->search) {
    //         $query = Product::where('title_english', 'LIKE', "%" . $request->search . "%")
    //             ->orWhere('title_persian', 'LIKE', "%" . $request->search . "%")
    //             ->orderBy($column, $direction);
    //     } else {
    //         $query = Product::orderBy($column, $direction);
    //     }

    //     //// filter by price
    //     $products = $request->min_price && $request->max_price ?
    //         $query->whereBetween('origin_price', [$request->min_price, $request->max_price]) :

    //         $query->when($request->min_price, function ($query) use ($request) {
    //             $query->where('origin_price', '>=', $request->min_price)->get();
    //         })->when($request->max_price, function ($query) use ($request) {
    //             $query->where('origin_price', '<=', $request->max_price)->get();
    //         })->when(!($request->min_price && $request->max_price), function ($query) {
    //             $query->get();
    //         });

    //     //// filter by brand
    //     $products = $products->when($request->brands, function () use ($request, $products) {
    //         $products->whereIn('brand_id', $request->brands);
    //     });

    //     //// filter by colors
    //     $products = $request->colors ? Product::whereIn('id', ProductColor::whereIn('color_id', $request->colors)->select('product_id')->get()->toArray()) : $products;
    //     $products = $products->paginate(3);
    //     $products->appends($request->query());

    //     //// get selected brands
    //     $selectedBrandsArray = [];
    //     if ($request->brands) {
    //         $selectedBrands = Brand::find($request->brands);
    //         foreach ($selectedBrands as $item) {
    //             array_push($selectedBrandsArray, $item->title_persian);
    //         }
    //     }

    //     $categories = Category::tree()->get()->toTree();

    //     return view('front_end.products.search_products')
    //         ->with(['products' => $products, 'brands' => $brands,
    //             'max_price' => $max_price, 'min_price' => $min_price,
    //             'selected_brands' => $selectedBrandsArray,
    //             'categories' => $categories,
    //             'colors' => $colors]);
    // }

    // public function searchCategory(Request $request)
    // {
    //     // dd('hi');

    //     $category_slug = $request->slug;
    //     $brands = Brand::select('id', 'title_persian')->get();
    //     $colors = Color::select('id','title_persian','code')->get();
    //     $categories = Category::where('status',1)->tree()->get()->toTree();
    //     $prices = collect(Product::select('origin_price')->get());
    //     $max_price = $prices->max(['origin_price']);
    //     $min_price = $prices->min(['origin_price']);


    //     ////  switch case execute anyway
    //     //// filter sort
    //     switch ($request->sort) {

    //         case "1":
    //             $column = "created_at";
    //             $direction = "DESC";
    //             break;
    //         case "2":
    //             $column = "origin_price";
    //             $direction = "asc";
    //             break;
    //         case "3":
    //             $column = "origin_price";
    //             $direction = "desc";
    //             break;
    //         case "4":
    //             $column = "views";
    //             $direction = "desc";
    //             break;
    //         case "5":
    //             $column = "number_sold";
    //             $direction = "desc";
    //             break;
    //         default:
    //             $column = "created_at";
    //             $direction = "asc";
    //             break;
    //     }

    //     //// get products by category by eager loading
    //     // $products = Category::with('products.colors')->where('slug',$category_slug)->orderBy($column,$direction);

    //     /// get products by category by eloquent query
    //     $category = Category::where('slug', $category_slug)->select('id')->first();
    //     $products = $category->products()
    //         ->select('products.id','products.title_persian','thumbnail_image','products.created_at')->orderBy($column, $direction);

    //     //// request min_price max_price
    //     //// filter by price
    //     $query = $products;
    //     $products = $request->min_price && $request->max_price ?

    //         $query->whereBetween('origin_price', [$request->min_price, $request->max_price]) :

    //         $query->when($request->min_price, function ($query) use ($request) {
    //             $query->where('origin_price', '>=', $request->min_price)->get();
    //         })->when($request->max_price, function ($query) use ($request) {
    //             $query->where('origin_price', '<=', $request->max_price)->get();
    //         })->when(!($request->min_price && $request->max_price), function ($query) {
    //             $query->get();
    //         });


    //     //// request brands
    //     //// filter by brand
    //     $products = $products->when($request->brands, function () use ($request, $products) {
    //         $products->whereIn('brand_id', $request->brands);
    //     });

    //     //// request colors
    //     //// filter by colors
    //     $products = $request->colors ?
    //         Product::whereIn('id',ProductColor::whereIn('color_id',$request->colors)->select('product_id')->get()->toArray())  : $products;



    //     //// final product  result
    //     $products = $products->paginate(3);
    //     // dd($products);
    //     $products->appends($request->query());

    //     //// get selected brands
    //     $selectedBrandsArray = [];
    //     if ($request->brands) {
    //         $selectedBrands = Brand::find($request->brands);
    //         foreach ($selectedBrands as $item) {
    //             array_push($selectedBrandsArray, $item->title_persian);
    //         }
    //     }

    //     return view('front_end.products.category_products')
    //         ->with(['products' => $products,
    //             'brands' => $brands,
    //             'colors' => $colors,
    //             'max_price' => $max_price,
    //             'min_price' => $min_price,
    //             'selected_brands' => $selectedBrandsArray,
    //             'categories' => $categories]);
    // }

    // public function addToFavoriteProducts(Request $request)
    // {

    //     $product = Product::findOrFail($request->product);
    //     if (Auth::check()) {
    //         $product->user()->toggle([Auth::id()]);
    //         if ($product->user->contains(Auth::id())) {
    //             return response()->json(['status' => 1], 200);
    //         } else {
    //             return response()->json(['status' => 2], 200);
    //         }
    //     } else {
    //         return response()->json(['status' => 3], 200);
    //     }
    // }

    // public function addToCompareProducts(Request $request)
    // {

    //     $product = Product::findOrFail($request->product);
    //     if (Auth::check()) {
    //         $user = Auth::user();
    //         if($user->compare()->count() > 0){
    //             $userCompareList  = $user->compare;
    //         }else{
    //             $userCompareList = Compare::create(['user_id' => $user->id]);
    //         }
    //         $product->compares()->toggle([$userCompareList->id]);
    //         if ($product->compares->contains($userCompareList->id)) {
    //             return response()->json(['status' => 1], 200);
    //         } else {
    //             return response()->json(['status' => 2], 200);
    //         }
    //     } else {
    //         return response()->json(['status' => 3], 200);
    //     }
    // }


}
