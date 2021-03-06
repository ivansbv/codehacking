@extends('layouts.admin')

@section('content')
	<h3>Edit User</h3>
	<div class="row">
		<div class="col-sm-3">
			<img src="{{$user->photo ? $user->photo->file : 'http://placehold.it/400x400'}}" class="img-responsive img-rounded">
		</div>
		<div class="col-sm-9">
			{!! Form::model($user, ['method'=>'PATCH', 'action'=>['AdminUsersController@update', $user->id],'files'=>true]) !!}
			<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
			<div class="form-group">
				{!! Form::label('name','Name:') !!}
				{!! Form::text('name', null, ['class'=>'form-control']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('email','Email:') !!}
				{!! Form::email('email', null, ['class'=>'form-control']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('role_id','Role:') !!}
				{!! Form::select('role_id', [''=>'choose'] + $roles , null, ['class'=>'form-control']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('is_active','Status:') !!}
				{!! Form::select('is_active', array(1=>'Active', 0=>'Not Active'), null, ['class'=>'form-control']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('photo_id','Photo:') !!}
				{!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('password','Password:') !!}
				{!! Form::password('password',['class'=>'form-control']) !!}
			</div>
			<div class="form-group">
				{!! Form::submit('Update User',['class'=>'btn btn-primary col-sm-2']) !!}
			</div>
			{!! Form::close() !!}
			
			{!! Form::open(['method'=>'DELETE', 'action'=>['AdminUsersController@destroy',$user->id],'class'=>'pull-right']) !!}
				<div class="form-group">
				{!! Form::submit('Delete User',['class'=>'btn btn-danger ']) !!}
				</div>
		</div>
	</div>
	<div class="row">
		@include('includes.form_error')
	</div>
@endsection

