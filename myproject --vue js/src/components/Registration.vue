<template>
     <div class="container">
        <div class="card">
        
        <div class="card-header">
        <h3>Sign Up</h3>
        </div>
           
         <div class="card-body">
         <form v-on:submit.prevent="addUser">
            <div class="form-group">
                <label>Full Name</label>
                <input type="text" class="form-control" v-model="user.name"/>
            </div>
 
            <div class="form-group">
                <label>Email address</label>
                <input type="email" class="form-control" v-model="user.email" />
            </div>
 
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" v-model="user.password" />
            </div><br>
 
            <button type="submit" class="btn btn-primary" value="Add User" >Sign Up</button>
 
            <p class="forgot-password text-right">
                Already registered 
                <router-link :to="{name: 'Login'}">sign in?</router-link>
            </p>
        </form>
        </div>
    </div>
    </div>
</template>
 
<script>
    export default {
       components: {
      name: 'addUser'
  },
  data() {
      return {
          user: {}
      }
  },
  methods: {
      addUser() {
           let uri = 'http://127.0.0.1:8000/api/auth/signup';
            this.axios.post(uri, this.user).then((response) => {
            this.$router.go('/');
            });
        }
    }
    }
</script>