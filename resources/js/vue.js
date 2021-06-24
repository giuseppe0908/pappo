Vue.config.devtools = true;
var app = new Vue({
  el: "#root",
  data: {
      categories: [],
      restaurants: [],
  },
  mounted: function (){
      /* chiamata categorie ristoranti */
      axios.get('http://localhost:8000/api/categories').then((response)=> {
          this.categories = response.data.data;
          console.log(this.categories);
      });
      /* chiamata per i ristoranti */
      axios.get('http://localhost:8000/api/restaurants').then((response)=> {
        this.restaurants = response.data.data;
        console.log(this.restaurants);
    }); 
    },
});
