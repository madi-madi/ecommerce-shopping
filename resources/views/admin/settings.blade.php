@extends('admin.index')
@section('title')
Setting
@endsection
@section('content')
{{-- .box --}}
<div class="box">
	<div class="box-header">
		<h3 class="box-title">Settings</h3>
	</div>
	{{-- .box-body --}}
	<div class="box-body">
		{!!Form::open(['url'=>'settings','files'=>true])!!}
		<div class="form-group">
		{!! form::label('name_site_en', 'Site Name En',['class'=>''])!!}
		{!!Form::text('name_site_en',null,['class'=>'form-control','placeholder'=>"Site Name English..."])!!}
		</div>
		<div class="form-group">
		{!! form::label('name_site_ar', 'Site Name Ar',['class'=>''])!!}
		{!!Form::text('name_site_ar',null,['class'=>'form-control','placeholder'=>"Site Name English..."])!!}
		</div>
		<div class="form-group">
		{!! form::label('email', 'Email',['class'=>''])!!}
		{!!Form::email('email',null,['class'=>'form-control','placeholder'=>"support@test.com"])!!}
		</div>
		<div class="form-group">
		{!! form::label('logo', 'Logo',['class'=>''])!!}
		{!!Form::file('logo',null,['class'=>'form-control'])!!}
		</div>
		<div class="form-group">
		{!! form::label('main_lang', 'Main lang',['class'=>''])!!}
		{!!Form::text('main_lang',null,['class'=>'form-control','placeholder'=>"Main lang Site..."])!!}
		</div>
		<div class="form-group">
		{!! form::label('keywords', 'keywords',['class'=>''])!!}
		{!!Form::textarea('keywords',null,['class'=>'form-control','placeholder'=>"keywords Site..."])!!}
		</div>
		<div class="form-group">
		{!! form::label('status', 'Status',['class'=>''])!!}
		{!!Form::text('status',null,['class'=>'form-control','placeholder'=>"Status Site..."])!!}
		</div>
		<div class="form-group">
		{!! form::label('message_maintenance', 'message_maintenance',['class'=>''])!!}
		{!!Form::textarea('message_maintenance',null,['class'=>'form-control','placeholder'=>"message_maintenance Site..."])!!}
		</div>

		{!!form::submit('Save',['class'=>'btn btn-primary form-control'])!!}
		{!! Form::close() !!}

	</div>
	{{-- /.box-body --}}
</div>
{{-- /.box --}}
@endsection
