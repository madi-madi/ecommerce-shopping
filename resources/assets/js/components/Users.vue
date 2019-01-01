<template>
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
                <tbody v-for="(user, index) in users.data">
                <tr
                 :class="{'alert alert-danger':user.deleted_at !== null}"
                  >
                  <td>{{user.id}}</td>
                  <td>{{user.name | capitalize }}
                  </td>
                  <td>{{user.email}}</td>
                  <td>{{user.created_at}}</td>
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


</template>

<script>
let Update = require('./UpdateUser.vue'); 
    export default {
            props:['users','trans'],
    components:{Update},
    data(){
    return{

    }
},
        mounted() {
            console.log('Component mounted.')
        },
        methods:{
        statusnativeToast(message="Done", name=null, type="success",timeout=5000 ,position="north-east"){
        nativeToast({
        message: message + ' ' + this.$options.filters.capitalize(name)  ,
        position:position,
        // Self destroy in 5 seconds
        timeout: timeout,
        type: type,
        })
        },
        deleteUser(user ,index){
            axios.delete(`user/${user.id}/delete`).then((response)=>{
            this.$parent.users.data[index].deleted_at = response.data.deleted_at
      this.statusnativeToast("Success Deleted : ",user.name,"success",5000 ,"north-east")

            })
            .catch((error)=>{
      this.statusnativeToast("Access denied",error.type,"warning",5000 ,"north-east")


            }) 
        },

        restoreUser(user ,index){
           axios.post(`user/${user.id}/restore`).then((response)=>{
            this.$parent.users.data[index].deleted_at = response.data.deleted_at
      this.statusnativeToast("Success Restored : ",user.name,"success",5000 ,"north-east")

           })
           .catch((error)=>{
            console.error(error.type);
           }) 
        }, 
        deleteforeverUser(user ,index){
           axios.delete(`user/${user.id}/deleteforever`).then((response)=>{
            this.$parent.users.data.splice(index , 1)
      this.statusnativeToast("Success Deleted Ever : ",user.name,"success",5000 ,"north-east")

           })
           .catch((error)=>{
            console.error(error.type);
      this.statusnativeToast("Access denied",error.type,"warning",5000 ,"north-east")

           }) 
        },
        },
    filters:{
        capitalize: function (value){
            if (!value) return '';
            value = value.toString();
         return    value.charAt(0).toUpperCase()+ value.slice(1)
        }
    },
    }
</script>
