@extends('admin.index')
@section('content')
<div class="box">
    <modal-create-role 
    :trans="{{json_encode(trans('admin'))}}" 
    :open-modal="showAdd" 
    @closemodal="close" >
    </modal-create-role>

  <div class="box-header">
    <h3 class="box-title">{{ $title }}</h3>
    <br>
<button 
class="btn btn-primary"
@click.prevent="openCreate()"
type="button" 
> 
  <i class="fa fa-fw fa-plus-square
 fa-lg"></i>
 {{trans('admin.add_role')}} </button> 
  </div>
  <!-- /.box-header -->
  <div class="box-body">
<table id="example2" class="table table-bordered table-hover">
    <thead>
    <tr>
    <th>{{trans('admin.id')}}</th>
    <th>{{trans('admin.role_name')}}</th>
    <th>{{trans('admin.created_by')}}</th>
    <th>{{trans('admin.created_at')}}</th>
    </tr>
    </thead>
    <tbody>

    <tr v-for="(role , key) in roles.data">

    <td>@{{key+1}}</td>
 {{--    <td> <a :href="'category/'+category.category_slug" @click="getProductsByCategory(category)">@{{category.category_name}}</a></td> --}}
    <td>@{{role.role_name}}</td>
    <td><span class="text-center">@{{role.admin['name']}}</span></td>
    <td>@{{role.created_at}}</td>
    
    </tr>
    </tbody>
    <tfoot>
    <tr>
    <th>{{trans('admin.id')}}</th>
    <th>{{trans('admin.role_name')}}</th>
    <th>{{trans('admin.created_by')}}</th>
    <th>{{trans('admin.created_at')}}</th>
    </tr>
    </tfoot>
</table>

<pagination-component
:pagination="roles"
@paginate="getRoles()"
:offset="4"
></pagination-component>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
@endsection