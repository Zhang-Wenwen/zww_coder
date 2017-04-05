<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>

<html>

<head>

    <meta charset="UTF-8">

    <meta name="viewport"

          content="width=device-width,initial-scale=1.0,minimum-scale=0.5,maximum-scale=2.0,user-scalable=yes">

    <link rel="stylesheet" type="text/css" href="/Public/Css/public.css">

    <link rel="stylesheet" type="text/css" href="/Public/Css/project.css">

    <title>天外天工作室-项目成果</title>

    <script type="text/javascript" src="/Public/Js/jquery.min.js"></script>

    <script type="text/javascript">

        $(document).ready(function () {

            $('.left_nav').click(function () {

                //点击的导航栏编号
                var no = parseInt($(this).attr('id').substr(3, 2).trim());

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

        $("#pp-nav-img").on("click","li",function(){
            $(".link-active-img").removeClass('link-active-img');
            $(this).find('a').addClass('link-active-img');
        })

        })

    </script>

</head>

<body>

<div class="nav">

    <!-- top start -->

    <header class="am-topbar admin-header">

        <a href="/index.php/home/index/index"><img src="/Public/Images/Frontend/logo.png"></a>
<div class="navlist">
    <ul>
        <li><a class="nav_index"href="/index.php/home/index/index">首页</a></li>
        <li><a class="nav_about"href="/index.php/home/about/index">关于我们</a></li>
        <li><a class="nav_project"href="/index.php/home/project/index">项目成果</a></li>
        <li><a class="nav_TeamIndex"href="/index.php/Home/TeamIndex/showinfo1">成员介绍</a></li>
        <li><a class="nav_member"href="/index.php/home/member/index">团队分工</a></li>
        <li><a href="http://coder.twtstudio.com/hr" target="_blank">加入我们</a></li>
    </ul>
</div>

<script src="/Public/highlight_click.js"></script>

    </header>

    <!-- top end -->

</div>





<div class="content">

    <div class="side" id="pp-nav-img">

        <ul>

            <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a class="left_nav" id="nav<?php echo ($vo["project_show_id"]); ?>" href="#"><?php echo ($vo["project_title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>

        </ul>

    </div>



    <div class="picture">

        <ul>

            <?php if(is_array($data1)): $i = 0; $__LIST__ = $data1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="pic<?php echo ($vo["project_show_id"]); ?> show<?php echo ($vo["project_show_id"]); ?> link-active">

                    <a href="<?php echo ($vo["project_pic_link"]); ?>" target="_blank"><img src="/Public<?php echo ($vo["project_pic_loc"]); ?>"></a>

                </li><?php endforeach; endif; else: echo "" ;endif; ?>

            <?php if(is_array($data2)): $i = 0; $__LIST__ = $data2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="pic<?php echo ($vo["project_show_id"]); ?> ">

                    <a href="<?php echo ($vo["project_pic_link"]); ?>" target="_blank"><img src="/Public<?php echo ($vo["project_pic_loc"]); ?>"></a>

                </li><?php endforeach; endif; else: echo "" ;endif; ?>

        </ul>

    </div>

</div>





<!-- footer start -->

<div class="pub_footer">
    <a href="http://www.twt.edu.cn/" class="http">http://www.twt.edu.cn/天外天首页</a>
    <a href="http://coder.twtstudio.com/hr" class="img"><img src="/Public/Images/Frontend/footer.png"></a>
    <p>天外天工作室©2000-2015 津 ICP 备000017号</p>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		var pages = window.location.href.split("/");
		console.log(pages);		
	});
</script>

<!-- footer end -->



</body>

</html>