<?php include('partials-front/menu.php')?>

    <section class="food-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL?>food-search.php" method="POST">
                <input type="search" name="search" required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <?php
        if(isset($_SESSION['order'])){
            echo $_SESSION['order'];
            unset($_SESSION['order']);
        }
    ?>


    <section class="categories">
        <div class="container">
            <h2 class="text-center">Categories</h2>

            <?php 
            $sql = "SELECT * from tbl_category WHERE active='Yes' AND featured ='Yes' ";
            $res = mysqli_query($conn, $sql);

            $count = mysqli_num_rows($res);

            if($count > 0){
                while($row = mysqli_fetch_assoc($res)){
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['image_name'];
                    ?>
                            <a href="<?php echo SITEURL?>category-foods.php?category_id=<?php echo $id?>">
                                 <div class="box-3 float-container">
                                 <?php
                                        if($image_name == ""){
                                            echo "<div>Image Not Available</div>";
                                        }
                                        else
                                        {
                                            ?>
                                             <img src="<?php echo SITEURL?>images/category/<?php echo $image_name?>" alt="<?php echo $image_name; ?>" class="img-responsive img-curve">
                                            <?php
                                        }

                                    ?>

                                    <h3 class="float-text text-white"><?php echo $title?></h3>
                                 </div>
                            </a>


                    <?php
                }
            }
            else
            {
                echo "<div>No Category Available<div>";
            }


            ?>

           

            <div class="clearfix"></div>
        </div>
    </section>


   
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center color-green">Food Menu</h2>

            <?php 
            $sql2 ="SELECT * FROM tbl_food WHERE featured = 'Yes' AND active ='Yes'";
            $res2 = mysqli_query($conn, $sql2);

            $count2 = mysqli_num_rows($res2);
            if($count2 > 0){
                while($row2 = mysqli_fetch_assoc($res2)){
                    $id = $row2['id'];
                    $title = $row2['title'];
                    $price = $row2['price'];
                    $description = $row2['description'];
                    $image_name = $row2['image_name'];
                    ?>
                                    <div class="food-menu-box">
                                        <div class="food-menu-img">
                                        <?php
                                            if($image_name == ""){
                                                echo "<div>Image Not Available</div>";
                                            }
                                            else
                                            {
                                                ?>
                                                    <img src="<?php echo SITEURL?>images/food/<?php echo $image_name?>" alt="<?php echo $title?>" class="img-responsive img-curve">
                                                <?php
                                            }

                                        ?>

                                        </div>
                                        <div class="food-menu-desc">
                                            <h4><?php echo $title?></h4>
                                            <p class="food-price">Rs. <?php echo $price?></p>
                                            <p class="food-detail">
                                                <?php echo $description?>
                                            </p>
                                            <br>

                                            <a href="<?php echo SITEURL?>order.php?id=<?php echo $id?>" class="btn btn-primary">Order Now</a>
                                        </div>
                                    </div>
                    <?php
                }
            }
            else{
                echo "<div>No Food Available</div>";
            }
            ?>

            <div class="clearfix"></div>

            

        </div>

        <p class="text-center">
            <a href="<?php echo SITEURL?>foods.php">See All Foods</a>
        </p>
    </section>


    <?php include('partials-front/footer.php')?>
   