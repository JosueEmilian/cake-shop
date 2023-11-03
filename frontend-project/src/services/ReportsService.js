import axios from "axios";

const API_URL = "http://localhost:8888/backend-project/reports";

export default {
  getReportCakeIngredient() {
    return axios.get(`${API_URL}/Read.php`);
  },
};
