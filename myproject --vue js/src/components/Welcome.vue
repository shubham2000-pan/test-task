<template>
<div class="div">
  <div class="hello">
  <img v-bind:src="'https://pngimg.com/uploads/welcome/welcome_PNG94.png'" width="100%" height="500px"/>
    
  </div>
  </div>
</template>

<script>
export default {
  name: 'HelloWorld',
  data () {
    return {
      msg: 'Welcome to our Vue js'
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h1, h2 {
  font-weight: normal;
 	margin-left:300px;
 	margin-top:200px;
 	margin-bottom:200px;
 	color:red;

}

ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
.hello{
	
	border:3px solid;
	background-color:white;
	border-left-color:lime;
	border-right-color:red;
	border-top-color:skyblue;
	border-bottom-color:blue;
	border-radius:30px;
	
}
.div{
	
	border:3px solid;
	background-color:white;
	border-left-color:skyblue;
	border-right-color:blue;
	border-top-color: lime;
	border-bottom-color:red;
	border-radius:30px;
	padding:10px;
}
</style>
