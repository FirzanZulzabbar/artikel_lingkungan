import http from "k6/http";
import { check, sleep } from "k6";

// Konfigurasi tes
export let options = {
  vus: 10, // 10 pengguna virtual
  duration: "10s", // Jalankan selama 10 detik
};

export default function () {
  let url = "http://localhost/project/testing-programming/daftar.php"; // Sesuaikan dengan URL proyekmu
  let payload = JSON.stringify({
    username: `user${Math.random().toString(36).substr(2, 5)}`, // Buat username unik
    email: `test${Math.random().toString(36).substr(2, 5)}@example.com`, // Email unik
    password: "password123",
    confirm_password: "password123",
  });

  let params = {
    headers: {
      "Content-Type": "application/json",
    },
  };

  let res = http.post(url, payload, params);

  check(res, {
    "status is 200": (r) => r.status === 200,
    "response contains success": (r) => {
      let json = JSON.parse(r.body);
      return json.status === "success";
    },
  });

  sleep(1); // Istirahat 1 detik antara request
}
