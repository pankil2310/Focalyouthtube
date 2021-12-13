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
                            Subscription Plans
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
            $terms_sql = mysqli_query($connect,"SELECT * FROM `subscriptions` WHERE `status` = '1'");
            while($row = mysqli_fetch_array($terms_sql))
            {
                ?>
         <div class="row pricing_table">
            <div class="col-xl-12 first_section">  
                <span class="title"><?=$row['subscription_name']?></span>
                <?php
                if($session_id != "")
                {
                ?>
                    <span class="butt_sec">
                        <form action="subscribe.php" method="POST">
                            <input type="hidden" name="session_id" value="<?=$session_id?>">
                            <input type="hidden" name="subscription_code" value="<?=$row['subscription_code']?>">
                            <input type="submit" value="Subscribe" onclick="return confirm('Are you sure you want to Subscribe <?=$row['subscription_name']?>?')" class="gen-sen-rating pur_button butt">
                        </form>
                        </span>
                <?php
                }
                else
                {
                ?>
                    <span class="butt_sec"><a href="login.php" class="gen-sen-rating pur_button butt">Subscribe</a></span>
                <?php
                }
                ?>
                
            </div>
            <hr></hr>
            <div class="col-xl-12 second_section">  
                <span class="price"><span>
                <?php
                    if($row['subscription_price'] == '0')
                    {
                        echo "Free";
                    }
                    else
                    {
                        echo "Rs".$row['subscription_name'];
                    }
                ?> /</span>  <span><?=$row['subscription_duration']?> Months</span>
                </span>
                <span class="description"><?=$row['subscription_description']?></span>
            </div>       
         </div>
                
                <?php
            }
            
         ?>
         
         
         <!-- start -->
         
         
         
         <!-- end -->
                  </div>

            </div>
        </div>
    </section>

<style>
.pricing_table
{
        
    margin: auto;
        border: 1px solid #4B6587;
        border-radius:10px;
        min-height:150px;
        text-transform: capitalize !important;
        background:#F7F6F2;
}
.pricing_table .first_section
{
display: flex;
width: -webkit-fill-available;
align-items: center;
padding-top: 20px;
    padding-left: 35px;
    padding-right: 35px;

}
.pricing_table .second_section
{
    width: -webkit-fill-available;
    align-items: center;
    padding-bottom: 20px;
        padding-left: 35px;
    padding-right: 35px;
}
.pricing_table .title
{
    font-size: 50px;
    width: 90%;    
        line-height: initial;
    color:#1261a0;
    
        padding-bottom: 10px;
}
hr
{
        width: 80%;
        border-bottom:2px dashed #e8e6e6;
}
.pricing_table .butt_sec
{
    //width: 25%;
    width: unset;
    float: right;
}
.pricing_table .butt
{
   background: #cf5353;
    border-radius: 10px;
    padding: 10px 10px;
    color: white;
    width: fit-content;
    text-align: center;
    float: right;
    display: block;
}
.pricing_table .price
{
    width: 75%;
    display:block;
}
.pricing_table .price > span
{
    color:#cf5353;
    font-size:28px;
    font-weight:700;
}
/*.pricing_table .price > span:nth-child(2)
{
    color:#cf5353;
    font-size:28px;
    font-weight:700;
}*/
.pricing_table .description
{
        font-size: 16px;
    width: 75%;
    display: block;
    font-weight: 400;
    line-height: 27px;
}

.pricing_table .duration
{
    font-size:20px;
    width: 100%;
    display:block;
}
    .pur_button:hover{
background:#1261a0 !important;
    }
</style>
<?php
include('footer.php');
?>