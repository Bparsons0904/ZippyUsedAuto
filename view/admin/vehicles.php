   
<section class="container">
    <div class="row">
    <!-- <h3 class="my-auto">Active Category: </h3> -->
    <form action="index.php" method="GET" id="type-change" class="my-auto col-sm-12 col-med-6">
        <input type="hidden" name="action" value="vehicle-list">
        <input type="hidden" name="classID" value="<?php echo $classID ?>">
        <input type="hidden" name="makeID" value="<?php echo $makeID ?>">
        <input type="hidden" name="sort" value="<?php echo $sort ?>">
        <input type="hidden" name="sortDirection" value="<?php echo $sortDirection ?>">
        <select class="form-control"  name="typeID" onchange="typeSelect()">
            <option value="0">All Types</option>
            <!-- Loop through each category  -->
            <?php foreach ( $types as $type ) : ?>
                <option value="
                    <?php echo $type['typeID']; ?>" 
                    <?=($type['typeID'] == $typeID) ? 'selected':'';?>><?php echo $type['typeName']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </form>
    <form action="index.php" method="GET" id="class-change" class="my-auto col-sm-12 col-med-6">
        <input type="hidden" name="action" value="vehicle-list">
        <input type="hidden" name="typeID" value="<?php echo $typeID ?>">
        <input type="hidden" name="makeID" value="<?php echo $makeID ?>">
        <input type="hidden" name="sort" value="<?php echo $sort ?>">
        <input type="hidden" name="sortDirection" value="<?php echo $sortDirection ?>">
        <select class="form-control"  name="classID" onchange="classSelect()">
            <option value="0">All Classes</option>
            <!-- Loop through each category  -->
            <?php foreach ( $classes as $class ) : ?>
                <option value="
                    <?php echo $class['classID']; ?>" 
                    <?=($class['classID'] == $classID) ? 'selected':'';?>><?php echo $class['className']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </form>
    <form action="index.php" method="GET" id="make-change" class="my-auto col-sm-12 col-med-6">
        <input type="hidden" name="action" value="vehicle-list">
        <input type="hidden" name="classID" value="<?php echo $classID ?>">
        <input type="hidden" name="typeID" value="<?php echo $typeID ?>">
        <input type="hidden" name="sort" value="<?php echo $sort ?>">
        <input type="hidden" name="sortDirection" value="<?php echo $sortDirection ?>">
        <select class="form-control"  name="makeID" onchange="makeSelect()">
            <option value="0">All Makes</option>
            <!-- Loop through each category  -->
            <?php foreach ( $makes as $make ) : ?>
                <option value="
                    <?php echo $make['makeID']; ?>" 
                    <?=($make['makeID'] == $makeID) ? 'selected':'';?>><?php echo $make['makeName']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </form>
    
    <div class="text-center" id="sort-sect">
        <form action="index.php" method="GET" id="sort-change">
            <div class="row">
                <input type="hidden" name="action" value="vehicle-list">
                <input type="hidden" name="classID" value="<?php echo $classID ?>">
                <input type="hidden" name="typeID" value="<?php echo $typeID ?>">
                <input type="hidden" name="makeID" value="<?php echo $makeID ?>">
                <input type="hidden" name="sortDirection" value="<?php echo $sortDirection ?>" id="sortDirectionValue">
                <p class="my-auto col-4">Sort By:</p>
                <div class="form-check my-auto col-3">
                    <input class="form-check-input" type="radio" name="sort" id="priceSort" value="1" <?=($sort !== 0) ? 'checked':'';?> onchange="sortSelect()">
                    <label class="form-check-label" for="priceSort">
                        Price
                    </label>
                </div>
                <div class="form-check my-auto col-3">
                    <input class="form-check-input" type="radio" name="sort" id="yearSort" value="0" <?=($sort === 0) ? 'checked':'';?> onchange="sortSelect()">
                    <label class="form-check-label" for="yearSort">
                        Year
                    </label>
                </div>
                    <i class="fa fa-sort fa-sm py-1 text-white my-auto"  onclick="sortDirection()"></i>
            </div>
            
        </form>
    </div>
        
        

    </div>
    <table class="table table-light table-sm">
        <thead class="thead-light">
            <tr>
                <th scope="col">Year</th>
                <th scope="col">Make</th>
                <th scope="col">Model</th>
                <th scope="col">Price</th>
                <th scope="col">Type</th>
                <th scope="col">Class</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vehicles as $vehicle) : ?>
                <tr>
                    <td><?php echo $vehicle['year']; ?></td>
                    <td><?php echo $vehicle['makeName']; ?></td>
                    <td><?php echo $vehicle['model']; ?></td>
                    <td><?php echo "$" . $vehicle['price']; ?></td>
                    <td><?php echo $vehicle['typeName']; ?></td>
                    <td><?php echo $vehicle['className']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php
    // If the to do list table is not empty diplay full list
        if (count($vehicles) == 0) {
    ?>
        <h2 class="text-center">No Matching Vehicles</h2>
    <?php } ?>  
</section>