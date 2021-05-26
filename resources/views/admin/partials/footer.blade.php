</div>

</div>
<footer class="footer text-center text-muted">
    All Rights Reserved by mrcoder. Designed and Developed by <a href="https://www.puppiestar.com">Puppiestar</a>.
</footer>
<script src="{{mix('admins/js/hc-admin.js')}}"></script>
<script src="{{mix('admins/js/datatable/datatable-basic.init.js')}}"></script>
<script src="{{mix('admins/js/datatable/jquery.dataTables.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
  $('#summernote').summernote({
    placeholder: 'Ürün Açıklaması Ekleyin',
        tabsize: 2,
        height: 250
  });
 
});
</script>
<script type="text/javascript">
    $(document).ready(function() {
  $('#summernote1').summernote({
    placeholder: 'Ürün Detaylarını Buraya Ekleyin',
        tabsize: 2,
        height: 250
  });
});
</script>
@yield('dashboard-js')
@yield('page-level-scripts')

</body>

</html>