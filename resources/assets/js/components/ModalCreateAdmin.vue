<template>
<div class="modal fade in" id="modal-default" style="display: block;" v-if="openModal" >
          <div class="modal-dialog" >
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close">
                  <span aria-hidden="true" @click="close">×</span></button>
                <h4 class="modal-title">{{trans.create_new_admin}}</h4>
              </div>
              <div class="modal-body">
                        <p> </p>
                          <form method="Post" enctype="multipart/form-data" 
                           v-on:submit.prevent="create_admin()" id="admin">

                            <div class="form-group">
                            <label for="name"> {{trans.name}}</label>
                            <input type="text" name="name" id="name" class="form-control" v-model="admin.name">
                            <small v-if="errors.name" class="text-danger">{{errors.name[0]}}</small>
                          </div>
                            <div class="form-group">
                            <label for="email">{{trans.email}}</label>
                            <input type="text"  name="email" id="email" class="form-control" 
                            v-model="admin.email">
                            <small v-if="errors.email" class="text-danger">{{errors.email[0]}}</small>
                          </div>
                            <div class="form-group">
                            <label for="password">{{trans.password}}</label>
                            <input type="password"  name="password" id="password" class="form-control" 
                            v-model="admin.password">
                            <small v-if="errors.password" class="text-danger">{{errors.password[0]}}</small>
                          </div>
                            <div class="form-group ">
                            <label for="role_id">role_id</label>
                            <!-- <input type="hidden" name="role_id_id" value="1"> -->
                          <select  class="form-control" name="role_id" id="role_id" 
                          v-model="admin.role_id">
                             <option disabled value="">{{trans.please_select_one}}</option> 
                             <option v-for="role in roles" :value="role.id">
                             {{role.role_name}}</option>

                           </select>
                           <small v-if="errors.role_id" class="text-danger">{{errors.role_id[0]}}</small>
                          </div>      

              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" @click="close">{{trans.close}}</button>
                <button type="submit" class="btn btn-primary">{{trans.add}}</button>
              </div>
              </form>

              </div>


            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
</template>

<script>
    export default {
    props:['openModal','admin_id','trans'],
    data(){
    return{
    path:'',
    admin:{
    name:'',
    email:'',
    password:'',
    role_id:'',
    },
    errors:{},
    roles:{},

    }
    },
    methods:{

    close(){
    this.$emit('closemodal')
    },

    create_admin()
    {
      console.log('yes');
      axios.post(`create/admin`,this.$data.admin).then((response)=>{
        this.$parent.admins.data.unshift(response.data);
        this.close();
        this.admin = {};
      }).catch((error)=>{
        // console.log(error.response.data);
        this.errors= error.response.data.errors;
        this.data = '';

      })
      
    },
    getRoles(){
    axios.get(`roles/${this.id}/admin`).then((response)=>{
    console.log(response.data);
    this.roles = response.data;
    }).catch((error)=>{
    this.errors = error.response.data.errors
    })
    }

    },
    mounted() {
    this.getRoles();
    this.path = window.location.pathname

    }
    }
</script>
