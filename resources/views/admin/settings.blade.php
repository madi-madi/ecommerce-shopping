@extends('admin.index')
@section('content')
<div class="box">
  <div class="box-header">
    <h3 class="box-title">{{ $title }}</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    {!! Form::open(['url'=>aurl('settings'),'files'=>true]) !!}
    <div class="form-group">
      {!! Form::label('site_name_ar',trans('admin.site_name_ar')) !!}
      {!! Form::text('site_name_ar',settings()->site_name_ar,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('site_name_en',trans('admin.site_name_en')) !!}
      {!! Form::text('site_name_en',settings()->site_name_en,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('site_email',trans('admin.site_email')) !!}
      {!! Form::email('site_email',settings()->site_email,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">

      {!! Form::label('logo',trans('admin.logo')) !!}
      {!! Form::file('logo',['class'=>'form-control']) !!}
      @if(!empty(settings()->logo))

      <img src="{{Storage::url(settings()->logo)}}"  class="img-responsive" alt="{{trans('admin.logo')}}" height="50px" width="50px" />
      @endif

    </div>
    <div class="form-group">

      {!! Form::label('icon',trans('admin.icon')) !!}
      {!! Form::file('icon',['class'=>'form-control']) !!}
      @if(!empty(settings()->icon))

      <img src="{{Storage::url(settings()->icon)}}"  class="img-responsive" alt="{{trans('admin.icon')}}" height="50px" width="50px" />
      @endif

    </div>
    <div class="form-group">
      {!! Form::label('description',trans('admin.description')) !!}
      {!! Form::textarea('description',settings()->description,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('keywords',trans('admin.keywords')) !!}
      {!! Form::textarea('keywords',settings()->keywords,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('main_lang',trans('admin.main_lang')) !!}
      {!! Form::select('main_lang',['ar'=>trans('admin.ar'),'en'=>trans('admin.en')],settings()->main_lang,['class'=>'form-control']) !!}
    </div>
     <div class="form-group">
      {!! Form::label('status',trans('admin.status')) !!}
      {!! Form::select('status',['open'=>trans('admin.open'),'close'=>trans('admin.close')],settings()->status,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('message_maintenance',trans('admin.message_maintenance')) !!}
      {!! Form::textarea('message_maintenance',settings()->message_maintenance,['class'=>'form-control']) !!}
    </div>
    {!! Form::submit(trans('admin.save'),['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
@endsection