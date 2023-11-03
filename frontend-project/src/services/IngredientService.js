import axios from "axios";

const API_URL = "http://localhost:8888/backend-project/ingredients";

export default {
  getIngredients() {
    return axios.get(`${API_URL}/Read.php`);
  },
  getIngredient(id) {
    return axios.get(`${API_URL}/Read.php?id=${id}`);
  },
  createIngredient(ingredient) {
    return axios.post(`${API_URL}/Create.php`, ingredient);
  },
  updateIngredient(ingredient) {
    return axios.put(`${API_URL}/Update.php`, ingredient);
  },
  deleteIngredient(id) {
    return axios.delete(`${API_URL}/Delete.php?id=${id}`);
  },
};
