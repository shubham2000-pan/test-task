<template>
    <div>
        <h1>Items</h1>

        <table class="table table-hover">
            <thead>
            <tr>
                <td>ID</td>
                <td>Item Name</td>
                <td>Item Price</td>
                <td>Actions</td>
            </tr>
            </thead>

            <tbody>
            
                <tr v-for="item in items" :key="item._id">
                    <td>{{ item.id }}</td>
                    <td>{{ item.name }}</td>
                    <td>{{ item.price }}</td>
                    <td><router-link :to="{name: 'Edit', params: { id: item.id }}" class="btn btn-primary">Edit</router-link>     
                    <button class="btn btn-danger"  v-on:click="deleteItem(item.id)">Delete</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>

    export default {
        data(){
            return{
                items: []
            }
        },

        created: function()
        {
            this.fetchItems();
        },

        methods: {
            fetchItems()
            {
              let uri = 'http://127.0.0.1:8000/api/items';
              this.axios.get(uri).then((response) => {
                  this.items = response.data;
                  console.log('items',this.items);
              });
              
            },
            deleteItem(id)
            {
              let uri = 'http://127.0.0.1:8000/api/delete/'+id;
              this.axios.get(uri);
               this.$router.go(); 
              
            }
        }
    }
</script>

