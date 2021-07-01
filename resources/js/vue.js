Vue.config.devtools = true;
var app = new Vue({
    el: "#root",
    data: {
        categories: [],
        restaurants: [],
        categoryIndex: '',
        quantity: 1,
        carrello:[],
        array:[],
    },
    computed: {
        carrelloTotale() {
            let somma=0;
            for(var key in this.carrello) {
                somma +=(this.carrello[key].price * this.carrello[key].quantity);
            }
            console.log(somma);
            return somma.toFixed(2)
        },
    },
    mounted: function (){
        /* chiamata categorie ristoranti */
        axios.get('http://localhost:8000/api/categories').then((response)=> {
            this.categories = response.data.data;
            /*console.log(this.categories) */
        });
        /* chiamata per i ristoranti */
        axios.get('http://localhost:8000/api/restaurants').then((response)=> {
            this.restaurants = response.data.data;
            /* console.log(this.restaurants); */
        }); 
    },
    methods: {
        //al click vediamo tutti i ristoranti della categoria selezionata
        restaurantByCategory: function restaurantByCategory(category) {
    
            this.categoryIndex = category;
            axios.get("http://localhost:8000/api/restaurants/".concat(this.categoryIndex), {}).then((response) => {
                this.restaurants = response.data.data;
                /* console.log(response.data.data); */
            });
        },
        //al click vediamo tutti i ristoranti
        allRestaurants: function allRestaurants() {
            this.categoryIndex = '';
            axios.get('http://localhost:8000/api/restaurants').then((response)=> {
                this.restaurants = response.data.data;
                /* console.log(this.restaurants); */
            }); 
        },
        addCart: function(food) {
            let foods = food;
            foods.quantity = this.quantity;
           
            if (!this.carrello.includes(food)) {
                this.carrello.push(foods);
                localStorage.carrello = JSON.stringify(this.carrello);    
            } else {
                foods.quantity++;
            }

            console.log(foods.quantity);
        },

    },
});
