Vue.config.devtools = true;
var app = new Vue({
  el: "#root",
  data: {
      categories: [],
  },
  mounted: function (){
      axios.get('http://localhost:8000/api/categories').then((response)=> {
          console.log(response);
      });
    },
      
});
