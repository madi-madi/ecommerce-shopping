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
    <th>{{trans('admin.category')}}</th>
    <th>{{trans('admin.created_at')}}</th>
    <th>{{trans('admin.product_image')}}</th>
    <th>{{trans('admin.action')}}</th>


    </tr>
    </thead>
    <tbody>

{{--     <tr v-for="(product , key) in products.data"
    :class="{'alert alert-danger':product.deleted_at !== null}">

    <td>@{{product.id}}</td>
    <td>@{{product.title}}</td>
    <td>@{{product.description}}</td>
    <td>@{{product.category['category_name']}}</td>
    <td>@{{product.created_at}}</td>
    <td>
    <figcaption v-for="(photo , index) in product.images"
    style="position: relative; display: inline-block;">
    <button class="fa fa-fw fa-close close"
    @click.prevent="deleteImage(photo, index , key)"
    v-if="photo.product_image !== 'products/default.png'"
    style="position: absolute; right: 0;top: 0" 
    ></button>    
    <img  
    width="40" height="40" 
    style="padding: 2px; background-color: #eceaea;" 
    :src="'/storage/'+photo.product_image">
  </figcaption>
    </td>
    <td>
    <div v-if="product.deleted_at === null">
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

    </tr> --}}
    </tbody>
    <tfoot>
    <tr >
    <th>{{trans('admin.id')}}</th>
    <th>{{trans('admin.name')}}</th>
    <th>{{trans('admin.description')}}</th>
    <th>{{trans('admin.created_at')}}</th>
    <th>{{trans('admin.product_image')}}</th>
    <th>{{trans('admin.action')}}</th>

    </tr>
    </tfoot>
</table>

<pagination-component
:pagination="products"
@paginate="getProducts()"
:offset="4"
></pagination-component>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
@endsection