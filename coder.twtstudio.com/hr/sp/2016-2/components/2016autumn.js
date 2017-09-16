/**
 * TwT 2016 Autumn Single Page
 * By Zhyupe
 */
!function(o){var n=o("img"),t=o("#loading"),i=t.find(".progress"),a=0,e=o("#arrow"),r=o(".pa"),d=[],s=0,l=function(){var r=Math.floor(a/n.length*100)
i.html(r+"%"),100===r&&(o("#pages").fullpage({afterLoad:function(n,t){6===t?e.hide():e.show(),d[t]||(d[t]=!0,1===t?setTimeout(function(){o("#page-"+t).addClass("init")},800):o("#page-"+t).addClass("init"))}}),o("html").removeClass("loading"),t.addClass("off"),setTimeout(function(){t.hide()},800))},f=function(o){return c(o)/1080*s},c=function(o){return o=parseFloat(o),isNaN(o)?0:o},u=function(){var t=["top","left","right","bottom","width"],i=function(){var n=o(window).width()
if(s!==n){s=n,s>420&&(s=420)
var i,a
r.each(function(n,e){var r={}
for(a=0;a<t.length;a++)i=e.getAttribute("mp-"+t[a]),null!==i&&(r[t[a]]=f(i))
o(e).css(r)})}}
o(window).on("resize",i),i(),n.each(function(n,t){var i=o(t).data("img"),e=new window.Image
e.dom=t,e.loaded=!1,e.onload=function(){e.loaded||(e.loaded=!0,t.src=this.src,a++,l())},e.onerror=function(){console.log("Image loading failed: "+this.src),this.onload()},e.src=i})}
u()}(window.jQuery)
