@extends('admin.layouts.default')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="/admin">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            Showrooms
        </li>
    </ol>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ action('Admin\ShowroomsController@create') }}" class="btn btn-success"><i class="fa fa-plus-circle"></i> &nbsp; Create new showroom</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <td>Id</td>
                            <td>Title</td>
                            <td>Order</td>
                            <td>Action</td>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($showrooms as $showroom)
                            <tr>
                                <td>{{ $showroom->id }}</td>
                                <td>{{ $showroom->title }}</td>
                                <td>{{ $showroom->order }}</td>
                                <td style="display: flex;">
                                    <a href="{{ action('Admin\ShowroomsController@edit', $showroom->id) }}" class="btn btn-primary" style="margin-right: 1rem;"><i class="fa fa-edit"></i> Edit</a>
                                    <form action="{{ action('Admin\ShowroomsController@destroy', $showroom->id) }}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('delete') }}
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">No showrooms</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection