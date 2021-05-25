@extends('admin.layouts.master')


@section('toggle-css')
  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endsection

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
              <th scope="col" class="sort" data-sort="order">Taşıma</th>
              <th scope="col" class="sort" data-sort="image">Resim</th>
              <th scope="col" class="sort" data-sort="budget">Kategori</th>
              <th scope="col" class="sort" data-sort="budget">Açıklama</th>
              <th scope="col" class="sort" data-sort="budget">Sıralama</th>
              <th scope="col" class="sort" data-sort="budget">Durum</th>
              <th scope="col" class="sort" data-sort="status">İşlem</th>
            </tr>
          </thead>
          <tbody class="list" id="orders">
            @if ($categories->count()>0)
            @foreach ($categories as $category)
            <tr id="page_{{$category->id}}">
                <td><i class="fas fa-arrows-alt fa-2x handle" style="cursor: move"></i></td>
                <td><img src="{{Storage::url($category->image)}}" style="width:3em" alt="{{$category->name}}"/></td>
                <td>{{$category->name}}</td>
                <td>{{$category->description}}</td>
                <td>{{$category->order}}</td>
                 <!-- postProduct() ile ürün sayısını çekeceğiz -->
                <td>
                <input class="switch" category_id="{{$category->id}}" data-width="100" type="checkbox" @if($category->status==1) checked @endif  data-toggle="toggle" data-on="Açık" data-off="Kapalı" data-onstyle="primary" data-offstyle="warning"></td>
                <td>
                    <a href="{{route('category.edit',$category->id)}}" class="btn btn-circle btn-sm float-left" title="Edit"><i class="fas fa-allergies"></i></a>
                    <form action="{{route('category.destroy',$category->id)}}" method="POST">
                      @csrf
                      @method("DELETE")
                      <a href="" category_id="{{$category->id}}" class="btn btn-circle btn-sm float-left" id="remove-click" title="Sil" data-toggle="modal" data-target="#exampleModal{{$category->id}}"><i class="fas fa-trash"></i></a>

                      <div class="modal fade" id="exampleModal{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">İçerik Silme Alanı</h5><hr>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                                Kategori Silinecek! Emin misiniz?
                               <!-- bilgilen den ilgili if bloğu çağrılacak -->
                            </div>
                            <div class="modal-footer">
                              <input type="hidden" name="id" id="deleteId">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                              <a href="category-delete/{{$category->id}}"><button class="btn btn-warning" id="deleteButton" title="Sil">Sil</button>
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
                    Gösterilecek Kategori Bulunamadı! Lütfen Kategori Ekleyin.
                </div>
            </div>
            @endif
            
          </tbody>
        </table>
      </div>
    </div>
    </div>

@endsection

@section('toggle-js')
  <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
  <script>
     $(function() {
    $('.switch').change(function() {
      id = $(this)[0].getAttribute('category_id');
      console.log(id)
      status = $(this).prop('checked');
      $.get("{{route('switch')}}", {id:id, status:status}, function(data, status) {
      console.log(data);
      });
    })
  })
  </script>
  <script>
    $(function() {
      $('#remove-click').click(function() {
        id = $(this)[0].getAttribute('category_id');
        console.log(id);
        if(id==1) {
          $('#articleAlert').html('Genel Kategorisi Sabit Kategoridir. Silinen Diğer Kategori İçerikleri Buraya Eklenmektedir.');
          $('#body').show();
          $('#deleteButton').hide();
          $('#deleteModal').modal();
          return;
        }
      });
    })
    
  </script>
@endsection

@section('sortable')
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.13.0/Sortable.min.js"></script>

  <script>
  $('#orders').sortable({
    handle: '.handle',
    update: function(){
      var siralama = $('#orders').sortable('serialize');
      $.get("{{route('category.orders')}}?"+siralama, function(data,status){
          $("#orderSuccess").show().delay(2000).fadeOut();
      });
    }
    
  });
</script>
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