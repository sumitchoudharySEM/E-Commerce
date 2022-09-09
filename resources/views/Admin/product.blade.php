@extends('Admin/layout')
@section('title', 'product')
@section('product-selected', 'active')
@section('container')

    @if (session()->has('message'))
        <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
            <span class="badge badge-pill badge-success"></span>
            {{ session('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    @endif

    <h1 class="m-b-10">product page</h1>
    <a href="{{ url('/admin/product/manage_product') }}">
        <button type="button" class="btn btn-success">Add product</button>
    </a>

    <div class="row m-t-30">
        <div class="col-md-12">
            <!-- DATA TABLE-->
            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>product Name</th>
                            <th>Slug</th>
                            <th>Image</th>
                            {{-- <th>category_id</th>
                            <th>brand</th>
                            <th>model</th>
                            <th>desc</th>
                            <th>short_desc</th>
                            <th>keywords</th>
                            <th>technical_specification</th>
                            <th>uses</th>
                            <th>warranty</th>
                            <th>image</th> --}}
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $list)
                            <tr>
                                <td>{{ $list->id }}</td>
                                <td>{{ $list->name }}</td>
                                <td>{{ $list->slug }}</td>
                                <td>
                                    <img width="100px" src="{{ asset('storage/media/'.$list->image) }}" alt="{{ $list->image }}">
                                </td>
                                {{-- php artisan storage:link --}}
                                {{-- <td>{{ $list->category_id }}</td>
                                <td>{{ $list->brand }}</td>
                                <td>{{ $list->model }}</td>
                                <td>{{ $list->desc }}</td>
                                <td>{{ $list->short_desc }}</td>
                                <td>{{ $list->keywords }}</td>
                                <td>{{ $list->technical_specification }}</td>
                                <td>{{ $list->uses }}</td>
                                <td>{{ $list->warranty }}</td>
                                <td>{{ $list->image }}</td> --}}
                                <td>
                                    <a href="{{ url('admin/product/manage_product') }}/{{ $list->id }}">
                                        <button type="button" class="btn btn-primary">Edit</button>
                                    </a>
                                    @if ($list->status == 1)
                                        <a href="{{ url('admin/product/status/0') }}/{{ $list->id }}">
                                            <button type="button" class="btn btn-success">Active</button>
                                        </a>
                                    @else
                                        <a href="{{ url('admin/product/status/1') }}/{{ $list->id }}">
                                            <button type="button" class="btn btn-warning">Deactive</button>
                                        </a>
                                    @endif

                                    <a href="{{ url('admin/product/delete') }}/{{ $list->id }}">
                                        <button type="button" class="btn btn-danger">Delete</button>
                                    </a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- END DATA TABLE-->
        </div>
    </div>
@endsection
