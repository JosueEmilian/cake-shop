import axios from "axios";

const API_URL = "http://localhost:8888/backend-project/preparers";

export default {
  getPreparers() {
    return axios.get(`${API_URL}/Read.php`);
  },
};
