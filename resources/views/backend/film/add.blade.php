@extends('layouts.admin')
@section('main')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Thêm phim mới</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Phim</a></li>
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
                <form action="{{route('film.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">

                    <div class="col-6">
                        <label >Tên Phim </label>
                        <input type="text" class="form-control" placeholder="Nhập tên film ..." name="name_film" required>
                    </div>
                    <div class="col-6">
                        <label >Tên Khác</label>
                        <input type="text" class="form-control" placeholder="Nhập tên khacs ..." name="othername_film" required>
                    </div>
                    <div class="col-6">
                        <label >Đạo diễn</label>
                        <input type="text" class="form-control" placeholder="Nhập tên đạo diễn ..." name="director" required>
                    </div>
                    <div class="col-6">
                        <label >Diễn viên</label>
                        <input type="text" class="form-control" placeholder="Nhập tên diễn viên ..." name="actor" required>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-3">
                            <label for="">Trạng thái</label>
                            <select class="form-control" name="status" id="">
                                <option value="0">Chưa Full</option>
                                <option value="1">Đã Full</option>
                            </select>
                            </div>
                            <div class="col-3">
                            <label for="">Năm sản xuất</label>
                            <select class="form-control" name="year" id="">
                                @for($i= 2021; $i > 2015; $i--)
                                <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                            </div>
                            <div class="col-3">
                            <label for="">Quốc gia</label>
                            <select class="form-control" name="nation_id" id="">
                                @foreach($nations as $nation)
                                <option value="{{$nation->id}}">{{$nation->name_nation}}</option>
                                @endforeach
                            </select>
                            </div>
                            <div class="col-3">
                            <label for="">Dạng phim</label>
                            <select class="form-control" name="category_id" id="">
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name_category}}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>

                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col mt-2">
                            <label >Thể Loại Phim</label>
                        <br>
                        @foreach($genres as $genre)

                        <div class="form-check form-check-inline mt-2 col-2">
                          <input class="form-check-input" type="checkbox" name="genre[]" id="genre_{{$genre->id}}" value="{{$genre->id}}">
                          <label class="form-check-label" for="genre_{{$genre->id}}">{{$genre->name_genre}}</label>
                        </div>
                        @endforeach
                        </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                        <div class="col-8">
                        <label class="mt-1">Nội dung</label>
                        <textarea  name="description" class="form-control" rows="8" style="resize: none;">

                        </textarea>
                        </div>
                        <div class="col-4">
                        <label >Ảnh Bìa Truyện<span class="text-danger">*</span></label>
                        <input required name="image" class="form-control" type="file" accept="image/*" onchange="loadImg(event)">

                        <div class="d-flex justify-content-md-center mt-2">
                            <img style="max-height: 300px;max-width: 100%;" alt="" id="outputImg">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="active" id="exampleRadios1" value="1" checked>
                      <label class="form-check-label" for="exampleRadios1">
                        Kích hoạt phim
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" checked="true" name="active" id="exampleRadios2" value="0">
                      <label class="form-check-label" for="exampleRadios2">
                        Không kích hoạt
                      </label>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-outline-primary col-12">Thêm</button>
                </div>

            </form>
            </div>
        </div>
    </div>
@endsection
