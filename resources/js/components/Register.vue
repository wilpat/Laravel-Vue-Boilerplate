<template>
    <div class="limiter">
        <div class="container-login100">
          <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
              <img src="images/img-01.png" alt="IMG">
            </div>

            <form class="login100-form validate-form" @submit.prevent="register">
              <span class="login100-form-title">
                Member Signup
              </span>

              <div class="wrap-input100 validate-input" v-bind:class="{ 'has-error': has_error && errors.name }">
                <input class="input100" type="text" name="name" placeholder="First name" v-model ="form_data.name">
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                  <i class="fa fa-user" aria-hidden="true"></i>
                </span>
              </div>

              <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz" v-bind:class="{ 'has-error': has_error && errors.email }">
                <input class="input100" type="text" name="email" placeholder="Email" v-model ="form_data.email">
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                  <i class="fa fa-envelope" aria-hidden="true"></i>
                </span>
              </div>

              <div class="wrap-input100 validate-input" data-validate = "Password is required" v-bind:class="{ 'has-error': has_error && errors.password }">
                <input class="input100" type="password" name="pass" placeholder="Password" v-model="form_data.password">
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                  <i class="fa fa-lock" aria-hidden="true"></i>
                </span>
              </div>

              <div class="wrap-input100 validate-input" data-validate = "Password is required" v-bind:class="{ 'has-error': has_error && errors.password }">
                <input class="input100" type="password" name="pass" placeholder="Confirm Password" v-model=" form_data.password_confirmation ">
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                  <i class="fa fa-lock" aria-hidden="true"></i>
                </span>
              </div>
              
              <div class="container-login100-form-btn">
                <button class="login100-form-btn">
                  {{ !loading ? 'Register' : 'Please wait' }}
                </button>
              </div>

              <div class="text-center p-t-12">
                <span class ="txt1" v-if =" has_error "> Error registering</span>
              </div>
              <router-link to="register">
                <div class="text-center p-t-100">
                  <router-link class ="txt2" to="login">
                    Login
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
  export default {
    data() {
      return {
        form_data :{
            email: '',
            name: '',
            password: '',
            password_confirmation: ''
        },
        has_error: false,
        error: '',
        errors: {},
        success: false,
        loading: false
      }
    },
    methods: {
      register() {
        this.loading = true;
        axios.post('/api/auth/register', this.form_data)
             .then(res =>{
                this.$store.commit("loginSuccess", res.data);
                this.loading = false;
                window.location = '/';
             })
             .catch(err =>{
                this.loading = false;
                this.has_error = true
                this.error = err.response.data.error
                this.errors = err.response.data.errors || {}
             })
      }
    }
  }
</script>