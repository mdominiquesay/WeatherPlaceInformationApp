<template>


    <div class="weather_main">
        <img class=" weather_icon" v-bind:src='icon' alt="Weather">
        <div class="weather-body">
            <h4 class="weatherTemp ">{{  temp }}°C</h4>
            <p class="weatherDescription">{{description}}</p>
        </div>
    </div>
 
</template>

<script>
import Utility from '../utility.vue'
    export default {
        mounted() {
            this.fetchData()
        },
        data(){
            return {
                
                    icon: '',
                    description:'',
                    temp:''
                
            }
        },
        methods:{
            fetchData(){
                fetch('/weather?country=Japan&city=Osaka')
                .then(
                    response => response.json())
                .then(data => {
                    var iconcode = data.weather[0].icon;
                    this.icon = "http://openweathermap.org/img/w/" + iconcode + ".png";
                    this.description=data.weather[0].description;
                    this.temp=this.converKtoC(data.main.temp);
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
