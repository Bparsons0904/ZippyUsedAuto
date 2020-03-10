window.onload = () => {
  addEventHandlers();
};

function addEventHandlers() {
  const value = document.getElementById("admin-input");
  const navControl = document.getElementById("admin-control");
  document.getElementById("vehicle-list").addEventListener("click", () => {
    value.value = "vehicle-list";
    navControl.submit();
  });
}

let ascSortDirection = false;

function typeSelect() {
  document.getElementById("type-change").submit();
}
function classSelect() {
  document.getElementById("class-change").submit();
}
function makeSelect() {
  document.getElementById("make-change").submit();
}
function sortSelect() {
  document.getElementById("sort-change").submit();
}
function sortDirection() {
  let element = document.getElementById("sortDirectionValue");
  console.log(element.value);
  if (element.value == 1 ) {
    element.value = 0;
  } else {
    element.value = 1;
  }
  document.getElementById("sort-change").submit();
}