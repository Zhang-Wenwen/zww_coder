<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>

<html>

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width,initial-scale=1.0,minimum-scale=0.5,maximum-scale=2.0,user-scalable=yes">


    <script type="text/javascript" src="/Public/Js/iscroll.js"></script>

    <link rel="stylesheet" type="text/css" href="/Public/Css/member.css">
    <link rel="stylesheet" type="text/css" href="/Public/Css/public.css">

    <title>天外天工作室-成员介绍</title>

    <style>

        <!--
        .na a {
            text-decoration: none;
        }

        -->
    </style>

    <script src="/Public/Js/jquery-1.11.3.min.js"></script>

    <script type="text/javascript">

        $(function () {

            $(".pic").mouseover(function () {

                var id = parseInt($(this).attr('id').substr(5));

                $("#info" + id).show();


                $(this).mouseout(function () {

                    $("#info" + id).hide();

                })

                $("#info" + id).mouseover(function () {

                    $("#info" + id).show();

                });


                $("#info" + id).mouseout(function () {

                    $("#info" + id).hide();

                });

            });


        });

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


    <div class="list">

        <ul>
          <?php if(($cur_type == 1) ): ?><li><a  href="<?php echo teamIndex_path ;?>showinfo1?grade=<?php echo ($cur_grade-1); ?>"><?php echo ($cur_grade-1); ?></a>
            </li>
            <p>
            <li><a  href="<?php echo teamIndex_path ;?>showinfo1?grade=<?php echo ($cur_grade); ?>"><?php echo ($cur_grade); ?></a>
            </li>
          </p>
            <li><a  href="<?php echo teamIndex_path ;?>showinfo1?grade=<?php echo ($cur_grade+1); ?>"><?php echo ($cur_grade+1); ?></a>
            </li>

            <?php elseif(($cur_type == 2)): ?>

            <?php $__FOR_START_778512850__=0;$__FOR_END_778512850__=$grade_num;for($i=$__FOR_START_778512850__;$i < $__FOR_END_778512850__;$i+=1){ if(($show_grade[$i] == $cur_grade) ): if(($i-1 >= 0) and ($i+1 < $grade_num) ): ?><div class="na">
                            <li><a class="na" href="<?php echo teamIndex_path ;?>showinfo1?grade=<?php echo ($show_grade[$i-1]); ?>"><?php echo ($show_grade[$i-1]); ?></a>
                            </li>
                            <li><p>
                                <span class="select-year"><a class="na"
                                                             href="<?php echo teamIndex_path ;?>showinfo1?grade=<?php echo ($show_grade["$i"]); ?>"><?php echo ($show_grade[$i]); ?></a></span></p>
                            </li>
                            <li><a class="na" href="<?php echo teamIndex_path ;?>showinfo1?grade=<?php echo ($show_grade[$i+1]); ?>"><?php echo ($show_grade[$i+1]); ?></a>
                            </li>

                        </div>

                        <?php elseif(($i-1 < 0)): ?>

                        <div class="na">
                            <li>
                                <p>
                                <span class="select-year"><a href="<?php echo teamIndex_path ;?>showinfo1?grade=<?php echo ($show_grade[$i]); ?>"><?php echo ($show_grade[$i]); ?></a></span></p>
                            </li>
                            <li><a
                                        href="<?php echo teamIndex_path ;?>showinfo1?grade=<?php echo ($show_grade[$i+1]); ?>"><?php echo ($show_grade[$i+1]); ?></a>
                            </li>
                            <li><a href="<?php echo teamIndex_path ;?>showinfo1?grade=<?php echo ($show_grade[$i+2]); ?>"><?php echo ($show_grade[$i+2]); ?></a>
                            </li>

                        </div>

                        <?php elseif(($i+1 >= $grade_num)): ?>

                        <div class="na">
                            <li><a href="<?php echo teamIndex_path ;?>showinfo1?grade=<?php echo ($show_grade[$i-2]); ?>"><?php echo ($show_grade[$i-2]); ?></a>
                            </li>
                            <li><a
                                        href="<?php echo teamIndex_path ;?>showinfo1?grade=<?php echo ($show_grade[$i-1]); ?>"><?php echo ($show_grade[$i-1]); ?></a>
                            </li>
                            <li>
                                <p>
                                <span class="select-year"><a href="<?php echo teamIndex_path ;?>showinfo1?grade=<?php echo ($show_grade[$i]); ?>"><?php echo ($show_grade[$i]); ?></a></span></p>
                            </li>
                        </div><?php endif; endif; } endif; ?>
        </ul>

    </div>

    <div class="member">

        <table>

            <tbody>


            <?php $__FOR_START_388018489__=0;$__FOR_END_388018489__=$page_num;for($i=$__FOR_START_388018489__;$i < $__FOR_END_388018489__;$i+=2){ ?><tr>

                    <?php if(($list[$i]['teamer_name'] != '') ): ?><td>

                            <div id="info<?php echo ($i+1); ?>" class="hidden">

                                <p class="info-left"><?php echo ($obj["teamer_group"]); ?> &nbsp<?php echo ($obj["teamer_name"]); ?><br>
                 
                                    <?php echo ($obj["teamer_school"]); ?><br>
                                     <?php echo ($obj["teamer_go"]); ?><br>

                                   

                                </p>

                                <p class="info-left-text"><?php echo ($list[$i]['teamer_group']); ?>  <?php echo ($list[$i]['teamer_name']); ?><br>
                       
                                    <?php echo ($list[$i]['teamer_school']); ?><br>
                                    <?php echo ($list[$i]['teamer_go']); ?><br>

                                    

                                </p>

                            </div>

                            <img src="<?php echo member_Photo_path ; ?>/<?php echo ($list[$i]['teamer_photo_loc']); ?>"
                                 id="photo<?php echo ($i+1); ?>" class="pic" style="margin:1px auto;

                         width:100px;

height:100px;

border-radius:100px;

border:2px solid #fff;

overflow:hidden;

-webkit-box-shadow:0 0 3px #ccc;

box-shadow:0 0 3px #ccc;">


                        </td>

                        <?php else: ?>


                        <td>


                            <img src="/Public/Images/TeamPic/null.png" style="margin:0px auto;

                         width:100px;

height:100px;

border-radius:100px;

border:0px solid #fff;

overflow:hidden;

-webkit-box-shadow:0 0 0px #ccc;

box-shadow:0 0 0px #ccc;">


                        </td><?php endif; ?>


                    <?php if(($list[$i+1]['teamer_name'] != '') ): ?><td>

                            <div id="info<?php echo ($i+2); ?>" class="hidden">

                                <p class="info-right"><?php echo ($obj["teamer_group"]); ?> &nbsp <?php echo ($obj["teamer_name"]); ?><br>

                                    <?php echo ($obj["teamer_school"]); ?><br>
                                    <?php echo ($obj["teamer_go"]); ?><br>


                                  

                                </p>

                                <p class="info-right-text"><?php echo ($list[$i+1]['teamer_group']); echo ($list[$i+1]['teamer_name']); ?><br>

                                    <?php echo ($list[$i+1]['teamer_school']); ?><br>
                                    <?php echo ($list[$i+1]['teamer_go']); ?><br>
                                    

                                </p>

                            </div>

                            <img src="<?php echo member_Photo_path ; ?>/<?php echo ($list[$i+1]['teamer_photo_loc']); ?>"
                                 id="photo<?php echo ($i+2); ?>" class="pic" style="margin:1px auto;

width:100px;

height:100px;

border-radius:100px;

border:2px solid #fff;

overflow:hidden;

-webkit-box-shadow:0 0 3px #ccc;

box-shadow:0 0 3px #ccc;">


                        </td>

                        <?php else: ?>


                        <td>


                            <img src="/Public/Images/TeamPic/null.png" style="margin:0px auto;

                         width:100px;

height:100px;

border-radius:100px;

border:0px solid #fff;

overflow:hidden;

-webkit-box-shadow:0 0 0px #ccc;

box-shadow:0 0 0px #ccc;">


                        </td><?php endif; ?>

                </tr><?php } ?>


            <tr>

                <td colspan="2"><img src="/Public/Images/Frontend/line.png"></td>

            </tr>

            <!--

                 <tr>

                     <td colspan="2"><img src="/myphp/THINKPHP/Public/TWT-AboutUS/images\line.png"></td>

                 </tr> -->

            <!--	<tr class="button">



                    <td style="text-align:right">



                        <a href="#"><img src="/myphp/THINKPHP/Public/TWT-AboutUS/images\prev.png"></a>

                    </td>

                    <td style="text-align:left">

                        <a href="#"><img src="/myphp/THINKPHP/Public/TWT-AboutUS/images\next.png"></a>

                    </td>

                </tr> -->


            <tr class="button">

                <td style="text-align:right ; left:50px;">


                    <?php echo ($page); ?>
                </td>

            </tr>


            </tbody>

        </table>

    </div>

    <div class="member-group">                
     <?php if(($check_group == 1) ): ?><table>
        <tbody>
                <tr>         
                    <td><a href="<?php echo teamIndex_path ;?>showinfo2?teamer_group='程序组'" class="active">程序</a></td>
          </tr>

          <tr>
                    <td><a href="<?php echo teamIndex_path ;?>showinfo2?teamer_group='产品组'" >产品</a></td>
                </tr>

                <tr>
                    <td><a href="<?php echo teamIndex_path ;?>showinfo2?teamer_group='前端组'">前端</a></td>
          </tr>

          <tr>
                    <td><a href="<?php echo teamIndex_path ;?>showinfo2?teamer_group='设计组'">设计</a></td>
                </tr>

            </tbody>
      </table>
       <?php elseif(($check_group == 2) ): ?>
        
         <table>
        <tbody>
           <tr>
            <td><a href="<?php echo teamIndex_path ;?>showinfo2?teamer_group='程序组'" >程序</a></td>
          </tr>
          <tr>
            <td><a href="<?php echo teamIndex_path ;?>showinfo2?teamer_group='产品组'" class="active">产品</a></td>
          </tr>
          <tr>
            <td><a href="<?php echo teamIndex_path ;?>showinfo2?teamer_group='前端组'">前端</a></td>
          </tr>
          <tr>
            <td><a href="<?php echo teamIndex_path ;?>showinfo2?teamer_group='设计组'">设计</a></td>
          </tr>
</tbody>
      </table>

<?php elseif(($check_group == 3) ): ?>
          <table>
        <tbody>
          <tr>
            <td><a href="<?php echo teamIndex_path ;?>showinfo2?teamer_group='程序组'" >程序</a></td>
          </tr>
          <tr>
            <td><a href="<?php echo teamIndex_path ;?>showinfo2?teamer_group='产品组'">产品</a></td>
          </tr>
          <tr>
            <td><a href="<?php echo teamIndex_path ;?>showinfo2?teamer_group='前端组'" class="active">前端</a></td>
          </tr>
          <tr>
            <td><a href="<?php echo teamIndex_path ;?>showinfo2?teamer_group='设计组'" >设计</a></td>
          </tr>
</tbody>
      </table>

 <?php elseif(($check_group == 4) ): ?>
           <table>
        <tbody>
           <tr>
            <td><a href="<?php echo teamIndex_path ;?>showinfo2?teamer_group='程序组'" >程序</a></td>
          </tr>
          <tr>
            <td><a href="<?php echo teamIndex_path ;?>showinfo2?teamer_group='产品组'">产品</a></td>
          </tr>
          <tr>
            <td><a href="<?php echo teamIndex_path ;?>showinfo2?teamer_group='前端组'">前端</a></td>
          </tr>
          <tr>
            <td><a href="<?php echo teamIndex_path ;?>showinfo2?teamer_group='设计组'" class="active">设计</a></td>
          </tr>
          </tbody>
      </table>
       <?php elseif(($check_group == 0) ): ?>
        
         <table>
        <tbody>
           <tr>
            <td><a href="<?php echo teamIndex_path ;?>showinfo2?teamer_group='程序组'" >程序</a></td>
          </tr>
          <tr>
            <td><a href="<?php echo teamIndex_path ;?>showinfo2?teamer_group='产品组'" >产品</a></td>
          </tr>
          <tr>
            <td><a href="<?php echo teamIndex_path ;?>showinfo2?teamer_group='前端组'">前端</a></td>
          </tr>
          <tr>
            <td><a href="<?php echo teamIndex_path ;?>showinfo2?teamer_group='设计组'">设计</a></td>
          </tr>
</tbody>
      </table><?php endif; ?>


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