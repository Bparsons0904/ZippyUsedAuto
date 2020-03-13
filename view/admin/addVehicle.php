<section class="container" id="add-vehicle">
    <form action="index.php" method="POST" id="form-change" class="inline-add-form">
        <div class="row justify-content-center">
            <input type="hidden" name="action" id="action" value="addVehicleSubmit">
            <div class="form-group form-inline col-12 col-sm-8 col-md-6 col-lg-4">
                <label for="year" class="col-form-label">Year</label>
                <input type="number" name="year" id="year" class="form-control mx-auto" required min="1900" max="2050"/>
            </div>
            <div class="form-group form-inline col-12 col-sm-8 col-md-6 col-lg-4">
                <label for="makeID" class="col-form-label">Make</label>
                <select class="form-control mx-auto" id="makeID" name="makeID" type="number" required>
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
            <div class="form-group form-inline col-12 col-sm-8 col-md-6 col-lg-4">
                <label for="model" class="col-form-label">Model</label>
                <input type="text" name="model" id="model" class="form-control mx-auto" required/>
            </div>

            <div class="form-group form-inline col-12 col-sm-8 col-md-6 col-lg-4">
                <label for="classID" class="col-form-label">Class</label>
                <select class="form-control mx-auto" id="classID" name="classID" required>
                    <option></option>
                    <!-- Loop through each class  -->
                    <?php foreach ( $classes as $class ) : ?>
                        <option value="
                            <?php echo $class['classID']; ?>"><?php echo $class['className']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group form-inline col-12 col-sm-8 col-md-6 col-lg-4">
                <label for="typeID" class="col-form-label">Type</label>
                <select class="form-control mx-auto" id="typeID" name="typeID" required>
                    <option></option>
                    <!-- Loop through each type  -->
                    <?php foreach ( $types as $type ) : ?>
                        <option value="
                            <?php echo $type['typeID']; ?>"><?php echo $type['typeName']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group form-inline col-12 col-sm-8 col-md-6 col-lg-4">
                <label for="price" class="col-form-label">Price</label>
                <input type="number" name="price" id="price" class="form-control mx-auto" required min="0"/>
            </div>
        </div>
        <div class="form-group form-inline">
            <button type="submit" class="btn btn-color ml-auto mr-3">Add Vehicle</button>
        </div>          
    </form>
</section>