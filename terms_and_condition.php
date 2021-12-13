<?php
include('header.php');
?>

<style>

.cat_stick
{
    display: none;
}
h1{
    color:black;
}

</style>

<div style="padding-top: 25px!important;margin:auto;text-align:center;text-decoration:underline"  >
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                        <div class="gen-breadcrumb-title">
                            <h1>
                            Terms and conditions 
                            </h1>
                        </div>
                </div>
            </div>
        </div>
    </div>


    <section class="gen-section-padding-3 gen-top-border">
        <div class="container container-2">
            <div class="row">
                <div class="col-xl-12" style="color:black">
         <?php
            $terms_sql = mysqli_query($connect,"SELECT * FROM `website_setting` WHERE `title` = 'terms_and_condition'");
            $row = mysqli_fetch_array($terms_sql);
            echo html_entity_decode($row['content']);
            
         ?>
         
            </div>

            </div>
        </div>
    </section>


<?php
include('footer.php');
?>