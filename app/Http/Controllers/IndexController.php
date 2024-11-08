<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Specie;
use App\Models\Country;
use App\Models\Detail;
use App\Models\Episode;
use DB;

class IndexController extends Controller
{
    public function home() {
        $detail_hot= Detail::where('detail_hot',1)->where('status',1)->orderBy('ngaycapnhat','DESC')->get();
        $category = Category::orderBy('id', 'DESC')->where('status',1)->get();
        $specie = Specie::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $category_home=Category::with('detail')-> orderBy('id', 'DESC')->where('status',1)->get();
        return view('pages.home',compact('category', 'specie', 'country','category_home','detail_hot'));
    }
    public function category($slug) {
        $category = Category::orderBy('position', 'ASC')->where('status', 1)->get();
        $specie = Specie::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $cate_slug = Category::where('slug', $slug)->first();
        $detail = Detail::where('category_id', $cate_slug->id)->orderBy('ngaycapnhat','DESC')->paginate(40);
        return view('pages.category', compact('category', 'specie', 'country', 'cate_slug', 'detail'));
    }
    public function year($year) {
        $category = Category::orderBy('position', 'ASC')->where('status', 1)->get();
        $specie = Specie::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $year = $year;
        $detail = Detail::where('year', $year)->orderBy('ngaycapnhat','DESC')->paginate(40);
        return view('pages.year', compact('category', 'specie', 'country', 'year', 'detail'));
    }
    public function specie($slug) {
        $category = Category::orderBy('id', 'DESC')->where('status',1)->get();
        $specie = Specie::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $specie_slug = Specie::where('slug', $slug)->first();
        $detail = Detail::where('specie_id',$specie_slug->id)->orderBy('ngaycapnhat','DESC')->paginate(24);
        return view('pages.specie',compact('category', 'specie', 'country','specie_slug','detail'));
    }
    public function country($slug) {
        $category = Category::orderBy('id', 'DESC')->where('status',1)->get();
        $specie = Specie::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $country_slug = Country::where('slug', $slug)->first();
        $detail = Detail::where('country_id',$country_slug->id)->orderBy('ngaycapnhat','DESC')->paginate(24);
        return view('pages.country',compact('category', 'specie', 'country','country_slug','detail'));
    }
    public function detail($slug){
        $category = Category :: orderBy('position','ASC')->where('status',1)->get();
        $specie = Specie :: orderBy('id','DESC')->get();
        $country = Country :: orderBy('id','DESC')->get();
        $detail = Detail :: with('category','specie','country')-> where('slug',$slug)->where('status',1)->first();

        $related = Detail::with('category', 'specie', 'country')
            ->where('category_id', $detail->category->id)
            ->whereNotIn('slug', [$slug]) // Đảm bảo tên trường không có dấu cách
            ->orderByRaw('RAND()')
            ->get();

        

        return view('pages.detail', compact('category','specie','country','detail','related'));
    }
    public function watch() {
        return view('pages.watch');
    }
    public function episode() {
        return view('pages.episode');
    }
}
