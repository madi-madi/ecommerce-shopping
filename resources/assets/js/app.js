
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
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

const app = new Vue({
    el: '#app',
    data: function(){
        return{
        offset: 4,
        admin_auth :0,
        sound:'http://soundbible.com/mp3/Air Plane Ding-SoundBible.com-496729130.mp3',
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

        settings:[],

    }
    },
    created(){
    if (window.location.pathname === '/admin/settings') {

        this.getSettings()

    }
this.admin_auth = document.head.querySelector('meta[name="admin"]').content;
// console.log('dddddddd '+this.admin_auth)

    Echo.private('App.Admin.' + this.admin_auth)
    .notification((notification) => {
        console.log(notification);
        this.notification.unshift(notification)
        if(this.sound) {
        var audio = new Audio(this.sound);
        audio.play();
      }
    });
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
            // console.info(user + index );
           axios.delete(`user/delete/${user.id}`).then((response)=>{
            console.info(response);
            app.getUsers();
           })
           .catch((error)=>{
                nativeToast({
                message: 'Access denied',
                // position: 'north-east',
                // Self destroy in 5 seconds
                timeout: 4000,
                type: 'warning'
                })
                // or nativeToast.warning(options)

           }) 
        },
        restoreUser(user ,index){
            // console.info(user + index );
           axios.delete(`user/restore/${user.id}`).then((response)=>{
            console.info(response);
            app.getUsers();
           })
           .catch((error)=>{
            console.error(error.type);
           }) 
        }, 
        deleteforeverUser(user ,index){
            // console.info(user + index );
           axios.delete(`user/deleteforever/${user.id}`).then((response)=>{
            console.info(response);
            app.getUsers();
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
                console.info('Seting '+ JSON.stringify(response.data));
                app.settings = response.data
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
                console.log(response.data)
                app.settings = response.data;
            })
            .catch((error)=>{})
        }, 

        getNotification(){
            axios.get(`notification/admin`).then((response)=>{
                console.log(response.data)
                this.notification = response.data

            }).catch((error)=>{})
        },

    },
});
