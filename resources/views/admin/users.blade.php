@extends('admin.index')
@section('content')
<div class="box" :admin_auth="{{Request::user('admin')->id}}" >
    <update-user :trans="{{json_encode(trans('admin'))}}" :open-modal="showView" @closemodal="close"  ></update-user>
    <modal-create-user :trans="{{json_encode(trans('admin'))}}"  :open-modal="showAdd"  @closemodal="close" ></modal-create-user>


  <div class="box-header">
    <h3 class="box-title">{{ $title }}</h3>
      <br>
    <button 
class="btn btn-primary"
@click.prevent="openCreate()"
type="button" 

><i class="fa fa-user-plus
 fa-lg" ></i>{{trans('admin.add_user')}} </button>
  </div>
  <!-- /.box-header -->
  <div class="box-body" >
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>id</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Created_At</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody >
                <tr
                v-for="(user, index) in users.data"
                 :class="{'alert alert-danger':user.deleted_at !== null}"
                 v-cloak
                  >
                  <td>@{{user.id}}</td>
                  <td>@{{user.name | capitalize }}
                  </td>
                  <td>@{{user.email}}</td>
                  <td>@{{user.created_at}}</td>
                  <td>
                    <div v-if="user.deleted_at === null">
                      <button class="btn btn-warning" @click="deleteUser(user,index)"
                       
                      > 
                        <i class="fa fa-fw fa-trash fa-lg"></i>
                       </button>
                      <button 
                      class="btn btn-success"
                      @click.prevent="openShow(index)"
                      type="button" 
                      > 
                      <i class="fa fa-fw fa-edit fa-lg"></i>
                       </button>  
                    </div>
                    <div v-else>
                      <button class="btn btn-primary" 
                      @click="restoreUser(user,index)"
                       type="button" >
            <i class="fa fa-fw fa-save fa-lg"></i> </button>
                      <button class="btn btn-danger" @click="deleteforeverUser(user,index)"
                       > 
            <i class="fa fa-fw fa-trash-o fa-lg"></i>
                       </button>
                      
                    </div>
                    
                  </td>
                </tr>   
                </tbody>
                <tfoot>
                <tr >
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                  <th>CSS grade</th>
                </tr>
                </tfoot>
              </table>

            

              <pagination-component
              :pagination="users"
              @paginate="getUsers()"
              :offset="4"
              
              ></pagination-component>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
@endsection