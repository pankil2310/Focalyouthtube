<?php
include('header.php');


if($session_id == "")
{
    ?>
    <script>window.location = 'login.php';</script>
    <?php
}
    
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
 <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"/>

<div style="padding-top: 25px!important;margin:auto;text-align:center;text-decoration:underline"  >
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                        <div class="gen-breadcrumb-title">
                            <h1>
                            Manage Subscriptions
                            </h1>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <section class="gen-section-padding-3 " style="margin-top:50px;">
        
        <div class="container container-2">
            <table id="myTable" class="table table-striped dt-responsive nowrap no-footer dtr-inline" width="100%" data-page-length="25" role="grid" aria-describedby="course-datatable-server-side_info" style="width: 100%;">
                                 <thead>
                                    <tr role="row" style="background:white">
                                       <th class="sorting_asc" rowspan="1" colspan="1"  aria-label="#">#</th>
                                       <th class="sorting_disabled" rowspan="1" colspan="1"  aria-label="Title">Name</th>
                                       <th class="sorting_disabled" rowspan="1" colspan="1"  aria-label="Category">Start Date</th>
                                       <th class="sorting_disabled" rowspan="1" colspan="1"  aria-label="Lesson and section">End Date</th>
                                       <th class="sorting_disabled" rowspan="1" colspan="1"  aria-label="Lesson and section">Status</th>
                                       <th class="sorting_disabled" rowspan="1" colspan="1"  aria-label="Enrolled student">Price</th>
                                       <!--<th class="sorting_disabled" rowspan="1" colspan="1"  aria-label="Actions">Actions</th>-->
                                    </tr>
                                 </thead>
                                 <tbody>
                 <?php

                $i = 1;
                $list_subscription = mysqli_query($connect,"SELECT * FROM `user_subscriptions` WHERE `user_id` = '$session_id'");
                if(mysqli_num_rows($list_subscription) != "")
                {
                    while($row = mysqli_fetch_assoc($list_subscription))
                    {
                        $sub_details = mysqli_query($connect,"SELECT * FROM `subscriptions` WHERE `subscription_code` = '$row[subscription_code]'");
                        $row1 = mysqli_fetch_assoc($sub_details);
                    ?>
                        <tr role="row">
                                         <td class="sorting_1" tabindex="0"><?=$i?></td>
                                         <td><strong><?=$row1['subscription_name']?></strong></td>
                                         <td><?=$row['start_date']?></td>
                                         <td><?=$row['start_date']?></td>
                                         <td> <?php
                            if($row['status'] == '0')
                            {
                                echo "Active";
                            }
                            else if($row['status'] == '1')
                            {
                                echo "Deactive";
                            }
                            else if($row['status'] == '2')
                            {
                                echo "Blocked";
                            }
                            else if($row['status'] == '3')
                            {
                                echo "Cancelled";
                            }
                        
                        ?></td>
                        <td>
                        <?php
                            if($row1['subscription_price'] == '0')
                            {
                                echo "Free";
                            }
                            else
                            {
                                echo "Rs ".$row1['subscription_price'];
                            }
                        ?>
                        </td>
                    </tr>
                    
                    <?php
                    $i++;
                    }
                }
                else
                {
                    echo "You havn't Subscribed any Plan.";
                }
                ?>
            </tbody>
            </table>
        </div>
    </section>
<?php
include('footer.php');
?>