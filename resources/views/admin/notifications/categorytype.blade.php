@extends('admin.index')
@section('content')
<div class="box">

    {{-- <modal-create :open-modal="showView" @closemodal="close" ></modal-create> --}}
  <div class="box-header">
    <h3 class="box-title">{{ $title }}</h3>
    <br>
{{-- <button 
class="btn btn-primary"
@click.prevent="openShow('1')"
type="button" 
> 
  <i class="fa fa-fw fa-plus-square
 fa-lg"></i>
 {{trans('admin.add_product')}} </button>  --}}
  </div>
  <!-- /.box-header -->
  <div class="box-body">
<table id="example2" class="table table-bordered table-hover">
    <thead>
    <tr>
    <th>{{trans('admin.id')}}</th>
    <th>{{trans('admin.name')}}</th>
    <th>{{trans('admin.description')}}</th>
{{--     <th>{{trans('admin.category')}}</th>
    <th>{{trans('admin.created_at')}}</th>
    <th>{{trans('admin.product_image')}}</th>
    <th>{{trans('admin.action')}}</th> --}}


    </tr>
    </thead>
    <tbody>

    <tr v-for="(category , key) in categories.data">

    <td>@{{category.id}}</td>
    <td> <a :href="'category/'+category.category_slug">@{{category.category_name}}</a></td>
    <td>@{{category.category_slug}}</td>
    <td>@{{category.products.length}}</td>
    <td>@{{category.created_at}}</td>

   {{--  <td>
    <div v-if="category.deleted_at === null">
    <button 
    class="btn btn-warning"

    @click="deleteProduct(product,index)"
    title="{{trans('admin.delete')}}"   > 
    <i class="fa fa-fw fa-trash fa-lg"></i>
    </button>
    <button 
    class="btn btn-success"
    @click.prevent="openShow(index)"
    type="button"
    title="{{trans('admin.edit')}}" >
    <i class="fa fa-fw fa-edit fa-lg"></i>

    </button>  

    </div>
    <div v-else>
      <button 
      class="btn btn-primary"
      @click="restoreProduct(product,index)"
      title="{{trans('admin.restore')}}"
      > 
      <i class="fa fa-fw fa-save fa-lg"></i>
      </button>
      <button class="btn btn-danger"
      @click="deleteforeverProduct(product,index)"
      title="{{trans('admin.delete_for_ever')}}"
      > 
      <i class="fa fa-fw fa-trash-o fa-lg"></i>

      </button>

    </div>

    </td>
 --}}
    </tr>
    </tbody>
    <tfoot>
    <tr >
    <th>{{trans('admin.id')}}</th>
    <th>{{trans('admin.name')}}</th>
    <th>{{trans('admin.description')}}</th>
{{--     <th>{{trans('admin.created_at')}}</th>
    <th>{{trans('admin.product_image')}}</th>
    <th>{{trans('admin.action')}}</th> --}}

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