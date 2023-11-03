<template>
  <div class="container mb-4">
    <h1 class="mb-4">Lista de Pasteles</h1>
    <div class="text-center mb-4">
      <router-link to="cakes/create" class="btn btn-info">
        Ingresar Pastel
      </router-link>
    </div>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Descripción</th>
          <th>Preparador</th>
          <th>Fecha de Creacion</th>
          <th>Fecha de Vencimiento</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="cake in cakes" :key="cake.id">
          <td>{{ cake.id }}</td>
          <td>{{ cake.nombre }}</td>
          <td>{{ cake.descripcion }}</td>
          <td>{{ cake.nombre_preparador + " " + cake.apellido_preparador }}</td>
          <td>{{ cake.fecha_creacion }}</td>
          <td>{{ cake.fecha_vencimiento }}</td>
          <td>
            <div style="display: flex; justify-content: flex-start">
              <router-link
                :to="{ name: 'update-cake', params: { id: cake.id } }"
                class="btn btn-info m-2"
              >
                Editar
              </router-link>
              <button @click="deleteCake(cake.id)" class="btn btn-danger mx-2">
                Eliminar
              </button>
              <router-link
                :to="{ name: 'add-ingredient', params: { id: cake.id } }"
                class="btn btn-warning"
              >
                Asignar Ingredientes
              </router-link>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
    
    <script>
import cakeService from "@/services/CakeService.js";

export default {
  data() {
    return {
      cakes: [],
    };
  },
  created() {
    cakeService.getCakes().then((response) => {
      this.cakes = response.data;
    });
  },
  methods: {
    deleteCake(id) {
      cakeService.deleteCake(id).then((response) => {
        console.log(response.data);
        this.cakes = this.cakes.filter((cake) => cake.id != id);
      });
    },
  },
};
</script>
    