
    <?php
        echo view('includes/header');
    ?>
        <?php 
            //echo view('includes/v_menu');
            echo view($breadcrumb);
        ?> 

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