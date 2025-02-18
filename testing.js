import { check } from "k6";
import http from "k6/http";

function generateRandomString(length) {
  const charset =
    "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
  let result = "";
  for (let i = 0; i < length; i++) {
    const randomIndex = Math.floor(Math.random() * charset.length);
    result += charset[randomIndex];
  }
  return result;
}

export let options = {
  stages: [
    { duration: "5s", target: 2 },
    { duration: "7s", target: 5 },
    { duration: "5s", target: 0 },
  ],
};

export default function () {
  const username = generateRandomString(10);
  const email = generateRandomString(7) + "@example.com";
  const password = "validpassword123";
  const confirm_password = password;

  const url = "http://localhost/project/testing-programming/admin/daftar.php";
  const payload = {
    username: username,
    email: email,
    password: password,
    confirm_password: confirm_password,
  };

  const params = {
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
  };

  const res = http.post(url, payload, params);

  check(res, {
    "pendaftaran sukses": (r) =>
      r.status === 200 && r.body.includes("Pendaftaran berhasil!"),
  });
}
