<h3 class="text-center" id="add-item-list">Add Item to the To Do List</h3>
<form method="POST" id="add-form">
  <div class="form-group">
    <label for="title_form">Title</label>
    <input type="text" name="title_form" id="title_form" class="form-control" />
  </div>
  <div class="form-group">
    <label for="description">Description</label>
    <textarea type="text" name="description" id="description" class="form-control"></textarea>
  </div> 
  <div class="form-group" >
    <label for="category_id">Category</label>
    <select name="category_id" id="categoryID">
      <!-- Loop through each category and display as option -->
      <?php foreach ( $categories as $category ) : ?>
        <option value="<?php echo $category['categoryID']; ?>">
          <?php echo $category['categoryName']; ?>
        </option>
        <?php endforeach; ?>
    </select>
    
  </div> 
  <input type="hidden" name="action" value="add_item">
    <div class="row">
      <button type="submit" class="ml-auto button-add" >
        <i class="fas fa-plus"></i><span>Add To Do Item</span>
      </button>
    </div>
</form>
