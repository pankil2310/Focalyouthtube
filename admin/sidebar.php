<div class="left-side-menu left-side-menu-detached">
	<div class="leftbar-user">
		<a href="javascript: void(0);">
		<?php
                if($session_proimg != '')
                {
                ?>
					<img src="../<?=$session_proimg?>" alt="user-image" height="42" class="rounded-circle shadow-sm">
                <?php
                }
                else
                {
                ?>
                    <img src="uploads/user_image/placeholder.png" alt="user-image" height="42" class="rounded-circle shadow-sm">
                <?php
                }
                ?>
			
						<span class="leftbar-user-name"><?=$session_firstname?>  <?=$session_lastname?></span>
		</a>
	</div>




	<!--- Sidemenu -->
	<ul class="metismenu side-nav side-nav-light">

	<?php

	if($session_id == '1')
	{
		$menu_sql = "SELECT * FROM `menu_item` WHERE `status` = '1'";
	}
	else
	{
		$acess_menu = mysqli_query($connect,"SELECT * FROM `menu_acess` WHERE `user_id` = '$session_id' ");
		$row = mysqli_fetch_assoc($acess_menu);
		$menu_ids1 = $row['menu_ids'];
		$menu_ids = explode(',',$menu_ids1);
		$menu_sql = "SELECT * FROM `menu_item` WHERE `id` IN ($menu_ids1) AND `status` = '1'";
	}
		
		$menu_query = mysqli_query($connect,$menu_sql);
		while($row = mysqli_fetch_assoc($menu_query))
		{
			$id = $row['id'];
			$title = $row['title'];
			$link = $row['link'];
			$icon = $row['icon'];
			$parent_id = $row['parent_id'];

			$parent_check = mysqli_query($connect,"SELECT * FROM `menu_item` WHERE `parent_id` = '$id' AND `status` = '1'");
			if(mysqli_num_rows($parent_check) == 0)
			{
				if($parent_id == 0)
				{
			?>
					<li class="side-nav-item">
						<a href="<?=$link?>" class="side-nav-link">
							<i class="<?=$icon?>"></i>
							<span><?=$title?></span>
						</a>
					</li>
			<?php
				}				
			}
			else 
			{
				?>
				<li class="side-nav-item ">
					<a href="javascript: void(0);" class="side-nav-link ">
					<i class="<?=$icon?>"></i>
					<span><?=$title?> </span>
					<span class="menu-arrow"></span>
				</a>	
				<ul class="side-nav-second-level collapse" aria-expanded="false">

				<?php
				while($submenu = mysqli_fetch_assoc($parent_check))
				{
					if (in_array($submenu['id'], $menu_ids) && $session_id != "1")
				  {
				?>
					<li class="">
						<a href="<?=$submenu['link']?>"><?=$submenu['title']?></a>
					</li>
				<?php
				  }
				  if($session_id == '1')
				  {
					  ?>
					  <li class="">
						<a href="<?=$submenu['link']?>"><?=$submenu['title']?></a>
					</li>
					  <?php
				  }
				}
				?>
					</ul>
				</li>
				<?php
			}
		}			
	?>	
	</ul>
</div>