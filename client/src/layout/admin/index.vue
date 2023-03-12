<template>
    <template>
        <div>
          <form @submit.prevent="addProduct">
            <div>
              <label for="name">Product Name:</label>
              <input type="text" id="name" v-model="product.name">
            </div>
            <div>
              <label for="price">Product Price:</label>
              <input type="number" id="price" v-model="product.price">
            </div>
            <div>
              <label for="description">Product Description:</label>
              <textarea id="description" v-model="product.description"></textarea>
            </div>
            <div>
              <label for="image">Product Image:</label>
              <input type="file" id="image" ref="fileInput">
            </div>
            <button type="submit">Add Product</button>
          </form>
        </div>
      </template>
      
</template>

<script>

export default{
  data() {
  return {
    product: {
      name: '',
      price: '',
      description: '',
      image: null
    }
  }
},
  methods:
  {
   async addProduct() {
    const formData = new FormData();
    formData.append('name', this.product.name);
    formData.append('price', this.product.price);
    formData.append('description', this.product.description);
    formData.append('image', this.$refs.fileInput.files[0]);

    try {
      const response = await axios.post('/api/products', formData);
      console.log(response.data);
    } catch (error) {
      console.log(error.response.data);
    }
  }
  }
}

</script>