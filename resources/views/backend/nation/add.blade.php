@extends('layouts.admin')
@section('main')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Quốc gia </h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Danh Mục</a></li>
            <li class="breadcrumb-item active">Thêm mới</li>
        </ol>
        {{-- <div class="card mb-4">
            <div class="card-body">
                <a href="" class="btn btn-primary btn-sm">Thêm mới</a>
            </div>
        </div> --}}
        <div class="row">
         @if (session('status'))
                      <span class="alert alert-success">{{ session('status') }}</span>
                @endif
                @if ($errors->any())
                <div class="alert alert-warning">
                    <ul class="">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
        </div>
        <div class="card mb-4">


            <div class="card-body">
                <form action="{{route('nation.store')}}" method="post">
                    @csrf
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tên quốc gia sx</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="name_nation" placeholder="Nhập tên thể loại" required>
                    </div>
                  </div>
                  <div class="form-group row mt-2">
                    <label class="col-sm-2 col-form-label">Mô tả (ngắn)</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" name="description">

                      </textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-10">
                      <button type="submit" class="btn btn-primary">Thêm</button>
                    </div>
                  </div>
                </form>
            </div>
        </div>
    </div>
@endsection
