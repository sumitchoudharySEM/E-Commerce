@extends('Admin/layout')
@section('title', 'Manage product')
@section('product-selected', 'active')
@section('container')
{{-- @if (isset($model))
    {{ $image_required="" }}
@else --}}
{{-- {{ $image_required="required" }}
@endif --}}
<h1 class="m-b-10">{{ $heading }}</h1>
<a href="{{ url('admin/product') }}">
    <button type="button" class="btn btn-success m-b-10">Back</button>
</a>
<form action="{{ url('/admin') }}/{{ $url }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name" class="control-label mb-1">product name</label>
                        <input id="name" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" required @isset($model) value="{{ $model->name }}" @endisset />
                        @error('name')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="slug" class="control-label mb-1">product Slug</label>
                        <input id="slug" name="slug" type="text" class="form-control" aria-required="true" aria-invalid="false" required @isset($model) value="{{ $model->slug }}" @endisset />
                        @error('slug')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="category_id" class="control-label mb-1">category_id</label>
                                <select id="category_id" name="category_id" type="text" class="form-control" aria-required="true" aria-invalid="false">
                                    <option value="">Select Categories</option>
                                    @if (isset($model))
                                    @foreach ($category as $list)
                                    @if ($model->category_id == $list->id)
                                    <option selected value="{{ $list->id }}">{{ $list->category_name }}
                                    </option>
                                    @else
                                    <option value="{{ $list->id }}">{{ $list->category_name }}
                                    </option>
                                    @endif
                                    @endforeach
                                    @else
                                    @foreach ($category as $list)
                                    <option value="{{ $list->id }}">{{ $list->category_name }}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="brand" class="control-label mb-1">brand</label>
                                <input id="brand" name="brand" type="text" class="form-control" aria-required="true" aria-invalid="false" @isset($model) value="{{ $model->brand }}" @endisset />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="model" class="control-label mb-1">model</label>
                                <input id="model" name="model" type="text" class="form-control" aria-required="true" aria-invalid="false" @isset($model) value="{{ $model->model }}" @endisset />
                            </div>
                        </div>
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
                        <input id="short_desc" name="short_desc" type="text" class="form-control" aria-required="true" aria-invalid="false" @isset($model) value="{{ $model->short_desc }}" @endisset />
                    </div>

                    <div class="form-group">
                        <label for="keywords" class="control-label mb-1">keywords</label>
                        <input id="keywords" name="keywords" type="text" class="form-control" aria-required="true" aria-invalid="false" @isset($model) value="{{ $model->keywords }}" @endisset />
                    </div>

                    <div class="form-group">
                        <label for="technical_specification" class="control-label mb-1">technical specification</label>
                        <input id="technical_specification" name="technical_specification" type="text" class="form-control" aria-required="true" aria-invalid="false" @isset($model) value="{{ $model->technical_specification }}" @endisset />
                    </div>

                    <div class="form-group">
                        <label for="uses" class="control-label mb-1">uses</label>
                        <input id="uses" name="uses" type="text" class="form-control" aria-required="true" aria-invalid="false" @isset($model) value="{{ $model->uses }}" @endisset />
                    </div>

                    <div class="form-group">
                        <label for="warranty" class="control-label mb-1">warranty</label>
                        <input id="warranty" name="warranty" type="text" class="form-control" aria-required="true" aria-invalid="false" @isset($model) value="{{ $model->warranty }}" @endisset />
                    </div>

                    <div class="form-group">
                        <label for="image" class="control-label mb-1">Image</label>
                        <input id="image" name="image" type="file" class="form-control" aria-required="true" aria-invalid="false" @isset($model) value="{{ $model->image }}" @endisset />
                        @error('slug')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <h2 class="m-b-10 m-l-10">Product Attributes</h2>
        <div class="col-lg-12" id="product_attr_box">
            <div class="card">
                <div class="card-body">
                    <div class="row">

                        <div class="form-group">
                            <div class="col-md-2">
                                <label for="sku" class="control-label mb-1">SKU</label>
                                <input id="sku" name="sku" type="text" class="form-control" aria-required="true" aria-invalid="false" />
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-2">
                                <label for="mrp" class="control-label mb-1">MRP</label>
                                <input id="mrp" name="mrp" type="text" class="form-control" aria-required="true" aria-invalid="false" />
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-2">
                                <label for="price" class="control-label mb-1">Price</label>
                                <input id="price" name="price" type="text" class="form-control" aria-required="true" aria-invalid="false" />
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-2">
                                <label for="qty" class="control-label mb-1">Quentity</label>
                                <input id="qty" name="qty" type="text" class="form-control" aria-required="true" aria-invalid="false" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-2">
                                <label for="size" class="control-label mb-1">Size</label>
                                <select id="size" name="size" type="text" class="form-control" aria-required="true" aria-invalid="false">
                                    <option value="">Select</option>
                                    @if (isset($model))
                                    @foreach ($size as $list)
                                    @if ($model->size == $list->id)
                                    <option selected value="{{ $list->id }}">{{ $list->size }}
                                    </option>
                                    @else
                                    <option value="{{ $list->id }}">{{ $list->size }}
                                    </option>
                                    @endif
                                    @endforeach
                                    @else
                                    @foreach ($size as $list)
                                    <option value="{{ $list->id }}">{{ $list->size }}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-2">
                                <label for="color" class="control-label mb-1">Color</label>
                                <select id="color" name="color" type="text" class="form-control" aria-required="true" aria-invalid="false">
                                    <option value="">Select</option>
                                    @if (isset($model))
                                    @foreach ($color as $list)
                                    @if ($model->color == $list->id)
                                    <option selected value="{{ $list->id }}">{{ $list->color }}
                                    </option>
                                    @else
                                    <option value="{{ $list->id }}">{{ $list->color }}
                                    </option>
                                    @endif
                                    @endforeach
                                    @else
                                    @foreach ($color as $list)
                                    <option value="{{ $list->id }}">{{ $list->color }}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4">
                                <label for="attr_image" class="control-label mb-1">Image</label>
                                <input id="attr_image" name="attr_image" type="file" class="form-control" aria-required="true" aria-invalid="false" />
                            </div>
                        </div>
                        <div class="form-group m-t-30">
                            <div class="col-md-2">
                                <button type="button" class="btn btn-success btn-lg" onclick="add_more()">
                                    <i class="fa fa-plus"></i>&nbsp;
                                    Add
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div>
        <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
            Submit
        </button>
    </div>
</form>
<script>
    function add_more() {
        var html = '<div class="card"><div class="card-body"><div class="row"><div class="col-md-2">';
        html += '</div></div></div></div>';
        jQuery('#product_attr_box').append(html);
    }

</script>
@endsection
