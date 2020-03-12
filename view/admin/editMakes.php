<section class="container">
    <form action="index.php" method="POST" id="form-change" class="my-auto col-sm-12 col-med-6">
        <input type="hidden" name="action" id="action" value="addMake">
  

        <div class="vehicle-table">
            <table class="table table-light table-sm">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col" class="text-center">Remove</th>
                    </tr>
                </thead>
                <tbody>
                    <input type="hidden" name="deleteValue" id="deleteValue" >
                    <?php foreach ($makes as $make) : ?>
                        <tr>
                            <td><?php echo $make['makeName']; ?></td>
                            <td class="text-center">
                                <i class="fas fa-minus-circle mx-auto"  id="delete-make"    onclick="deleteEntry(<?php echo $make['makeID']; ?>, 'deleteMake')"></i>
                            </td>
                            
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="form-group form-inline">
            <label for="makeName" class="col-3 col-form-label">Make</label>
            <div class="col-9">
                <input type="text" name="makeName" id="makeName" class="form-control" required/>
            </div>
        </div>
        <div class="form-group form-inline">
            <button type="submit" class="btn btn-color ml-auto mr-3">Add Model</button>
        </div>
    <!-- If the to do list table is not empty diplay full list -->
        <?php if (count($makes) == 0) {?>
            <h2 class="text-center">No Matching Vehicles</h2>
        <?php } ?>  
    </form>
</section>