@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <a href="{{route('movie.create')}}" class="btn btn-primary">Thêm Phim</a>
            <table class="table" id="tablephim">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Thời lượng phim</th>
                        <th scope="col">Image</th>
                        <th scope="col">Hot</th>
                        <th scope="col">Định dạng</th>
                        <th scope="col">Phiên dịch</th>

                        {{-- <th scope="col">Description</th> --}}
                        <th scope="col">Slug</th>
                        <th scope="col">Active/Inactive</th>
                        <th scope="col">Category</th>
                        <th scope="col">creature</th>
                        <th scope="col">Country</th>
                        <th scope="col">Date created</th>
                        <th scope="col">Update date</th>
                        <th scope="col">Năm phim</th>


                        <th scope="col">Manage</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list as $key => $cate)
                        <tr>
                            <th scope="row">{{$key}}</th>
                            <td>{{$cate->title}}</td>
                            <td>{{$cate->thoiluong}}</td>
                            <td><img width="60%" src="{{asset('uploads/movie/'.$cate->image)}}"></td>
                            <td>
                                @if($cate->phim_hot==0)
                                    Không
                                @else
                                    Có
                                @endif
                            </td>
                            <td>
                                @if($cate->resolution==0)
                                    SD
                                @elseif($cate->resolution==1)
                                    HD
                                @elseif($cate->resolution==2)
                                    HD+
                                @else
                                    Full HD
                                @endif
                            </td>
                            <td>
                                @if($cate->phiendich==0)
                                    Vietsub
                                @elseif($cate->phiendich==1)
                                    Lồng tiếng
                                @else
                                    Thuyết Minh
                                @endif
                            
                            </td>
                            {{-- <td>{{$cate->description}}</td> --}}
                            <td>{{$cate->slug}}</td>
                            <td>
                                @if($cate->status)
                                    Hiển thị
                                @else
                                    Không hiển thị
                                @endif
                            </td>
                            <td>{{$cate->category->title}}</td>
                            <td>{{$cate->creature->title}}</td>
                            <td>{{$cate->country->title}}</td>
                            <td>{{ $cate->ngaytao ? \Carbon\Carbon::parse($cate->ngaytao)->format('Y-m-d H:i:s') : 'N/A' }}</td>
                            <td>{{ $cate->ngaycapnhat ? \Carbon\Carbon::parse($cate->ngaycapnhat)->format('Y-m-d H:i:s') : 'N/A' }}</td>
                            <td>
                                <select name="year" class="select-year" id="{{ $cate->id }}">
                                    @for ($year = 2000; $year <= 2022; $year++)
                                        <option value="{{ $year }}" {{ (isset($cate->year) && $cate->year == $year) ? 'selected' : '' }}>
                                            {{ $year }}
                                        </option>
                                    @endfor
                                </select>
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
