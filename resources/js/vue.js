Vue.config.devtools = true;
var app = new Vue({
    el: "#root",
    data: {
        categories: [],
        restaurants: [],
        categoryIndex: '',
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
        addCart: function() {
            console.log('click!');
        }
    },
});
