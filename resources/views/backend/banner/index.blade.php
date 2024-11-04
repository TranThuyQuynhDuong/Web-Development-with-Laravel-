@extends('layouts.admin')
@section('title', 'Banner')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12 row">
                        <h1 class="d-inline col-md-10">Tất cả Banner</h1>
                        <div class="col-md-2 text-right">
                            <a href="#" class="text-danger"><i class="fa fa-trash"
                                    aria-hidden="true"></i><sup>0</sup></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="card">
                <div class="card-header text-right">
                    <button class="btn btn-sm btn-success">
                        <i class="fa fa-save" aria-hidden="true"></i>
                        Lưu
                    </button>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                        <form action="{{ route('admin.banner.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="name">Tên Banner</label>
                                    {{-- old là giữ lại giá trị đó nếu 1 trong cái khác trong bài bị lỗi thì nó sẽ load lại form này, old giúp giữ lại giá trị để khỏi cần nhập lại --}}
                                    <input type="text" value="{{ old('name') }}" name="name" id="name" class="form-control"> 
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="description">Mô tả</label>
                                    <textarea name="description" id="description" rows="3" class="form-control">{{ old('description') }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="link">Link</label>
                                    <textarea name="link" id="link" rows="3" class="form-control">{{ old('link') }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="position">Sắp xếp</label>
                                    <select name="position" id="position" class="form-control">
                                        <option value="0">Chọn vị trí</option>
                                        {!! $htmlposition !!}
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="image">Hình ảnh</label>
                                    <input type="file" name="image" id="image" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="status">Trạng thái</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="2">Chưa xuất bản</option>
                                        <option value="1">Xuất bản</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-success">Thêm Banner</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-8">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width:30px;">
                                            <input type="checkbox">
                                        </th>
                                        <th>Id</th>
                                        <th class="text-center" style="width:130px;">Hình ảnh Tên </th>
                                        <th>Tên Banner</th>
                                        <th>Link</th>
                                        <th class="text-center">Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list as $row)
                                    <tr class="datarow">
                                        <td>
                                            <input type="checkbox">
                                        </td>
                                        <td>
                                            {{$row->id}}
                                        </td>
                                        <td>
                                       
                                        

                                        <img src="{{asset('images/banner/'.$row->image)}}" alt="{{$row->image}}" style="width: 200px; height: 150px;">
                                        </td>
                                        <td>
                                            {{$row->name}}
                                        </td>
                                        <td>
                                            {{$row->link}}
                                        </td>
                                        @php
                                                $args=['id'=>$row->id];
                                            @endphp
                                        <td class="text-center">
                                            
                                            <a href ="#" class="btn btn-sa btn-success">
                                                <i class="fa fa-toggle-on" aria-hidden="true"></i>
                                            </a>
                                            <a href ="#" class="btn btn-sa btn-info">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </a>
                                            <a  href="{{route('admin.banner.edit',$args)}}" class="btn btn-sa btn-primary">
                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                            </a>
                                            <a href ="#" class="btn btn-sa btn-danger">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>

                                        </td>
                                        
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection

