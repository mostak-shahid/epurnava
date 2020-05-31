@extends('layouts.admin')
@section('page-title')
    AdminLTE 3 | Starter
@endsection
@section('header-title')
    All Categories
@endsection
@section('header-breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">Starter Page</li>
</ol>
@endsection
@section('content')
    <div class="modal fade" id="editCategoryModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Category: <span class="cat-name"></span></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editForm" method="POST" action="{{route('admin.category.update')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="old-name">Name</label>
                            <input type="text" class="form-control" id="old-name" name="name" placeholder="Name" required>
                        </div>
                        <div class="form-group">
                            <label for="old-parent">Parent category</label>
                            <select name="parent" id="old-parent" class="select2bs4" data-placeholder="Select a category"
                                    style="width: 100%;">
                                <option value="">None</option>
                                @if(isset($product_categories) && $product_categories->count())
                                    @foreach($product_categories as $p_cat)
                                        <option value="{{$p_cat->id}}">{{$p_cat->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="old-description">Description</label>
                            <textarea id="old-description" name="description" class="textarea" placeholder="Place some text here" style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="old-thumbnail">Thumbnail</label>
                                    <input type="file" class="form-control-file d-none image-input" name="thumbnail" id="old-thumbnail">
                                    <img class="img-fluid mb-2 image-to-view d-block" id="old-thumbnail-img" src="{{route('image', ['url'=>'no_image_available.jpg', 'width'=>80])}}">
                                    <div class="button-con">
                                        <label class="btn btn-sm btn-success mb-0" for="old-thumbnail"><i class="fa fa-fw fa-plus"></i></label>
                                        <button type="button" class="btn btn-sm btn-danger reset-image"><i class="fa fa-fw fa-times"></i></button>
                                        <input type="hidden" class="prev-img-id" id="thumbnail_id" name="thumbnail_id" value="0">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="old-banner">Banner</label>
                                    <input type="file" class="form-control-file d-none image-input" name="banner" id="old-banner">
                                    <img class="img-fluid mb-2 image-to-view d-block" id="old-banner-img" src="{{route('image', ['url'=>'no_image_available.jpg', 'width'=>80])}}">
                                    <div class="button-con">
                                        <label class="btn btn-sm btn-success mb-0" for="old-banner"><i class="fa fa-fw fa-plus"></i></label>
                                        <button type="button" class="btn btn-sm btn-danger reset-image"><i class="fa fa-fw fa-times"></i></button>
                                        <input type="hidden" class="prev-img-id" id="banner_id" name="banner_id" value="0">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-block btn-primary">Submit</button>
                        <input type="hidden" name="for" value="product">
                        <input type="hidden" id="category_id" name="id" value="">
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<div class="row">
    <div class="col-lg-7 order-lg-last">
        <div class="card">
            <div class="card-body">
                <table id="categories_table" class="table table-sm table-bordered responsive align-middle">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Thumbnail</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Count</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div><!-- /.card -->
    </div>
    <!-- /.col-md-6 -->
    <div class="col-lg-5 order-lg-first">
        <div class="card">
            <div class="card-header">
                <h5 class="m-0">Add new category</h5>
            </div>
            <div class="card-body">
                <form id="createForm" method="POST" action="{{route('admin.category.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                        <small class="form-text text-muted">The name is how it appears on your site.</small>
                    </div>
                    <div class="form-group">
                        <label for="parent">Parent category</label>
                        <select name="parent" id="parent" class="select2bs4" data-placeholder="Select a category"
                                style="width: 100%;">
                            <option value="">None</option>
                            @if(isset($product_categories) && $product_categories->count())
                                @foreach($product_categories as $p_cat)
                                    <option value="{{$p_cat->id}}">{{$p_cat->name}}</option>
                                @endforeach
                            @endif
                        </select>
                        <small class="form-text text-muted">Assign a parent term to create a hierarchy. The term Jazz, for example, would be the parent of Bebop and Big Band.</small>
                    </div>
                    <div class="form-group">
                        <label for="parent">Description</label>
                        <textarea name="description" class="textarea" placeholder="Place some text here" style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                        <small class="form-text text-muted">The description is not prominent by default; however, some themes may show it..</small>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="thumbnail">Thumbnail</label>
                                <input type="file" class="form-control-file d-none image-input" name="thumbnail" id="thumbnail">
                                <img class="img-fluid mb-2 image-to-view d-block" id="thumbnail-img" src="{{route('image', ['url'=>'no_image_available.jpg', 'width'=>80])}}">
                                <div class="button-con">
                                    <label class="btn btn-sm btn-success mb-0" for="thumbnail"><i class="fa fa-fw fa-plus"></i></label>
                                    <button type="button" class="btn btn-sm btn-danger reset-image"><i class="fa fa-fw fa-times"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="banner">Banner</label>
                                <input type="file" class="form-control-file d-none image-input" name="banner" id="banner">
                                <img class="img-fluid mb-2 image-to-view d-block" id="banner-img" src="{{route('image', ['url'=>'no_image_available.jpg', 'width'=>80])}}">
                                <div class="button-con">
                                    <label class="btn btn-sm btn-success mb-0" for="banner"><i class="fa fa-fw fa-plus"></i></label>
                                    <button type="button" class="btn btn-sm btn-danger reset-image"><i class="fa fa-fw fa-times"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-block btn-primary">Submit</button>
                    <input type="hidden" name="for" value="product">
                </form>
            </div>
        </div>
    </div>
    <!-- /.col-md-6 -->
</div>
<!-- /.row -->
@endsection
@section('style')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('asset/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('asset/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('asset/plugins/summernote/summernote-bs4.css')}}">
@endsection
@section('script')
    <!-- DataTables -->
    <script src="{{ asset('asset/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('asset/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('asset/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <!-- Select2 -->
    <script src="{{asset('asset/plugins/select2/js/select2.full.min.js')}}"></script>
    <script src="{{asset('asset/plugins/image-uploader/image-uploader.min.js')}}"></script>
    <!-- Summernote -->
    <script src="{{asset('asset/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <!-- jquery-validation -->
    <script src="{{asset('asset/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('asset/plugins/jquery-validation/additional-methods.min.js')}}"></script>
    <script>
        jQuery(document).ready(function($){
            var categories_table = $( '#categories_table' );
            categories_table.DataTable({
                dom:"<'row'<'col-lg-6'l><'col-lg-6'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-lg-5'i><'col-lg-7'p>>",
                aLengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
                order: [[ 0, "desc" ]],
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('admin.product.categories') }}",
                },
                columns: [
                    {
                        data: 'id',
                        name: 'id',
                    },
                    {
                        data: 'thumbnail',
                        name: 'thumbnail',
                        orderable: false,
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'slug',
                        name: 'slug'
                    },
                    {
                        data: 'count',
                        name: 'count'
                    }
                ]
            });
            $('body').on('click', '.edit-catogory', function (e){
                e.preventDefault();
                var id = $(this).data('id');
                $.ajax({
                    url:"{{route('catrgory.single')}}"+"/"+id,
                    type:"GET",
                    dataType:"json",
                    success: function(result){
                        console.log(result);
                        if (result.id) {
                            $('#category_id').val(result.id);
                        }
                        else {
                            $('#category_id').val('');
                        }
                        if (result.name) {
                            $('.cat-name').html(result.name);
                            $('#old-name').val(result.name);
                        } else {
                            $('.cat-name').html('');
                            $('#old-name').val('');
                        }
                        if (result.parent) {
                            $('#old-parent').val(result.parent);
                            $('.select2bs4').select2({
                                theme: 'bootstrap4'
                            });
                        } else {
                            $('#old-parent').val('');
                        }
                        if (result.description) {
                            $('#old-description').val(result.description);
                            $(".textarea").summernote("code", result.description);
                        } else {
                            $('#old-description').val('');
                            $(".textarea").summernote("code", "");
                        }
                        if (result.thumbnail_id){
                            $('#thumbnail_id').val(result.thumbnail_id);
                        } else {
                            $('#thumbnail_id').val('');
                        }
                        if (result.thumbnail) {
                            $('#old-thumbnail-img').attr('src',result.thumbnail);
                        } else {
                            $('#old-thumbnail-img').attr('src', '{{route('image',['url'=>'no_image_available.jpg', 'width'=>80])}}');
                        }
                        if (result.banner_id){
                            $('#banner_id').val(result.banner_id);
                        } else {
                            $('#banner_id').val('');
                        }
                        if (result.banner) {
                            $('#old-banner-img').attr('src',result.banner);
                        } else {
                            $('#old-banner-img').attr('src', '{{route('image',['url'=>'no_image_available.jpg', 'width'=>80])}}');
                        }
                        $('#editCategoryModal').modal('show');
                    },
                    error: function(errorThrown){
                        console.log(errorThrown);
                    }
                });
            });
            $('body').on('click', '.delete-category', function (e){
                e.preventDefault();
                var href = $(this).attr('href');
                if (confirm("You like to delete this category?")) {
                    window.location.href = href;
                }
            });
            /*
            * if (confirm("Press a button!")) {
             txt = "You pressed OK!";
             }*/
            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            });
            // Summernote
            $('.textarea').summernote();
            function readURL(input,id) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#'+id).next('img').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]); // convert to base64 string
                }
            }
            $(".image-input").change(function() {
                var id = $(this).attr('id');
                readURL(this,id);
            });

            $('.reset-image').click(function(){
                $(this).next('.prev-img-id').val('');
                $(this).closest('.form-group').find('input[type="file"]').val('');
                $(this).closest('.form-group').find('img').attr('src','{{route('image', ['url'=>'no_image_available.jpg', 'width'=>80])}}');
            });

            $('#createForm').validate({
                rules: {
                    name: {
                        required: true,
                    }
                },
                messages: {
                    name: {
                        required: "Please enter a category name",
                    }
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
@endsection
