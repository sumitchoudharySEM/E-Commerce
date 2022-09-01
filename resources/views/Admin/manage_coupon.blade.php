@extends('Admin/layout')
@section('title', 'Manage Coupon')
@section('container')
    <h1 class="m-b-10">{{ $heading }}</h1>
    <a href="{{ url('admin/coupon') }}">
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
                            <label for="title" class="control-label mb-1">Coupon Title</label>
                            <input id="title" name="title" type="text" class="form-control"
                                aria-required="true" aria-invalid="false" required
                                @isset($model)
                                value="{{ $model->title }}"
                               @endisset />
                            @error('title')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="code" class="control-label mb-1">Coupon Code</label>
                            <input id="code" name="code" type="text" class="form-control"
                                aria-required="true" aria-invalid="false" required
                                @isset($model) value="{{ $model->code }}"
                                @endisset />
                            @error('code')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="value" class="control-label mb-1">Coupon value</label>
                            <input id="value" name="value" type="text" class="form-control"
                                aria-required="true" aria-invalid="false" required
                                @isset($model) value="{{ $model->value }}"
                                @endisset />
                            @error('value')
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
