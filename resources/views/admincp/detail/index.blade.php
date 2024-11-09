@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <a href="{{route('detail.create')}}" class="btn btn-primary">Thêm sinh vat</a>
            <table class="table" id="tablesinhvat">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Tuổi thọ</th>
                        <th scope="col">Image</th>
                        <th scope="col">Hot</th>
                        <th scope="col">Tập tính</th>
                        <th scope="col">Sống ở châu lục</th>

                        {{-- <th scope="col">Description</th> --}}
                        <th scope="col">Slug</th>
                        <th scope="col">Active/Inactive</th>
                        <th scope="col">Category</th>
                        <th scope="col">creature</th>
                        <th scope="col">Location</th>
                        <th scope="col">Date created</th>
                        <th scope="col">Update date</th>
                        {{-- <th scope="col">Năm </th> --}}


                        <th scope="col">Manage</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list as $key => $cate)
                        <tr>
                            <th scope="row">{{$key}}</th>
                            <td>{{$cate->title}}</td>
                            <td>{{$cate->thoiluong}}</td>
                            <td>
                                <img style="width: 100px; height: 145px; object-fit: cover;" src="{{ asset('uploads/detail/'.$cate->image) }}">
                            </td>
                            
                            <td>
                                @if($cate->detail_hot==0)
                                    Không
                                @else
                                    Có
                                @endif
                            </td>
                            <td>
                                @if($cate->resolution==0)
                                    social
                                @elseif($cate->resolution==1)
                                    solitary  
                                @elseif($cate->resolution==2)
                                    parasitic 
                                @endif
                            </td>
                            <td>
                                @if($cate->phiendich==0)
                                    Everywhere
                                @elseif($cate->phiendich==1)
                                    Asia
                                @else
                                    Europe
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
                            <td>{{$cate->specie->title}}</td>
                            <td>{{$cate->location->title}}</td>
                            <td>{{ $cate->ngaytao ? \Carbon\Carbon::parse($cate->ngaytao)->format('Y-m-d H:i:s') : 'N/A' }}</td>
                            <td>{{ $cate->ngaycapnhat ? \Carbon\Carbon::parse($cate->ngaycapnhat)->format('Y-m-d H:i:s') : 'N/A' }}</td>
                            {{-- <td>
                                <select name="year" class="select-year" id="{{ $cate->id }}">
                                    @for ($year = 2000; $year <= 2022; $year++)
                                        <option value="{{ $year }}" {{ (isset($cate->year) && $cate->year == $year) ? 'selected' : '' }}>
                                            {{ $year }}
                                        </option>
                                    @endfor
                                </select>
                            </td> --}}
                            
                            <td>
                                <form action="{{ route('detail.destroy', $cate->id) }}" method="POST"
                                    onsubmit="return confirm('Bạn có muốn xóa?')">
                                    @csrf
                                    @method('DELETE') <!-- Thêm hidden input để chỉ định phương thức DELETE -->
                                    <button type="submit" class="btn btn-danger">Xóa</button>
                                </form>
                                <a href={{ route('detail.edit', $cate->id) }} class="btn btn-warning">Sửa</a>

                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection