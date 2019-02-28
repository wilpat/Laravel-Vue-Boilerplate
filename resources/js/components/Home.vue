<template>
    <div class="flex-center position-ref full-height">
        <div class="top-right links">
            <div v-if ="user">
                <a @click="logout" style="cursor: pointer;">Logout</a>
            </div>
            
        </div>
        <div class="content">
            <div class="title m-b-md">
                Laravel - Vue Boilerplate
            </div>

            <div v-if ="!user" class="links">
                <router-link to ="login">Login</router-link>
                <router-link to="register">Register</router-link>
            </div>
            <div v-else class="links">
                <p>Welcome {{  user.name }}</p>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapState, mapMutations } from 'vuex'
    export default {
        data(){
            return {

            }
        },

        methods:{
            ...mapMutations(['logout'])
        },

        computed: {
            ...mapState(['user'])
        }
    }
</script>

<style scoped>

  .full-height {
      height: 100vh;
  }

  .flex-center {
      align-items: center;
      display: flex;
      justify-content: center;
  }

  .position-ref {
      position: relative;
  }

  .top-right {
      position: absolute;
      right: 10px;
      top: 18px;
  }

  .content {
      text-align: center;
  }

  .title {
      font-size: 84px;
  }

  .links > a {
      color: #636b6f;
      padding: 0 25px;
      font-size: 13px;
      font-weight: 100;
      letter-spacing: .1rem;
      text-decoration: none;
      text-transform: uppercase;
  }

  .m-b-md {
      margin-bottom: 30px;
  }
</style>