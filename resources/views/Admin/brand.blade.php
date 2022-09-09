@extends('Admin/layout')
@section('title', 'brand')
@section('brand-selected', 'active')
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
    <h1 class="m-b-10">brand page</h1>
    <a href="{{ url('/admin/brand/manage_brand') }}">
        <button type="button" class="btn btn-success">Add brand</button>
    </a>

    <div class="row m-t-30">
        <div class="col-md-12">
            <!-- DATA TABLE-->
            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Brand</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $list)
                            <tr>
                                <td>{{ $list->id }}</td>
                                <td>{{ $list->name }}</td>
                                <td>
                                    <img width="100px" src="{{ asset('storage/media/brand/'.$list->image) }}" alt="{{ $list->image }}">
                                </td>
                                <td>
                                    <a href="{{ url('admin/brand/edit') }}/{{ $list->id }}">
                                        <button type="button" class="btn btn-primary">Edit</button>
                                    </a>
                                    @if ($list->status == 1)
                                        <a href="{{ url('admin/brand/status/0') }}/{{ $list->id }}">
                                            <button type="button" class="btn btn-success">Active</button>
                                        </a>
                                    @else
                                        <a href="{{ url('admin/brand/status/1') }}/{{ $list->id }}">
                                            <button type="button" class="btn btn-warning">Deactive</button>
                                        </a>
                                    @endif
                                    <a href="{{ url('admin/brand/delete') }}/{{ $list->id }}">
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
