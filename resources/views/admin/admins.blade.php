@extends('admin.index')
@section('content')
<div class="box">
    <update-admin :trans="{{json_encode(trans('admin'))}}" :open-modal="showView" @closemodal="close" ></update-admin>
    <modal-create-admin :trans="{{json_encode(trans('admin'))}}" :open-modal="showAdd" :admin_id ="{{admin()->user()->id}}" @closemodal="close"></modal-create-admin>
  <div class="box-header">
    <h3 class="box-title">{{ $title }}</h3>
    <br>
    <button 
class="btn btn-primary"
@click.prevent="openCreate()"
type="button" 
>{{trans('admin.add_admin')}} </button>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>id</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Created_At</th>
                  <th>Role</th>
                  <th>Action</th>
            

                </tr>
                </thead>
                <tbody>
                	{{-- @foreach($admins as $admin) --}}

         <tr 
          v-for="(admin , index) in admins.data" 
                 :class="{'alert alert-danger':admin.deleted_at !== null}"

          >
                  <td>@{{admin.id}}</td>
                  <td>@{{admin.name | capitalize}}</td>
                  <td>@{{admin.email}}</td>
                  <td>@{{admin.created_at}}</td>
                  <td>@{{admin.roles.role_name}}</td>
                  <td>
                    <div v-if="admin.deleted_at === null">
                      <button 
                  v-if="admin.id != admin_auth"

                      class="btn btn-warning"
                      
                       @click="deleteAdmin(admin,index)"
                       title="transadmindelete"
                         >
                        <i class="fa fa-fw fa-trash fa-lg"></i>
                       </button>
                      <button 
                      class="btn btn-success"
                      @click.prevent="openShow(index)"
                      type="button" 
                      title="transadminedit"
                      > 
                      <i class="fa fa-fw fa-edit fa-lg"></i>
                       </button>  
                         
                        
                    </div>
                    <div v-else>
                      <button 
                      class="btn btn-primary"
                       @click="restoreAdmin(admin,index)"
                      title="transadminrestore"
                        > 
            <i class="fa fa-fw fa-save fa-lg"></i>
                       </button>
                      <button class="btn btn-danger"
                       @click="deleteforeverAdmin(admin,index)"
                      title="admindelete_for_ever"
                       > 
            <i class="fa fa-fw fa-trash-o fa-lg"></i>

                       </button>

                    </div>
                    
                  </td>

                </tr>

                	{{-- @endforeach --}}
               
 {{--                <tr
                 v-for="(user , index) in users.data"
                 :class="{'alert alert-danger':user.deleted_at !== null}"
                  >
                  <td>@{{user.id}}</td>
                  <td>@{{user.name}}
                  </td>
                  <td>@{{user.email}}</td>
                  <td>@{{user.created_at}}</td>
                  <td>
                    <div v-if="user.deleted_at === null">
                      <button class="btn btn-warning" @click="deleteUser(user,index)"> Delete </button>
                    </div>
                    <div v-else>
                      <button class="btn btn-primary" @click="restoreUser(user,index)" > Restore </button>
                      <button class="btn btn-danger" @click="deleteforeverUser(user,index)"> Delete for ever </button>
                      
                    </div>
                    
                  </td>
                </tr> --}}
            
                                </tbody>
                <tfoot>
                <tr >
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                  <th>CSS grade</th>
                  <th>Action</th>

                </tr>
                </tfoot>
              </table>

              <pagination-component
              :pagination="admins"
              @paginate="getUsers()"
              :offset="4"
              ></pagination-component>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
@endsection