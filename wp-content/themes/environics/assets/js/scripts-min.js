var environics={},masonryInit=!0,alm_is_animating=!1,alm_is_done=!1;$(document).ready(function(){environics.init()}),$.fn.almComplete=function(){if($(".grid").length){var e=$(window).scrollTop()+$(window).height(),n=$(".grid");n.length&&(masonryInit&&(masonryInit=!1,n.masonry({gutter:".gutter-sizer",columnWidth:".grid-sizer",itemSelector:".masonry-tile",transitionDuration:0})),n.masonry("reloadItems"),n.imagesLoaded(function(){n.masonry("layout"),$(".masonry-tile").each(function(){e>=$(this).offset().top&&$(this).addClass("animate")})}),alm_is_done=!1)}$(window).width()>768&&$(".page-thinking .square").length&&environics.makeSquare(),$(window).width()>768&&$(".page-work .square").length&&environics.makeSquare()},$.fn.almDone=function(){$(".masonry").removeClass("gradient"),$(".archive-gallery").removeClass("gradient"),alm_is_done=!0},$.fn.almFilterComplete=function(){$(".grid").length&&(alm_is_animating=!1,setTimeout(function(){alm_is_done||($(".masonry").addClass("gradient"),$("#load-more").removeClass("done"))},1e3))},environics.init=function(){environics.showMenu(),$(".single-work").length&&environics.fullStory(),$(".upload").length&&environics.displayFilename(),$(".download-modal").length&&environics.formModal(),$(".whats-happening-today").length&&environics.loadWhatsHappeningToday(),$(".video-container").length&&environics.videoModal(),$(".infographic-block .modal").length&&environics.infographicModal(),$(".images").length&&environics.flickity(),$(".copy-box").length&&environics.embedModal(),$(window).width()>768&&!$(".page-work").length&&$(".square").length&&environics.makeSquare(),$(".grid").length&&$(window).width()<768&&$(".page-work").length&&$(".square").css("height","auto"),$(window).resize(function(){$(window).width()>768&&!$(".page-work").length&&$(".square").length&&environics.makeSquare(),$(window).width()<=480&&!$(".page-work").length&&$(".square").css("height","auto"),$(".grid").length&&$(window).width()>=768&&$(".page-work").length&&environics.makeSquare(),$(".grid").length&&$(window).width()<768&&$(".page-work").length&&$(".square").css("height","auto"),$(".filler-span").length&&environics.resizeFiller(),$(".team-gallery").length&&environics.makeTeamSquare()}),$(".team-gallery").length&&environics.makeTeamSquare(),$(".filler-span").length&&environics.resizeFiller(),$(".team-gallery").length&&environics.activateTeam(),$(".page-home .featured").length&&environics.caseSlideIn(),$(".dropdown-gallery").length&&environics.activateDropdown(),$(".grid").length&&environics.masonry(),$("iframe").length,$(".social-share").length&&environics.socialShare(),$("#commentform").length&&environics.commentError(),$(window).width()<=768&&$(".sub-nav-container").length&&environics.subnavWidth(),$(window).resize(function(){$(window).width()<=768&&$(".sub-nav-container").length&&environics.subnavWidth(),$(window).width()>768&&$(".sub-nav-container").length&&($(".sub-nav").css("width","auto"),$(".page-home .sub-nav-container p").css("width","90%"))}),$(".form-container").length&&$('a[href^="#"]').on("click",function(e){var n=$(this.getAttribute("href"));n.length&&(e.preventDefault(),$("html, body").stop().animate({scrollTop:n.offset().top},1e3))})},environics.displayFilename=function(){$(".upload").focus(function(){$(this).parents(".frm_single_upload").next().addClass("focused")}),$(".upload").focusout(function(){$(this).parents(".frm_single_upload").next().removeClass("focused")}),$(".upload").change(function(){var e=$(this).parents(".frm_single_upload").next(),n=$(this).val();n=n.split("\\").pop(),e.html(n)})},environics.makeSquare=function(e){var n;n=e?e+" .square":".square",$(n).each(function(){var e=$(this).outerWidth();$(this).css("height",e)})},environics.makeTeamSquare=function(e){var n;n=e?e+" .square":".team-square",$(n).each(function(){var e=$(this).outerWidth();$(this).css("height",e)})},environics.tabModal=function(e){$(".site-content a, .site-footer a, button, input, textarea").attr("tabindex",e)},environics.showMenu=function(){$(".hamburger-container").on("click",function(){$(this).hasClass("close")?($(this).removeClass("close"),$(".nav-container").removeClass("show").addClass("hide"),$(".menu-item").removeClass("active").addClass("passive"),document.ontouchmove=function(){return!0},environics.tabModal(1)):($(".nav-container").addClass("show").removeClass("hide"),$(".hamburger-container").addClass("close"),$(".menu-item").addClass("active").removeClass("passive"),document.ontouchmove=function(e){e.preventDefault()},environics.tabModal(-1))}),$(".hamburger-container").keypress(function(e){var n=e.which;13===n&&($(this).hasClass("close")?($(this).removeClass("close"),$(".nav-container").removeClass("show").addClass("hide"),$(".menu-item").removeClass("active").addClass("passive"),document.ontouchmove=function(){return!0},$("body").removeClass("no-overflow"),environics.tabModal(1)):($(".nav-container").addClass("show").removeClass("hide"),$(".hamburger-container").addClass("close"),$(".menu-item").addClass("active").removeClass("passive"),document.ontouchmove=function(e){e.preventDefault()},$("body").addClass("no-overflow"),environics.tabModal(-1)))})},$(".no-overflow").on("touchmove",function(e){e.preventDefault()}),environics.fullStory=function(){$(".divider button").on("click",function(){var e=$(this).next();$("html, body").animate({scrollTop:$(e).offset().top+28},1e3)})},environics.activateTeam=function(){},environics.activateDropdown=function(){var e;$(".dropdown-item").on("click",function(n){n.stopPropagation();var o,i=this,t=0,a=0;if($(this).parent().find(".dropdown-item").each(function(){return $(this).is(i)?(t++,!1):void t++}),$(this).parent().find(".dropdown-item").each(function(){a++}),$(this).hasClass("active"))$(this).removeClass("active"),$(".dropdown").remove();else{$(".dropdown-item").removeClass("active"),$(i).addClass("active"),e=2,$(window).width()>768&&(e=3),$(this).parents(".team-container").length&&(e=3),o=Math.ceil(t/e)*e-1;var s=$(this),r='<article class="dropdown" style="display: block">';r+=$(this).children(".dropdown-content").html(),r+="</article>";var c=$(this).parent().children(".dropdown-item").eq(o);$(".dropdown").length?$(".dropdown").fadeOut("fast",function(){$(this).remove(),c.length?c.after(r):s.parent().children().eq(a-1).after(r),environics.closeDropdown()}):(c.length?c.after(r):s.parent().children().eq(a-1).after(r),environics.closeDropdown())}}),$(".dropdown-item").keypress(function(e){var n=e.which;13===n&&$(this).click()})},environics.closeDropdown=function(){$(".dropdown .close").on("click",function(){$(".dropdown-item").removeClass("active"),$(".team-member").removeClass("active"),$(".dropdown").remove()})},environics.accordion=function(){var e=$(".accordion").height();$(".accordion-row").css("height",e),$(".accordion-row").on("click",function(){$(this).addClass("active"),$(this).siblings().addClass("hide")}),$(".accordion-row .close").on("click",function(e){$(".accordion-row").removeClass("active hide"),e.stopPropagation()})},environics.masonry=function(){$(window).scroll(function(){var e=$(window).scrollTop()+$(window).height();$(".masonry-tile").each(function(){!$(this).hasClass("shown")&&e>=$(this).offset().top&&$(this).addClass("animate")})}),$(".sub-nav li a").on("click",function(e){e.preventDefault();var n=$(this);n.hasClass("active")||alm_is_animating||(alm_is_animating=!0,n.parent().addClass("active").siblings("li").removeClass("active"));var o=n.data(),i="fade",t="300";return $.fn.almFilter(i,t,o),!1})},environics.nextInterval=null,environics.loadWhatsHappeningToday=function(){var e=$(".dot"),n=$(".wht-moment");e.length>1?(n.eq(0).addClass("active"),environics.animateMoment(n.eq(0)),environics.positionMoments(),environics.animateProgressBar(),e.eq(0).addClass("active"),e.eq(1).addClass("next"),environics.positionDots(),environics.nextInterval=setInterval(environics.whatsHappeningNext,5e3),e.on("click",environics.whatsHappeningSelected)):1===e.length?(e.css("display","none"),$(".progress-bar").css("display","none")):$(".banner").css("display","none")},environics.animateMoment=function(e){e.fadeIn(500).delay(4e3).fadeOut(500)},environics.whatsHappeningNext=function(){var e=$(".dot"),n=$(".wht-moment"),o=$(".dot.next"),i;environics.animateDots(),$(".dot.active").removeClass("active"),o.addClass("active").removeClass("next"),o.is(e.last())?e.first().addClass("next"):o.next().next().addClass("next"),n.removeClass("active"),i=$(".dot.active").prev(),i.addClass("active"),environics.animateMoment(i),environics.animateProgressBar(),environics.positionMoments()},environics.animateDots=function(){var e=0,n=8,o=Math.floor($(".dot.active").position().left),i=Math.floor($(".next").position().left),t=Math.abs(i-o)+n;e=i<o?i:o,$(".superdot").css("left",o).animate({left:e,width:t},500,function(){$(".superdot").animate({left:i,width:n},100)})},environics.whatsHappeningSelected=function(){var e=$(".dot"),n=$(".wht-moment"),o;n.removeClass("active").stop(),clearInterval(environics.nextInterval),$(".progress-bar").stop().fadeOut(100).css("width","0%"),e.removeClass("next"),$(this).addClass("next"),environics.animateDots(),e.removeClass("active"),$(this).addClass("active").removeClass("next"),$(this).is(e.last())?e.first().addClass("next"):$(this).next().next().addClass("next"),o=$(".dot.active").prev(),o.addClass("active"),environics.animateMoment(o),environics.animateProgressBar(),environics.positionMoments(),environics.nextInterval=setInterval(environics.whatsHappeningNext,5e3)},environics.positionMoments=function(){var e=$(".wht-title"),n=$(".wht-moment.active"),o=$(".whats-happening-today").width(),i=(o-(e.width()+n.width()))/2,t=i+e.width(),a=(o-n.outerWidth())/2;$(window).width()<688?n.css("left",a):(e.css("left",i),n.css("left",t))},environics.positionDots=function(){$(".dot").each(function(e){$(this).css({left:16*e+"px"})}),environics.positionSuperDot()},environics.positionSuperDot=function(){$(".superdot").css("left",$(".dot.active").position().left)},environics.animateProgressBar=function(){$(".progress-bar").fadeIn(500).animate({width:"100%"},4e3,function(){$(".progress-bar").fadeOut(500,function(){$(".progress-bar").css("width","0%")})})},environics.caseSlideIn=function(){var e=$(window).scrollTop()+$(window).height(),n=$(".page-home .featured .box");n.each(function(){e>=$(this).offset().top&&$(this).addClass("scrolled")}),$(window).scroll(function(){var o;for(o=1;o<n.length+1;++o){var i=$("#featured-box-"+o).offset(),t=$("#featured-box-"+o).height()/2;e=$(window).scrollTop()+$(window).height(),e>=i.top+t&&$("#featured-box-"+o).addClass("scrolled")}})},environics.flickity=function(){$(".img-container.images").flickity({cellAlign:"left",watchCSS:!0})},environics.socialShare=function(){$(".socialShareLink").click(function(e){e.preventDefault();var n=window.open($(this).attr("href"),"","height=436,width=626");window.focus&&n.focus()})},environics.videoModal=function(){var e=$(".video-wrapper");$(e).html($(e).data("iframe")),environics.fluidVids(),$(".videoPlay").on("click",function(e){e.preventDefault();var n=$(this).parents(".video-container"),o=$(n).find(".video-wrapper");$(o).html($(o).data("iframe"));var i=$(n).find(".modal");$(i).fadeIn(),document.ontouchmove=function(e){e.preventDefault()},$("body").addClass("no-overflow"),environics.fluidVids(),environics.tabModal(-1)});var n=function(){$(".video-wrapper").find("iframe").remove(),$(".video-container .modal").fadeOut("fast"),document.ontouchmove=function(){return!0},$("body").removeClass("no-overflow"),environics.tabModal(1)};$(".modal .close").on("click",function(){n()}),$(".video-container .modal").on("click",function(){n()}),$(".modal .close").keypress(function(e){var o=e.which;13===o&&n()}),$(document).keyup(function(e){27===e.keyCode&&(e.stopPropagation(),n())}),$(".video-wrapper").click(function(e){e.stopPropagation()})},environics.infographicModal=function(){$(".infographic-image").on("click",function(e){e.preventDefault(),$(this).next().fadeIn(),document.ontouchmove=function(e){e.preventDefault()},$("body").addClass("no-overflow"),environics.tabModal(-1)});var e=function(){$(".infographic-block .modal").fadeOut("fast"),document.ontouchmove=function(){return!0},$("body").removeClass("no-overflow"),environics.tabModal(1)};$(".modal .close").on("click",e),$(".infographic-block .modal").on("click",e),$(".modal .close").keypress(function(n){var o=n.which;13===o&&e()}),$(document).keyup(function(n){27===n.keyCode&&(n.stopPropagation(),e())}),$(".infographic-wrapper").click(function(e){e.stopPropagation()})},environics.embedModal=function(){$(".copy-box").hide(),$(".embed-infographic").on("click",function(e){e.preventDefault(),$(this).next().show()}),$(".copy-box .close").on("click",function(){$(this).parent().hide(),$(".fa-check").css("opacity","0"),$(".copy-inside").css("opacity","1")}),$(".copy-box .close").keypress(function(n){var o=n.which;13===o&&($(".copy-box").hide(),e())}),$(document).keyup(function(n){27===n.keyCode&&(n.stopPropagation(),$(".copy-box").hide(),e())}),$(".embed-success").on("click",function(){document.querySelector(".embed-link").select(),document.execCommand("copy"),$(".fa-check").css("opacity","1"),$(".copy-inside").css("opacity","0")});var e=function(){$(".fa-check").css("opacity","0"),$(".copy-inside").css("opacity","1")}},environics.formModal=function(){$("#getReport").on("click",function(e){e.preventDefault(),$(".report-form").fadeIn(),document.ontouchmove=function(e){e.preventDefault()},$("body").addClass("no-overflow"),environics.tabModal(-1)});var e=function(){$(".report-form").fadeOut("fast"),document.ontouchmove=function(){return!0},$("body").removeClass("no-overflow"),environics.tabModal(1)};$(".modal .close").on("click",function(){e()}),$(".modal .close").keypress(function(n){var o=n.which;13===o&&e()}),$(document).keyup(function(n){27===n.keyCode&&(n.stopPropagation(),e())})},environics.commentError=function(){$("#commentform").submit(function(e){var n=$("#email").val(),o=/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;o.test(n)&&""!==$.trim($("#email").val())?""===$.trim($("#author").val())?($(".comment-form-author").append('<p class="comment-noval">Please enter your name</p>'),e.preventDefault()):""===$.trim($("#comment").val())&&($(".comment-form-comment").append('<p class="comment-noval">Please enter some text</p>'),e.preventDefault()):($(".comment-form-email").append('<p class="comment-noval">Please enter a valid email</p>'),e.preventDefault())})},environics.resizeFiller=function(){var e=$(".filler-span").prev().find("img").height();$(".filler-span").css("height",e)},environics.subnavWidth=function(){var e=0,n=30;$(".sub-nav-container").length&&($(".sub-nav-container li").each(function(){e+=Math.ceil($(this).outerWidth(!0))}),$(".sub-nav").css("width",e+n)),$(".page-home").length&&($(".sub-nav-container span:visible").each(function(){e+=$(this).width()}),$(".sub-nav-container p").css("width",e+n))},environics.fluidVids=function(){for(var e=document.getElementsByTagName("iframe"),n=0;n<e.length;n++){var o=e[n],i=/www.youtube.com|player.vimeo.com/,t=o.src;if(t.search(i)!==-1){o.src="";var a=o.height/o.width*100;o.style.position="absolute",o.style.top="0",o.style.left="0",o.width="100%",o.height="100%",o.webkitallowfullscreen="true",o.mozallowfullscreen="true",o.allowfullscreen="true";var s=document.createElement("div");s.className="video-wrap",s.style.width="100%",s.style.position="relative",s.style.paddingTop=a+"%";var r=o.parentNode;r.insertBefore(s,o),s.appendChild(o);var c;if(t.indexOf("youtube")!==-1&&$(".modal").length&&(c="wmode=transparent&autoplay=1"),t.indexOf("youtube")===-1||$(".modal").length||(c="wmode=transparent"),t.indexOf("vimeo")!==-1&&$(".modal").length&&(c="autoplay=1"),t.indexOf("?")!==-1){var l=t.split("?"),d=l[1],v=l[0];t=v+"?"+c+"&"+d}else t=t+"?"+c;o.src=t}}};