import axios from "axios";

const API_URL = "http://localhost:8888/backend-project/cake_ingredient_master";

export default {
  createCake_Ingredient(cakeIngredient) {
    return axios.post(`${API_URL}/Create.php`, cakeIngredient);
  },
};
