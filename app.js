// JavaScript Document
const url = "https://api.punkapi.com/v2/beers?per_page=15";
//new instance
new Vue({
	el:'#vue-app',
	data:{
		title:'DOING STUFF AND THINGS WITH Vue.js, Bulma (CSS) + THE PUNKAPI FROM BREW DOG',
		show: false,
		results: [],
		loading: true,
		errored: false,
		search: "",
		abv: null,
		selectedPlace: {}
	},
//connect to the API	
	async mounted() {
		await axios.get(url, {
			params: {
			//ids: 106
			}
		})
		.then(response => {
			this.results = response.data;
		})
		.catch(error => {
			console.log(error);
			this.errored = true;
		})
		.finally(() => this.loading = false)
	},
//Filter by results array items
	computed:{
//Filter using input from the search variable
		filter:function() {
				return this.results.filter((result) => {
					return result.name.toLowerCase().match(this.search.toLowerCase());
				});
			},
//filter using input from the abv slider, will display anything at the selected number or below
		abvFilter:function() {
			if(result.abv <= this.abv){
				return this.abv;
			}
		},		
//add "flip" item to each result in the array
		addFlip: function() {
			for(var i = 0; i< this.results.length; i++){
    			this.results[i]["flip"] = false;
			}
		},
		letsFlip: function(){
				var i = selectedPlace.id;
     			Vue.set(this.results[i], "flip", true);
		}
	},
//Methods
	methods: {
//get card that was clicked
		updateSelected (selectedItem) {
        	this.selectedPlace = selectedItem;
     	},
	}
});