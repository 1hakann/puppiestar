@extends('admin.layouts.master')

@section('content')
<div class="header pt-4 pb-6">
    <div class="header-body">
      @include('notify::messages')
    <div class="card mx-auto col-md-10">
        Alt Kategori Güncelle
        <div class="card-body">
            <div class="card-body">
              @if(session('message'))
              <div class="alert alert-success" id="message">
              <i class="fa fa-check"></i>
              {{session('message')}}
              </div>
              @endif
    
        <form action="{{route('subcategory.update',$subcategory->id)}}" method="POST">
        @csrf
        @method("PUT")
            <div class="container">
            <div class="form-group row">
              <div class="col-md-10 mb-4 mb-lg-0">
                <input type="text" class="form-control @error('name') geçerli değil 
                @enderror" name="name" placeholder="Kategori Adı Girin" value="{{$subcategory->name}}">
                @error('name')
                  <span role="alert"><small style="color:#db4bff">{{$message}}</small></span>
                @enderror 
              </div>
              </div>
              <div class="form-group row">
                <div class="col-md-10 mb-4 mb-lg-0">
                  <label for="">Kategori Seçin</label>
                  <select name="category" class="form-control">
                      @foreach (App\Models\Category::all() as $category)  
                      <option @if ($subcategory->category_id == $category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                      @endforeach
                  </select>
                  @error('category')
                  <span role="alert"><small style="color:#db4bff">{{$message}}</small></span>
                  @enderror 
                </div>
            </div>
            <div class="form-group row">
              <div class="col-md-3 mr-auto">
                <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5" value="Alt Alt Kategoriyi Güncelle">
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