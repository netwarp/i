@extends('admin.layouts.default')

@section('content')
 <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="/admin">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            Setting
        </li>
    </ol>

    <div class="row">
    	<div class="col-md-12">
    		<div class="card">
    			<div class="card-header">
    				Change password
    			</div>
    			<div class="card-body">
    				@if ($errors->any())
					    <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					@endif
    				<form action="/admin/setting" method="POST">
    					{{ csrf_field() }}
    					<div class="form-group">
    						<label for="#">New password</label>
    						<input type="password" class="form-control" name="password">
    					</div>
    					<div class="form-group">
    						<label for="#">Confirmation</label>
    						<input type="password" class="form-control" name="confirmation">
    					</div>
    					<div class="form-goup">
                            <button type="submit" class="btn btn-success">Send</button>
                        </div>
    				</form>
    			</div>
    		</div>
    	</div>
    </div>
@endsection