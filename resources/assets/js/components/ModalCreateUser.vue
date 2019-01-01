<template>
<div class="modal fade in" id="modal-default" style="display: block;" v-if="openModal" >
          <div class="modal-dialog" >
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close">
                  <span aria-hidden="true" @click="close">×</span></button>
                <h4 class="modal-title">Default Modal</h4>
              </div>
              <div class="modal-body">
                        <p>{{trans.create_new_user}} </p>
                          <form method="Post" enctype="multipart/form-data" 
                           v-on:submit.prevent="create_user()" id="admin">

                            <div class="form-group">
                            <label for="name"> {{trans.name}}</label>
                            <input type="text" name="name" id="name" class="form-control" v-model="user.name">
                            <figcaption v-if="errors.name" class="text-danger">{{errors.name[0]}}</figcaption>
                          </div>
                            <div class="form-group">
                            <label for="email">{{trans.email}}</label>
                            <input type="text"  name="email" id="email" class="form-control" 
                            v-model="user.email">
                            <figcaption v-if="errors.email" class="text-danger">{{errors.email[0]}}</figcaption>
                          </div>
                            <div class="form-group">
                            <label for="password">{{trans.password}}</label>
                            <input type="password"  name="password" id="password" class="form-control" 
                            v-model="user.password">
                            <figcaption v-if="errors.password" class="text-danger">{{errors.password[0]}}</figcaption>
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
    path:'',
    user:{
    name:'',
    email:'',
    password:'',

    },
    errors:{},


    }
    },
    methods:{

    close(){
    this.$emit('closemodal')
    },

    create_user()
    {
      console.log('yes');
      axios.post(`create/user`,this.$data.user).then((response)=>{
        this.$parent.users.data.unshift(response.data);
        this.close();
        this.user = {};
      }).catch((error)=>{
        // console.log(error.response.data);
        this.errors= error.response.data.errors;
        this.data = '';

      })
      
    },

    },
    mounted() {
    this.path = window.location.pathname

    }
    }
</script>
