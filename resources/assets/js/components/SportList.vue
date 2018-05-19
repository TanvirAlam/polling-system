<template>
    <div class="card">
        <div class="card-header">
            <strong>Please select your vote</strong>
        </div>
        <div class="card-body">
            <div v-if="sports[0]">
                <div v-for="sport in sports" :key="sport.id">
                    <div :id="'sport-'+sport.id">
                        <h4>
                            <span class="font-color1" v-text="sport.home_name"></span> 
                            <img src="/img/vs.png" width="50" height="50">
                            <span class="font-color2" v-text="sport.away_name"></span> 
                        </h4>
                        <div class="row">
                            <div class="col-md-3 ml-a">
                                <small>NAME: <br>
                                    <strong v-text="sport.group_name"></strong></small>
                            </div>
                            <div class="col-md-3 ml-a">
                                <small>SPORT: <br>
                                    <strong v-text="sport.sports"></strong></small>
                            </div>
                            <div class="col-md-3 ml-a">
                                <small>COUNTRY: <br>
                                    <strong v-text="sport.country"></strong></small>
                            </div>
                            <div class="col-md-3 ml-a">
                                <small>STATE: <br>
                                    <strong v-text="sport.state"></strong></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div v-else>
                You have already voted
            </div>
        </div>
        <div class="card-footer" v-if="sports">
            <button type="button" @click="voteForHome">
                <i class="fa fa-star"></i>
            </button>
            <button type="button" @click="voteForDraw">
                <i class="fa fa-bars"></i>
            </button>
            <button type="button" @click="voteForAway">
                <i class="fa fa-star"></i>
            </button>
        </div>    
    </div>

</template>
<script>
export default {
  props: ["sports"],

  data() {
    return {
      sport: ""
    };
  },

  methods: {
    voteForHome() {
      axios
        .post("/api/sports/" + this.sports[0].id, { team: "home" })
        .then(location.reload());
    },

    voteForDraw() {
      axios
        .post("/api/sports/" + this.sports[0].id, { team: "draw" })
        .then(location.reload());
    },

    voteForAway() {
      axios
        .post("/api/sports/" + this.sports[0].id, { team: "away" })
        .then(location.reload());
    }
  }
};
</script>
