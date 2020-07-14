@extends('admin.layout')

@section('content')

@php
    $formTitle = !empty($category) ?  'Update' : 'New'
@endphp

<div class="row">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>{{ $formTitle }} Category</h2>
            </div>
            <div class="card-body">
                @include('admin.partials.flash', ['$errors' => $errors])
                @if (!empty($category))
                    {!! Form::model($category, ['url' => ['admin/categories', $category->id], 'method' => 'PUT']) !!}
                    {!! Form::hidden('id') !!}
                @else
                    {!! Form::open(['url' => 'admin/categories']) !!}
                @endif
                    <div class="form-group">
                        {!! Form::label('name', 'Name') !!}
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Category name']) !!}
                    </div>
                    <div class="form-footer pt-3 border-top">
                        <a href="{{ route('categories.index') }}" class="btn btn-danger">Back</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@endsection
