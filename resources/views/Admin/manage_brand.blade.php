@extends('Admin/layout')
@section('title', 'Manage brand')
@section('brand-selected', 'active')
@section('container')
@error('image')
{{ $message }}
@enderror
    <h1 class="m-b-10">{{ $heading }}</h1>
    <a href="{{ url('admin/brand') }}">
        <button type="button" class="btn btn-success">Back</button>
    </a>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                    </div>
                    <form action="{{ url('/admin') }}/{{ $url }}" method="post"
                    enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="brand" class="control-label mb-1">brand name </label>
                            <input id="name" name="name" type="text" class="form-control" aria-required="true"
                                aria-invalid="false" required
                                @isset($model)
                                value="{{ $model->name }}"
                               @endisset />
                            @error('name')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="image" class="control-label mb-1"> Image</label>
                            <input id="image" name="image" type="file" class="form-control" aria-required="true"
                                aria-invalid="false">
                               
                            @error('image')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div>
                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
