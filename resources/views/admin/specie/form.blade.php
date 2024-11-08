@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Quản lý thể loại') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (!isset($specie))
                        <form action="{{ route('specie.store') }}" method="POST">
                    @else
                        <form action="{{ route('specie.update', $specie->id) }}" method="POST">
                            @method('PUT') <!-- Thêm phương thức PUT -->
                    @endif
                            @csrf
                            <div class="form-group">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" name="title" value="{{ isset($specie) ? $specie->title : '' }}"
                                    class="form-control" placeholder="Nhập dữ liệu" id="slug", onkeyup="ChangeToSlug()">
                            </div>
                            <div class="form-group">
                                <label for="slug" class="form-label">Slug</label>
                                <input type="text" name="slug" value="{{ isset($specie) ? $specie->slug : '' }}"
                                    class="form-control" placeholder="Nhập dữ liệu" id="convert_slug">
                            </div>
                            <div class="form-group">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" class="form-control" placeholder="Nhập dữ liệu" id="description" style="resize: none;">{{ isset($specie) ? $specie->description : '' }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="Active" class="form-label">Active</label>
                                <select name="status" class="form-control" style="width: 100%;">
                                    <option value="1" {{ old('status', isset($specie) ? $specie->status : null) == '1' ? 'selected' : '' }}>Hiển thị</option>
                                    <option value="0" {{ old('status', isset($specie) ? $specie->status : null) == '0' ? 'selected' : '' }}>Không hiển thị</option>
                                </select>
                            </div>
                        @if (!isset($specie))
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
                                <form action="{{ route('specie.destroy', $cate->id) }}" method="POST"
                                    onsubmit="return confirm('Bạn có muốn xóa?')">
                                    @csrf
                                    @method('DELETE') <!-- Thêm hidden input để chỉ định phương thức DELETE -->
                                    <button type="submit" class="btn btn-danger">Xóa</button>
                                </form>
                                <a href={{ route('specie.edit', $cate->id) }} class="btn btn-warning">Sửa</a>

                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection