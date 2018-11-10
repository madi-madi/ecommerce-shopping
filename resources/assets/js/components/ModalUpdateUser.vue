<template>
<div class="modal fade in" id="modal-default" style="display: block;" v-if="openModal" >
          <div class="modal-dialog" >
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close">
                  <span aria-hidden="true" @click="close">×</span></button>
                <h4 class="modal-title">{{trans.update}}  :-  {{user.name}}</h4>
              </div>
              <div class="modal-body">
                   
                          <form method="patch" enctype="multipart/form-data" 
                           v-on:submit.prevent="update_data()" id="user">

                            <div class="form-group">
                            <label for="name">{{trans.name}}</label>
                            <input type="text" name="name" id="name" class="form-control" v-model="user.name">
                          </div>
                            <div class="form-group">
                            <label for="email">{{trans.email}}</label>
                            <input type="text" disabled="true" name="email" id="email" class="form-control" 
                            v-model="user.email">
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
            user:{},
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
      axios.patch(`user/${this.user.id}/update`,this.$data.user).then((response)=>{
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


    },

        mounted() {
            
        }
    }
</script>
