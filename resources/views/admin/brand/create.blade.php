@extends('admin.layouts.main') @section('content')
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Brand</h1>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="container-fluid">
            <form action="{{ route('brand.store') }}" method="post" id="brand-form">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name"
                                        class="form-control @error('name') is-invalid @enderror" placeholder="Name"
                                        value="{{ old('name') }}"">
                                    @error('name')
                                        <p class="invalid-feedback">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email">Slug</label>
                                    <input type="text" name="slug" id="slug"
                                        class="form-control @error('slug') is-invalid @enderror" placeholder="Slug" readonly
                                        value="{{ old('slug') }}"">
                                    @error('slug')
                                        <p class="invalid-feedback">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="name">Status</label>
                                    <select name="is_active" id="status"
                                        class="form-control @error('is_active') is-invalid @enderror">
                                        @if (old('is_active'))
                                            @if (old('is_active') == 1)
                                                <option value="">--Select Status--</option>
                                                <option value="1" selected>Active</option>
                                                <option value="0">Block</option>
                                            @else
                                                <option value="">--Select Status--</option>
                                                <option value="1">Active</option>
                                                <option value="0" selected>Block</option>
                                            @endif
                                        @else
                                            <option value="" selected>--Select Status--</option>
                                            <option value="1">Active</option>
                                            <option value="0">Block</option>
                                        @endif
                                    </select>
                                    @error('is_active')
                                        <p class="invalid-feedback">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pb-5 pt-3">
                    <button class="btn btn-primary" type="submit" id="submit-brand">Create</button>
                    <a href="{{ route('brand.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </section>

    @include('admin.partials.message')
@endsection
@section('customJS')
    <script>
        $(document).ready(function() {
            $('#brand-form').on('submit', function() {
                $('#submit-brand').prop('disabled', true);
                const load = `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
  Loading...`
                $('#submit-brand').html(load);
            });

            $("#name").change(function() {
                element = $(this);
                $.ajax({
                    url: '{{ route('getSlug') }}',
                    type: 'get',
                    data: {
                        title: element.val()
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response['status']) {
                            $('#slug').val(response['slug'])
                        }
                    }
                });
            })
        })
    </script>
@endsection
