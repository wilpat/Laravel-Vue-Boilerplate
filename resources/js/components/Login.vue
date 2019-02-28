<template>
  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <div class="login100-pic js-tilt" data-tilt>
          <img src="images/img-01.png" alt="IMG">
        </div>

        <form class="login100-form validate-form" @submit.prevent="login">
          <span class="login100-form-title">
            Member Login
          </span>

          <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
            <input class="input100" type="text" name="email" placeholder="Email" v-model ="form.email">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-envelope" aria-hidden="true"></i>
            </span>
          </div>

          <div class="wrap-input100 validate-input" data-validate = "Password is required">
            <input class="input100" type="password" name="pass" placeholder="Password" v-model="form.password">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-lock" aria-hidden="true"></i>
            </span>
          </div>
          
          <div class="container-login100-form-btn">
            <button class="login100-form-btn">
              {{ !loading ? 'Login' : 'Please wait' }}
            </button>
          </div>

          <div class="text-center p-t-12">
            <span class ="txt1" v-if =" has_error "> Error logging in</span>
          </div>
          <router-link to="register">
            <div class="text-center p-t-100">
              <router-link class ="txt2" to="register">
                Create your Account
                <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
              </router-link>
            </div>
          </router-link>
        </form>
      </div>
    </div>
  </div>
</template>
<script>
  import {login} from '../helpers/auth';
  export default {
    data() {
      return {
        form: {
          email: '',
          password: ''
        },
        has_error: false,
        loading: false
      }
    },
    mounted() {
      //
    },
    methods: {
      login() {
        // You can perform you fron end validation as you see fit here
        this.loading = true;
        login(this.form)
          .then((res) => {
            this.loading = false;
            this.$store.commit("loginSuccess", res);
            if(localStorage.getItem("last_url") == null){ // If the user wasn't redirected from a previous page
              window.location = '/';
            }else{
              window.location = localStorage.getItem("last_url"); // get the last page the user tried accessing
            }
                  

          })
          .catch((error) => {
            this.loading = false;
            this.has_error = true
          })
      }
    }
  }
</script>
<style scoped>
  
</style>