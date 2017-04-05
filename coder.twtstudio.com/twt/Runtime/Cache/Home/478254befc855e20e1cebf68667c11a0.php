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
          <li><a  href="http://coder.twtstudio.com/index.php/Home/TeamIndex/showinfo1?grade=2013">2013</a>
            </li>
            <p>
            <li><a  href="http://coder.twtstudio.com/index.php/Home/TeamIndex/showinfo1?grade=2014">2014</a>
            </li>
          </p>
            <li><a  href="http://coder.twtstudio.com/index.php/Home/TeamIndex/showinfo1?grade=2015">2015</a>
            </li>

                    </ul>

    </div>

    <div class="member">

        <table>

            <tbody>


            <tr>

                    <td>

                            <div id="info1" class="hidden">

                                <p class="info-left"> &nbsp<br>
                 
                                    <br>
                                     <br>

                                   

                                </p>

                                <p class="info-left-text">程序组  杨兴锋<br>
                       
                                    软件学院<br>
                                    <br>

                                    

                                </p>

                            </div>

                            <img src="http://coder.twtstudio.com/upload//14583773750391.jpg.'b'"
                                 id="photo1" class="pic" style="margin:1px auto;

                         width:100px;

height:100px;

border-radius:100px;

border:2px solid #fff;

overflow:hidden;

-webkit-box-shadow:0 0 3px #ccc;

box-shadow:0 0 3px #ccc;">


                        </td>

                        

                    <td>

                            <div id="info2" class="hidden">

                                <p class="info-right"> &nbsp <br>

                                    <br>
                                    <br>


                                  

                                </p>

                                <p class="info-right-text">程序组郭仁杰<br>

                                    软件学院<br>
                                    <br>
                                    

                                </p>

                            </div>

                            <img src="http://coder.twtstudio.com/upload//14584734420780.jpg.'b'"
                                 id="photo2" class="pic" style="margin:1px auto;

width:100px;

height:100px;

border-radius:100px;

border:2px solid #fff;

overflow:hidden;

-webkit-box-shadow:0 0 3px #ccc;

box-shadow:0 0 3px #ccc;">


                        </td>

                        
                </tr><tr>

                    <td>

                            <div id="info3" class="hidden">

                                <p class="info-left"> &nbsp<br>
                 
                                    <br>
                                     <br>

                                   

                                </p>

                                <p class="info-left-text">程序组  高天宇<br>
                       
                                    精仪学院<br>
                                    <br>

                                    

                                </p>

                            </div>

                            <img src="http://coder.twtstudio.com/upload//14584736050254.jpg.'b'"
                                 id="photo3" class="pic" style="margin:1px auto;

                         width:100px;

height:100px;

border-radius:100px;

border:2px solid #fff;

overflow:hidden;

-webkit-box-shadow:0 0 3px #ccc;

box-shadow:0 0 3px #ccc;">


                        </td>

                        

                    <td>

                            <div id="info4" class="hidden">

                                <p class="info-right"> &nbsp <br>

                                    <br>
                                    <br>


                                  

                                </p>

                                <p class="info-right-text">程序组李河林<br>

                                    机械学院<br>
                                    <br>
                                    

                                </p>

                            </div>

                            <img src="http://coder.twtstudio.com/upload//14584746520804.jpg.'b'"
                                 id="photo4" class="pic" style="margin:1px auto;

width:100px;

height:100px;

border-radius:100px;

border:2px solid #fff;

overflow:hidden;

-webkit-box-shadow:0 0 3px #ccc;

box-shadow:0 0 3px #ccc;">


                        </td>

                        
                </tr><tr>

                    <td>

                            <div id="info5" class="hidden">

                                <p class="info-left"> &nbsp<br>
                 
                                    <br>
                                     <br>

                                   

                                </p>

                                <p class="info-left-text">程序组  李康<br>
                       
                                    软件学院<br>
                                    <br>

                                    

                                </p>

                            </div>

                            <img src="http://coder.twtstudio.com/upload//14584755870877.png.'b'"
                                 id="photo5" class="pic" style="margin:1px auto;

                         width:100px;

height:100px;

border-radius:100px;

border:2px solid #fff;

overflow:hidden;

-webkit-box-shadow:0 0 3px #ccc;

box-shadow:0 0 3px #ccc;">


                        </td>

                        

                    <td>

                            <div id="info6" class="hidden">

                                <p class="info-right"> &nbsp <br>

                                    <br>
                                    <br>


                                  

                                </p>

                                <p class="info-right-text">程序组王汀<br>

                                    软件学院<br>
                                    <br>
                                    

                                </p>

                            </div>

                            <img src="http://coder.twtstudio.com/upload//14584756950631.png.'b'"
                                 id="photo6" class="pic" style="margin:1px auto;

width:100px;

height:100px;

border-radius:100px;

border:2px solid #fff;

overflow:hidden;

-webkit-box-shadow:0 0 3px #ccc;

box-shadow:0 0 3px #ccc;">


                        </td>

                        
                </tr><tr>

                    <td>

                            <div id="info7" class="hidden">

                                <p class="info-left"> &nbsp<br>
                 
                                    <br>
                                     <br>

                                   

                                </p>

                                <p class="info-left-text">程序组  陈恒<br>
                       
                                    软件学院<br>
                                    <br>

                                    

                                </p>

                            </div>

                            <img src="http://coder.twtstudio.com/upload//14584760280145.jpg.'b'"
                                 id="photo7" class="pic" style="margin:1px auto;

                         width:100px;

height:100px;

border-radius:100px;

border:2px solid #fff;

overflow:hidden;

-webkit-box-shadow:0 0 3px #ccc;

box-shadow:0 0 3px #ccc;">


                        </td>

                        

                    <td>

                            <div id="info8" class="hidden">

                                <p class="info-right"> &nbsp <br>

                                    <br>
                                    <br>


                                  

                                </p>

                                <p class="info-right-text">程序组王海弛<br>

                                    软件学院<br>
                                    <br>
                                    

                                </p>

                            </div>

                            <img src="http://coder.twtstudio.com/upload//14584764280830.jpg.'b'"
                                 id="photo8" class="pic" style="margin:1px auto;

width:100px;

height:100px;

border-radius:100px;

border:2px solid #fff;

overflow:hidden;

-webkit-box-shadow:0 0 3px #ccc;

box-shadow:0 0 3px #ccc;">


                        </td>

                        
                </tr>

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


                    <div> <img src='http://coder.twtstudio.com/Public/Images/Frontend/prev.png'>  <a class="next" href="/index.php/home/team_index/showinfo2/teamer_group/%27+%2B+ltrim%28%27%27%29+%2B+%27%27%E7%A8%8B%E5%BA%8F%E7%BB%84%27+AND+2383%3D2383/p/2.html"><img src='http://coder.twtstudio.com/Public/Images/Frontend/next.png'></a> </div>                </td>

            </tr>


            </tbody>

        </table>

    </div>

    <div class="member-group">                
     <table>
        <tbody>
                <tr>         
                    <td><a href="http://coder.twtstudio.com/index.php/Home/TeamIndex/showinfo2?teamer_group='程序组'" class="active">程序</a></td>
          </tr>

          <tr>
                    <td><a href="http://coder.twtstudio.com/index.php/Home/TeamIndex/showinfo2?teamer_group='产品组'" >产品</a></td>
                </tr>

                <tr>
                    <td><a href="http://coder.twtstudio.com/index.php/Home/TeamIndex/showinfo2?teamer_group='前端组'">前端</a></td>
          </tr>

          <tr>
                    <td><a href="http://coder.twtstudio.com/index.php/Home/TeamIndex/showinfo2?teamer_group='设计组'">设计</a></td>
                </tr>

            </tbody>
      </table>
       

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