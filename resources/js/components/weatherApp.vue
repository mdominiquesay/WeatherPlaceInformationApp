<template>
  <div>
    <div class="placeHeader">Weather Forecast for {{ city }}</div>
    <div class="weather_main">
      <div
        class="weatherBox"
        v-for="forecast in forecastList"
        :key="forecast.id"
      >
        <div class="h6">{{ formatDate(forecast.date) }}</div>
        <div>
          <img class="weather_icon" v-bind:src="forecast.icon" alt="Weather" />
        </div>
        <div class="h5">{{ converKtoC(forecast.temp) }}°C</div>
        <div class="h6">{{ forecast.description }}</div>
      </div>
    </div>
  </div>
</template>

<script>
import moment from "moment";
export default {
  mounted() {
    this.fetchData();
  },
  data() {
    return {
      forecastList: [],
      city: "Osaka",
      country: "Japan",
    };
  },
  methods: {
    /*
                This function fetches Data  of Weather forcast by city and country parameters
            */
    fetchData() {
      let urlParams = new URLSearchParams(window.location.search);
      if (urlParams.has("city")) {
        this.city = urlParams.get("city");
      }
      if (urlParams.has("country")) {
        this.country = urlParams.get("country");
      }
      fetch("/weather?country=" + this.country + "&city=" + this.city)
        .then((response) => response.json())
        .then((data) => {
          this.forecastList = data;
        });
    },
    /*
                This function formats Date 
                @params date - date for convertion
                @return formatted date
            */
    formatDate(date) {
      return moment(String(date)).format("ddd h:mm a");
    },
    /*
                This function converts kelvin to Celcius
                @params temp - temperature in kelvin
                @return temperature in celcius
            */
    converKtoC(temp) {
      temp = parseFloat(temp);
      return (temp - 273.15).toFixed(0);
    },
  },
};
</script>
