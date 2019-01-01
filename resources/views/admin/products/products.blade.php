@extends('admin.index')
@section('content')
<div class="box">

    <modal-create :trans="{{json_encode(trans('admin'))}}" :open-modal="showAdd" @closemodal="close" ></modal-create>
    <modal-update :trans="{{json_encode(trans('admin'))}}" :open-modal="showView"  @closemodal="close" ></modal-update>


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
 {{trans('admin.add_product')}} </button> 
  </div>
  <!-- /.box-header -->
  <div class="box-body">
<table id="example2" class="table table-bordered table-hover">
    <thead>
    <tr>
    <th>{{trans('admin.id')}}</th>
    <th>{{trans('admin.name')}}</th>
    <th>{{trans('admin.description')}}</th>
    <th>{{trans('admin.weight')}}</th>
    <th>{{trans('admin.price')}}</th>
    <th>{{trans('admin.count')}}</th>
    <th>{{trans('admin.category')}}</th>
    <th>{{trans('admin.crated_by')}}</th>
    <th>{{trans('admin.created_at')}}</th>
    <th>{{trans('admin.product_image')}}</th>
    <th>{{trans('admin.action')}}</th>


    </tr>
    </thead>
    <tbody>

    <tr v-for="(product , key) in products.data"
    :class="{'alert alert-danger':product.deleted_at !== null}" v-cloak >

    <td>@{{key+1}}</td>
    <td>@{{product.title}}</td>
    <td>@{{product.description}}</td>
    <td>@{{product.weight}}</td>
    <td>@{{product.price}}</td>
    <td>@{{product.product_count}}</td>
    <td><a :href="'category/'+product.category['category_slug']">@{{product.category['category_name']}}</a> </td>
    <td>@{{product.admin['name']}}</td>
    <td>@{{product.created_at}}</td>
    <td>
    <figcaption v-for="(photo , index) in product.images"
    style="position: relative; display: inline-block;">
    <button class="fa fa-fw fa-close close"
    @click.prevent="deleteImage(photo, index , key)"
    v-if="product.images.length != 1 && product.deleted_at === null"
    style="position: absolute; right: 0;top: 0" 
    ></button>    
    <img  
    width="40" height="40" 
    style="padding: 2px; background-color: #eceaea;" 
    :src="'/storage/'+photo.product_image">
  </figcaption>
  <span v-if="product.images.length !=  5|| product.images.length < 5">
<upload-file :product_id = "product.id" v-if="product.deleted_at === null" :key_product ="key"  ></upload-file>
    
  </span>

{{--     <input 
    type="file"
     id="file" 
     ref="file"  
     size="60"  
     @change="addNewImage" accept="image/*" > --}}
    </td>
    <td>
    <div v-if="product.deleted_at === null">
    <button 
    class="btn btn-warning"

    @click="deleteProduct(product,key)"
    title="{{trans('admin.delete')}}"   > 
    <i class="fa fa-fw fa-trash fa-lg"></i>
    </button>
    <button 
    class="btn btn-success"
    @click.prevent="openShow(key)"
    type="button"
    title="{{trans('admin.edit')}}" >
    <i class="fa fa-fw fa-edit fa-lg"></i>

    </button>  

    </div>
    <div v-else>
      <button 
      class="btn btn-primary"
      @click="restoreProduct(product,key)"
      title="{{trans('admin.restore')}}"
      > 
      <i class="fa fa-fw fa-save fa-lg"></i>
      </button>
      <button class="btn btn-danger"
      @click="deleteforeverProduct(product,key)"
      title="{{trans('admin.delete_for_ever')}}"
      > 
      <i class="fa fa-fw fa-trash-o fa-lg"></i>

      </button>

    </div>

    </td>

    </tr>
    </tbody>
    <tfoot>
    <tr >
    <th>{{trans('admin.id')}}</th>
    <th>{{trans('admin.name')}}</th>
    <th>{{trans('admin.description')}}</th>
        <th>{{trans('admin.weight')}}</th>
    <th>{{trans('admin.price')}}</th>
    <th>{{trans('admin.count')}}</th>
    <th>{{trans('admin.crated_by')}}</th>
    <th>{{trans('admin.created_at')}}</th>
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