<template>
  <div class="container">
    <h1 class="mb-4">Asignar Ingredientes al Pastel: {{ formData.nombre }}</h1>

    <div class="card mb-3">
      <div class="card-body">
        <h5 class="card-title">{{ formData.nombre }}</h5>
        <p class="card-text">{{ formData.descripcion }}</p>
      </div>
    </div>

    <div class="form-group">
      <label for="nombre_preparador">Selecciona el Ingrediente:</label>
      <select
        v-model="selectedIngredientId"
        class="form-control"
        style="width: 400px"
      >
        <option value="" disabled>Selecciona un Ingrediente</option>
        <option
          v-for="ingrediente in ingredientes"
          :key="ingrediente.id"
          :value="ingrediente.id"
        >
          {{ ingrediente.nombre }}
        </option>
      </select>
    </div>

    <button @click="agregarIngrediente" class="btn btn-primary mt-3">
      Agregar Ingrediente
    </button>
    <router-link :to="{ name: 'cakes' }" class="btn btn-secondary mt-4 mx-2">
      Regresar
    </router-link>
  </div>
</template>

<script>
import cakeService from "@/services/CakeService";
import IngredientService from "@/services/IngredientService";
import CakeIngredientService from "@/services/Cake_Ingredient_Service";

export default {
  data() {
    return {
      formData: {
        id_pastel: "",
      },
      ingredientes: [],
      selectedIngredientId: null,
    };
  },
  created() {
    const id = this.$route.params.id;
    cakeService.getCake(id).then((response) => {
      this.formData = response.data[0];
      console.log(response.data);
    }),
      IngredientService.getIngredients().then((response) => {
        this.ingredientes = response.data;
      });
  },
  methods: {
    agregarIngrediente() {
      const registraIngredientes = {
        id_pastel: this.formData.id,
        id_ingrediente: this.selectedIngredientId,
      };

      CakeIngredientService.createCake_Ingredient(registraIngredientes).then(
        () => {
          alert("Ingrediente asignado correctamente");
          this.$router.push({ name: "add-ingredient" });
        }
      );
    },
  },
};
</script>
