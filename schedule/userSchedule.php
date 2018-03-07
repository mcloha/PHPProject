<?php 

    require_once "classes/shift.php";

    $shift = new Shift();

    $results = $shift->selectAllShifts();

?>
<div class="table-responsive">
    <table class="table table-striped text-center table-bordered table-sm">
        <tr>
            <th>שם</th>
            <th>ראשון</th>
            <th>שני</th>
            <th>שלישי</th>
            <th>רביעי</th>
            <th>חמישי</th>
            <th>שישי</th>
            <th>שבת</th>
        </tr>
        <?php 

            foreach($results as $result){
                ?>

                <tr>  
                    <td><?php echo $result['userName'] ?></td><td><?php echo $result['sunday'] ?></td><td><?php echo $result['monday'] ?></td><td><?php echo $result['tuesday'] ?></td><td><?php echo $result['wednesday'] ?></td><td><?php echo $result['thursday'] ?></td><td><?php echo $result['friday'] ?></td><td><?php echo $result['saturday'] ?></td>
                </tr>

                <?php
            }

        ?>
    </table>
</div>
