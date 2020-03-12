// function categorySelect() {
//   document.getElementById("cat-change").submit();
// }

// function deleteItem(itemNum, categoryID) {
//     document.getElementById("itemValue").value = itemNum;
//     document.getElementById("categoryValue").value = categoryID;
//     document.getElementById("delete-item-form").submit();
// }

// function deleteCategory(categoryID) {
//     document.getElementById("delete-category-value").value = categoryID;
//     document.getElementById("delete-category-form").submit();
// }

// window.onload = ()=> {
//     const value = document.getElementById("navInput");
//     const toDoList = document.getElementById("toDoList");
//     const navControl = document.getElementById("navControl");
//     toDoList.addEventListener("click", ()=> {
//         value.value = "list-items";
//         navControl.submit();
//     })
//     const addToDo = document.getElementById("addToDo");
//     addToDo.addEventListener("click", ()=> {
//         value.value = "additem";
//         navControl.submit();
//     })
//     const categoryList = document.getElementById("categoryList");
//     categoryList.addEventListener("click", ()=> {
//         value.value = "list_categories";
//         navControl.submit();
//     })
// }

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
function deleteEntry(ID, type) {
  document.getElementById("deleteValue").value = ID;
  document.getElementById("action").value = type;
  this.formChange("POST");
}

// function deleteMake(makeID) {
//   document.getElementById("deleteValue").value = makeID;
//   document.getElementById("action").value = "deleteMake";
//   this.formChange("POST");
// }

// function deleteType(typeID) {
//   document.getElementById("deleteValue").value = typeID;
//   document.getElementById("action").value = "deleteType";
//   this.formChange("POST");
// }

// function deleteClass(classID) {
//   document.getElementById("deleteValue").value = classID;
//   document.getElementById("action").value = "deleteClass";
//   this.formChange("POST");
// }

function formChange(type = "GET") {
  let element = document.getElementById("form-change");
  element.method = type;
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