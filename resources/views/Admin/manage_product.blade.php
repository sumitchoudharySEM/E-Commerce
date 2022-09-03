@extends('Admin/layout')
@section('title', 'Manage product')
@section('product-selected', 'active')
@section('container')
{{-- @if(isset($model))
    {{ $image_required="" }}
@else --}}
    {{-- {{ $image_required="required" }}
@endif --}}
    <h1 class="m-b-10">{{ $heading }}</h1>
    <a href="{{ url('admin/product') }}">
        <button type="button" class="btn btn-success">Back</button>
    </a>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                    </div>
                    <form action="{{ url('/admin') }}/{{ $url }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="name" class="control-label mb-1">product name</label>
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
                            <label for="slug" class="control-label mb-1">product Slug</label>
                            <input id="slug" name="slug" type="text" class="form-control" aria-required="true"
                                aria-invalid="false" required
                                @isset($model) value="{{ $model->slug }}"
                                @endisset />
                            @error('slug')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="category_id" class="control-label mb-1">category_id</label>
                            <select id="category_id" name="category_id" type="text" class="form-control"
                                aria-required="true" aria-invalid="false">
                                <option value="">Select Categories</option>
                                @if (isset($model))
                                    @foreach ($category as $list)
                                        @if ($model->category_id == $list->id)
                                            <option selected value="{{ $list->id }}">{{ $list->category_name }}</option>
                                        @else
                                            <option value="{{ $list->id }}">{{ $list->category_name }}</option>
                                        @endif
                                    @endforeach
                                @else
                                    @foreach ($category as $list)
                                        <option value="{{ $list->id }}">{{ $list->category_name }}</option>
                                    @endforeach
                                @endif

                                {{-- @foreach ($category as $list)
                                    @isset($model)
                                        @if ($model->category_id == $list->id)
                                            <option selected value="{{ $list->id }}">{{ $list->category_name }}</option>
                                        @endif
                                    @endisset
                                    <option value="{{ $list->id }}">{{    $list->category_name }}</option>
                                @endforeach --}}
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="brand" class="control-label mb-1">brand</label>
                            <input id="brand" name="brand" type="text" class="form-control" aria-required="true"
                                aria-invalid="false"
                                @isset($model) value="{{ $model->brand }}"
                                @endisset />
                        </div>

                        <div class="form-group">
                            <label for="model" class="control-label mb-1">model</label>
                            <input id="model" name="model" type="text" class="form-control" aria-required="true"
                                aria-invalid="false"
                                @isset($model) value="{{ $model->model }}"
                                @endisset />
                        </div>

                        <div class="form-group">
                            <label for="desc" class="control-label mb-1">description</label>
                            <textarea id="desc" name="desc" type="text" class="form-control" aria-required="true" aria-invalid="false">
@isset($model)
{{ $model->desc }}
@endisset
</textarea>
                        </div>

                        <div class="form-group">
                            <label for="short_desc" class="control-label mb-1">short desc</label>
                            <input id="short_desc" name="short_desc" type="text" class="form-control"
                                aria-required="true" aria-invalid="false"
                                @isset($model) value="{{ $model->short_desc }}"
                                @endisset />
                        </div>

                        <div class="form-group">
                            <label for="keywords" class="control-label mb-1">keywords</label>
                            <input id="keywords" name="keywords" type="text" class="form-control" aria-required="true"
                                aria-invalid="false"
                                @isset($model) value="{{ $model->keywords }}"
                                @endisset />
                        </div>

                        <div class="form-group">
                            <label for="technical_specification" class="control-label mb-1">technical specification</label>
                            <input id="technical_specification" name="technical_specification" type="text"
                                class="form-control" aria-required="true" aria-invalid="false"
                                @isset($model) value="{{ $model->technical_specification }}"
                                @endisset />
                        </div>

                        <div class="form-group">
                            <label for="uses" class="control-label mb-1">uses</label>
                            <input id="uses" name="uses" type="text" class="form-control"
                                aria-required="true" aria-invalid="false"
                                @isset($model) value="{{ $model->uses }}"
                                @endisset />
                        </div>

                        <div class="form-group">
                            <label for="warranty" class="control-label mb-1">warranty</label>
                            <input id="warranty" name="warranty" type="text" class="form-control"
                                aria-required="true" aria-invalid="false"
                                @isset($model) value="{{ $model->warranty }}"
                                @endisset />
                        </div>

                        <div class="form-group">
                            <label for="image" class="control-label mb-1">Image</label>
                            <input id="image" name="image"  type="file" class="form-control" 
                                aria-required="true" aria-invalid="false"
                                @isset($model) value="{{ $model->image }}"
                                @endisset />
                            @error('slug')
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
