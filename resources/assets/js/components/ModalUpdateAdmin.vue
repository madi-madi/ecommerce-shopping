<template>
<div class="modal fade in" id="modal-default" style="display: block;" v-if="openModal" >
          <div class="modal-dialog" >
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close">
                  <span aria-hidden="true" @click="close">×</span></button>
                <h4 class="modal-title">{{trans.update}}  :-  {{admin.name}}</h4>
              </div>
              <div class="modal-body">
                   
                          <form method="patch" enctype="multipart/form-data" 
                           v-on:submit.prevent="update_data()" id="admin">

                            <div class="form-group">
                            <label for="name">{{trans.name}}</label>
                            <input type="text" name="name" id="name" class="form-control" v-model="admin.name">
                          </div>
                            <div class="form-group">
                            <label for="email">{{trans.email}}</label>
                            <input type="text" disabled="true" name="email" id="email" class="form-control" 
                            v-model="admin.email">
                          </div>
                         <div class="form-group" v-if="path === '/admin/admins'">
                          <label for="role">admin.roles</label>
                          <select  class="form-control" name="role" id="role" 
                          v-model="admin.roles.role_name">
                             <option disabled value="">{{trans.please_select_one}}</option> 
                             <option v-for="role in roles" :value="role.role_name">
                             {{role.role_name}}</option>

                           </select>
                        </div>      

              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" @click="close">{{trans.close}}</button>
                <button type="submit" class="btn btn-primary">{{trans.update}}</button>
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
      props:['openModal','trans'],
      data(){
        return{
            path:window.location.pathname,
            url:'',
            admin:{},
            errors:{},
            roles:{},

            
        }
      },

    methods:{

    close(){
    this.$emit('closemodal')
    },

    // update_data()
    // {
    // // this.path = window.location.pathname
    // switch(this.path){
    // case '/admin/admins':
    // this.url = 'admin';
    // this.update();
    // break;
    // case '/admin/users':
    // this.url = 'user';
    // this.update();
    // break;

    // }
    // },
    update_data(){
      axios.patch(`http://ecommerce-f.herokuapp.com/admin/${this.admin.id}/update`,this.$data.admin).then((response)=>{
          console.info(response.status);
          this.close();
          nativeToast({
          message: 'Updated Success',
          position: 'north-east',
          // Self destroy in 5 seconds
          timeout: 5000,
          type: 'success'
          })
      })
      .catch((error)=>{
        this.errors= error.response.data.errors;
      })
    },
    getRoles(){
    axios.get(`roles/${this.id}/admin`).then((response)=>{
    console.log(response.data);
    this.roles = response.data;
    }).catch((error)=>{
    this.errors = error.response.data.errors
    })
    },

    },

    mounted() {

    this.getRoles();

    }
    }
</script>
