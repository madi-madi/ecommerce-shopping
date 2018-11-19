<template>
    

<form 
style="display: inline;" 
 method="post" 
 enctype="multipart/form-data" 
  v-on:change="handleFileUploads()" >

<label  class="fa fa-fw fa-plus-square fa-lg">
<input type="file" v-on:change="getfiles"  class="inputFile" ref="myfileinput" id="myfileinput" 
multiple 
>
</label>

    <!-- <button type="submit" ></button> -->

    <!-- <input type="hidden" name="product_id" id="product_id"v-model="product_id"> -->
</form>
    
</template>

<script>
    export default {
              props:['product_id','key_product'],
      data(){
        return{
            path:'',
            key_produc:this.key_product,
            product:{
            prduct_id:this.product_id,
            files:'',

            },
            errors:{},

            categories:[],
            
        }
      },
        mounted() {
            console.log('Component mounted.')
        },
        methods:{
            getfiles(e){
               let files_new =  e.target.files;
               console.log(files_new);
               this.product.files = files_new;
            },
            handleFileUploads(){
            // let formData = new FormData(document.getElementById('upfile'));
      // let files_new = document.getElementById("myfileinput");
      // let myfiles = files_new.files;
      // console.log(files_new);
      let file_product;
                let formData = new FormData();
                  for(var i= 0; i <this.product.files.length;i++){
                    file_product = this.product.files[i];
      formData.append('file_product[]',file_product)

      }

      formData.append('product_id',this.product.prduct_id)


            axios.post(`http://ecommerce-f.herokuapp.com/admin/upload/file/product`,formData,{
                headers:{
                'Content-Type': 'multipart/form-data'

                }
            }).then((response)=>{

                        this.$refs.myfileinput.value = null;
                        console.log(response.data)
                        // console.log(this.$parent.products.data[this.key_produc].images = '');
                        for(let single_file in response.data){
                            console.log(single_file)
                        this.$parent.products.data[this.key_produc].images.push(response.data[single_file]);

                        }

                    nativeToast({
                    message: 'Updated Success',
                    position: 'north-east',
                    // Self destroy in 5 seconds
                    timeout: 5000,
                    type: 'success'
                    })
            })
            .catch((error)=>{})
        }
        }
    }
</script>
