<?php 
    // Check if valid admin is logged in
    require_once('../../util/valid_admin.php');
?>

<!-- Main section of page -->
<section class="container">
    <h1 class="text-center header">Edit Classes</h1>
    <form action="index.php" method="POST" id="form-change" class="col-sm-12 col-med-6">
        <input type="hidden" name="action" id="action" value="addClass">
        <!-- If classes array not empty dipsplay table -->
        <?php if (count($classes) > 1) { ?>
            <div class="vehicle-table two-col-table mx-auto">
                <table class="table table-light table-sm">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col" class="text-center">Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        <input type="hidden" name="deleteValue" id="deleteValue" >
                        <!-- Loop through each class -->
                        <?php foreach ($classes as $class) : ?>
                            <tr>
                                <td><?php echo $class['className']; ?></td>
                                <td class="text-center">
                                    <i class="fas fa-minus-circle mx-auto delete-icon" id="delete-class" onclick="deleteEntry(<?php echo $class['classID']; ?>, 'deleteClass')"></i>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <!-- Array empty, display empty message -->
        <?php } else { ?>
            <div id="no-match">
                <h2 class="text-center">No Classes Entered</h2>
            </div>
        <?php } ?>
        <div class="form-group form-inline two-col-table mx-auto">
            <label for="className" class="col-3 col-md-2 col-form-label">Class</label>
            <div class="col-9 col-md-6">
                <input type="text" name="className" id="className" class="form-control" required/>
            </div>
            <div class="form-group form-inline col-12 col-md-3">
                <button type="submit" class="btn btn-color ml-auto m-2">Add Class</button>
            </div>
        </div>
        
    <!-- If the to do list table is not empty diplay full list -->
        <?php if (count($classes) == 0) {?>
            <h2 class="text-center">No Matching Vehicles</h2>
        <?php } ?>  
    </form>
</section>