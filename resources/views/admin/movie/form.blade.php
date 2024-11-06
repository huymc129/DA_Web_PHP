@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Quản lý phim') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (!isset($movie))
                        <form action="{{ route('movie.store') }}" method="POST">
                    @else
                        <form action="{{ route('movie.update', $movie->id) }}" method="POST" enctype="multipart/form-data">
                            @method('PUT') <!-- Thêm phương thức PUT -->
                    @endif
                            @csrf
                            <div class="form-group">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" name="title" value="{{ isset($movie) ? $movie->title : '' }}"
                                    class="form-control" placeholder="Nhập dữ liệu" id="slug" ,
                                    onkeyup="ChangeToSlug()">
                            </div>
                            <div class="form-group">
                                <label for="slug" class="form-label">Slug</label>
                                <input type="text" name="slug" value="{{ isset($movie) ? $movie->slug : '' }}"
                                    class="form-control" placeholder="Nhập dữ liệu" id="convert_slug">
                            </div>
                            <div class="form-group">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" class="form-control" placeholder="Nhập dữ liệu"
                                    id="description"
                                    style="resize: none;">{{ isset($movie) ? $movie->description : '' }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="Active" class="form-label">Active</label>
                                <select name="status" class="form-control" style="width: 100%;">
                                    <option value="1" {{ old('status', isset($movie) ? $movie->status : null) == '1' ? 'selected' : '' }}>Hiển thị</option>
                                    <option value="0" {{ old('status', isset($movie) ? $movie->status : null) == '0' ? 'selected' : '' }}>Không hiển thị</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select name="category_id" class="form-control" id="country">
                                    <option value="">--Chọn danh mục--</option>
                                    @foreach ($category as $key => $value)
                                        <option value="{{ $key }}" {{ isset($movie) && $movie->category_id == $key ? 'selected' : '' }}>
                                            {{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="country">Country</label>
                                <select name="country_id" class="form-control" id="country">
                                    <option value="">--Chọn quốc gia--</option>
                                    @foreach ($country as $key => $value)
                                        <option value="{{ $key }}" {{ isset($movie) && $movie->country_id == $key ? 'selected' : '' }}>
                                            {{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="genre">Genre</label>
                                <select name="genre_id" class="form-control" id="country">
                                    <option value="">--Chọn thể loại--</option>
                                    @foreach ($genre as $key => $value)
                                        <option value="{{ $key }}" {{ isset($movie) && $movie->genre == $key ? 'selected' : '' }}>
                                            {{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Image">Image</label>
                                <input type="file" name="image" class="form-control-file" id="image">
                            </div>
                            @if (!isset($movie))
                                <button type="submit" class="btn btn-success">Thêm dữ liệu</button>
                            @else
                                <button type="submit" class="btn btn-success">Cập nhật</button>
                            @endif
                        </form>

                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Active/Inactive</th>
                        <th scope="col">Manage</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list as $key => $cate)
                        <tr>
                            <th scope="row">{{$key}}</th>
                            <td>{{$cate->title}}</td>
                            <td>{{$cate->description}}</td>
                            <td>{{$cate->slug}}</td>
                            <td>
                                @if($cate->status)
                                    Hiển thị
                                @else
                                    Không hiển thị
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('movie.destroy', $cate->id) }}" method="POST"
                                    onsubmit="return confirm('Bạn có muốn xóa?')">
                                    @csrf
                                    @method('DELETE') <!-- Thêm hidden input để chỉ định phương thức DELETE -->
                                    <button type="submit" class="btn btn-danger">Xóa</button>
                                </form>
                                <a href={{ route('movie.edit', $cate->id) }} class="btn btn-warning">Sửa</a>

                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection