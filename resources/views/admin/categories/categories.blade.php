@extends('admin.index')
@section('content')
<div class="box">
    <modal-create-category :trans="{{json_encode(trans('admin'))}}" :open-modal="showAdd" @closemodal="close" ></modal-create-category>

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
 {{trans('admin.add_category')}} </button> 
  </div>
  <!-- /.box-header -->
  <div class="box-body">
<table id="example2" class="table table-bordered table-hover">
    <thead>
    <tr>
    <th>{{trans('admin.id')}}</th>
    <th>{{trans('admin.category_name')}}</th>
    <th>{{trans('admin.category_slug')}}</th>
    <th>{{trans('admin.created_by')}}</th>
    <th>{{trans('admin.count_product')}}</th>
    <th>{{trans('admin.created_at')}}</th>
    </tr>
    </thead>
    <tbody>

    <tr v-for="(category , key) in categories.data" v-cloak>

    <td>@{{  }}category.id}}</td>
    <td> <a :href="'category/'+category.category_slug" @click="getProductsByCategory(category)">@{{category.category_name}}</a></td>
    <td>@{{category.category_slug}}</td>
    <td>@{{category.admin['name']}}</td>
    <td><span class="text-center">@{{category.products.length}}</span></td>
    <td>@{{category.created_at}}</td>
    </tr>
    </tbody>
    <tfoot>
    <tr>
   <th>{{trans('admin.id')}}</th>
    <th>{{trans('admin.category_name')}}</th>
    <th>{{trans('admin.category_slug')}}</th>
    <th>{{trans('admin.created_by')}}</th>
    <th>{{trans('admin.count_product')}}</th>
    <th>{{trans('admin.created_at')}}</th>
    </tr>
    </tfoot>
</table>

<pagination-component
:pagination="categories"
@paginate="getCategories()"
:offset="4"
></pagination-component>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
@endsection