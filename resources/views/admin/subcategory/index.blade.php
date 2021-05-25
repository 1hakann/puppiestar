@extends('admin.layouts.master')

@section('content')
<div class="card shadow mb-4">

    <div class="card-body">
        <div id="message" class="card-header">@if(session('message'))<div class="alert alert-success"><i class="fa fa-check"></i>{{session('message')}}</div>@endif
        <div class="card-header">@if(session('warning'))<div class="alert alert-warning" id="message"><i class="fa fa-check"></i>{{session('warning')}}</div>@endif
        <div class="card-header"><div id="orderSuccess" style="display:none" class="alert alert-success">Sıralama Başarıyla Güncellendi</div>
    <div class="table-responsive">
       
        <table class="table table-bordered align-items-center table-flush table table-hover table-white" id="dataTable" width="100%" cellspacing="0">
            <a class="light" href="{{route('category.create')}}"><input type="button" value="Kategori Ekle" class="btn btn-success"></a>
          <thead class="thead-light">
            <tr>
              <th scope="col" class="sort" data-sort="order">#</th>
              <th scope="col" class="sort" data-sort="image">Adı</th>
              <th scope="col" class="sort" data-sort="budget">Kategorisi</th>
              <th scope="col" class="sort" data-sort="status">İşlem</th>
            </tr>
          </thead>
          <tbody class="list" id="orders">
            @if (count($subcategories)>0)
            @foreach ($subcategories as $key => $subcategory)
            <tr>
                <td><a href="">{{$key+1}}</a></td>
                <td>{{$subcategory->name}}</td>
                <td>{{$subcategory->category->name}}</td>
                <td><a href="{{route('subcategory.edit',$subcategory->id)}}" class="btn btn-circle btn-sm float-left" title="Düzenle"><i class="fas fa-allergies"></i></a>
                    <form action="{{route('subcategory.destroy',$subcategory->id)}}" method="POST">
                      @csrf
                      @method("DELETE")
                      <a href="" category_id="{{$subcategory->id}}" class="btn btn-circle btn-sm float-left" id="remove-click" title="Sil" data-toggle="modal" data-target="#exampleModal{{$subcategory->id}}"><i class="fas fa-trash"></i></a>

                      <div class="modal fade" id="exampleModal{{$subcategory->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">İçerik Silme Alanı</h5><hr>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                                Alt Kategori Silinecek! Emin misiniz?
                               <!-- bilgilen den ilgili if bloğu çağrılacak -->
                            </div>
                            <div class="modal-footer">
                              <input type="hidden" name="id" id="deleteId">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                              <a href="{{route('subcategory.destroy',$subcategory->id)}}"><button class="btn btn-warning" id="deleteButton" title="Sil">Sil</button>
                            </div>
                          </div>
                        </div>
                      </div>

                    </form>
                </td>
            </tr>
            @endforeach
            @else
            <div class="card">
                <div class="alert alert-warning">
                    Gösterilecek Alt Kategori Bulunamadı!
                </div>
            </div>
            @endif
            
          </tbody>
        </table>
      </div>
    </div>
    </div>

@endsection

@section('delay-js')
    <script type="text/javascript"> 
      $(document).ready( function() {
        $('#message').delay(2000).fadeOut();
      });
    </script>
@endsection

@section('data-tables-scripts')
<script src="{{mix('admins/js/datatable/jquery.dataTables.min.js')}}"></script>
<script src="{{mix('admins/js/datatable/datatable-basic.init.js')}}"></script>   
@endsection