<template>
  <div>
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
      <div class="container">
        <router-link to="/" class="navbar-brand">Home</router-link>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <router-link to="/cakes" class="nav-link">Pasteles</router-link>
            </li>
            <li class="nav-item">
              <router-link to="/ingredients" class="nav-link"
                >Ingredientes</router-link
              >
            </li>
            <li class="nav-item">
              <router-link to="/reports" class="nav-link">Reportes</router-link>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <router-view></router-view>
  </div>
</template>
