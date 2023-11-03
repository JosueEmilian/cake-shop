import axios from "axios";

const API_URL = "http://localhost:8888/backend-project/cakes";

export default {
  getCakes() {
    return axios.get(`${API_URL}/Read.php`);
  },
  getCake(id) {
    return axios.get(`${API_URL}/Read.php?id=${id}`);
  },
  createCake(cake) {
    return axios.post(`${API_URL}/Create.php`, cake);
  },
  updateCake(cake) {
    return axios.put(`${API_URL}/Update.php`, cake);
  },
  deleteCake(id) {
    return axios.delete(`${API_URL}/Delete.php?id=${id}`);
  },
};
