@extends('admin.layouts.master')

@section('content')
<div class="header pt-4 pb-6">
    <div class="header-body">
      @include('notify::messages')
        <div class="card mx-auto col-md-10">
            <div class="card-body">
                @if(session('message'))
                <div class="alert alert-success" id="message">
                <i class="fa fa-check"></i>
                {{session('message')}}
                </div>
                @endif
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 ml-4 text-gray-800">Ürünler
                    <a class="light" href="{{route('product.create')}}"><input type="button" value="Ürün Ekle" class="btn btn-success"></a></h1>

                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="./admin">Anasayfa</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Ürünler</li>
                    </ol>
                </div>
                <div class="table-responsive">
                    <table id="myTable" class="table table-striped table-bordered no-wrap">
                        <thead>
                            <tr>
                                <th>Resim</th>
                                <th>Adı</th>
                                <th>Açıklama</th>
                                <th>Detay</th>
                                <th>Ücreti</th>
                                <th>Kategorisi</th>
                                <th>İşlemler</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($products)>0)
                            @foreach ($products as $product)                                
                            <tr>
                                <td><img src="{{Storage::url($product->image)}}" width="100" alt=""></td>
                                <td>{{$product->name}}</td>
                                <td>{!!$product->description!!}</td>
                                <td>{!!$product->additional_info!!}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->category->name ?? ''}}</td>
                                <td><a href="{{route('product.edit',$product->id)}}" class="btn btn-circle btn-sm float-left" title="Edit"><i class="fas fa-allergies"></i></a>
                                    <form action="{{route('product.destroy',$product->id)}}" method="POST">
                                      @csrf
                                      @method("DELETE")
                                      <a href="" product_id="{{$product->id}}" class="btn btn-circle btn-sm float-left" id="remove-click" title="Sil" data-toggle="modal" data-target="#exampleModal{{$product->id}}"><i class="fas fa-trash"></i></a>
                
                                      <div class="modal fade" id="exampleModal{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">İçerik Silme Alanı</h5><hr>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                                Ürün Silinecek! Emin misiniz?
                                               <!-- bilgilen den ilgili if bloğu çağrılacak -->
                                            </div>
                                            <div class="modal-footer">
                                              <input type="hidden" name="id" id="deleteId">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                                              <a href="{{route('product.destroy',$product->id)}}"><button class="btn btn-warning" id="deleteButton" title="Sil">Sil</button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                
                                    </form></td>
                            </tr>
                            @endforeach
                            @else
                            <tr>Herhangi Bir Ürün Bulunamadı!</tr>
                            @endif
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
    
       
        
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
  
@endsection