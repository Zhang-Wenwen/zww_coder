<?php
	//页面的业务逻辑
	//首页一般对站点总体状况进行统计展示
	//比如最后操作，登录记录，用户提交的信息，BUG等等

	//假装有一个bugs的模块载入用户的最新提交的bug
	//load_model('bugs.func');
	//$bugs=bugs_getLatest(5);
	//以下是mock
	$bugs=array();
	$bugs[]=array('又是张三','首页打不开！！','2012-11-10','未解决');
	$bugs[]=array('张三','首页打不开','2012-11-05','未解决');
	$bugs[]=array('李四','导航条太好看了！','2012-11-01','未解决');
	$bugs[]=array('哇哈哈哈','前排兜售可乐爆米花','2012-11-01','未解决');
	$bugs[]=array('酱油','&*^I^Y*(&*','2012-10-01','已解决');
	
	include $tpl->prepare('index');