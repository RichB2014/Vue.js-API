<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Built with vue.js, and bulma CSS frameworks</title>
	<!-- Begin CSS framework -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css">
	<!-- Include custom CSS -->
	<link rel="stylesheet" href="style.scss">
	<!-- Include fontawesome -->
	<script defer src="https://use.fontawesome.com/releases/v5.1.0/js/all.js"></script>	
	<!-- Begin vue.js framework -->
	<script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
	<!-- Include Axios for API consumption -->
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</head>

<body>
	<div id="vue-app">
<!-- Begin Header  --> 
		<section class="hero is-primary is-small">
    		<div class="hero-body">
     			<div class=container>
      				<!-- Pull in the title, just to start off with something easy -->
                    <h1 class="title">{{ title }}</h1>
                    <br />
                    <!-- v-model ties the input field to the search variable -->
                    <input class="input is-large search" type="text" v-model="search" placeholder="Search by Name" />
                    <div class=search-by-abv>
                    <h2>Search by ABV.</h2>
                    <!-- v-model ties the slider number to the abv variable -->
                    <input class="is-large abv-slider" type="range" min="0" max="55" value="6" v-model="abv"> <span v-if="abv != null" class="big-num">{{ abv }}%</span>
                    <div style="max-width: 80%;">
                    	<div class="left">0%</div>
                        <div class="right">55%</div>
    				</div>
                    </div>
                </div>
			</div>
		</section>
<!-- End Header -->
		<section class="is-large margin-top-bottom">
        <div class="container is-fluid">
			<div class="columns is-multiline">	
				<!-- @click updates the item in the updateSelected method with the item from result the results array, this lets us know which card is selected -->
                <div v-for="(result,index) in filter" @click="updateSelected(result)" :key="result.id" class="column is-one-fifth">
                    <!-- if card is clicked show is toggled, we'll use this to display the description -->
                    <div class="card" @click="show = !show">
  						<div class="card-image">
    						<figure class="image">
      							<img class="beer-image" :src="result.image_url" alt="Placeholder image">
    						</figure>
    						<div class="middle">
    							<div class="middle-text">View Details</div>
  							</div>
  						</div>
  						<div class="card-content center">
    						<div class="media">
      							<div class="media-content center">
        							<p class="title is-4">Beer: {{ result.name }}{{ result.flip }}</p>
        							<p class="subtitle is-6">ABV: {{ result.abv }}</p>
      							</div>
    						</div>
							<transition name="bounce">
    						<!-- if show is true, display the description from the selectedPlace Array -->
     						<div v-if="show" class="content">
      								{{ selectedPlace.description }}
                            </div>
                            </transition>
  						</div>
					</div>
				</div>
			</div>
		</div>
		</section>
<!--------- End main content ---------->
<!--------- Begin Footer ---------->
<footer class="footer">
	<div class="content has-text-right">
		Rich Bannon © {{ new Date().getFullYear() }}
	</div>
</footer>
</div>
<!-- Include app.js file -->
<script src="app.js"></script>
</body>
</html>
