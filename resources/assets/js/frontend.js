require('./bootstrap');

window.Vue = require('vue');

Vue.component('pagination-component', require('./components/PaginationComponent.vue'));


const frontend = new Vue({
	el:'#frontend',
	data :{
        products: {
            total: 0,
            per_page: 2,
            from: 1,
            to: 0,
            current_page: 1
        },
        offset:4,
	},
	created(){
		console.log('frontend ready');
		this.getProducts();
	},
	methods:{ 
		getProducts(){
			axios.get(`http://127.0.0.1:8000?page=${this.products.current_page}`).then((response)=>{
				console.log(response);
				this.products = response.data;
			}).catch((error)=>{

			})
		}
	},
});