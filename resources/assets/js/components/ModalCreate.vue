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
                          <form method="post" enctype="multipart/form-data" 
                           v-on:submit.prevent="create_product()" id="products">

                            <div class="form-group">
                            <label for="title"> title</label>
                            <input type="text" title="title" id="title" name="title" class="form-control" v-model="new_product.title" >
                          </div>
                            <div class="form-group">
                            <label for="description">description</label>
                            <input type="text" name="description" id="description" class="form-control" v-model="new_product.description"
                            >
                          </div>
                            <div class="form-group">
                            <label for="price">price</label>
                            <input type="number" name="price" id="price" class="form-control"
                            v-model.number="new_product.price" 
                            >
                          </div>
                            <div class="form-group">
                            <label for="product_count">product_count</label>
                            <input type="number" name="product_count" id="product_count" class="form-control"
                            v-model.number="new_product.product_count" 
                            >
                          </div>
                            <div class="form-group">
                            <label for="weight">weight</label>
                            <input type="number" name="weight" id="weight" class="form-control" 
                            v-model.number="new_product.weight"
                            >
                          </div>

                            <div class="form-group">
                            <label for="files">files</label>
                            <input type="file" name="files[]" ref="files" id="files" class="form-control" 
                            v-on:change="file_product"
                            multiple 
                            >
                          </div>

                            <div class="form-group">
                            <label for="category">category</label>
                            <!-- <input type="hidden" name="category_id" value="1"> -->
                          <select  class="form-control" name="category_id" id="category_id" v-model="new_product.category_id">
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
            new_product:{
              titlt:'',
              description:'',
              files:'',
              price:'',
              product_count:'',
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
            // console.log(product.category_id);            


        },


    methods:{

        close(){

         this.$emit('closemodal')
         this.list = this.list
        },
      file_product(event){
      console.log(event.target.files);

      this.new_product.files = event.target.files

      


    },

    create_product()
    {
      let file_product ;

      // file_product(event)
      console.log('yes');
      // let formData = new FormData(document.getElementById('products'));
            let formData = new FormData();
                  for(var i= 0; i <this.new_product.files.length;i++){
                    file_product = this.new_product.files[i];
      formData.append('file_product[]',file_product)

      }
      formData.append('category_id', this.new_product.category_id)
      formData.append('title', this.new_product.title)
      formData.append('description', this.new_product.description)
      formData.append('weight', this.new_product.weight)
      formData.append('price', this.new_product.price)
      formData.append('product_count', this.new_product.product_count)

      // formData.append('category_id', this.product.category_id)


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
                        this.new_product = {};
                        

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



    },


    }
</script>
