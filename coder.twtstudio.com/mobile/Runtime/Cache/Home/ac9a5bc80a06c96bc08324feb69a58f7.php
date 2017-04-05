<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>天外天工作室-项目成果</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" />
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="/Public/mobile/public.css">

	<script type="text/javascript" src="/Public/mobile/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.nav').click(function () {
                //点击的导航栏编号
                var no = parseInt($(this).attr('id').substr(3,2).trim());

                //添加切换动画
                $('.show1').addClass('disappear');
                //动画结束事件效果
                $('.disappear').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
                    $('.show1').removeClass('disappear');
                    var prev_no = parseInt($('.show1').attr('class').substr(3, 2).trim());
                    for (var i = 0; i < 5; i++) {

                        var temp = (prev_no + i) ;
                        if(temp != 10){
                            temp = (prev_no + i) % 10;
                        }

                        var temp2 = (no + i);
                        if(temp2 != 10){
                            temp2 = (no + i) % 10;
                        } 
                        
                       
                        
                        $(".pic" + temp).removeClass('show' + (i + 1));

                        $(".pic" + temp2).addClass('show' + (i + 1));

                    }
                });
            });
        })
    </script>
</head>
<body>
	<header>
		<img src="/Public/mobile/images/logo.png">
	</header>
	<div class="project-content">
	  <div class="picture">
        <ul>
           <?php if(is_array($data1)): $i = 0; $__LIST__ = $data1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="pic<?php echo ($vo["project_show_id"]); ?> show<?php echo ($vo["project_show_id"]); ?>">

                    <a href="<?php echo ($vo["project_pic_link"]); ?>" target="_blank"><img src="/Public<?php echo ($vo["project_pic_loc"]); ?>"></a>

                </li><?php endforeach; endif; else: echo "" ;endif; ?>

            <?php if(is_array($data2)): $i = 0; $__LIST__ = $data2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="pic<?php echo ($vo["project_show_id"]); ?> ">

                    <a href="<?php echo ($vo["project_pic_link"]); ?>" target="_blank"><img src="/Public<?php echo ($vo["project_pic_loc"]); ?>"></a>

                </li><?php endforeach; endif; else: echo "" ;endif; ?>
       
            
        </ul>
      </div>
      <div class="project-item">
      	<table border="0">
         
      		<tr>
           

      			<td><a class="nav" id="nav<?php echo ($data[0]["project_show_id"]); ?>" href="#"><?php echo ($data[0]["project_title"]); ?></a></td>
      			<td><a class="nav white" id="nav<?php echo ($data[1]["project_show_id"]); ?>" href="#"><?php echo ($data[1]["project_title"]); ?></a></td>
      			<td><a class="nav " id="nav<?php echo ($data[2]["project_show_id"]); ?>" href="#"><?php echo ($data[2]["project_title"]); ?></a></td>
      			<td><a class="nav white" id="nav<?php echo ($data[3]["project_show_id"]); ?>" href="#"><?php echo ($data[3]["project_title"]); ?></a></td>
      		</tr>
      		<tr>
      			<td><a class="nav white" id="nav<?php echo ($data[4]["project_show_id"]); ?>" href="#"><?php echo ($data[4]["project_title"]); ?></a></td>
      			<td><a class="n nav" id="nav<?php echo ($data[5]["project_show_id"]); ?>" href="#"><?php echo ($data[5]["project_title"]); ?></a></td>
      			<td><a class="nav white" id="nav<?php echo ($data[6]["project_show_id"]); ?>" href="#"><?php echo ($data[6]["project_title"]); ?></a></td>
      			<td><a class="nav" id="nav<?php echo ($data[7]["project_show_id"]); ?>" href="#"><?php echo ($data[7]["project_title"]); ?></a></td>
      		</tr>
      		<tr>
      			<td><a href="#"></a></td>
      			<td><a class="nav white" id="nav<?php echo ($data[8]["project_show_id"]); ?>" href="#"><?php echo ($data[8]["project_title"]); ?></a></td>
      			<td><a class="nav" id="nav<?php echo ($data[9]["project_show_id"]); ?>" href="#"><?php echo ($data[9]["project_title"]); ?></a></td>
      			<td><a class="nav white" href="#"></a></td>
      		</tr>
        
      	</table>
      </div>
	</div>
	<footer>
		<ul>
			<li>
				<a class="nav_member" href="/index.php/home/member/index">团队分工</a>
			</li>
			<li>
				<a class="nav_project" href="/index.php/home/project/index">项目成果</a>
			</li>
			<li >
            <a class="nav_Index" href="/index.php/home/Index/index"><img src="/Public/mobile/images2/home-icon.png" class="home-icon"></a>
           </li>
			<li>
				<a class="nav_TeamIndex" href="/index.php/Home/TeamIndex/showinfo1">成员介绍</a>
			</li>
			<li>
				<a class="nav_about" href="/index.php/home/about/index">关于我们</a>
			</li>
		</ul>
	</footer>

<script src="/Public/mobile/highlight_click.js"></script>
</body>
</html>