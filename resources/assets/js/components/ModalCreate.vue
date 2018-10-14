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
                        <p>Create New Product </p>
                          <form method="patch" enctype="multipart/form-data" 
                           v-on:submit.prevent="create_product()" id="products">

                            <div class="form-group">
                            <label for="title"> title</label>
                            <input type="text" title="title" id="title" name="title" class="form-control" v-model="product.title" >
                          </div>
                            <div class="form-group">
                            <label for="description">description</label>
                            <input type="text" name="description" id="description" class="form-control" v-model="product.description"
                            >
                          </div>
                            <div class="form-group">
                            <label for="price">price</label>
                            <input type="number" name="price" id="price" class="form-control"
                            v-model.number="product.price" 
                            >
                          </div>

                            <div class="form-group">
                            <label for="weight">weight</label>
                            <input type="number" name="weight" id="weight" class="form-control" 
                            v-model.number="product.weight"
                            >
                          </div>

                            <div class="form-group">
                            <label for="files">files</label>
                            <input type="file" name="files[]" ref="files" id="files" class="form-control" 
                            v-on:change="product.files"
                            multiple 
                            >
                          </div>

                            <div class="form-group">
                            <label for="category">category</label>
                            <input type="hidden" name="category_id" value="1">
                          <select  class="form-control" name="category_id" id="category" v-model="product.category_id">
                             <option disabled value="">please_select_one</option> 
                             <option v-for="category in categories" :value="category.id">
                             {{category.category_name}}</option>

                           </select>
                          </div>      

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
            path:'',
            url:'',
            product:{
              titlt:'',
              description:'',
              files:[],
              price:'',
              weight:'',
              category_id:'',
            },
            errors:{},

            categories:[],
            
        }
      },

              created(){
            axios.get('categories').then((response)=>{
              console.info(response);
              this.categories = response.data
            }).catch((error)=>{})
        },
        mounted() {
            // console.log('Component mounted.')
            this.path = window.location.pathname
            console.log(product.category_id);            


        },


    methods:{

        close(){

         this.$emit('closemodal')
         this.list = this.list
        },

    create_product()
    {
      console.log('yes');
      let formData = new FormData(document.getElementById('products'));
            axios.post(`products/create`,formData,{
                headers:{
                'Content-Type': 'multipart/form-data'

                }
            }).then((response)=>{
                // console.info('Seting '+ JSON.stringify(response.data));
                // this.settings = response.data

                        this.$refs.files.value = null;
                        this.$parent.products.data.unshift(response.data);
                        this.close();

                        // this.$refs.icon.value = null;
                    nativeToast({
                    message: 'Updated Success',
                    position: 'north-east',
                    // Self destroy in 5 seconds
                    timeout: 5000,
                    type: 'success'
                    })


            })
            .catch((error)=>{})
        // let url = '';

       this.path = window.location.pathname
      // switch(this.path){
      //   case '/admin/admins':
      //    this.url = 'admin';
      //   this.update();
      //   break;
      //   case '/admin/users':
      //    this.url = 'user';
      //   this.update();
      //   break;

      // }


      
    },
    update(){
      axios.patch(`${this.url}/${this.admin.id}/update`,this.$data.admin).then((response)=>{
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
        this.errors= error.response.data.error;
      })
    },


    },


    }
</script>
