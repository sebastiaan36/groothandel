(function(a){a(document).ready(function(){a(".toggle-content:not(.opened), .content-tab:not(.opened)").hide();a(".tab-index a").click(function(){a(this).parent().next().slideToggle(300,"easeOutExpo");a(this).parent().toggleClass("tab-opened tab-closed");a(this).children("span").toggleClass("icon-plus-sign icon-minus-sign");a(this).attr("title","Close"==a(this).attr("title")?"Open":"Close");return!1});a(".features-tab-container").yiw_features_tab();a(".tabs-container").yiw_tabs({tabNav:"ul.tabs",tabDivs:".border-box"});
var b=a(".newsletter-section .text-field"),c=null;b.focus(function(){""==a(this).val()&&(c=a(this).val(),a(this).prev("label").hide());b.blur(function(){""==a(this).val()&&(a(this).val(c),a(this).prev("label").show())})});a(".widget_flickrRSS img").hover(function(){a(this).stop(!0,!0).animate({opacity:0.6})},function(){a(this).stop(!0,!0).animate({opacity:1})})})})(jQuery);
(function(a){a.fn.yiw_features_tab=function(b){var c={tabNav:"ul.features-tab-labels",tabDivs:"div.features-tab-wrapper"};b&&a.extend(c,b);this.each(function(){var d=a(c.tabNav,this),b=a(c.tabDivs,this);d.children("li");b.children("div").hide();b.children("div").eq(d.children("li.current-feature").index()).show();a("li",d).hover(function(){if(!a(this).hasClass("current-feature")){var c=b.children("div").eq(a(this).index());d.children("li").removeClass("current-feature");a(this).addClass("current-feature");
b.children("div").hide().removeClass("current-feature");console.log("hover");c.fadeIn("slow",function(){a(document).trigger("feature_tab_opened")})}})})}})(jQuery);
(function(a){a.fn.yiw_tabs=function(b){var c={tabNav:"ul.tabs",tabDivs:".containers",currentClass:"current"};b&&a.extend(c,b);this.each(function(){var b=a(c.tabNav,this),f=a(c.tabDivs,this),e;f.children("div").hide();e=0<a("li."+c.currentClass+" a",b).length?"#"+a("li."+c.currentClass+" a",b).data("tab"):"#"+a("li:first-child a",b).data("tab");a(e).show().addClass("showing").trigger("yit_tabopened");a("li:first-child a",b).parents("li").addClass(c.currentClass);a("a",b).click(function(){if(!a(this).parents("li").hasClass("current")){var e=
"#"+a(this).data("tab");a(this);a("li."+c.currentClass,b).removeClass(c.currentClass);a(this).parents("li").addClass(c.currentClass);a(".showing",f).fadeOut(200,function(){a(this).removeClass("showing").trigger("yit_tabclosed");a(e).fadeIn(200).addClass("showing").trigger("yit_tabopened")})}return!1})})}})(jQuery);