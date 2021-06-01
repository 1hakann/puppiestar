@extends('admin.layouts.master')

@section('content')
<div class="header pt-4 pb-6">
    <div class="header-body">

    <div class="card mx-auto col-md-10">
        Kategori Ekle
        <div class="card-body">
            <div class="card-body">
              @if(session('message'))
              <div class="alert alert-success" id="message">
              <i class="fa fa-check"></i>
              {{session('message')}}
              </div>
              @endif
        <form action="{{route('category.store')}}" enctype="multipart/form-data" method="POST">
        @csrf
        @method("POST")
            <div class="container">
            <div class="form-group row">
              <div class="col-md-10 mb-4 mb-lg-0">
                <input type="text" class="form-control @error('name') geçerli değil 
                @enderror" name="name" placeholder="Kategori Adı" value="{{old('name')}}">
                @error('name')
                  <span role="alert"><small style="color:#db4bff">{{$message}}</small></span>
                @enderror 
              </div>
              </div>
              <div class="form-group row">
                <div class="col-md-10 mb-4 mb-lg-0">
                  <textarea name="description" class="form-control" id="" cols="30" rows="10" placeholder="Kategori Açıklaması">{{old('description')}}</textarea>
                  @error('description')
                  <span role="alert"><small style="color:#db4bff">{{$message}}</small></span>
                  @enderror 
                </div>
                </div>
              <div class="form-group row">
                <div class="col-md-10 mb-4 mb-lg-0">
                  <input type="file" class="form-control" name="image" value="{{old('image')}}">
                  @error('image')
                  <span role="alert"><small style="color:#db4bff">{{$message}}</small></span>
                  @enderror 
                </div>
            </div>
            <div class="form-group row">
              <div class="col-md-6 mr-auto">
                <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5" value="Kategori Ekle">
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