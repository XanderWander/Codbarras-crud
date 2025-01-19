<!-- filepath: frontend/src/components/ExampleComponent.vue -->
<template>
    <div>
      <h1>Data from Laravel</h1>
      <ul>
        <li v-for="item in items" :key="item.id">{{ item.name }}</li>
      </ul>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    data() {
      return {
        items: []
      };
    },
    created() {
      axios.get('/api/items')
        .then(response => {
          this.items = response.data;
        })
        .catch(error => {
          console.error(error);
        });
    }
  };
  </script>