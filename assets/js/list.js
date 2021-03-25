import "../styles/styles.scss";
import "../../node_modules/bootstrap/dist/css/bootstrap.min.css";

let query = document.getElementById("search").dataset["query"];
let cells = document.querySelector("tbody").querySelectorAll("td");
cells.forEach((cell) => {
  let match = cell.innerText.search(query);
  if (match === -1) return;

  cell.innerHTML =
    cell.innerHTML.slice(0, match) +
    "<span style='background: yellow'>" +
    cell.innerHTML.slice(match, match + query.length) +
    "</span>" +
    cell.innerHTML.slice(match + query.length);
});
