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
                @php
                        $args = ['id' => $banner->id];
                    @endphp
                    <div class="row">
                        <div class="col-12">
                            <form action="{{ route('admin.banner.update', $banner->id) }}" enctype="multipart/form-data" method="post">
                                @csrf
                                @method('PUT')
                                
                                <div class="mb-3">
                                    <label for="name">Tên Banner</label>
                                    <input type="text" value="{{ old('name',$banner->name) }}" name="name" id="name" class="form-control"> 
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="description">Mô tả</label>
                                    <textarea rows="3" name="description" id="description" placeholder="Nhập mô tả " class="form-control" >{{ old('description',$banner->description) }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="link">Link</label>
                                    <textarea name="link" id="link" rows="3" class="form-control">{{ old('link',$banner->link) }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="position">Sắp xếp</label>
                                    <select name="position" id="position" class="form-control">
                                        <option value="0">Chọn vị trí</option>
                                        {!! $htmlposittion !!}
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="image">Hình ảnh</label>
                                    <input type="file" name="image" id="image" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Trạng thái</label>
                                    <select name="status" class="form-control">
                                        <option value="2" {{($banner->status==2)?'selected':''}}>Chưa xuất bản</option>
                                        <option value="1" {{($banner->status==1)?'selected':''}}>Xuất bản</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-success">Cập nhật Banner</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection

