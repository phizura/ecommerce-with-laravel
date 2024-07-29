@extends('admin.layouts.main') @section('content')
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Product</h1>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="title">Title</label>
                                            <input type="text" name="title" id="title"
                                                class="form-control @error('title') is-invalid @enderror"
                                                placeholder="Title" />
                                            @error('title')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="slug">Slug</label>
                                            <input type="text" name="slug" id="slug"
                                                class="form-control @error('slug') is-invalid @enderror" placeholder="Slug"
                                                readonly />
                                            @error('slug')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="description"
                                                @error('slug') style="color: red;" @enderror>Description</label>
                                            <textarea name="description" id="description" cols="30" rows="10" class="summernote"
                                                placeholder="Description"></textarea>
                                            @error('description')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <input type="hidden" id="image_id" name="image_id" />
                                <h2 class="h4 mb-3">Media</h2>
                                <div id="image" class="dropzone dz-clickable">
                                    <div class="dz-message needsclick">
                                        <br />Drop files here or click to upload.<br /><br />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Pricing</h2>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="price">Price</label>
                                            <input type="text" name="price" id="price"
                                                class="form-control @error('price') is-invalid @enderror"
                                                placeholder="Price" />
                                            @error('price')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="compare_price">Compare at Price</label>
                                            <input type="text" name="compare_price" id="compare_price"
                                                class="form-control"
                                                placeholder="Compare Price @error('compare_price') is-invalid @enderror" />
                                            @error('compare_price')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                            <p class="text-muted mt-3">
                                                To show a reduced price, move the
                                                product’s original price into
                                                Compare at price. Enter a lower
                                                value into Price.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Inventory</h2>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="sku">SKU (Stock Keeping Unit)</label>
                                            <input type="text" name="sku" id="sku"
                                                class="form-control @error('sku') is-invalid @enderror" placeholder="sku" />
                                            @error('sku')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="barcode">Barcode</label>
                                            <input type="text" name="barcode" id="barcode"
                                                class="form-control @error('barcode') is-invalid @enderror"
                                                placeholder="Barcode" />
                                            @error('barcode')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <div class="custom-control custom-checkbox">
                                                <input type="hidden" name="track_qty" id="track_qty" value="Yes">
                                                <input class="custom-control-input" type="checkbox" id="radio_qty"
                                                    checked />
                                                <label for="radio_qty" class="custom-control-label"
                                                    @error('track_qty') style="color: red;" @enderror>Track Quantity</label>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <input type="number" min="0" name="qty" id="qty"
                                                class="form-control" placeholder="Qty" />
                                            @error('qty')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Product status</h2>
                                <div class="mb-3">
                                    <select name="is_active" id="is_active"
                                        class="form-control @error('ser'
                                        ) is-invalid @enderror">
                                        <option value="1">Active</option>
                                        <option value="0">Block</option>
                                    </select>
                                    @error('is_active')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Product category</h2>
                                <div class="mb-3">
                                    <label for="category">Category</label>
                                    <select name="category_id" id="category"
                                        class="form-control @error('category_id') is-invalid @enderror">
                                        <option value="" selected>
                                            --Select Category--
                                        </option>
                                        @if ($categories->isNotEmpty())
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('category_id')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="category">Sub category</label>
                                    <select name="sub_category_id" id="sub_category"
                                        class="form-control @error('sub_category_id') is-invalid @enderror">
                                        <option value="" selected>
                                            --Select Sub Category--
                                        </option>
                                    </select>
                                    @error('sub_category_id')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Product brand</h2>
                                <div class="mb-3">
                                    <select name="brand_id" id="brand"
                                        class="form-control @error('brand_id') is-invalid @enderror">
                                        <option value="" selected>
                                            --Select Brand--
                                        </option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('brand_id')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Featured product</h2>
                                <div class="mb-3">
                                    <select name="is_featured" id="featured"
                                        class="form-control @error('is_featured') is-invalid @enderror">
                                        <option value="No">No</option>
                                        <option value="Yes">Yes</option>
                                    </select>
                                    @error('is_featured')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pb-5 pt-3">
                    <button class="btn btn-primary" type="submit" id="submit-button">
                        Create
                    </button>
                    <a href="{{ route('products.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
                </div>
            </div>
        </form>
        <!-- /.card -->
    </section>


    @endsection @section('customJS')
    <script>
        $(document).ready(function() {
            $("form").on("submit", function() {
                $("#submit-button").prop("disabled", true);
                const load = `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
    Loading...`;
                $("#submit-button").html(load);
            });

            $('#radio_qty').click(function() {
                const track = $('#track_qty');
                const value = track.val();
                if (value == 'Yes') {
                    newValue = 'No';
                } else {
                    newValue = 'Yes';
                };
                track.attr('value', newValue);
            })

            $("#title").change(function() {
                element = $(this);
                console.log(element);
                $.ajax({
                    url: `{{ route('getSlug') }}`,
                    type: "get",
                    data: {
                        title: element.val(),
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response["status"]) {
                            $("#slug").val(response["slug"]);
                        }
                    },
                });
            });

            $("#category").change(function() {

                const presentElement = $(this).val();

                $("#sub_category").empty();
                const defaultOption = $(`<option>--Select Sub Category--</option>`);
                defaultOption.attr("value");
                defaultOption.attr("selected");
                $("#sub_category").append(defaultOption);

                $.ajax({
                    url: `{{ route('getDropDown') }}`,
                    type: "get",
                    data: {
                        id: presentElement,
                    },
                    dataType: "json",
                    success: function(result) {
                        const data = result.data;

                        if (data.length > 0) {
                            data.forEach((subCategory) => {
                                const newOption = $(
                                    `<option>${subCategory.name}</option>`
                                );
                                newOption.attr("value", subCategory.id);
                                $("#sub_category").append(newOption);
                            });
                        }
                    },
                });
            });
        });

        Dropzone.autoDiscover = false;
        const dropzone = $("#image").dropzone({
            init: function() {
                this.on("addedfile", function(file) {
                    if (this.files.length > 1) {
                        this.removeFile(this.files[0]);
                    }
                });
            },
            url: "{{ route('temp-images.create') }}",
            maxFiles: 1,
            paramName: "image",
            addRemoveLinks: true,
            acceptedFiles: "image/jpeg,image/png,image/gif",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function(file, response) {
                $("#image_id").val(response.image_id);
            },
        });
    </script>
@endsection
