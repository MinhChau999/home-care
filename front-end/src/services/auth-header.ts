export default function authHeader(role = "") {
  const user = JSON.parse(localStorage.getItem("token" + role) || "[]");
  if (user && user.token) {
    return { Authorization: "Bearer " + user.token };
  }
  return {};
}
