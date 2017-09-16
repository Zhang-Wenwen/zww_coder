<?php
	//使用站点内用户登录逻辑。在此需要增加对普通用户升级到管理员用户的确认
	include(dirname(__FILE__).'/common.php');

	$page=base_nulltest($_GET['page'],'index');
	$do=base_nulltest($_GET['do'],false);

	load_model('manage.func');
	manage_needAdmin();

	$path=dirname(__FILE__).'/source/'.$page.($do?'_'.$do:'').'.php';
	// echo $path;
	if(preg_match('/[a-z]/',$page)&&(!$do||preg_match('/[a-z]/',$do))
		&&file_exists($path))
	{
		global $nav;
		$nav=array();
		$nav[$page]='class="active"';
		if($do)
			$nav[$page.'_'.$do]='class="active"';
		$_TPL['breadcrumb'][]=array('name'=>$page,'href'=> $do?'#':'./?page='.$page);
		if($do)
			$_TPL['breadcrumb'][]=array('name'=>$do,'href'=>'./?page='.$page.'&do='.$do);
		
		load_model('auth.func');
		$canmenuauth=auth_checkTF('manage',0,'ADMIN_AUTH');
		include($path);
	}
	else
	{
		$_TPL['hidemenu']=true;
		message('错误的页面名称');
	}
	
