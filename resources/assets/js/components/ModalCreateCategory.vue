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
                        <p>Create New Category </p>
                          <form method="post" enctype="multipart/form-data" 
                           v-on:submit.prevent="create_category()" id="products">

                            <div class="form-group">
                            <label for="category_name"> Category Name</label>
                            <input type="text" title="category_name" id="category_name" name="category_name" class="form-control" v-model="new_category.category_name" >
                            <small v-if="errors.name" class="text-danger">{{errors.name[0]}}</small>
                          </div>
                            <div class="form-group">
                            <label for="category_slug">Category Slug</label>
                            <input type="text" name="category_slug" id="category_slug" class="form-control" v-model="new_category.category_slug"
                            >
                            <small v-if="errors.category_slug" class="text-danger">{{errors.category_slug[0]}}</small>
                          </div>

                    
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" @click="close">Close</button>
                <button type="submit" class="btn btn-primary">Add Category</button>
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
      path:'',
      new_category:{
      category_name:'',
      },
      errors:{},
      categories:[],
      }
      },
    created(){
        this.path = window.location.pathname

      if (this.pathname === '/admin/categories') {
    axios.get('http://ecommerce-f.herokuapp.com/admin/categories').then((response)=>{
    console.info(response);
    this.categories = response.data
    }).catch((error)=>{
    this.errors= error.response.data.errors;

    })
    }
    },
    mounted() {
    },


    methods:{

    close(){

     this.$emit('closemodal')
    },

    create_category()
    {
      axios.post(`http://ecommerce-f.herokuapp.com/admin/category/create`,this.new_category).then((response)=>{
      this.$parent.categories.data.unshift(response.data);
      this.close();
      this.new_product = {};
      nativeToast({
      message: 'Updated Success',
      position: 'north-east',
      // Self destroy in 5 seconds
      timeout: 5000,
      type: 'success'
      })


      })
      .catch((error)=>{})


      this.path = window.location.pathname
    },



    },


    }
</script>
