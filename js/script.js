// Variable for sort direction asc/dec
let ascSortDirection = false;

// Delete database entry
// Params Primary ID and DB Table to delete from
function deleteEntry(ID, type) {
  document.getElementById("deleteValue").value = ID;
  document.getElementById("action").value = type;
  // Submit form as POST
  this.formChange("POST");
}

// Sumbit changes to form, default to GET
function formChange(type = "GET") {
  let element = document.getElementById("form-change");
  // Set type to GET/POST
  element.method = type;
  // Submit form
  element.submit();
}

// Set all filter selections to default
function clearFilters() {
  document.getElementById("typeID").value = 0;
  document.getElementById("classID").value = 0;
  document.getElementById("makeID").value = 0;
  document.getElementById("priceSort").value = 0;
  document.getElementById("sortDirectionValue").value = 0;
  // Submit changes
  this.formChange();
}

// Alternate sort direction
function sortDirection() {
  let element = document.getElementById("sortDirectionValue");
  element.value = element.value == 1 ? 0 : 1;
  // Submite changes
  this.formChange();
}

// Open appropriate nav page based on selection
function navControl(action) {
  // Clear URL Params
  history.pushState(null, "", location.href.split("?")[0]);
  const navControl = document.getElementById("admin-control");
  let navInput = document.getElementById("admin-input");
  // Set navigation to action param
  navInput.value = action;
  // Submit form
  navControl.submit();
}