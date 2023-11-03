<template>
  <div class="container">
    <h1>Registrar Pastel</h1>
    <form @submit.prevent="registrarPastel">
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
        <label for="nombre_preparador">Selecciona el Preparador:</label>
        <select
          v-model="formData.id_preparador"
          class="form-control"
          style="width: 400px"
        >
          <option value="" disabled>Selecciona un preparador</option>
          <option
            v-for="preparador in preparadores"
            :key="preparador.id"
            :value="preparador.id"
          >
            {{ preparador.nombre + " " + preparador.apellido }}
          </option>
        </select>
      </div>

      <div class="form-group">
        <label for="fecha_ingreso">Fecha Creacion:</label>
        <input
          v-model="formData.fecha_creacion"
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
      <router-link :to="{ name: 'cakes' }" class="btn btn-secondary mt-4 mx-2">
        Regresar
      </router-link>
    </form>
  </div>
</template>



<script>
import cakeService from "@/services/CakeService";
import preparerService from "@/services/PreparerService";

export default {
  data() {
    return {
      formData: {
        nombre: "",
        descripcion: "",
        fecha_creacion: "",
        fecha_vencimiento: "",
      },
      preparadores: [],
    };
  },
  created() {
    preparerService.getPreparers().then((response) => {
      this.preparadores = response.data;
    });
  },

  methods: {
    registrarPastel() {
      const nuevoPastel = {
        nombre: this.formData.nombre,
        descripcion: this.formData.descripcion,
        id_preparador: this.formData.id_preparador,
        fecha_creacion: this.formData.fecha_creacion,
        fecha_vencimiento: this.formData.fecha_vencimiento,
      };

      // Llama al servicio
      cakeService.createCake(nuevoPastel).then(() => {
        this.$router.push({ name: "cakes" });
      });
    },
  },
};
</script>
  