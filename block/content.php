<div class="z4-content">
	<div class="z4-container">
<?php
	$hasSidebarLeft = $this->countModules(array("sidebar-left1","sidebar-left2","sidebar-left3"));
	$hasSidebarRight = $this->countModules(array("sidebar-right1","sidebar-right2","sidebar-right3"));

	if($hasSidebarLeft && $hasSidebarRight)//两边都有
	{
		$tpl->loadBlock('content/two-sidebar.php');
	}
	else
	{
		if($hasSidebarLeft || $hasSidebarRight)//只有一边
		{
			if($hasSidebarLeft)
			{
				$tpl->loadBlock('content/only-left-sidebar.php');	
			}
			else
			{
				$tpl->loadBlock('content/only-right-sidebar.php');		
			}
		}
		else //两边都没有
		{
			
			$tpl->loadBlock('content/no-sidebar.php');	
		}
	}
?>
	</div>
</div>
	


