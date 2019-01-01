<template>
<div class="modal fade in" id="modal-default" style="display: block;" v-if="openModal" >
          <div class="modal-dialog" >
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close">
                  <span aria-hidden="true" @click="close">×</span></button>
                <h4 class="modal-title">{{trans.create_new_role}}</h4>
              </div>
              <div class="modal-body">
                          <form method="post" enctype="multipart/form-data" 
                           v-on:submit.prevent="create_role()" id="role">

                            <div class="form-group">
                            <label for="role_name">{{trans.role_name}}</label>
                            <input 
                            type="text" 
                            title="role_name" 
                            id="role_name" 
                            name="role_name" 
                            class="form-control" 
                            v-model="new_role.role_name" >

                            <figcaption v-if="errors.role_name" class="text-danger">
                            {{errors.role_name[0]}}</figcaption>
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
      props:['openModal','trans'],
      data(){
      return{
      path:window.location.pathname,
      new_role:{
      role_name:'',
      },
      errors:{},
     
      }
      },
    created(){
    },
    mounted() {
    },


    methods:{
      statusnativeToast(message="Done", name=null, type="success",timeout=5000 ,position="north-east"){
      nativeToast({
      message: message + ' ' + name  ,
      position:position,
      // Self destroy in 5 seconds
      timeout: timeout,
      type: type,
      })
      },

    close(){

     this.$emit('closemodal')
    },

    create_role()
    {
      axios.post(`role/create`,this.new_role).then((response)=>{
        console.log(response.data);
      this.$parent.roles.data.unshift(response.data);
      this.close();
      this.statusnativeToast("Success Add new Role", this.new_role.role_name,"success",5000 ,"north-east")

      this.new_role = {};

      })
      .catch((error)=>{
        this.errors= error.response.data.errors;
        // this.data = '';
      })


    },



    },


    }
</script>
