@extends('layouts.admin')
@section('title', 'Category')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12 row">
                        <h1 class="d-inline col-md-10">Tất cả danh mục</h1>
                       
                    </div>
                </div>
            </div>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="card">
                <div class="card-header text-right">
                    <a href="#" class="btn btn-sm btn-danger">
                        <i class="fa fa-trash" aria-hidden="true"></i> Thùng rác
                    </a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <form action="{{ route('admin.category.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="name">Tên danh mục</label>
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
                                    <label for="parent_id">Cấp cha</label>
                                    <select name="parent_id" id="parent_id" class="form-control">
                                        <option value="0">Cấp cha</option>
                                        {!! $htmlparentid !!}
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="sort_order">Sắp xếp</label>
                                    <select name="sort_order" id="sort_order" class="form-control">
                                        <option value="0">Chọn vị trí</option>
                                        {!! $htmlsortorder !!}
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
                                    <button type="submit" class="btn btn-success">Thêm danh mục</button>
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
                                        <th class="text-center" style="width:130px;">Hình ảnh</th>
                                        <th>Tên danh mục</th>
                                        <th>Tên slug</th>
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
                                        <td class="text-center">
                                            <img style="width:80px;" src="{{ asset('images/categories/' . $row->image) }}"
                                                alt="category.jpg">
                                        </td>
                                        <td>
                                            {{$row->name}}
                                        </td>
                                        <td>
                                            {{$row->slug}}
                                        </td>
                                        <td class="text-center">
                                            @php
                                                    $agrs = ['id' => $row->id];
                                                @endphp
                                          
                                            <a href ="#" class="btn btn-sa btn-success">
                                                <i class="fa fa-toggle-on" aria-hidden="true"></i>
                                            </a>
                                            <a href ="#" class="btn btn-sa btn-info">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </a>
                                            <a  href="{{ route('admin.category.edit', $agrs) }}" class="btn btn-sa btn-primary">
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

@section('footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script>
        @if (Session::has('success'))
            toastr.success("{{ Session::get('success') }}");
        @endif

        @if (Session::has('error'))
            toastr.error("{{ Session::get('error') }}");
        @endif
    </script>
@endsection

