@extends('Admin/layout')
@section('title', 'Manage color')
@section('color-selected', 'active')
@section('container')
    <h1 class="m-b-10">{{ $heading }}</h1>
    <a href="{{ url('admin/color') }}">
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
                            <label for="color" class="control-label mb-1">color </label>
                            <input id="color" name="color" type="text" class="form-control" aria-required="true"
                                aria-invalid="false" required
                                @isset($model)
                                value="{{ $model->color }}"
                               @endisset />
                            @error('color')
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
