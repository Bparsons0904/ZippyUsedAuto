<?php 

?>

<section class="container">
    <form action="index.php" method="POST" id="form-change" class="inline-add-form needs-validation">
        <input type="hidden" name="action" id="action" value="addVehicleSubmit">
        <!-- <h5 onclick="clearFilters()">Clear Selections</h5> -->
        <div class="form-group form-inline">
            <label for="year" class="col-3 col-form-label">Year</label>
            <div class="col-9">
                <input type="number" name="year" id="year" class="form-control" required min="1900" max="2050"/>
            </div>
        </div>
        <div class="form-group form-inline">
        <label for="makeID" class="col-3 col-form-label">Make</label>
        <div class="col-9">
            <select class="form-control" id="makeID" name="makeID" type="number" required>
                <option></option>
                <!-- Loop through each category  -->
                <?php foreach ( $makes as $make ) : ?>
                    <option value="
                        <?php echo $make['makeID']; ?>">
                        <?php echo $make['makeName']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        </div>
        <div class="form-group form-inline">
            <label for="model" class="col-3 col-form-label">Model</label>
            <div class="col-9">
                <input type="text" name="model" id="model" class="form-control" required/>
            </div>
        </div>
        <div class="form-group form-inline">
            <label for="typeID" class="col-3 col-form-label">Type</label>
            <div class="col-9">
                <select class="form-control" id="typeID" name="typeID" required>
                    <option></option>
                    <!-- Loop through each category  -->
                    <?php foreach ( $types as $type ) : ?>
                        <option value="
                            <?php echo $type['typeID']; ?>"><?php echo $type['typeName']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group form-inline">
            <label for="classID" class="col-3 col-form-label">Class</label>
            <div class="col-9">
                <select class="form-control" id="classID" name="classID" required>
                    <option></option>
                    <!-- Loop through each category  -->
                    <?php foreach ( $classes as $class ) : ?>
                        <option value="
                            <?php echo $class['classID']; ?>"><?php echo $class['className']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group form-inline">
            <label for="price" class="col-3 col-form-label">Price</label>
            <div class="col-9">
                <input type="number" name="price" id="price" class="form-control" required min="0"/>
            </div>
        </div>
        <div class="form-group form-inline">
            <button type="submit" class="btn btn-color ml-auto mr-3">Add Vehicle</button>
        </div>
            
    </div>

    </form>
</section>