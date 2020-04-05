<?php 
    // Check if valid admin is logged in
    require_once('../../util/valid_admin.php');
?>

<!-- Main section of page -->
<section class="container" id="add-vehicle">
    <h1 class="text-center header">Add Vehicle</h1>
    <div class="grid-form grid-form-lg">
    <form action="index.php" method="POST" id="form-change">
        <div class="grid-form-group-lg">
            <input type="hidden" name="action" id="action" value="addVehicleSubmit">
            <div class="grid-form-group">
                <label for="year" class="">Year</label>
                <input type="number" name="year" id="year" class="" required min="1900" max="2050"/>
            </div>
            <div class="grid-form-group">
                <label for="makeID" class="">Make</label>
                <select class="" id="makeID" name="makeID" type="number" required>
                    <option></option>
                    <!-- Loop through each make  -->
                    <?php foreach ( $makes as $make ) : ?>
                        <option value="
                            <?php echo $make['makeID']; ?>">
                            <?php echo $make['makeName']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="grid-form-group">
                <label for="model" class="">Model</label>
                <input type="text" name="model" id="model" class="" required/>
            </div>

            <div class="grid-form-group">
                <label for="classID" class="">Class</label>
                <select class="" id="classID" name="classID" required>
                    <option></option>
                    <!-- Loop through each class  -->
                    <?php foreach ( $classes as $class ) : ?>
                        <option value="
                            <?php echo $class['classID']; ?>"><?php echo $class['className']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="grid-form-group">
                <label for="typeID" class="">Type</label>
                <select class="" id="typeID" name="typeID" required>
                    <option></option>
                    <!-- Loop through each type  -->
                    <?php foreach ( $types as $type ) : ?>
                        <option value="
                            <?php echo $type['typeID']; ?>"><?php echo $type['typeName']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="grid-form-group">
                <label for="price" class="">Price</label>
                <input type="number" name="price" id="price" class="" required min="0"/>
            </div>
        </div>
        <div class="submit-button">
            <button type="submit" class="btn btn-color">Add Vehicle</button>
        </div>          
    </form>
    </div>
    
</section>