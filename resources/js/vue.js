Vue.config.devtools = true;
var app = new Vue({
    el: "#root",
    data: {
        categories: [],
        restaurants: [],
        categoryIndex: '',
        quantity: 1,
        carrello: [],
        array: [],
        customer_name:"",
        customer_surname:"",
        customer_address:"",
        customer_phone_number:"",
        customer_email:"",
        total:0,
        soldatino: false,
        scompari:true,

    },
    computed: {
        carrelloTotale() {
            let somma = 0;
            for (var key in this.carrello) {
                somma += (this.carrello[key].price * this.carrello[key].quantity);
            }
            return somma.toFixed(2)
        }

    },
    mounted: function () {
        if (localStorage.carrello) {
            this.carrello = JSON.parse(localStorage.carrello);
        }
        /* chiamata categorie ristoranti */
        axios.get('http://localhost:8000/api/categories').then((response) => {
            this.categories = response.data.data;
        });
        /* chiamata per i ristoranti */
        axios.get('http://localhost:8000/api/restaurants').then((response) => {
            this.restaurants = response.data.data;
        });

        var button = document.querySelector('#submit-button');
			
			braintree.dropin.create({
			authorization: 'sandbox_g42y39zw_348pk9cgf3bgyw2b',
			selector: '#dropin-container'
			}, function (err, instance) {
			if (err) {
				// An error in the create call is likely due to
				// incorrect configuration values or network issues
				return;
			}

			button.addEventListener('click', function () {
				instance.requestPaymentMethod(function (err, payload) {
				if (err) {
					// An appropriate error will be shown in the UI
					return;
				}

				// Submit payload.nonce to your server
				});
			})
			});		
    },
    methods: {
        //al click vediamo tutti i ristoranti della categoria selezionata
        restaurantByCategory: function restaurantByCategory(category) {

            this.categoryIndex = category;
            axios.get("http://localhost:8000/api/restaurants/".concat(this.categoryIndex), {}).then((response) => {
                this.restaurants = response.data.data;
            });
        },
        //al click vediamo tutti i ristoranti
        allRestaurants: function allRestaurants() {
            this.categoryIndex = '';
            axios.get('http://localhost:8000/api/restaurants').then((response) => {
                this.restaurants = response.data.data;
            });
        },
        addCart: function (food, quantity) {


            /*throw new Error("Something went badly wrong!");*/
            if (this.carrello.length === 0) {

                food.quantity = quantity
                this.carrello.push(food);

            } else {
                food.quantity = quantity
                let flag = false;
                this.carrello.forEach(element => {
                    if (element.id === food.id) {
                        element.quantity++;
                        flag = true;
                    }
                });

                if (!flag) {
                    this.carrello.push(food);
                }
            }
            localStorage.carrello = JSON.stringify(this.carrello);
        },
        aggiungi: function (id1) {

            this.carrello.forEach(item => {
                if (item.id === id1) {
                    item.quantity++;
                    localStorage.carrello = JSON.stringify(this.carrello);
                }
            });
        },
        meno: function (id1) {
            this.carrello.forEach((item, index) => {
                if (item.id === id1) {
                    if (item.quantity > 1) {
                        item.quantity--;
                        localStorage.carrello = JSON.stringify(this.carrello);
                    } else {
                        this.carrello.splice(index, 1);
                        localStorage.removeItem('carrello');
                        this.soldatino = true;
                    }
                }
            });
            if (!this.soldatino) {
                localStorage.carrello = JSON.stringify(this.carrello);
            }

            if (this.carrello.length === 0) {
                window.localStorage.clear();
            }
        },

        svuota:function() {
            this.carrello.forEach((element, index) => {
                this.carrello.splice(index);
                localStorage.carrello = JSON.stringify(this.carrello);
            });
        },

        cancellaItem: function(id1) {
            this.carrello.forEach((element, index) => {
                if (element.id === id1) {
                    this.carrello.splice(index, 1);
                    localStorage.carrello = JSON.stringify(this.carrello);    
                }
            });
        },
        paga: function(){
            // const order = JSON.stringify({
             
            //     "customer_name": this.customer_name,
            //     "customer_surnname": this.customer_surname,
            //     "customer_address": this.customer_address,
            //     "customer_phone_number": this.customer_phone_number,
            //     "customer_email": this.customer_email,
            //     "total": this.total,
                
            //  });
  
            // axios.post('http://localhost:8000/api/orders/make/payment', order).then((response) => {
            //     console.log(respose.data);
            // });
            window.localStorage.clear();
        },
        salvataggio: function(){
            this.scompari = false;
        }
    },
});
