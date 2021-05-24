@extends('admin.layouts.master')

@section('content')
<div class="header pt-4 pb-6">
    <div class="header-body">
      @include('notify::messages')
    <div class="card mx-auto col-md-10">
        Kategori Düzenle
        <div class="card-body">
            <div class="card-body">
              @if(session('message'))
              <div class="alert alert-success" id="message">
              <i class="fa fa-check"></i>
              {{session('message')}}
              </div>
              @endif
    
        <form action="{{route('category.update',$category->id)}}" enctype="multipart/form-data" method="POST">
        @csrf
        @method("PUT")
            <div class="container">
            <div class="form-group row">
              <div class="col-md-10 mb-4 mb-lg-0">
                <input type="text" class="form-control @error('name') geçerli değil 
                @enderror" name="name" value="{{$category->name}}" placeholder="Kategori Adı" value="{{old('name')}}">
                @error('name')
                  <span role="alert"><small style="color:#db4bff">{{$message}}</small></span>
                @enderror 
              </div>
              </div>
              <div class="form-group row">
                <div class="col-md-10 mb-4 mb-lg-0">
                  <textarea name="description" class="form-control" id="" cols="30" rows="10" placeholder="Kategori Açıklaması">{{$category->description}}</textarea>
                  @error('description')
                  <span role="alert"><small style="color:#db4bff">{{$message}}</small></span>
                  @enderror 
                </div>
                </div>
              <div class="form-group row">
                <div class="col-md-10 mb-4 mb-lg-0">
                  <input type="file" class="form-control" name="image" value="{{$category->image}}">
                  <img class="pt-4" style="width: 44em" src="{{Storage::url($category->image)}}"
                  @error('image')
                  <span role="alert"><small style="color:#db4bff">{{$message}}</small></span>
                  @enderror 
                </div>
            </div>
            <div class="form-group row">
              <div class="col-md-12 pt-3 pl-4">
                <input type="submit" class="btn btn-block btn-primary text-white py-3 px-8" value="Kategori Güncelle">
              </div>
            </div>
            </div>
          </form>
          <div class="div.mb-10">
    
          </div>
        </div>
    </div>

  </div>

@endsection