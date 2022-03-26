<template>
    <div>
        <div class="placeHeader">Weather Forecast for {{city}}</div>      
        <div class="weather_main">     
        
            <div class="weatherBox row"  v-for="forecast in forecastList" :key="forecast.id">
                <div class='col forecastDate'>{{  forecast.date }}</div>
                <div class='col'>
                    <img class=" weather_icon" v-bind:src='forecast.icon' alt="Weather">
                </div>
                <div class='col'>{{  forecast.description }}</div>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        mounted() {
            this.fetchData()
        },
        data(){
            return {
                
                    forecastList:[],
                    city:'Osaka'
                
            }
        },
        methods:{
            
            fetchData(){
                let urlParams = new URLSearchParams(window.location.search);
                if(urlParams.has('city'))
                {
                    this.city=urlParams.get('city');
                }
                fetch('/weather?country=Japan&city='+this.city)
                .then(
                    response => response.json())
                .then(data => {
                    
                    this.forecastList =data;
                    console.log(this.forecastList);
                })
            },
            converKtoC(valNum)
            {
                valNum = parseFloat(valNum);
                return (valNum-273.15).toFixed(0);
            }
        }
    }
</script>
