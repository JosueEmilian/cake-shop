<template>
  <div class="container">
    <h1>Reporte Pasteles e Ingredientes</h1>
    <div v-for="reporte in reportes" :key="reporte.pastel">
      <div class="card mb-3 container">
        <div class="card-body">
          <h5 class="card-title">{{ reporte.pastel }}</h5>
          <p class="card-text">{{ reporte.descripcion }}</p>
          <h6 class="card-subtitle mb-2 text-muted">Ingredientes:</h6>
          <ul>
            <li
              v-for="ingrediente in reporte.ingredientes"
              :key="ingrediente.id"
            >
              {{ ingrediente.ingrediente }}
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</template>
  
  <script>
import ReportsService from "@/services/ReportsService";

export default {
  data() {
    return {
      reportes: [],
    };
  },
  created() {
    ReportsService.getReportCakeIngredient().then((response) => {
      // Estructura para mostrar en tarjetas
      const reportes = [];
      response.data.forEach((item) => {
        const reporteExistente = reportes.find((r) => r.pastel === item.pastel);
        if (reporteExistente) {
          reporteExistente.ingredientes.push({
            id: item.id,
            ingrediente: item.ingrediente,
          });
        } else {
          reportes.push({
            pastel: item.pastel,
            descripcion: item.descripcion,
            ingredientes: [{ id: item.id, ingrediente: item.ingrediente }],
          });
        }
      });

      this.reportes = reportes;
    });
  },
};
</script>
  