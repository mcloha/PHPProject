<?php 

    require_once "classes/shift.php";

    $shift = new Shift();

    $results = $shift->selectAllShifts();

?>
<div class="table-responsive">
    <table class="table table-striped text-center table-bordered table-sm">
        <tr>
            <th>מחק</th>
            <th>שם</th>
            <th>ראשון</th>
            <th>שני</th>
            <th>שלישי</th>
            <th>רביעי</th>
            <th>חמישי</th>
            <th>שישי</th>
            <th>שבת</th>
            <th>הערות</th>
        </tr>
        <?php 

            foreach($results as $result){
                ?>

                <tr>  
                    <td><a id="<?php echo $result['shiftId']?>" class="delete text-danger">X</a></td><td><?php echo $result['userName'] ?></td><td><?php echo $result['sunday'] ?></td><td><?php echo $result['monday'] ?></td><td><?php echo $result['tuesday'] ?></td><td><?php echo $result['wednesday'] ?></td><td><?php echo $result['thursday'] ?></td><td><?php echo $result['friday'] ?></td><td><?php echo $result['saturday'] ?></td><td><?php echo $result['comment'] ?></td>
                </tr>

                <?php
            }

        ?>
    </table>
</div>
<script>
    $(".delete").on("click", function(){
    
        $.ajax({
            url: "adminControler.php",
            type: "POST",
            dataType: "json",
            data: { "shiftId":this.id }
        })
        .done(function(){
            $("#scheduleDivAdmin").load("adminSchedule.php");

            $("#sidurationDivAdmin").html("<img class='img-fluid rounded mx-auto d-block' src='loading.gif'>");
            $.ajax({
                url: "updateSiduration.php"
            })
            .done(function(){
                setTimeout(function(){
                    $("#sidurationDivAdmin").load('sidurationAdmin.php');
                }, 4000)  
            })
            
        })
        
        
        
        
    })
</script>