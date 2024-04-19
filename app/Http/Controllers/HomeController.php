<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductColor;
use App\Services\ServiceTest\FuelControl;
use App\Services\ServiceTest\FuelType;
use Illuminate\Http\Request;

// use App\Services\ServiceTest\ServiceTest;
// use App\Services\ServiceTest\FuelConsumption;


class HomeController extends Controller
{
    //
    public function home()
    {
        return view('welcome');
    }

    //// one way inject service
    //    public function serviceTest()
    //    {
    //        //  $serviceTest = new ServiceTest();
    //        //  $serviceTest = resolve(ServiceTest::class);
    //        // dd($serviceTest->Add(5));
    //    }

    //// another way inject service
    //    public function serviceTest(ServiceTest $serviceTest)
    //    {
    //        dd($serviceTest->Add(5));
    //    }

    //// inject service with construct argument
    //    public function serviceTest()
    //    {
    //        //  $serviceTest = resolve(ServiceTest::class);
    //        $serviceTest = new ServiceTest('minus');
    //        dd($serviceTest->Add(5));
    //    }

    //// example
    //// inject service with construct argument
    //// in this inject dependency we can not set constructor
    //// argument , the resolve is service provider / container
    /// if defined this ServiceTest  class in app service provider
    /// any where in this app , when we use this class
    /// the app return an instance from this class (ServiceTest)

    //    public function serviceTest(ServiceTest $serviceTest)
    //    {
    //        dd($serviceTest->Add(5));
    //    }

    //// example
    //// inject service with construct argument
    //// in this inject dependency we can not set constructor
    //// argument , the resolve is service provider / container
    /// if defined this ServiceTest  class in app service provider
    /// any where in this app , when we use this class
    /// the app return an instance from this class (ServiceTest)
    //    public function serviceTest(FuelConsumption $fuelConsumption,FuelType $fuelType)
    //    {
    //        $fuelType = $fuelType->premium();
    //        dd($fuelType,$fuelConsumption->refueling(5));
    //    }

    //// example with interface
    //// because service providers originally work with interfaces class
    //// base below defined
    /// when FuelControl::class call , make an instance FuelConsumption::class
    //// we should call  FuelControl interface

    //    public function serviceTest(FuelControl $fuelControl, FuelType $fuelType)
    //    {
    //        $fuelType = $fuelType->premium();
    //        dd($fuelType, $fuelControl->refueling(5));
    //    }


    public function products(Request $request)
    {
        dd('hi');
        //// get all brands
        $brands = Brand::select('id', 'title_persian')->get();
        $colors = Color::all();

        $prices = collect(Product::select('origin_price')->get());
        $max_price = $prices->max(['origin_price']);
        $min_price = $prices->min(['origin_price']);

        //// switch for sort
        /// filter by sort
        switch ($request->sort) {
            case "1":
                $column = "created_at";
                $direction = "DESC";
                break;
            case "2":
                $column = "origin_price";
                $direction = "ASC";
                break;
            case "3":
                $column = "origin_price";
                $direction = "DESC";
                break;
            case "4":
                $column = "views";
                $direction = "DESC";
                break;
            case "5":
                $column = "sold_number";
                $direction = "DESC";
                break;
            default:
                $column = "created_at";
                $direction = "asc";
                break;
        }

        if ($request->search) {
            $query = Product::where('title_english', 'LIKE', "%" . $request->search . "%")
                ->orWhere('title_persian', 'LIKE', "%" . $request->search . "%")
                ->orderBy($column, $direction);
        } else {
            $query = Product::orderBy($column, $direction);
        }

        //// filter by price
        $products = $request->min_price && $request->max_price ?
            $query->whereBetween('origin_price', [$request->min_price, $request->max_price]) :

            $query->when($request->min_price, function ($query) use ($request) {
                $query->where('origin_price', '>=', $request->min_price)->get();
            })->when($request->max_price, function ($query) use ($request) {
                $query->where('origin_price', '<=', $request->max_price)->get();
            })->when(!($request->min_price && $request->max_price), function ($query) {
                $query->get();
            });

        //// filter by brand
        $products = $products->when($request->brands, function () use ($request, $products) {
            $products->whereIn('brand_id', $request->brands);
        });

        //// filter by colors
        $products = $request->colors ? Product::whereIn('id', ProductColor::whereIn('color_id', $request->colors)->select('product_id')->get()->toArray()) : $products;
        $products = $products->paginate(3);
        $products->appends($request->query());

        //// get selected brands
        $selectedBrandsArray = [];
        if ($request->brands) {
            $selectedBrands = Brand::find($request->brands);
            foreach ($selectedBrands as $item) {
                array_push($selectedBrandsArray, $item->title_persian);
            }
        }

        $categories = Category::tree()->get()->toTree();

        return view('front_end.product.search_products')
            ->with(['products' => $products, 'brands' => $brands,
                'max_price' => $max_price, 'min_price' => $min_price,
                'selected_brands' => $selectedBrandsArray,
                'categories' => $categories,
                'colors' => $colors]);
    }

    public function searchCategory(Request $request)
    {
        dd('hi');
        $category_slug = $request->slug;
        $brands = Brand::select('id', 'title_persian')->get();
        $colors = Color::select('id', 'title_persian', 'code')->get();
        $categories = Category::where('status', 1)->tree()->get()->toTree();
        $prices = collect(Product::select('origin_price')->get());
        $max_price = $prices->max(['origin_price']);
        $min_price = $prices->min(['origin_price']);


        ////  switch case execute anyway
        //// filter sort
        switch ($request->sort) {

            case "1":
                $column = "created_at";
                $direction = "DESC";
                break;
            case "2":
                $column = "origin_price";
                $direction = "asc";
                break;
            case "3":
                $column = "origin_price";
                $direction = "desc";
                break;
            case "4":
                $column = "views";
                $direction = "desc";
                break;
            case "5":
                $column = "number_sold";
                $direction = "desc";
                break;
            default:
                $column = "created_at";
                $direction = "asc";
                break;
        }

        //// get products by category by eager loading
        // $products = Category::with('products.colors')->where('slug',$category_slug)->orderBy($column,$direction);

        /// get products by category by eloquent query
        $category = Category::where('slug', $category_slug)->select('id')->first();
        $products = $category->products()
            ->select('products.id', 'products.title_persian', 'thumbnail_image', 'products.created_at')->orderBy($column, $direction);

        //// request min_price max_price
        //// filter by price
        $query = $products;
        $products = $request->min_price && $request->max_price ?

            $query->whereBetween('origin_price', [$request->min_price, $request->max_price]) :

            $query->when($request->min_price, function ($query) use ($request) {
                $query->where('origin_price', '>=', $request->min_price)->get();
            })->when($request->max_price, function ($query) use ($request) {
                $query->where('origin_price', '<=', $request->max_price)->get();
            })->when(!($request->min_price && $request->max_price), function ($query) {
                $query->get();
            });


        //// request brands
        //// filter by brand
        $products = $products->when($request->brands, function () use ($request, $products) {
            $products->whereIn('brand_id', $request->brands);
        });

        //// request colors
        //// filter by colors
        $products = $request->colors ?
            Product::whereIn('id', ProductColor::whereIn('color_id', $request->colors)->select('product_id')->get()->toArray()) : $products;


        //// final product  result
        $products = $products->paginate(3);
        // dd($products);
        $products->appends($request->query());

        //// get selected brands
        $selectedBrandsArray = [];
        if ($request->brands) {
            $selectedBrands = Brand::find($request->brands);
            foreach ($selectedBrands as $item) {
                array_push($selectedBrandsArray, $item->title_persian);
            }
        }
        return view('front_end.product.category_products')
            ->with(['products' => $products,
                'brands' => $brands,
                'max_price' => $max_price,
                'min_price' => $min_price,
                'selected_brands' => $selectedBrandsArray,
                'categories' => $categories,
                'colors' => $colors]);
    }
}
