<!DOCTYPE html>
<html lang="en">
    <?php
        echo view('includes/header');
    ?>
<body>
    <div class="navbar navbar-expand-lg navbar-dark bg-primary">
        <!-- <?php 
            //echo view('includes/v_menu');
        ?> -->
    </div>

    <div class="container">
        <div class="content">
            <?php
                if(isset($body_target)){
                    echo view($body_target);
                }else{
                    echo view('v_empty');
                }
            
            ?>
        </div>
    </div>
    <?php
        echo view('includes/footer');
    ?>
</body>
</html>