<template>
  <div class="container mb-4">
    <h1 class="mb-4">Lista de Ingredientes</h1>
    <div class="text-center mb-4">
      <router-link to="ingredients/create" class="btn btn-primary">
        Ingresar Ingrediente
      </router-link>
    </div>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Descripción</th>
          <th>Fecha de Ingreso</th>
          <th>Fecha de Vencimiento</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="ingredient in ingredients" :key="ingredient.id">
          <td>{{ ingredient.id }}</td>
          <td>{{ ingredient.nombre }}</td>
          <td>{{ ingredient.descripcion }}</td>
          <td>{{ ingredient.fecha_ingreso }}</td>
          <td>{{ ingredient.fecha_vencimiento }}</td>
          <td>
            <router-link
              :to="{ name: 'update-ingredient', params: { id: ingredient.id } }"
              class="btn btn-primary m-2"
            >
              Editar
            </router-link>
            <button
              @click="eliminarIngrediente(ingredient.id)"
              class="btn btn-danger m-2"
            >
              Eliminar
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
  
  <script>
import ingredientService from "@/services/IngredientService";

export default {
  data() {
    return {
      ingredients: [],
    };
  },
  created() {
    ingredientService.getIngredients().then((response) => {
      this.ingredients = response.data;
    });
  },
  methods: {
    eliminarIngrediente(id) {
      ingredientService.deleteIngredient(id).then((response) => {
        console.log(response.data);
        this.ingredients = this.ingredients.filter(
          (ingredient) => ingredient.id != id
        );
      });
    },
  },
};
</script>
  