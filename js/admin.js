window.onload = () => {
  addEventHandlers();
};

function addEventHandlers() {
  // const value = document.getElementById("admin-input");
  // const navControl = document.getElementById("admin-control");
  // document.getElementById("vehicle-list").addEventListener("click", () => {
  //   value.value = "vehicle-list";
  //   navControl.submit();
  // });
}

let ascSortDirection = false;

// function typeSelect() {
//   document.getElementById("type-change").submit();
// }
// function classSelect() {
//   document.getElementById("class-change").submit();
// }
// function makeSelect() {
//   document.getElementById("make-change").submit();
// }
function deleteVehicle(vehicleID) {
  document.getElementById("deleteValue").value = vehicleID;
  document.getElementById("action").value = "deleteVehicle";
  // console.log(document.getElementById("action").value);
  console.log(document.getElementById("deleteValue").value);
  
  this.formChange("POST");
}

function formChange(type = "GET") {
  let element = document.getElementById("form-change");
  element.method = type;
  console.log(element);
  
  element.submit();
}

function clearFilters() {
  document.getElementById("typeID").value = 0;
  document.getElementById("classID").value = 0;
  document.getElementById("makeID").value = 0;
  document.getElementById("priceSort").value = 0;
  document.getElementById("sortDirectionValue").value = 0;
  this.formChange();
}

function sortDirection() {
  let element = document.getElementById("sortDirectionValue");
  if (element.value == 1 ) {
    element.value = 0;
  } else {
    element.value = 1;
  }
  this.formChange();
}

function navControl(action) {
  const navControl = document.getElementById("admin-control");
  let navInput = document.getElementById("admin-input");
  navInput.value = action;
  navControl.submit();
}