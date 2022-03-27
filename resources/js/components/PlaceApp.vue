<template>
  <div class="places">
    <div class="placeHeader">Places to Visit in {{ city }}</div>
    <div>
      <div class="box" v-for="places in placesList" :key="places.id">
        <div class="placeName">{{ places.name }}</div>
        <div class="address">{{ places.formatted_address }}</div>
        <div
          class="imagesGallery"
          v-for="images in places.img"
          :key="images.id"
        >
          <img class="place_icon" v-bind:src="images" />
        </div>
        <div></div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
    this.fetchData();
  },
  data() {
    return {
      placesList: [],
      city: "Osaka",
      country:"JP"
    };
  },
  methods: {
    /*
        This function fetches Data  of place by city and country parameters
    */
    fetchData() {
      let urlParams = new URLSearchParams(window.location.search);
      if (urlParams.has("city")) {
        this.city = urlParams.get("city");
      }
      if (urlParams.has("country")) {
        this.country = urlParams.get("country");
      }
      fetch("/placeInfo?country="+this.country+"&city=" + this.city)
        .then((response) => response.json())
        .then((data) => {
          this.placesList = data;
        });
    },
  },
};
</script>
