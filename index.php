<?php
    // Add database and table functions
    require('./model/db.php');
    require('./model/vehicle_db.php');
    require('./model/type_db.php');
    require('./model/class_db.php');
    require('./model/make_db.php');
   
        $typeID = filter_input(INPUT_GET, 'typeID', FILTER_VALIDATE_INT);
        $classID = filter_input(INPUT_GET, 'classID', FILTER_VALIDATE_INT);
        $makeID = filter_input(INPUT_GET, 'makeID', FILTER_VALIDATE_INT);
        $sort = filter_input(INPUT_GET, 'sort', FILTER_VALIDATE_INT);
        $sortDirection = filter_input(INPUT_GET, 'sortDirection', FILTER_VALIDATE_INT);

        $types = get_types();
        $classes = get_classes();
        $makes = getMakes();
        $vehicles = get_vehicles($typeID, $classID, $makeID, $sort, $sortDirection);

    include('view/header.php');
?>

<section class="container">
    <form action="index.php" method="POST" id="form-change" class="my-auto col-sm-12 col-med-6">
        <input type="hidden" name="action" id="action">
        <h5 onclick="clearFilters()">Clear Filters</h5>
        <div class="row">
            <select class="form-control" id="makeID" name="makeID" onchange="formChange()">
                <option value="0">All Makes</option>
                <!-- Loop through each category  -->
                <?php foreach ( $makes as $make ) : ?>
                    <option value="
                        <?php echo $make['makeID']; ?>" 
                        <?=($make['makeID'] == $makeID) ? 'selected':'';?>><?php echo $make['makeName']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <select class="form-control" id="typeID" name="typeID" onchange="formChange()">
                <option value="0">All Types</option>
                <!-- Loop through each category  -->
                <?php foreach ( $types as $type ) : ?>
                    <option value="
                        <?php echo $type['typeID']; ?>" 
                        <?=($type['typeID'] == $typeID) ? 'selected':'';?>><?php echo $type['typeName']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <select class="form-control" id="classID" name="classID" onchange="formChange()">
            <option value="0">All Classes</option>
            <!-- Loop through each category  -->
            <?php foreach ( $classes as $class ) : ?>
                <option value="
                    <?php echo $class['classID']; ?>" 
                    <?=($class['classID'] == $classID) ? 'selected':'';?>><?php echo $class['className']; ?>
                </option>
            <?php endforeach; ?>
            </select>
        </div>
        <div class="row">
            <p class="my-auto col-4">Sort By:</p>
            <div class="form-check my-auto col-3">
                <input class="form-check-input" type="radio" name="sort" id="priceSort" value="1" <?=($sort !== 0) ? 'checked':'';?> onchange="formChange()">
                <label class="form-check-label" for="priceSort">
                    Price
                </label>
            </div>
            <div class="form-check my-auto col-3">
                <input class="form-check-input" type="radio" name="sort" id="yearSort" value="0" <?=($sort === 0) ? 'checked':'';?> onchange="formChange()">
                <label class="form-check-label" for="yearSort">
                    Year
                </label>
            </div>
            <div>
                <input type="hidden" name="sortDirection" id="sortDirectionValue" value="<?php echo $sortDirection; ?>">
                <i class="fa fa-sort fa-sm py-1 text-white my-auto"  onclick="sortDirection()"></i>
            </div>
        </div>
    

    <div class="vehicle-table row">
        <table class="table table-light table-sm">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Year</th>
                    <th scope="col">Make</th>
                    <th scope="col">Model</th>
                    <th scope="col">Type</th>
                    <th scope="col">Class</th>
                    <th scope="col">Price</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vehicles as $vehicle) : ?>
                    <tr>
                        <td><?php echo $vehicle['year']; ?></td>
                        <td><?php echo $vehicle['makeName']; ?></td>
                        <td><?php echo $vehicle['model']; ?></td>
                        <td><?php echo $vehicle['typeName']; ?></td>
                        <td><?php echo $vehicle['className']; ?></td>
                        <td><?php echo '$' . number_format($vehicle['price'], 2); ?><td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
    <?php
    // If the to do list table is not empty diplay full list
        if (count($vehicles) == 0) {
    ?>
        <h2 class="text-center no-match">No Matching Vehicles</h2>
    <?php } ?>  
    </form>
</section>


<?php 

    // Display Footer
    // include('view/footer.php'); 
?>