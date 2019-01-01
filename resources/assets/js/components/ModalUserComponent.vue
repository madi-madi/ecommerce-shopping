<template>
<div class="modal fade in" id="modal-default" style="display: block;" v-if="openModal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Default Modal</h4>
              </div>
              <div class="modal-body">
                        <p>Create New Room </p>
                          <form method="patch" enctype="multipart/form-data" 
                           v-on:submit.prevent="update_data()" id="admin">

                            <div class="form-group">
                            <label for="name"> Name</label>
                            <input type="text" name="name" id="name" class="form-control" v-model="admin.name">
                          </div>
                            <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" disabled="true" name="email" id="email" class="form-control" 
                            v-model="admin.email">
                          </div>    
<!--                           <div class="modal-footer">
                             <button type="submit" class="btn btn-default " >Create</button> <button type="button" class="btn btn-default" @click="close">Close</button>
                           </div> -->
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" @click="close">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
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
      props:['openModal'],
      data(){
        return{
            'room_name':'',
            admin:{},
            errors:{}
            
        }
      },

    methods:{

        close(){

         this.$emit('closemodal')
         this.list = this.list
        },

    update_data()
    {
      console.log('yes');

      let formData = new FormData(document.getElementById('admin'));
            axios.patch(`user/${this.admin.id}/update`,this.$data.admin).then((response)=>{
                console.info(response.status);
                this.close();
                // this.settings = response.data
            })
            .catch((error)=>{
              this.errors= error.response.data.error;
            })
      
    },


    },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
