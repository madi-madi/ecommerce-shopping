<template>
                
         <tr 
                 :class="{'alert alert-danger':admin.deleted_at !== null}"

          >
                  <td>{{admin.id}}</td>
                  <td>{{admin.name | capitalize}}</td>
                  <td>{{admin.email}}</td>
                  <td>{{admin.created_at}}</td>
                  <td>{{admin.roles.role_name}}</td>
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

</template>

<script>
    export default {
            props:['admin','index','trans'],
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
        // admin 
        deleteAdmin(admin ,index){
            axios.delete(`admin/${admin.id}/delete`).then((response)=>{
            this.$parent.admins.data[index].deleted_at = response.data.deleted_at
      this.statusnativeToast("Success Deleted : ",admin.name,"success",5000 ,"north-east")

            })
            .catch((error)=>{
      this.statusnativeToast("Access denied",error.type,"warning",5000 ,"north-east")
    
            }) 
        },
        restoreAdmin(admin ,index){
           axios.post(`admin/${admin.id}/restore`).then((response)=>{
           this.$parent.admins.data[index].deleted_at = response.data.deleted_at
      this.statusnativeToast("Success Restored : ",admin.name,"success",5000 ,"north-east")

           })
           .catch((error)=>{
            console.error(error.type);
      this.statusnativeToast("Access denied ",error.type,"warning",5000 ,"north-east")

           }) 
        }, 
        deleteforeverAdmin(admin ,index){
           axios.delete(`admin/${admin.id}/deleteforever`).then((response)=>{
           this.$parent.admins.data.splice(index,1)
      this.statusnativeToast("Success Deleted For Ever : ",admin.name,"success",5000 ,"north-east")

           })
           .catch((error)=>{
            console.error(error.type);
      this.statusnativeToast("Access denied ",error.type,"warning",5000 ,"north-east")

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
