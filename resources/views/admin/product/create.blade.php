@extends('layouts.admin')
@section('page-title')
    AdminLTE 3 | Starter
@endsection
@section('header-title')
    Add new product
@endsection
@section('header-breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">Starter Page</li>
</ol>
@endsection
@section('content')
    <form id="createForm" method="POST" action="{{route('admin.post.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-8">
                <div class="form-group">
                    <input type="text" class="form-control" id="title" name="title" placeholder="Product Name" required>
                </div>
            </div>
            <!-- /.col-md-8 -->
            <div class="col-lg-4 mb-4 mb-lg-0">
                <button type="submit" class="btn btn-block btn-success">Submit</button>
            </div>
            <!-- /.col-md-4 -->
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            Product description
                        </h3>
                        <!-- tools box -->
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                        <!-- /. tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <textarea name="content" class="textarea" placeholder="Place some text here" style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            Product data
                        </h3>
                        <!-- tools box -->
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                        <!-- /. tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row no-gutters">
                            <div class="col-5 col-sm-3">
                                <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                                    <a class="nav-link active" id="vert-tabs-general-tab" data-toggle="pill" href="#vert-tabs-general" role="tab" aria-controls="vert-tabs-general" aria-selected="true">General</a>
                                    <a class="nav-link" id="vert-tabs-inventory-tab" data-toggle="pill" href="#vert-tabs-inventory" role="tab" aria-controls="vert-tabs-inventory" aria-selected="false">Inventory</a>
                                    <a class="nav-link" id="vert-tabs-shipping-tab" data-toggle="pill" href="#vert-tabs-shipping" role="tab" aria-controls="vert-tabs-shipping" aria-selected="false">Shipping</a>
                                    <a class="nav-link" id="vert-tabs-attributes-tab" data-toggle="pill" href="#vert-tabs-attributes" role="tab" aria-controls="vert-tabs-attributes" aria-selected="false">Attributes</a>
                                </div>
                            </div>
                            <div class="col-7 col-sm-9">
                                <div class="tab-content border border-left-0 p-4 h-100" id="vert-tabs-tabContent">
                                    <div class="tab-pane text-left fade show active" id="vert-tabs-general" role="tabpanel" aria-labelledby="vert-tabs-general-tab">
                                        <div class="form-horizontal">
                                            <div class="form-group row">
                                                <label for="price" class="col-lg-4 col-form-label control-label">Regular price</label>
                                                <div class="col-lg-8">
                                                    <input name="price" id="price" type="text" class="form-control" placeholder="Regular price" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="sale_price" class="col-lg-4 col-form-label control-label">Sale Price</label>
                                                <div class="col-lg-8">
                                                    <input name="sale_price" id="sale_price" type="text" class="form-control" placeholder="Sale Price">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="unit" class="col-lg-4 col-form-label control-label">Unit</label>
                                                <div class="col-lg-8">
                                                    <input name="unit" id="unit" type="text" class="form-control" placeholder="Unit" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="tax_status" class="col-lg-4 col-form-label control-label">Tax status</label>
                                                <div class="col-lg-8">
                                                    <select name="tax_status" id="tax_status" class="custom-select">
                                                        <option>Taxable</option>
                                                        <option>Shipping only</option>
                                                        <option selected>None</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="tax_class" class="col-lg-4 col-form-label control-label">Tax class</label>
                                                <div class="col-lg-8">
                                                    <select name="tax_class" id="tax_class" class="custom-select">
                                                        <option>Standard</option>
                                                        <option>Reduced rate</option>
                                                        <option>Zero rate</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="tab-pane fade" id="vert-tabs-inventory" role="tabpanel" aria-labelledby="vert-tabs-inventory-tab">
                                        <div class="form-group row">
                                            <label for="sku" class="col-lg-4 col-form-label control-label">SKU</label>
                                            <div class="col-lg-8">
                                                <input name="sku" id="sku" type="text" class="form-control" placeholder="SKU">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="manage_stock" class="col-lg-4 col-form-label control-label">Manage stock?</label>
                                            <div class="col-lg-8">
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" type="checkbox" name="manage_stock" id="manage_stock" value="1">
                                                    <label for="manage_stock" class="custom-control-label">Enable stock management at product level</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="stock_status" class="col-lg-4 col-form-label control-label">Stock status</label>
                                            <div class="col-lg-8">
                                                <select name="stock_status" id="stock_status" class="custom-select">
                                                    <option>In stock</option>
                                                    <option>Out of stock</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row" style="display: none;">
                                            <label for="stock" class="col-lg-4 col-form-label control-label">Stock quantity</label>
                                            <div class="col-lg-8">
                                                <input name="stock" id="stock" type="number" class="form-control" placeholder="Stock quantity">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="vert-tabs-shipping" role="tabpanel" aria-labelledby="vert-tabs-shipping-tab">
                                        <div class="form-group row">
                                            <label for="weight" class="col-lg-4 col-form-label control-label">Weight (kg)</label>
                                            <div class="col-lg-8">
                                                <input name="weight" id="weight" type="number" class="form-control" placeholder="Weight (kg)">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="dimensions" class="col-lg-4 col-form-label control-label">Dimensions (in)</label>
                                            <div class="col-lg-8">
                                                <div class="form-row">
                                                    <div class="col-lg-4">
                                                        <input name="height" id="height" type="number" class="form-control" placeholder="Length">
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <input name="width" id="width" type="number" class="form-control" placeholder="Width">
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <input name="height" id="height" type="number" class="form-control" placeholder="Height">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="vert-tabs-attributes" role="tabpanel" aria-labelledby="vert-tabs-attributes-tab">
                                        Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            Product short description
                        </h3>
                        <!-- tools box -->
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                        <!-- /. tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <textarea name="excerpt" class="textarea" placeholder="Place some text here" style="width: 100%; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                    </div>
                </div>
            </div>
            <!-- /.col-md-8 -->
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            Publish
                        </h3>
                        <!-- tools box -->
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                        <!-- /. tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-group">
                            <label for="status" class="control-label">Status</label>
                            <select name="status" id="status" class="custom-select">
                                <option>Pending Review</option>
                                <option>Draft</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="visibility" class="control-label">Visibility</label>
                            <select name="visibility" id="visibility" class="custom-select">
                                <option>Public</option>
                                <option>Password protected</option>
                                <option>Private</option>
                            </select>
                        </div>
                        <div class="form-group" style="display:none">
                            <label for="password" class="control-label">Password</label>
                            <input name="password" id="password" type="text" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="publish_at" class="control-label">Publish</label>
                            <input name="publish_at" id="publish_at" type="text" class="form-control" placeholder="Publish">
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            Product categories
                        </h3>
                        <!-- tools box -->
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                        <!-- /. tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="catagories-container">
                            <ul>
                                <li>
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" id="product-category-1" value="option1">
                                        <label for="product-category-1" class="custom-control-label">Custom Checkbox</label>
                                    </div>
                                    <ul>
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" type="checkbox" id="product-category-2" value="option1">
                                                <label for="product-category-2" class="custom-control-label">Custom Checkbox</label>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            Product tags
                        </h3>
                        <!-- tools box -->
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                        <!-- /. tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-group">
                            <select class="select2bs4" multiple="multiple" data-placeholder="Select a tag"
                                    style="width: 100%;">
                                <option>Alabama</option>
                                <option>Alaska</option>
                                <option>California</option>
                                <option>Delaware</option>
                                <option>Tennessee</option>
                                <option>Texas</option>
                                <option>Washington</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            Product image
                        </h3>
                        <!-- tools box -->
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                        <!-- /. tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-group">
                            <img class="img-fluid mb-2" id="feature-image-view" src="{{route('image', ['url'=>'no_image_available.jpg', 'width'=>300])}}">
                            <div class="button-con">
                                <label class="btn btn-success" for="feature-image">Add Image</label>
                                <button type="button" id="reset-feature-image" class="btn btn-danger align-top">Cencle</button>
                            </div>
                            <input type="file" class="form-control-file d-none" name="feature-image" id="feature-image">
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            Product gallery
                        </h3>
                        <!-- tools box -->
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                        <!-- /. tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="input-field">
                            <div class="gallery-images cup"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col-md-4 -->
        </div>
        <!-- /.row -->
        <input type="hidden" name="type" value="product">
    </form>
@endsection
@section('style')
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('asset/plugins/summernote/summernote-bs4.css')}}">
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{asset('asset/plugins/daterangepicker/daterangepicker.css')}}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('asset/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('asset/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    {{--image-uploader--}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="{{asset('asset/plugins/image-uploader/image-uploader.min.css')}}">
@endsection
@section('script')

    <!-- jquery-validation -->
    <script src="{{asset('asset/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('asset/plugins/jquery-validation/additional-methods.min.js')}}"></script>
    <!-- Summernote -->
    <script src="{{asset('asset/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <!-- daterange picker -->
    <script src="{{asset('asset/plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('asset/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <!-- Select2 -->
    <script src="{{asset('asset/plugins/select2/js/select2.full.min.js')}}"></script>
    <script src="{{asset('asset/plugins/image-uploader/image-uploader.min.js')}}"></script>
    <script>
        jQuery(document).ready(function($){
            // Summernote
            $('.textarea').summernote();
            // Daterange picker
            $('#publish_at').daterangepicker({
                // format: 'LC',
                singleDatePicker: true,
                timePicker:true,
                timePicker24Hour:true,
                timePickerSeconds: true,
                locale: {
                    format: 'YYYY-MM-DD HH:mm:ss'
                }
            });
            var today = new Date();
            var date = today.getFullYear()+'-'+("0" + (today.getMonth() + 1)).slice(-2)+'-'+("0" + today.getDate()).slice(-2);
            var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
            var dateTime = date+' '+time;
            $('#publish_at').val(dateTime);
            $('#visibility').change(function(){
                if ($(this).val() == 'Password protected'){
                    $('#password').closest('.form-group').show();
                } else {
                    $('#password').closest('.form-group').hide();
                }
            });
            $('#reset-feature-image').click(function(){
                $('#feature-image').val('');
                $('#feature-image-view').attr('src','{{route('image', ['url'=>'no_image_available.jpg', 'width'=>300])}}');
            });

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            });
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#feature-image-view').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]); // convert to base64 string
                }
            }
            $("#feature-image").change(function() {
                readURL(this);
            });
            //Only for product
            $("#manage_stock").change(function() {
                if ($('#manage_stock').is(":checked")) {
                    $('#stock').closest('.form-group').show();
                    $('#stock_status').closest('.form-group').hide();
                } else {
                    $('#stock_status').closest('.form-group').show();
                    $('#stock').closest('.form-group').hide();
                }
            });
            $('.gallery-images').imageUploader();
            //Only for product
            $('#createForm').validate({
                rules: {
                    title: {
                        required: true,
                    },
                },
                messages: {
                    title: {
                        required: "Please enter a product name",
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
        })
    </script>
@endsection
