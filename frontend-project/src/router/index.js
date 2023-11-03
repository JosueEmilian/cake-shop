import { createRouter, createWebHistory } from "vue-router";
import HomeView from "../views/HomeView.vue";

// Ingredients
import ReadIngredients from "../components/ingredients/ReadIngredients.vue";
import CreateIngredient from "../components/ingredients/CreateIngredient.vue";
import UpdateIngredient from "../components/ingredients/UpdateIngredient.vue";
import AddIngredient from "../components/ingredients/AddIngredient.vue";

// Cakes
import ReadCakes from "../components/cakes/ReadCakes.vue";
import CreateCake from "../components/cakes/CreateCake.vue";
import UpdateCake from "../components/cakes/UpdateCake.vue";

// Reports
import ReportPage from "../components/reports/ReportPage.vue";

const routes = [
  {
    path: "/",
    name: "home",
    component: HomeView,
  },
  {
    path: "/ingredients",
    name: "ingredients",
    component: ReadIngredients,
  },
  {
    path: "/ingredients/create",
    name: "create-ingredient",
    component: CreateIngredient,
  },
  {
    path: "/ingredients/update/:id",
    name: "update-ingredient",
    component: UpdateIngredient,
  },
  {
    path: "/ingredients/add/:id",
    name: "add-ingredient",
    component: AddIngredient,
  },
  {
    path: "/cakes",
    name: "cakes",
    component: ReadCakes,
  },
  {
    path: "/cakes/create",
    name: "create-cake",
    component: CreateCake,
  },
  {
    path: "/cakes/update/:id",
    name: "update-cake",
    component: UpdateCake,
  },
  {
    path: "/reports",
    name: "reports",
    component: ReportPage,
  },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;
