<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detail;
use App\Models\Category;
use App\Models\Specie;
use App\Models\Country;
use Carbon\Carbon;

class DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Detail :: with('category','specie','country')->orderBy('id','DESC')->get();
        return view('admincp.detail.index',compact('list'));
    }
    public function update_year(Request $request){
        $data = $request->all();
        $detail = Detail:: find($data['id_detail']);
        $detail->year =$data['year'];
        $detail->save();
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category :: pluck('title','id');
        $specie = Specie :: pluck('title','id');
        $country = Country :: pluck('title','id');
        $list = Detail :: with('category','specie','country')->orderBy('id','DESC')->get();
       
        return view('admincpcp.detail.form',compact('specie','country','category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $detail = new Detail();
        $detail->title = $data['title'];
        $detail->thoiluong = $data['thoiluong'];
        $detail->resolution = $data['resolution'];
        $detail->phiendich = $data['phiendich'];
        $detail->name_eng = $data['name_eng'];
        $detail->detail_hot = $data['detail_hot'];
        $detail->slug = $data['slug'];
        $detail->description = $data['description'];
        $detail->status = $data['status'];
        $detail->category_id = $data['category_id'];
        $detail->specie_id = $data['specie_id'];
        $detail->country_id = $data['country_id'];
        $detail->ngaytao = Carbon :: now('Asia/Ho_Chi_Minh');
        $detail->ngaycapnhat = Carbon :: now('Asia/Ho_Chi_Minh');
        
        $get_image = $request->file('image');
        
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName(); // Tên gốc của ảnh, ví dụ: hinhanh1.jpg
            $name_image = current(explode('.', $get_name_image)); // Lấy tên ảnh trước phần mở rộng
            $new_image = $name_image . rand(0, 9999) . '.' . $get_image->getClientOriginalExtension(); // Tên ảnh mới với chuỗi số ngẫu nhiên
            $get_image->move('uploads/detail/', $new_image);
        
            // Gán tên ảnh vào thuộc tính image của detail
            $detail->image = $new_image;
        } else {
            // Nếu không có hình ảnh được tải lên, bạn có thể gán một giá trị mặc định cho image
            $detail->image = 'default.jpg'; // hoặc bất kỳ tên ảnh mặc định nào bạn muốn
        }
        
        $detail->save();
        return redirect()->back();
    
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::pluck('title','id');
        $specie = Specie::pluck('title','id');
        $country = Country::pluck('title','id');
        $detail = Detail::find($id);
        return view('admincp.detail.form', compact( 'specie', 'category', 'country','detail'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();

        $detail = Detail::find($id);
        $detail->title = $data['title'];
        $detail->thoiluong = $data['thoiluong'];
        $detail->resolution = $data['resolution'];
        $detail->phiendich = $data['phiendich'];
        $detail->name_eng = $data['name_eng'];
        $detail->detail_hot = $data['detail_hot'];
        $detail->slug = $data['slug'];
        $detail->description = $data['description'];
        $detail->status = $data['status'];
        $detail->category_id = $data['category_id'];
        $detail->specie_id = $data['specie_id'];
        $detail->country_id = $data['country_id'];
        $detail->ngaycapnhat = Carbon :: now('Asia/Ho_Chi_Minh');
        
        $get_image = $request->file('image');
        
        if( $get_image){
            if(file_exists('uploads/detail/'.$detail->image)){
                unlink('uploads/detail/'.$detail->image);
            }else
            {
            $get_name_image =$get_image->getClientOriginalName(); //hinhanh1.jpg
            $name_image = current(explode('.',$get_name_image));//[0]=>hinhanh12569.[1]=>jpg
            $new_image = $name_image.rand(0,9999).'.'.$get_image->getClientOriginalExtension(); //hinhanh12569.jpg
            $get_image->move('uploads/detail/',$new_image);
            $detail->image = $new_image;
            }

        }
        $detail->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $detail = Detail :: find($id);
        if(file_exists('uploads/detail/'.$detail->image)){
           unlink('uploads/detail/'.$detail->image);
        }
        $detail->delete();
        return redirect()->back();
    }
}
