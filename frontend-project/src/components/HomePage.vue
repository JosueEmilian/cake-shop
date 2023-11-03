<template>
  <div class="container text-center my-5">
    <h1 class="display-4">Bienvenido</h1>
    <p class="lead">Prueba Técnica</p>

    <div class="row my-4">
      <router-link to="/cakes" class="col-md-4 text-decoration-none">
        <div class="card">
          <img
            src="@/assets/images/cake.jpeg"
            alt="cake-image"
            class="card-img-top"
          />
          <div class="card-body">
            <h5 class="card-title">Pasteles</h5>
            <p class="card-text">
              Explora nuestra selección de pasteles exquisitos.
            </p>
          </div>
        </div>
      </router-link>
      <router-link to="/ingredients" class="col-md-4 text-decoration-none">
        <div class="card card-text">
          <img
            src="@/assets/images/ingredients.jpeg"
            alt="ingredients-image"
            class="card-img-top"
          />
          <div class="card-body">
            <h5 class="card-title title-card">Ingredientes</h5>
            <p class="card-text">
              Ingredientes que usamos en nuestros productos.
            </p>
          </div>
        </div>
      </router-link>
      <router-link to="/reports" class="col-md-4 text-decoration-none">
        <div class="card">
          <img
            src="@/assets/images/reports.jpeg"
            alt="reports-image"
            class="card-img-top"
          />
          <div class="card-body">
            <h5 class="card-title">Reportes</h5>
            <p class="card-text">Visualiza reportes sobre nuestros pasteles.</p>
          </div>
        </div>
      </router-link>
    </div>
  </div>
</template>