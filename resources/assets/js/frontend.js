require('./bootstrap');

window.Vue = require('vue');
import StarRating from 'vue-star-rating'

Vue.component('star-rating', StarRating);



Vue.component('pagination-component', require('./components/PaginationComponent.vue'));


const frontend = new Vue({
	el:'#frontend',
	data :{
		auth_user:window.user_is,

        products: {
            total: 0,
            per_page: 2,
            from: 1,
            to: 0,
            current_page: 1
		},
        productsElect: {
            total: 0,
            per_page: 2,
            from: 1,
            to: 0,
            current_page: 1
		},
        productsPhones: {
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
		this.getProductsEloctronic();
		this.getProductsPhones();
	},
	methods:{ 
		//productsElect
		getProducts(){
			axios.get(`http://127.0.0.1:8000?page=${this.products.current_page}`).then((response)=>{
				console.log(response.data);
				this.products = response.data.products;
			}).catch((error)=>{

			})
		},
		getProductsEloctronic(){
			axios.get(`http://127.0.0.1:8000?page=${this.productsElect.current_page}`).then((response)=>{
				console.log(response.data);
				this.productsElect = response.data.productsElectronic;
			}).catch((error)=>{

			})
		},
		getProductsPhones(){
			axios.get(`http://127.0.0.1:8000?page=${this.productsPhones.current_page}`)
			.then((response)=>{
				console.log(response.data);
				this.productsPhones = response.data.productsPhones;
			}).catch((error)=>{

			})
		},
		setCurrentRating(event , product, index){
			//alert(product.category.category_name);
			axios.post(`http://127.0.0.1:8000/product/${product.id}/rate`,{
				'product_id': product.id,
				'rating':event,
				
			})
			.then((response)=>{
				if(product.category.id === response.data.category_id){
					console.log(response.data);
					this.productsElect.data[index].rate = response.data.rate;
					this.products.data[index].rate = response.data.rate;

				}

				
			})
			.catch((error)=>{
				console.log(error.type)
			});
		},
	
	},
});