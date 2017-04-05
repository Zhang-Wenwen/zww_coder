<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>天外天工作室-成员介绍</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0;" />
	<meta charset="utf-8">

	<script type="text/javascript" src="http://coder.twtstudio.com/Public/mobile/iscroll.js"></script>
	<script src="http://coder.twtstudio.com/Public/mobile/jquery.min.js"></script>
    
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

	<link rel="stylesheet" type="text/css" href="http://coder.twtstudio.com/Public/mobile/public.css">
</head>
<body>
	<header>
		<img src="http://coder.twtstudio.com/Public/mobile/images/logo.png">
	</header>

<div>
	<div class="member-content">
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

                            <div id="info2" class="hidden">

                                <p class="info-right"> &nbsp <br>

                                    <br>
                                    <br>
                                </p>

                                <p class="info-right-text">前端组刘新迪<br>

                                    软件学院<br>
                                    <br>
                                    

                                </p>

                            </div>

                            <img src="http://coder.twtstudio.com/upload//14584737690629.PNG.'b'"
                                 id="photo2" class="pic" style="margin:1px auto;

width:100px;

height:100px;

border-radius:100px;

border:2px solid #fff;

overflow:hidden;

-webkit-box-shadow:0 0 3px #ccc;

box-shadow:0 0 3px #ccc;">


                        </td>

                        
                </tr>
<!--
                <tr>

                    <td>

                            <div id="info2" class="hidden">

                                <p class="info-right"> &nbsp <br>

                                    <br>
                                    <br>
                                </p>

                                <p class="info-right-text">前端组刘新迪<br>

                                    软件学院<br>
                                    <br>
                                    

                                </p>

                            </div>

                            <img src="http://coder.twtstudio.com/upload//14584737690629.PNG.'b'"
                                 id="photo2" class="pic" style="margin:1px auto;

width:100px;

height:100px;

border-radius:100px;

border:2px solid #fff;

overflow:hidden;

-webkit-box-shadow:0 0 3px #ccc;

box-shadow:0 0 3px #ccc;">


                        </td>

                        
                </tr>
              -->            </tbody>
        </table>
    </div>

    <div class="member-group">
    	 
                    <table>
        <tbody>
          <tr>
            <td><a href="http://coder.twtstudio.com/index.php/Home/TeamIndex/showinfo2?teamer_group='程序组'" >程序</a></td>
          </tr>
          <tr>
            <td><a href="http://coder.twtstudio.com/index.php/Home/TeamIndex/showinfo2?teamer_group='产品组'">产品</a></td>
          </tr>
          <tr>
            <td><a href="http://coder.twtstudio.com/index.php/Home/TeamIndex/showinfo2?teamer_group='前端组'" class="active">前端</a></td>
          </tr>
          <tr>
            <td><a href="http://coder.twtstudio.com/index.php/Home/TeamIndex/showinfo2?teamer_group='设计组'" >设计</a></td>
          </tr>
</tbody>
      </table>


               	
    </div>
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

    <script type="text/javascript">
    (function($) {
  var options, Events, Touch;
  options = {
    x: 20,
    y: 20
  };
  Events = ['swipe', 'swipeLeft', 'swipeRight', 'swipeUp', 'swipeDown', 'tap', 'longTap', 'drag'];
  Events.forEach(function(eventName) {
    $.fn[eventName] = function() {
      var touch = new Touch($(this), eventName);
      touch.start();
      if (arguments[1]) {
        options = arguments[1]
      }
      return this.on(eventName, arguments[0])
    }
  });
  Touch = function() {
    var status, ts, tm, te;
    this.target = arguments[0];
    this.e = arguments[1]
  };
  Touch.prototype.framework = function(e) {
    e.preventDefault();
    var events;
    if (e.changedTouches) events = e.changedTouches[0];
    else events = e.originalEvent.touches[0];
    return events
  };
  Touch.prototype.start = function() {
    var self = this;
    self.target.on("touchstart",
    function(event) {
      event.preventDefault();
      var temp = self.framework(event);
      var d = new Date();
      self.ts = {
        x: temp.pageX,
        y: temp.pageY,
        d: d.getTime()
      }
    });
    self.target.on("touchmove",
    function(event) {
      event.preventDefault();
      var temp = self.framework(event);
      var d = new Date();
      self.tm = {
        x: temp.pageX,
        y: temp.pageY
      };
      if (self.e == "drag") {
        self.target.trigger(self.e, self.tm);
        return
      }
    });
    self.target.on("touchend",
    function(event) {
      event.preventDefault();
      var d = new Date();
      if (!self.tm) {
        self.tm = self.ts
      }
      self.te = {
        x: self.tm.x - self.ts.x,
        y: self.tm.y - self.ts.y,
        d: (d - self.ts.d)
      };
      self.tm = undefined;
      self.factory()
    })
  };
  Touch.prototype.factory = function() {
    var x = Math.abs(this.te.x);
    var y = Math.abs(this.te.y);
    var t = this.te.d;
    var s = this.status;
    if (x < 5 && y < 5) {
      if (t < 300) {
        s = "tap"
      } else {
        s = "longTap"
      }
    } else if (x < options.x && y > options.y) {
      if (t < 250) {
        if (this.te.y > 0) {
          s = "swipeDown"
        } else {
          s = "swipeUp"
        }
      } else {
        s = "swipe"
      }
    } else if (y < options.y && x > options.x) {
      if (t < 250) {
        if (this.te.x > 0) {
          s = "swipeLeft"
        } else {
          s = "swipeRight"
        }
      } else {
        s = "swipe"
      }
    }
    if (s == this.e) {
      this.target.trigger(this.e);
      return
    }
  }
})(window.jQuery || window.Zepto);
    </script>
</body>
</html>