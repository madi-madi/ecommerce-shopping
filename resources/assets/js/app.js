
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web thislications using Vue and Laravel.
 */

require('./bootstrap');
import nativeToast from 'native-toast'

window.Vue = require('vue');
// register the plugin on vue


// you can also pass options, check options reference below
// Vue.use(Toasted, Options)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('pagination-component', require('./components/PaginationComponent.vue'));
Vue.component('modal-component', require('./components/ModalComponent.vue'));
Vue.component('modal-create', require('./components/ModalCreate.vue'));
Vue.component('modal-update', require('./components/ModalUpdate.vue'));
Vue.component('upload-file', require('./components/UploadFile.vue'));
Vue.component('modal-create-category', require('./components/ModalCreateCategory.vue'));
Vue.component('modal-create-admin', require('./components/ModalCreateAdmin.vue'));
Vue.component('modal-create-user', require('./components/ModalCreateUser.vue'));
Vue.component('modal-create-role', require('./components/ModalCreateRole.vue'));










const app = new Vue({
    el: '#app',
    data: function(){
        return{
        offset: 4,
        admin_auth :0,
        'showView':false,
        showAdd:false,
        showAddCategory:false,
        block:false,
        file:'',
        sound:'http://soundbible.com/mp3/Air Plane Ding-SoundBible.com-496729130.mp3',
        activeCategory:document.head.querySelector('meta[name="category_slug"]').content,
        // http://soundbible.com/mp3/Elevator Ding-SoundBible.com-685385892.mp3
        notification:[],
        users: {
            total: 0,
            per_page: 2,
            from: 1,
            to: 0,
            current_page: 1
        },
        admins: {
            total: 0,
            per_page: 2,
            from: 1,
            to: 0,
            current_page: 1
        },
        products: {
            total: 0,
            per_page: 2,
            from: 1,
            to: 0,
            current_page: 1
        },
        productsCat: {
            total: 0,
            per_page: 2,
            from: 1,
            to: 0,
            current_page: 1
        },
        categories: {
            total: 0,
            per_page: 2,
            from: 1,
            to: 0,
            current_page: 1
        },
        roles: {
            total: 0,
            per_page: 2,
            from: 1,
            to: 0,
            current_page: 1
        },
        settings:[],

    }
    },
    created(){
this.admin_auth = document.head.querySelector('meta[name="admin"]').content;
        this.getNotification();

    Echo.private('App.Admin.' + this.admin_auth)
    .notification((notification) => {
        this.notification.unshift(notification)
        if(this.sound) {
        var audio = new Audio(this.sound);
        audio.play();
      }
    });

    if (window.location.pathname === '/admin/settings') {

    this.getSettings()

    }
    if (window.location.pathname === '/admin/categories') {
    this.getCategories();

    }

    if (window.location.pathname === '/admin/roles') {
        this.getRoles();
    }


    },
    mounted(){
    if (window.location.pathname === '/admin/users') {

    	this.getUsers();
    }else if (window.location.pathname === '/admin/admins') {
        this.getAdmins()
    }else if (window.location.pathname === '/admin/products') {
     this.getProducts();

    }else if (window.location.pathname === '/admin/category/'+this.activeCategory) {
    this.getProductCat();

    }
        // this.activeCategory = document.head.querySelector('meta[name="category_slug"]').content;

    // if (this.admin_auth) {
    // }

    },
    methods:{
        getUsers() {
            axios.get(`/admin/users?page=${this.users.current_page}`)
            .then((response) => {
            this.users = response.data;
            })
            .catch(() => {
            console.log('handle server error from here');
            });
        },
        deleteUser(user ,index){
            axios.delete(`user/${user.id}/delete`).then((response)=>{
            this.users.data[index].deleted_at = response.data.deleted_at

            })
            .catch((error)=>{
            nativeToast({
            message: 'Access denied',
            // position: 'north-east',
            // Self destroy in 5 seconds
            timeout: 4000,
            type: 'warning'
            })

            }) 
        },
        restoreUser(user ,index){
           axios.post(`user/${user.id}/restore`).then((response)=>{
            this.users.data[index].deleted_at = response.data.deleted_at

           })
           .catch((error)=>{
            console.error(error.type);
           }) 
        }, 
        deleteforeverUser(user ,index){
           axios.delete(`user/${user.id}/deleteforever`).then((response)=>{
            this.users.data.splice(index , 1)

           })
           .catch((error)=>{
            console.error(error.type);
           }) 
        },
        // admin 
        deleteAdmin(admin ,index){
            axios.delete(`admin/${admin.id}/delete`).then((response)=>{
            console.log(this.admins.data[index].deleted_at = response.data.deleted_at)
            })
            .catch((error)=>{
            nativeToast({
            message: 'Access denied',
            // position: 'north-east',
            // Self destroy in 5 seconds
            timeout: 4000,
            type: 'warning'
            })

            }) 
        },
        restoreAdmin(admin ,index){
           axios.post(`admin/${admin.id}/restore`).then((response)=>{
            console.log(this.admins.data[index].deleted_at = response.data.deleted_at)
           })
           .catch((error)=>{
            console.error(error.type);
           }) 
        }, 
        deleteforeverAdmin(admin ,index){
           axios.delete(`admin/${admin.id}/deleteforever`).then((response)=>{
           this.admins.data.splice(index,1)
           })
           .catch((error)=>{
            console.error(error.type);
           }) 
        },
        updateSettings(){
            let formData = new FormData(document.getElementById('settings'));
            axios.post(`settings`,formData,{
            headers:{
            'Content-Type': 'multipart/form-data'

            }
            }).then((response)=>{
            // console.info('Seting '+ JSON.stringify(response.data));
            this.settings = response.data
            this.$refs.logo.value = null;
            this.$refs.icon.value = null;
            nativeToast({
            message: 'Updated Success',
            position: 'north-east',
            // Self destroy in 5 seconds
            timeout: 5000,
            type: 'success'
            })


            })
            .catch((error)=>{})

            console.info('Test function colective');
        },
        getAdmins(){
            // axios.get(`/admin/users?page=${this.users.current_page}`)

            axios.get(`/admin/admins?page=${this.admins.current_page}`).then((response)=>{
            this.admins = response.data;

            }).catch((error)=>{})
        },
        getSettings(){
            axios.get(`settings`).then((response)=>{
            // console.log(response.data)
            this.settings = response.data;
            })
            .catch((error)=>{})
        }, 

        getNotification(){
            axios.get(`notification/admin`).then((response)=>{
            // console.log(response.data)
            this.notification = response.data

            }).catch((error)=>{})
        },
        openCreate(){
            app.showAdd = true;
        },

        openShow(index){
            let  path_request = window.location.pathname
            if (path_request === '/admin/admins') {
            this.$children[0].admin= this.admins.data[index] // children props

            }else if (path_request === '/admin/users') {
            this.$children[0].admin= this.users.data[index] // children props

            }else if (path_request === '/admin/products' ||
             path_request === '/admin/category/'+this.activeCategory) {
            this.$children[1].product= this.products.data[index] // children props

            }
            app.showView = true;
        },


        getProducts() {
            axios.get(`/admin/products?page=${this.products.current_page}`)
            .then((response) => {
            this.products = response.data;
            })
            .catch((error) => {
            console.log('handle server error from here');
            });
        },
        getProductsByCategory(category) {

            // axios.get(`/admin/category/${category.category_slug}?page=${this.products.current_page}`)
            // .then((response) => {
            // })
            // .catch((error) => {
            // console.log('handle server error from here');
            // });                
        },
        getProductCat(){
            axios.get(`/admin/category/${this.activeCategory}?page=${this.productsCat.current_page}`)
            .then((response) => {
                console.log(response.data);
            this.productsCat = response.data;
            })
            .catch((error) => {
            console.log('handle server error from here');
            });
        },
        deleteImage(photo , index , ind){
            console.log(this.products.data[ind])

            axios.delete(`http://127.0.0.1:8000/admin/image/${photo.id}/delete`).then((response)=>{
                this.products.data[ind].images.splice(index,1 )
            }).catch((error)=>{})
        },

        close() {
        this.showView =false;
        this.showAdd =false;

        },
        // product 
        deleteProduct(product ,index){
            console.log(product);
            axios.delete(`http://127.0.0.1:8000/admin/product/${product.id}/delete`).then((response)=>{
            if (window.location.pathname === '/admin/category/'+this.activeCategory) {
            console.log(this.productsCat.data[index].deleted_at = response.data.deleted_at)

            }else{
            console.log(this.products.data[index].deleted_at = response.data.deleted_at)

            }
            })
            .catch((error)=>{
            nativeToast({
            message: 'Access denied',
            // position: 'north-east',
            // Self destroy in 5 seconds
            timeout: 4000,
            type: 'warning'
            })

            }) 
        },
        restoreProduct(product ,index){
           axios.post(`http://127.0.0.1:8000/admin/product/${product.id}/restore`).then((response)=>{
            if (window.location.pathname === '/admin/category/'+this.activeCategory) {
            console.log(this.productsCat.data[index].deleted_at = response.data.deleted_at)

            }else{
            console.log(this.products.data[index].deleted_at = response.data.deleted_at)

            }
            
           })
           .catch((error)=>{
            console.error(error.type);
           }) 
        }, 
        deleteforeverProduct(product ,index){
           axios.delete(`http://127.0.0.1:8000/admin/product/${product.id}/deleteforever`).then((response)=>{
            console.info(response);
            if (window.location.pathname === '/admin/category/'+this.activeCategory) {
                this.productsCat.data.splice(index,1)

            }else{
                this.products.data.splice(index,1)

            }

           })
           .catch((error)=>{
            console.error(error.type);
           }) 
        },
        getCategories(){
            axios.get('categories/all').then((response)=>{
            console.info(response);
            this.categories = response.data
            }).catch((error)=>{})

        },

        // admin roles
                getRoles() {
            axios.get(`/admin/roles?page=${this.roles.current_page}`)
            .then((response) => {
            this.roles = response.data;
            })
            .catch(() => {
            console.log('handle server error from here');
            });
        },




    }
});
