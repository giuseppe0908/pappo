Vue.config.devtools = true;
var app = new Vue({
  el: "#root",
  data: {
      categories: [],
  },
  mounted: function (){
      axios.get('http://localhost:8000/api/categories').then((response)=> {
          this.categories = response.data;
          console.log(this.categories);
      });
    },
      
});
