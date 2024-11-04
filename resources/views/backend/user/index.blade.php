@extends('layouts.admin')
@section('title', 'User')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 row">
                    <h1 class="d-inline col-md-10">Tất Cả Người Dùng</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="card">
        <div class="card-header text-right">
            <a href="#" class="btn btn-sm btn-danger">
                <i class="fa fa-trash" aria-hidden="true"></i>Thùng rác
            </a>
                </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                    <form action="{{ route('admin.user.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="name">Tên đăng nhập</label>
                                    {{-- old là giữ lại giá trị đó nếu 1 trong cái khác trong bài bị lỗi thì nó sẽ load lại form này, old giúp giữ lại giá trị để khỏi cần nhập lại --}}
                                    <input type="text" value="{{ old('name') }}" name="name" id="name" class="form-control"> 
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="email">Email</label>
                                    <input type="text" value="{{ old('email') }}" name="email" id="email" class="form-control">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="phone">Điện thoại</label>
                                    <input type="number" value="{{ old('phone') }}" name="phone" id="phone" class="form-control">
                                    @error('phone')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password">Mật khẩu</label>
                                    <textarea name="password" id="password" rows="3" class="form-control">{{ old('password') }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="username">Tên người dùng</label>
                                    {{-- old là giữ lại giá trị đó nếu 1 trong cái khác trong bài bị lỗi thì nó sẽ load lại form này, old giúp giữ lại giá trị để khỏi cần nhập lại --}}
                                    <input type="text" value="{{ old('username') }}" name="username" id="username" class="form-control"> 
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="image">Hình ảnh</label>
                                    <input type="file" name="image" id="image" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label for="address">Địa chỉ</label>
                                    <textarea name="address" id="address" rows="3" class="form-control">{{ old('address') }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="roles">Vai trò</label>
                                    <select name="roles" id="roles" class="form-control">
                                        <option value="2">Admin</option>
                                        <option value="1">Member</option>
                                    </select>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="status">Trạng thái</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="2">Chưa xuất bản</option>
                                        <option value="1">Xuất bản</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-success">Thêm Người dùng</button>
                                </div>
                            </form>
                        </div>
           
           
                    <div class="col-md-9">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width:30px;">
                                        <input type="checkbox">
                                    </th>
                                    <th>ID</th>
                                    <th class="text-center">Tên User</th>
                                    <th class="text-center">Avata</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Số điện thoại</th>
                                    {{-- <th class="text-center">Địa chỉ</th> --}}
                                    {{-- <th>User Name</th> --}}
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
                                        {{ $row->id }}
                                    </td>
                                    <td>
                                        {{ $row->name }}
                                    </td>
                                    <td>
                                        <img src="{{asset('images/users/'.$row->image)}}" alt="category.jpg" style="width: 150px; height: 100px;">
                                        </td>
                                    <td>
                                        {{ $row->email }}
                                    </td>
                                    <td>
                                        {{ $row->phone }}
                                    </td>
                                    {{-- <td>
                                        {{ $row->address }}
                                    </td> --}}
                                    {{-- <td>
                                        {{ $row->username }}
                                    </td> --}}
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
                                        <a  href="{{route('admin.user.edit',$args)}}" class="btn btn-sa btn-primary">
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

        <!-- Add User Modal -->
        <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addUserModalLabel">Thêm Người Dùng Mới</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form action="{{ route('admin.user.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name">Tên Người dùng</label>
                                <input type="text" value="{{ old('name') }}" name="name" id="name" class="form-control"> 
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input type="text" value="{{ old('email') }}" name="email" id="email" class="form-control">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="phone">Điện thoại</label>
                                <input type="number" value="{{ old('phone') }}" name="phone" id="phone" class="form-control">
                                @error('phone')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="address">Địa chỉ</label>
                                <input type="text" value="{{ old('address') }}" name="address" id="address" class="form-control">
                                @error('address')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="username">User Name</label>
                                <input type="text" value="{{ old('username') }}" name="username" id="username" class="form-control">
                                @error('username')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password">Password</label>
                                <input type="password" value="{{ old('password') }}" name="password" id="password" class="form-control">
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="image">Hình ảnh</label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="roles">Roles</label>
                                <select name="roles" id="roles" class="form-control">
                                    <option value="admin">Admin</option>
                                    <option value="customer">Khách Hàng</option>
                                </select>
                                @error('roles')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="status">Trạng thái</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="2">Chưa xuất bản</option>
                                    <option value="1">Xuất bản</option>
                                </select>
                            </div>
                            <div class="mb-3 text-right">
                                <button type="submit" class="btn btn-success">Thêm người dùng</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
