!function(t){var i=t(window).width();i>640?t(".comment img[data-gravatar]").each(function(){t(this).attr("src",t(this).attr("data-gravatar"))}):t(".comment img[data-gravatar]").hide();var e=t('iframe[src*="//www.youtube.com"], iframe[src*="//player.vimeo.com"]');e.each(function(){t(this).data("aspect_ratio",this.height/this.width).removeAttr("height").removeAttr("width")}),t(window).resize(function(){var i=t("article").width();e.each(function(){var e=t(this);e.width(i).height(i*e.data("aspect_ratio"))});var a=t(".cp-cats"),o=t(".post-info").outerHeight(),s=a.outerHeight(),r=t(".post-thumbnail, .archive-thumbnail").width()/2,n=r-(o-s),c=2*Math.sqrt(r*r-n*n);a.width(c),t(window).width()>=900&&t(window).scroll()}).resize(),t(window).scroll(function(){if(t(window).width()>=900){var i=t("#site-nav"),e=t("#wpadminbar").outerHeight()||0,a=t("#header").outerHeight(),o=t("#content-container").outerHeight(),s=t("#footer").offset().top-i.outerHeight()-e;if(o<=i.outerHeight())i.css({position:"relative",top:0});else{var r=t(this).scrollTop();i.css(r>=s?{position:"absolute",top:s-a,left:0,width:"100%"}:r>=a?{position:"fixed",top:e,bottom:"auto",left:t("#sidebar").offset().left,width:t("#sidebar").width()}:{position:"absolute",top:0,bottom:"auto",left:0,width:"100%"})}}}).scroll(),t(".menu-toggle").click(function(i){i.preventDefault(),t("#sidebar").toggleClass("active"),t("#site-nav").css({position:"relative",top:0,left:0,width:"100%"})}),t(".menu .menu-item-has-children > a").click(function(i){i.preventDefault();var e=t(this).parent();e.hasClass("active")?(e.siblings().removeClass("inactive active"),e.find("li").removeClass("inactive active"),e.removeClass("active")):(e.siblings().addClass("inactive").removeClass("active"),e.siblings().find(t("li")).removeClass("inactive active"),e.removeClass("inactive").addClass("active")),t(window).scroll()}),t(document).mouseup(function(i){var e=t("#sidebar, .menu-toggle");e.is(i.target)||0!==e.has(i.target).length||t("#sidebar").removeClass("active")})}(jQuery);