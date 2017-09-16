<?php

// +----------------------------------------------------------------------

// | ThinkPHP [ WE CAN DO IT JUST THINK ]

// +----------------------------------------------------------------------

// | Copyright (c) 2006-2014 http://thinkphp.cn All rights reserved.

// +----------------------------------------------------------------------

// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )

// +----------------------------------------------------------------------

// | Author: liu21st <liu21st@gmail.com>

// +----------------------------------------------------------------------



// 应用入口文件



// 检测PHP环境

if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');

define('APP_NAME', 'admin'); //项目名，可自定义

 define('APP_PATH', './admin/'); //项目路径，访问入口文件，即可自动生成，无需手动创建，注意最后的'/'，如果不加，会将项目文件散落在message根目录下

define('amaze_path','http://coder.twtstudio.com/Public/amaze_assets');

define('twt_path','http://coder.twtstudio.com/Public/TWT-AboutUS/');

define('teamAdminHtml_path','http://coder.twtstudio.com/admin.php/Home/Team/');

define('member_Photo_path','http://coder.twtstudio.com/upload/');

define('crop_path',"http://coder.twtstudio.com/Public/cut/");

 define('APP_DEBUG', true); //调试模式，如果在开发阶段，建议在开发阶段开启

 require './ThinkPHP/ThinkPHP.php'; //重点*，加了这条，框架才能生效