<template>
  <div class="container">
    <h1>Ingresar Ingrediente</h1>
    <form @submit.prevent="registrarIngrediente">
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
        <label for="descripcion">Descripción:</label>
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
        Registrar Ingrediente
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
  methods: {
    registrarIngrediente() {
      const nuevoIngrediente = {
        nombre: this.formData.nombre,
        descripcion: this.formData.descripcion,
        fecha_ingreso: this.formData.fecha_ingreso,
        fecha_vencimiento: this.formData.fecha_vencimiento,
      };

      // Llama al servicio
      ingredientService.createIngredient(nuevoIngrediente).then(() => {
        this.$router.push({ name: "ingredients" });
      });
    },
  },
};
</script>

