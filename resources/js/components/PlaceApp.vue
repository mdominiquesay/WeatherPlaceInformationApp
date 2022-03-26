<template>


    <div class="card" style="width:400px">

    <ul>
        <li v-for="places in placesList" :key="places.id">
            {{places.name}}
            {{places.formatted_address}}
            <img class="card-img-top weather_icon" v-bind:src='places.icon' >
            <ul>
                <li v-for="images in places.img" :key="images.id">
                <img class="card-img-top weather_icon" v-bind:src='images' >
                </li>
            </ul>
        </li>
    </ul>
    </div>
 
</template>

<script>
    export default {
        mounted() {
            this.fetchData()
        },
        data(){
            return {
                
                   placesList:[]
            }
        },
        methods:{
            fetchData(){
                fetch('/placeInfo?country=JP&city=Osaka')
                .then(
                    response => response.json())
                .then(data => {
                   this.placesList=data;
                   
                })
            }
        }
    }
</script>
