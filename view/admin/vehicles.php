<?php 
    // Check if valid admin is logged in
    require_once('../../util/valid_admin.php');
?>

<section class="container">
    <form action="index.php" method="POST" id="form-change" class="my-auto col-sm-12 col-med-6">
        <input type="hidden" name="action" id="action">
        <div class="row">
            <h5 onclick="clearFilters()" class="btn btn-outline-light clear-filter ml-auto">Clear Filters</h5>
        </div>
        <div class="row">
            <div class="filter-dropdown col-12 col-md-4">
                <select class="form-control" id="makeID" name="makeID" onchange="formChange()">
                    <option value="0">All Makes</option>
                    <!-- Loop through each make  -->
                    <?php foreach ( $makes as $make ) : ?>
                        <option value="
                            <?php echo $make['makeID']; ?>" 
                            <?=($make['makeID'] == $makeID) ? 'selected':'';?>><?php echo $make['makeName']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="filter-dropdown col-12 col-md-4">
                <select class="form-control" id="typeID" name="typeID" onchange="formChange()">
                    <option value="0">All Types</option>
                    <!-- Loop through each type  -->
                    <?php foreach ( $types as $type ) : ?>
                        <option value="
                            <?php echo $type['typeID']; ?>" 
                            <?=($type['typeID'] == $typeID) ? 'selected':'';?>><?php echo $type['typeName']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="filter-dropdown col-12 col-md-4">
                <select class="form-control" id="classID" name="classID" onchange="formChange()">
                <option value="0">All Classes</option>
                <!-- Loop through each class  -->
                <?php foreach ( $classes as $class ) : ?>
                    <option value="
                        <?php echo $class['classID']; ?>" 
                        <?=($class['classID'] == $classID) ? 'selected':'';?>><?php echo $class['className']; ?>
                    </option>
                <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="row mx-auto" id="sort-row">
            <div class="my-auto col-4">Sort By:</div>
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
            <div class="my-auto col-1" onclick="sortDirection()">
                <input type="hidden" name="sortDirection" id="sortDirectionValue" value="<?php echo $sortDirection; ?>">
                <i class="fa fa-sort fa-sm py-1 text-white my-auto"  ></i>
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
                        <th scope="col" class="text-center">Remove</th>
                    </tr>
                </thead>
                <tbody>
                    <input type="hidden" name="deleteValue" id="deleteValue" >
                    <?php foreach ($vehicles as $vehicle) : ?>
                        <tr>
                            <td><?php echo $vehicle['year']; ?></td>
                            <td><?php echo $vehicle['makeName']; ?></td>
                            <td><?php echo $vehicle['model']; ?></td>
                            <td><?php echo $vehicle['typeName']; ?></td>
                            <td><?php echo $vehicle['className']; ?></td>
                            <td><?php echo '$' . number_format($vehicle['price'], 2); ?></td>
                            <td class="text-center">
                                <i class="fas fa-minus-circle mx-auto delete-vehicle" onclick="deleteEntry(<?php echo $vehicle['vehicleID']; ?>, 'deleteVehicle')"></i>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php
        // If the vehicle table is empty diplay message
            if (count($vehicles) == 0) {
        ?>
            <div id="no-match">
                <h2 class="text-center">No Vehicles Match The Current Criteria</h2>
                <h4 class="text-center">Please adjust your selections</h4>
            </div>
        <?php } ?>  
    </form>
</section>