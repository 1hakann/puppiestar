@extends('admin.layouts.master')

@section('content')
<div class="header pt-4 pb-6">
    <div class="header-body">
      @include('notify::messages')
    <div class="card mx-auto col-md-10">
        Ürün Ekle
        <div class="card-body">
            <div class="card-body">
              @if(session('message'))
              <div class="alert alert-success" id="message">
              <i class="fa fa-check"></i>
              {{session('message')}}
              </div>
              @endif
    
        <form action="{{route('product.store')}}" enctype="multipart/form-data" method="POST">
        @csrf
        @method("POST")
            <div class="container">
            <div class="form-group row">
              <div class="col-md-10 mb-4 mb-lg-0">
                <label for="">Ürün Adı</label>
                <input type="text" class="form-control @error('name') geçerli değil 
                @enderror" name="name" placeholder="Ürün Adı" value="{{old('name')}}">
                @error('name')
                  <span role="alert"><small style="color:#db4bff">{{$message}}</small></span>
                @enderror 
              </div>
              </div>
              <div class="form-group row">
                <div class="col-md-10 mb-4 mb-lg-0">
                  <label for="">Ürün Açıklaması</label>
                  <textarea name="description" class="form-control" id="summernote" cols="30" rows="10" placeholder="Ürün Açıklaması Yazın...">{{old('description')}}</textarea>
                  @error('description')
                  <span role="alert"><small style="color:#db4bff">{{$message}}</small></span>
                  @enderror 
                </div>
                </div>
              <div class="form-group row">
                <div class="col-md-10 mb-4 mb-lg-0">
                  <label for="">Resim Ekleyin</label>
                  <input type="file" class="form-control" name="image" value="{{old('image')}}">
                  @error('image')
                  <span role="alert"><small style="color:#db4bff">{{$message}}</small></span>
                  @enderror 
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-10 mb-4 mb-lg-0">
                <label for="">Fiyatı</label>
                <input type="number" class="form-control" name="price" value="{{old('price')}}">
                  @error('price')
                  <span role="alert"><small style="color:#db4bff">{{$message}}</small></span>
                  @enderror 
            </div>
            </div>
            <div class="form-group row">
                <div class="col-md-10 mb-4 mb-lg-0">
                  <label for="">Ürün Detayı</label>
                  <textarea name="additional_info" class="form-control" id="summernote1" cols="30" rows="10" placeholder="Ürün Detayları Ekleyin...">{{old('additional_info')}}</textarea>
                  @error('additional_info')
                  <span role="alert"><small style="color:#db4bff">{{$message}}</small></span>
                  @enderror 
                </div>
                </div>
                <div class="form-group row">
                <div class="col-md-10 mb-4 mb-lg-0">
                <label for="">Kategori Seç</label>
                <select name="category" class="form-control">
                    <option value="">Seçim Yap</option>
                    @foreach (App\Models\Category::all() as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
                @error('category')
                <span role="alert"><small style="color:#db4bff">{{$message}}</small></span>
                @enderror 
                </div>
                </div>
                
                <div class="form-group row">
                    <div class="col-md-10 mb-4 mb-lg-0">
                    <label for="">Alt Kategori Seç</label>
                    <select name="subcategory" class="form-control">
                        <option value="">Seçim Yap</option>
                        @foreach (App\Models\SubCategory::all() as $subcategory)
                            <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                        @endforeach
                    </select>
                    @error('category')
                    <span role="alert"><small style="color:#db4bff">{{$message}}</small></span>
                    @enderror 
                    </div>
                    </div>
            <div class="form-group row">
              <div class="col-md-3 pt-4 mr-auto">
                <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5" value="Ürün Ekle">
              </div>
            </div>
            </div>
          </form>
          <div class="div.mb-10">
    
          </div>
        </div>
    </div>

  </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $("document").ready(function () {
        $('select[name="category"]').on('change', function(){
            var categoryId = $(this).val();
            if(categoryId) {
                $.ajax({
                    url: '/subcategories/'+categoryId,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('select[name="subcategory"]').empty();
                        $.each(data, function(key,value) {
                            $('select[name="subcategory"]').append('<option value=" '+key+' ">'+value+'</option>');
                        })
                    }
                });
            } else {
                $('select[name="subcategory"]').empty();
            }
        });
    });
</script>
  
@endsection