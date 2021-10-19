@extends('layouts.admin')
@section('main')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Danh mục</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Danh Mục</a></li>
            <li class="breadcrumb-item active">Danh sách</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                <a href="{{route('category.create')}}" class="btn btn-primary btn-sm">Thêm mới</a>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Danh sách
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Tên</th>
                            <th>Mô tả</th>
                            <th>Slug</th>
                            <th>Thời gian tạo</th>
                            <th>Thời gian cập nhật</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                    <tr>
                      <td>{{$category->id}}</td>
                      <td>{{$category->name_category}}</td>
                      <td>{{$category->description}}</td>
                      <td>{{$category->slug_category}}</td>
                      <td>{{$category->created_at->diffforHumans()}}</td>
                      <td>{{$category->updated_at->diffforHumans()}}</td>
                      <td class="d-flex align-items-center">

                        <a class="btn btn-outline-warning btn-sm m-1" title="sửa {{$category->name_category}}" href="{{route('category.edit', ['category' => $category->id ])}}"><i class="fas fa-edit"></i></a>

                          <form action="{{ route('category.destroy', ['category' => $category->id ]) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button onclick="return confirm('Bạn có chắc muốn xóa danh mục truyện này không ?');" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash"></i></button>
                        </form>

                      </td>

                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
