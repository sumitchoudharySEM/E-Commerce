@extends('Admin/layout')
@section('title', 'Manage Category')
@section('category-selected', 'active')
@section('container')
    <h1 class="m-b-10">{{ $heading }}</h1>
    <a href="{{ url('admin/category') }}">
        <button type="button" class="btn btn-success">Back</button>
    </a>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                    </div>
                    <form action="{{ url('/admin') }}/{{ $url }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="category_name" class="control-label mb-1">Catogery</label>
                            <input id="category_name" name="category_name" type="text" class="form-control"
                                aria-required="true" aria-invalid="false" required
                                @isset($model)
                                value="{{ $model->category_name }}"
                                @else
                               @endisset />
                            @error('category_name')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="category_slug" class="control-label mb-1">Catogery Slug</label>
                            <input id="category_slug" name="category_slug" type="text" class="form-control"
                                aria-required="true" aria-invalid="false" required
                                @isset($model) value="{{ $model->category_slug }}"
                                @endisset />
                            @error('category_slug')
                                <div class="alert alert-danger">
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
