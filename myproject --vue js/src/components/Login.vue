<template>
    <div class="container">
        <div class="card">
            <div class="card-header">
            <h3>Sign In</h3>
            </div>
            <div class="card-body">
            <form v-on:submit.prevent="Login">
            <div class="form-group">
                <label>Email address</label>
                <input type="email" class="form-control" v-model="user.email" />
            </div>
 
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" v-model="user.password" />
            </div><br>
 
            <button type="submit" class="btn btn-primary" value="Login" >Sign In</button>
 
            <p class="forgot-password text-right mt-2 mb-4">
                <router-link to="/ForgotPassword">Forgot password ?</router-link>
            </p>
        </form>
        </div>
        </div>
    </div>
</template>
 
<script>
     export default {
       components: {
      name: 'Login'
  },
  data() {
      return {
          user: {}
      }
  },
  methods: {
      Login() {
           let uri = 'http://127.0.0.1:8000/api/auth/login';
            this.axios.post(uri, this.user).then((response) => {
                this.$router.push({name: 'Welcome'})

            });
        }
    }
    }
</script>