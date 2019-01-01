@extends('admin.index')
@section('content')
<div class="box">
  <div class="box-header">
    <h3 class="box-title">{{ $title }}</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    {{-- {!! Form::open(['url'=>aurl('settings'),'files'=>true]) !!} --}}
    <form method="POST"  accept-charset="UTF-8" 
    enctype="multipart/form-data"
     id="settings"
      v-on:submit.prevent="updateSettings()"
      v-cloak >
    <div class="form-group">
      <label for="site_name_ar">{{trans('admin.site_name_ar')}}</label>
      <input name="site_name_ar" type="text" v-model="settings.site_name_ar" id="site_name_ar" class="form-control">
    </div>
    <div class="form-group">
      <label for="site_name_en">{{trans('admin.site_name_en')}}</label>
      <input name="site_name_en" type="text" v-model="settings.site_name_en" id="site_name_en" class="form-control">
    </div>
    <div class="form-group">
      <label for="site_email">{{trans('admin.site_email')}}</label>
      <input name="site_email" type="text" v-model="settings.site_email" id="site_email" class="form-control">
    </div>
    <div class="form-group">
      <label for="logo">{{trans('admin.logo')}}</label>
      <input name="logo" type="file" ref="logo" id="logo" class="form-control">

      {{-- @if(!empty(settings()->logo)) --}}

      <img :src="'/storage/'+settings.logo"  class="img-responsive" alt="{{trans('admin.logo')}}" height="50px" width="50px" />
      {{-- @endif --}}

    </div>
    <div class="form-group">
      <label for="icon">{{trans('admin.icon')}}</label>
      <input name="icon" type="file" ref="icon" id="icon" class="form-control">
      @if(!empty(settings()->icon))

      <img :src="'/storage/'+settings.icon"  class="img-responsive" alt="{{trans('admin.icon')}}" height="50px" width="50px" />
      @endif

    </div>
    <div class="form-group">
      <label for="description">{{trans('admin.description')}}</label>
      <textarea name="description" v-model="settings.description" id="description" class="form-control"> </textarea>
    </div>
    <div class="form-group">
      <label for="keywords">{{trans('admin.keywords')}}</label>
      <textarea name="keywords" v-model="settings.keywords" id="keywords" class="form-control"> </textarea>
    </div>
    <div class="form-group">
      <label for="main_lang">{{trans('admin.main_lang')}}</label>
      <select v-model="settings.main_lang" class="form-control" name="main_lang" id="main_lang">
         <option disabled value="">{{trans('admin.please_select_one')}}</option>
         <option value="en"
         {{-- :selected="en === selected_lang ? true : false" --}}
         >{{trans('admin.en')}}</option>
         <option value="ar"
         {{-- :selected="ar === selected_lang ? true : false" --}}

         >{{trans('admin.ar')}}</option>
       </select>
    </div>
     <div class="form-group">
      <label for="status">{{trans('admin.status')}}</label>
      <select v-model="settings.status" class="form-control" name="status" id="status">
         {{-- <option disabled value="">{{trans('admin.please_select_one')}}</option> --}}
         <option value="open">{{trans('admin.open')}}</option>
         <option value="close">{{trans('admin.close')}}</option>
       </select>
    </div>
    <div class="form-group">
      <label for="message_maintenance">{{trans('admin.message_maintenance')}}</label>
      <textarea name="message_maintenance" v-model="settings.message_maintenance" id="message_maintenance" class="form-control"> </textarea>
    </div>
    <button type="submit" class="btn btn-primary">{{trans('admin.save')}}</button>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
@endsection