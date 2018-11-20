@extends('admin.index')
@section('content')
<div class="box">

  <div class="box-header">
    <h3 class="box-title">{{ $title }}</h3>
    <br>

  </div>
  <!-- /.box-header -->
  <div class="box-body">
<table id="example2" class="table table-bordered table-hover">
    <thead>
    <tr>
    <th>{{trans('admin.id')}}</th>
    <th>{{trans('admin.notify_type')}}</th>
    <th>{{trans('admin.notify_data')}}</th>
    <th>{{trans('admin.read_at')}}</th>
    <th>{{trans('admin.created_at')}}</th>
    </tr>
    </thead>
    <tbody>

    <tr v-for="(notification , key) in notifications.data" v-cloak>

    <td>@{{notification.notifiable_id}}</td>
    <td>@{{notification.type}}</td>
    <td>@{{notification.data}}</td>
    <td>@{{notification.read_at === null?'Null':notification.read_at}}</td>
    <td>@{{notification.created_at}}</td>


{{--     <td> <a :href="'category/'+category.notify_data" @click="getProductsByCategory(category)">@{{category.category_name}}</a></td>
    <td>@{{category.notify_data}}</td>
    <td>@{{category.admin['name']}}</td>
    <td><span class="text-center">@{{category.products.length}}</span></td>
    <td>@{{category.created_at}}</td> --}}
    </tr>
    </tbody>
    <tfoot>
    <tr>
   <th>{{trans('admin.id')}}</th>
    <th>{{trans('admin.notify_type')}}</th>
    <th>{{trans('admin.notify_data')}}</th>
    <th>{{trans('admin.read_at')}}</th>
    <th>{{trans('admin.created_at')}}</th>
    </tr>
    </tfoot>
</table>

<pagination-component
:pagination="notifications"
@paginate="getNotifications()"
:offset="4"
></pagination-component>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
@endsection