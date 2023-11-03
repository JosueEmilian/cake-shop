<template>
  <div class="container">
    <h1>Editar Ingrediente</h1>
    <form @submit.prevent="actualizarIngrediente">
      <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input
          v-model="formData.nombre"
          type="text"
          id="nombre"
          class="form-control"
          style="width: 400px"
          required
        />
      </div>

      <div class="form-group">
        <label for="descripcion">Descripcion:</label>
        <input
          v-model="formData.descripcion"
          type="text"
          id="descripcion"
          class="form-control"
          style="width: 400px"
          required
        />
      </div>

      <div class="form-group">
        <label for="fecha_ingreso">Fecha Ingreso:</label>
        <input
          v-model="formData.fecha_ingreso"
          type="date"
          id="fecha_ingreso"
          class="form-control"
          style="width: 400px"
          required
        />
      </div>

      <div class="form-group">
        <label for="fecha_vencimiento">Fecha Vencimiento:</label>
        <input
          v-model="formData.fecha_vencimiento"
          type="date"
          id="fecha_vencimiento"
          class="form-control"
          style="width: 400px"
          required
        />
      </div>

      <button type="submit" class="btn btn-primary mt-4">
        Guardar Cambios
      </button>
      <router-link
        :to="{ name: 'ingredients' }"
        class="btn btn-secondary mt-4 mx-2"
      >
        Regresar
      </router-link>
    </form>
  </div>
</template>
  
  <script>
import ingredientService from "@/services/IngredientService";

export default {
  data() {
    return {
      formData: {
        nombre: "",
        descripcion: "",
        fecha_ingreso: "",
        fecha_vencimiento: "",
      },
    };
  },
  created() {
    const id = this.$route.params.id;
    ingredientService.getIngredient(id).then((response) => {
      this.formData = response.data[0];
      console.log(response.data);
    });
  },
  methods: {
    actualizarIngrediente() {
      ingredientService.updateIngredient(this.formData).then(() => {
        this.$router.push({ name: "ingredients" });
      });
    },
  },
};
</script>
  