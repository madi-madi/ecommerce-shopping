<template>
<div class="modal fade in" id="modal-default" style="display: block;" v-if="openModal" >
          <div class="modal-dialog" >
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close">
                  <span aria-hidden="true" @click="close">×</span></button>
                <h4 class="modal-title">{{trans.create_new_product}}</h4>
              </div>
              <div class="modal-body">
                      
                          <form method="post" enctype="multipart/form-data" 
                           v-on:submit.prevent="create_product()" id="products">

                            <div class="form-group">
                            <label for="title"> {{trans.title}}</label>
                            <input type="text" title="title" id="title" name="title" class="form-control" v-model="new_product.title" >
                            <small v-if="errors.title" class="text-danger">{{errors.title[0]}}</small>
                          </div>
                            <div class="form-group">
                            <label for="description">{{trans.description}}</label>
                            <input type="text" name="description" id="description" class="form-control" v-model="new_product.description"
                            >
                            <small v-if="errors.description" class="text-danger">{{errors.description[0]}}</small>
                          </div>
                            <div class="form-group">
                            <label for="price">{{trans.price}}</label>
                            <input type="number" name="price" id="price" class="form-control"
                            v-model.number="new_product.price" 
                            >
                            <small v-if="errors.price" class="text-danger">{{errors.price[0]}}</small>
                          </div>
                            <div class="form-group col-md-6 col-xs-12">
                            <label for="product_count">{{trans.count}}</label>
                            <input type="number" name="product_count" id="product_count" class="form-control"
                            v-model.number="new_product.product_count" 
                            >
                            <small v-if="errors.product_count" class="text-danger">{{errors.product_count[0]}}</small>
                          </div>
                            <div class="form-group col-md-6 col-xs-12">
                            <label for="weight">{{trans.weight}}</label>
                            <input type="number" name="weight" id="weight" class="form-control" 
                            v-model.number="new_product.weight"
                            >
                            <small v-if="errors.weight" class="text-danger">{{errors.weight[0]}}</small>
                          </div>
                          <!-- Date range -->
                          <div class="form-group">
                          <label>Date range:</label>

                          <div class="input-group">
                          <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" class="form-control pull-right" id="reservation">
                          </div>
                          <!-- /.input group -->
                          </div>
                          <!-- /.form group -->

                            <div class="form-group col-md-6 col-xs-12">
                            <label for="files">{{trans.files}}</label>
                            <input type="file" name="files[]" ref="files" id="files" class="form-control" 
                            v-on:change="file_product"
                            multiple 
                            >
                          <!--   <small v-if="errors.name" class="text-danger">{{errors.name[0]}}</small> -->
                          </div>

                            <div class="form-group col-md-6 col-xs-12">
                            <label for="category">{{trans.category}}</label>
                            <!-- <input type="hidden" name="category_id" value="1"> -->
                          <select  
                          v-if="path === '/admin/category/'+curent_category" 
                          class="form-control" name="category_id" id="category_id" v-model="new_product.category_id">
                             <option disabled value="">{{trans.please_select_one}}</option> 
                             <option
                              v-for="category in categories"
                              v-if="curent_category === category.category_slug"
                              :value="category.id">
                             {{category.category_name}}</option>
                           </select>
                          <select  
                          v-else
                          class="form-control" name="category_id" id="category_id" v-model="new_product.category_id">
                             <option disabled value="">{{trans.please_select_one}}</option> 
                             <option
                              v-for="category in categories"
                             
                              :value="category.id">
                             {{category.category_name}}</option>
                           </select>
                            <small v-if="errors.category_id" class="text-danger">{{errors.category_id[0]}}</small>
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
            url:'',
            new_product:{
              title:'',
              description:'',
              files:'',
              price:'',
              product_count:'',
              weight:'',
              category_id:'',
            },
            errors:{},
            curent_category:window.location.pathname.split('/')[3],

            categories:[],
            
        }
      },

              created(){
            axios.get('http://ecommerce-f.herokuapp.com/admin/categories').then((response)=>{
              console.info(response);
              this.categories = response.data
            }).catch((error)=>{
              this.errors= error.response.data.errors;
              this.data = '';
            })
        },
        mounted() {
            // this.path = window.location.pathname
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


            axios.post(`http://ecommerce-f.herokuapp.com/admin/products/create`,formData,{
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
            .catch((error)=>{
          this.errors= error.response.data.errors;
          this.data = '';
            })


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
