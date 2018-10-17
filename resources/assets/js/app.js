
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






const app = new Vue({
    el: '#app',
    data: function(){
        return{
        offset: 4,
        admin_auth :0,
        'showView':false,
        showAdd:false,
        block:false,
        file:'',
        sound:'http://soundbible.com/mp3/Air Plane Ding-SoundBible.com-496729130.mp3',
        categories:[],
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

        settings:[],

    }
    },
    created(){
        // console.log(this.$children[1]);
        // console.log(this.$children[2]);

    if (window.location.pathname === '/admin/settings') {

        this.getSettings()

    }
this.admin_auth = document.head.querySelector('meta[name="admin"]').content;
// console.log('dddddddd '+this.admin_auth)

    Echo.private('App.Admin.' + this.admin_auth)
    .notification((notification) => {
        // console.log(notification);
        this.notification.unshift(notification)
        if(this.sound) {
        var audio = new Audio(this.sound);
        audio.play();
      }
    });
    this.getCategories();
    },
    mounted(){
    if (window.location.pathname === '/admin/users') {

    	this.getUsers();
    }else if (window.location.pathname === '/admin/admins') {
        this.getAdmins()
    }
    // if (this.admin_auth) {
        this.getNotification();
    // }
     this.getProducts();

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

            }else if (path_request === '/admin/products') {
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
        deleteImage(photo , index , ind){
            console.log(this.products.data[ind])

            axios.delete(`image/${photo.id}/delete`).then((response)=>{
                this.products.data[ind].images.splice(index,1 )
            }).catch((error)=>{})
        },

        close() {
        this.showView =false;
        this.showAdd =false;

        },
        // product 
        deleteProduct(product ,index){
            axios.delete(`product/${product.id}/delete`).then((response)=>{
            console.log(this.products.data[index].deleted_at = response.data.deleted_at)
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
           axios.post(`product/${product.id}/restore`).then((response)=>{
            console.log(this.products.data[index].deleted_at = response.data.deleted_at)
           })
           .catch((error)=>{
            console.error(error.type);
           }) 
        }, 
        deleteforeverProduct(product ,index){
           axios.delete(`product/${product.id}/deleteforever`).then((response)=>{
            console.info(response);
                this.products.data.splice(index,1)
           })
           .catch((error)=>{
            console.error(error.type);
           }) 
        },
        getCategories(){
            axios.get('categories').then((response)=>{
            console.info(response);
            this.categories = response.data
            }).catch((error)=>{})

        },




    }
});
