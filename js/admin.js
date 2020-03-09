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
