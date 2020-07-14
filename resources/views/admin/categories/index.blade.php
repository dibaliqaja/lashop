@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2 class="mr-9">Categories</h2>
                </div>
                <div class="card-body">
                    @include('admin.partials.flash')
                    <table class="table table-bordered table-hover">
                        <thead align="center">
                            <th>#</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Parent</th>
                            <th width="15%">Action</th>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
                                <tr align="center">
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td>{{ $category->parent_id }}</td>
                                    <td>
                                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-info">Edit</a>
                                        {!! Form::open(['url' => route('categories.destroy', $category->id), 'class' => 'delete', 'style' => 'display:inline-block', 'onclick' => 'return confirm("Do you want to remove this?")']) !!}
                                        {!! Form::hidden('_method', 'DELETE') !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">No records found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $categories->links() }}
                </div>
                <div class="card-footer text-right">
                    <a href="{{ route('categories.create') }}" class="btn btn-primary">Add New</a>
                </div>
            </div>
        </div>
    </div>
@endsection
