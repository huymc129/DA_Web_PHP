@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <a href="{{route('detail.index')}}" class="btn btn-primary">Liệt Kê Sinh Vật</a>
                <div class="card-header">{{ __('Quản lý creature') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (!isset($detail))
                        <form action="{{ route('detail.store') }}" method="POST" enctype="multipart/form-data">
                    @else
                        <form action="{{ route('detail.update', $detail->id) }}" method="POST" enctype="multipart/form-data">
                            @method('PUT') <!-- Thêm phương thức PUT -->
                    @endif
                            @csrf
                            <div class="form-group">
                                <label for="title" class="form-label">Tên</label>
                                <input type="text" name="title" value="{{ isset($detail) ? $detail->title : '' }}"
                                    class="form-control" placeholder="Nhập dữ liệu" id="slug" ,
                                    onkeyup="ChangeToSlug()">
                            </div>
                            <div class="form-group">
                                <label for="thoiluong" class="form-label">Thời lượng creature</label>
                                <input type="text" name="thoiluong" value="{{ isset($detail) ? $detail->thoiluong : '' }}"
                                    class="form-control" placeholder="Nhập dữ liệu">
                            </div>
                            <div class="form-group">
                                <label for="Tên tiếng anh" class="form-label">Tên tiếng anh</label>
                                <input type="text" name="name_eng" value="{{ isset($detail) ? $detail->name_eng : '' }}"
                                    class="form-control" placeholder="Nhập dữ liệu">
                            </div>
                            <div class="form-group">
                                <label for="slug" class="form-label">Slug</label>
                                <input type="text" name="slug" value="{{ isset($detail) ? $detail->slug : '' }}"
                                    class="form-control" placeholder="Nhập dữ liệu" id="convert_slug">
                            </div>
                            <div class="form-group">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" class="form-control" placeholder="Nhập dữ liệu"
                                    id="description"
                                    style="resize: none;">{{ isset($detail) ? $detail->description : '' }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="Active" class="form-label">Active</label>
                                <select name="status" class="form-control" style="width: 100%;">
                                    <option value="1" {{ old('status', isset($detail) ? $detail->status : null) == '1' ? 'selected' : '' }}>Hiển thị</option>
                                    <option value="0" {{ old('status', isset($detail) ? $detail->status : null) == '0' ? 'selected' : '' }}>Không hiển thị</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="resolution">Resolution</label>
                                <select name="resolution" class="form-control" style="width: 100%;">
                                    <option value="0" {{ old('resolution', isset($detail) ? $detail->resolution : null) == '0' ? 'selected' : '' }}>SD</option>
                                    <option value="1" {{ old('resolution', isset($detail) ? $detail->resolution : null) == '1' ? 'selected' : '' }}>HD</option>
                                    <option value="2" {{ old('resolution', isset($detail) ? $detail->resolution : null) == '2' ? 'selected' : '' }}>HD+</option>
                                    <option value="3" {{ old('resolution', isset($detail) ? $detail->resolution : null) == '3' ? 'selected' : '' }}>Full HD</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="phiendich">Định dạng</label>
                                <select name="phiendich" class="form-control" style="width: 100%;">
                                    <option value="0" {{ old('phiendich', isset($detail) ? $detail->phiendich : null) == '0' ? 'selected' : '' }}>Vietsub</option>
                                    <option value="1" {{ old('phiendich', isset($detail) ? $detail->phiendich : null) == '1' ? 'selected' : '' }}>Lồng Tiếng</option>
                                    <option value="2" {{ old('phiendich', isset($detail) ? $detail->phiendich : null) == '2' ? 'selected' : '' }}>Thuyết Minh</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select name="category_id" class="form-control" id="category">
                                    <option value="">--Chọn danh mục--</option>
                                    @foreach ($category as $id => $title)
                                        <option value="{{ $id }}" {{ isset($detail) && $detail->category_id == $id ? 'selected' : '' }}>
                                            {{ $title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="country">Country</label>
                                <select name="country_id" class="form-control" id="country">
                                    <option value="">--Chọn quốc gia--</option>
                                    @foreach ($country as $id => $title)
                                        <option value="{{ $id }}" {{ isset($detail) && $detail->country_id == $id ? 'selected' : '' }}>
                                            {{ $title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="specie">specie</label>
                                <select name="specie_id" class="form-control" id="specie">
                                    <option value="">--Chọn thể loại--</option>
                                    @foreach ($specie as $id => $title)
                                        <option value="{{ $id }}" {{ isset($detail) && $detail->specie_id == $id ? 'selected' : '' }}>
                                            {{ $title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Hot">Hot</label>
                                <select name="creature_hot" class="form-control" id="creature_hot">
                                    <option value="">--Chọn thể loại--</option>
                                    <option value="1" {{ old('status', isset($detail) ? $detail->creature_hot : null) == '1' ? 'selected' : '' }}>Có</option>
                                    <option value="0" {{ old('status', isset($detail) ? $detail->creature_hot : null) == '0' ? 'selected' : '' }}>Không</option>
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="Image">Image</label>
                                <input type="file" name="image" class="form-control-file" id="image">
                                @if(isset($detail))
                                    <<img width="20%" src="{{ url('uploads/detail/' . $detail->image) }}">                            
                                @endif
                            </div>
                            @if (!isset($detail))
                                <button type="submit" class="btn btn-success">Thêm dữ liệu</button>
                            @else
                                <button type="submit" class="btn btn-success">Cập nhật</button>
                            @endif
                        </form>

                </div>
            </div>
           
        </div>
    </div>
</div>
@endsection