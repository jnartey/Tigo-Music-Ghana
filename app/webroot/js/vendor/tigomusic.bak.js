//Custom Deezer player by Jacob Nartey	
$(document).ready(function() {
	
	$("#controls input").attr('disabled', true);

	$("#slider_seek").click(function(evt, arg) {
		var left = evt.offsetX;
		DZ.player.seek((evt.offsetX / $(this).width()) * 100);
	});

});

function addStyleAttribute($element, styleAttribute) {
    $element.attr('style', $element.attr('style') + '; ' + styleAttribute);
}

//Format numbers less than 9 to 2 digits
function twoDigits(n) {
	return n > 9 ? "" + n : "0" + n;
}

//convert seconds to minutes and seconds


function secondsToTime(secs) {
	var hours = Math.floor(secs / (60 * 60));

	var divisor_for_minutes = secs % (60 * 60);
	var minutes = Math.floor(divisor_for_minutes / 60);

	var divisor_for_seconds = divisor_for_minutes % 60;
	var seconds = Math.ceil(divisor_for_seconds);

	return minutes + ':' + twoDigits(seconds);
}

$('#controls #play').on('click', function() {
	DZ.player.play();
});

$('#controls #pause').on('click', function() {
	DZ.player.pause();
});

$('#controls #play').on('click', function() {
	DZ.player.play();
});

$('#controls #pause').on('click', function() {
	DZ.player.pause();
});

$('#controls #previous').on('click', function() {
	DZ.player.prev();
});

$('#controls #next').on('click', function() {
	DZ.player.next();
});

$('#deezer-volume #sound').on('click', function() {
	DZ.player.setVolume(0);
	$('#d-volume').val("0");
	$('#deezer-volume #sound').hide();
	$('#deezer-volume #mute').show();
});

$('#deezer-volume #mute').on('click', function() {
	DZ.player.setVolume(50);
	$('#d-volume').val("50");
	$('#deezer-volume #mute').hide();
	$('#deezer-volume #sound').show();
});

$('#deezer-volume #repeat-i').on('click', function() {
	DZ.player.setRepeat(1);
	$('#deezer-volume #repeat').show();
	$('#deezer-volume #repeat-i').hide();
	$('#deezer-volume #repeat-one').hide();
});

$('#deezer-volume #repeat').on('click', function() {
	DZ.player.setRepeat(2);
	$('#deezer-volume #repeat').hide();
	$('#deezer-volume #repeat-i').hide();
	$('#deezer-volume #repeat-one').show();
});

$('#deezer-volume #repeat-one').on('click', function() {
	DZ.player.setRepeat(0);
	$('#deezer-volume #repeat').hide();
	$('#deezer-volume #repeat-i').show();
	$('#deezer-volume #repeat-one').hide();
});

$('#playing #slider_seek').on('click', function(e) {
	var slider = $(e.delegateTarget);
	var x = e.clientX - slider.offset().left;
	var xMax = slider.width();
	DZ.player.seek(x / xMax * 100);
});

$("#d-volume").bind("slider:changed", function(event, data) {
	// The currently selected value of the slider
	DZ.player.setVolume(data.value);

	if (data.value == 0) {
		$('#deezer-volume #mute').show();
		$('#deezer-volume #sound').hide();
	}

	if (data.value > 0) {
		$('#deezer-volume #mute').hide();
		$('#deezer-volume #sound').show();
	}
});

function onPlayerLoaded() {

	$("#controls input").attr('disabled', false);
	//event_listener_append('player_loaded');
/*DZ.Event.subscribe('player_buffering', function(arg) {
		$('#playing').html('loading...');
	});*/

	DZ.player.setVolume(50);

	DZ.Event.subscribe('player_play', function(e) {
		$('#controls #play').hide();
		$('#controls #pause').show();
	});

	DZ.Event.subscribe('player_paused', function(e) {
		$('#controls #play').show();
		$('#controls #pause').hide();
	});


	DZ.Event.subscribe('current_track', function(arg) {

		var time = arg.track.duration;

		//event_listener_append('current_track', arg.index, arg.track.title, arg.track.album.title);
		$('#playing #playing_meta').html('<span>' + arg.track.title + ' - ' + arg.track.artist.name + '</span>');



		//Displaying total duration and converting duration to minutes and seconds
		if (time && time > 0.0) {
			var sec = parseInt(time % 60);
			$('#times #time_total').html(parseInt(time / 60) + ':' + (sec < 10 ? '0' + sec : sec));
		} else {
			$('#times #time_total').html('0.00');
		}

	});

	DZ.Event.subscribe('player_position', function(arg) {
		//event_listener_append('position', arg[0], arg[1]);
		$('#times #time_current').html(secondsToTime(arg[0]));

		$("#playing #slider_seek").find('.bar').css('width', (100 * arg[0] / arg[1]) + '%');
	});


	DZ.Event.subscribe('track_end', function(arg) {
		//event_listener_append('track_end');
		$('#controls #play').show();
		$('#controls #pause').hide();
		$('.fa-play').show();
		$('.fa-pause').hide();
		$(".cap-overlay-current").addClass('cap-overlay');
		$(".cap-overlay-current").removeClass('cap-overlay-current');
		$(".cap-overlay").hide();
	});
}

$('body').on('click', '.playlist-item .fa-play, .playlist-l-item .fa-play', function() {
	DZ.player.play();

	$('.fa-play').show();
	$('.fa-pause').hide();
	$(".cap-overlay-current").addClass('cap-overlay');
	$(".cap-overlay-current").removeClass('cap-overlay-current');

	$(this).parent().parent().find('.fa-play').hide();
	//addStyleAttribute($(this).parent().find('.fa-play.flash-support'), 'display: none !important');
	//addStyleAttribute($(this).parent().find('.fa-play.no-flash'), 'display: none !important');
	$(this).parent().parent().find('.fa-pause').show();
	$(this).parent().parent().addClass('cap-overlay-current');
	$(this).parent().parent().removeClass('cap-overlay');
	$(".cap-overlay").hide();
	//$(this).parent().find(".cap-overlay-current").show();

});

$('body').on('click', '.playlist-item .fa-pause, .playlist-l-item .fa-pause', function() {
	DZ.player.play();

	//$(".cap-overlay-current").addClass('cap-overlay');
	//$(".cap-overlay-current").removeClass('cap-overlay-current');
	$(this).parent().parent().find('.fa-play').show();
	$(this).parent().parent().find('.fa-pause').hide();
	//addStyleAttribute($(this).parent().find('.fa-play.flash-support'), 'display: block !important');
	//addStyleAttribute($(this).parent().find('.fa-play.no-flash'), 'display: none !important');
	$(this).parent().parent().addClass('cap-overlay');
	$(this).parent().parent().removeClass('cap-overlay-current');
	$(this).parent().parent().find(".cap-overlay").show();
	//$(this).parent().find(".cap-overlay-current").show();

});

//Layerslider plugin
jQuery("#layerslider").layerSlider({
	responsive: false,
	responsiveUnder: 960,
	layersContainer: 960,
	skin: 'fullwidth',
	hoverPrevNext: false,
	skinsPath: './layerslider/skins/'
});

//WOW animations plugin
// wow = new WOW(
//   {
//     animateClass: 'animated',
//     offset:       100
//   }
// );
// wow.init();

$(function() {
	//Animsition plugin
	// $(".animsition").animsition({
	//     inClass               :   'fade-in',
	//     outClass              :   'fade-out',
	//     inDuration            :    1500,
	//     outDuration           :    800,
	//     linkElement           :   '.animsition-link', 
	//     loading               :    true,
	//     loadingParentElement  :   'body', //animsition wrapper element
	//     loadingClass          :   'animsition-loading',
	//     unSupportCss          : [ 'animation-duration',
	//                               '-webkit-animation-duration',
	//                               '-o-animation-duration'
	//                             ],
	//     //"unSupportCss" option allows you to disable the "animsition" in case the css property in the array is not supported by your browser. 
	//     //The default setting is to disable the "animsition" in a browser that does not support "animation-duration".
	// 
	//     overlay               :   false,
	// 
	//     overlayClass          :   'animsition-overlay-slide',
	//     overlayParentElement  :   'body'
	//   });
	// 
	// //News ticker plugin
	// 	$('.news-ticker').easyTicker({
	// 		direction: 'up',
	// 		easing: 'swing',
	// 		speed: 'slow',
	// 		interval: 8000,
	// 		height: 'auto',
	// 		visible: 4,
	// 		mousePause: 1,
	// 		controls: {
	// 			up: '',
	// 			down: '',
	// 			toggle: '',
	// 			playText: 'Play',
	// 			stopText: 'Stop'
	// 		}
	// 	});
	//Playing meta marquee
	$('.marquee').marquee({
		duplicated: true,
		pauseOnHover: true,
		gap: 50,
		duration: 7000
	});

	// First setup a router which will be the responder for URL changes:
	var AppRouter = Backbone.Router.extend({

		routes: {
			"*path": "load_content",
			"*actions": "defaultRoute",
			"/" : "load_content",
			"" : "load_content" 
		},

		load_content: function(path) {
			$('#load-page').show();
			$('#load-page').html("<p id='page-loading'>...loading...</p>");
			//hideLoader();
			//var toLoad = $(this).attr('href');
			//$('#load-page').fadeIn('slow', loadContent('#load-page', path));
						
			if(!path) {
				path = 'pages/index';
			}
			
			if(path.hash){
				path = path.replace("#","");
			}

			loadContent('#load-page', '/' + path);
			
			//ga('send', 'pageview');
			ga('send', 'pageview', {'page': '/' + path});
			
			return false;
		}

	});

	var appRouter = new AppRouter;

	// Then initialize Backbone's history
	//Backbone.history.start({pushState: true, root: "/"});
	$(function(event){
		if (!(window.history && history.pushState)) {
		
			Backbone.history.start({
				pushState: false,
				silent: false,
				root: '/'
			});
		
			var fragment = window.location.pathname.substr(Backbone.history.options.root.length);
			Backbone.history.navigate(fragment, { trigger: true });
		
		} else {
			Backbone.history.start({
				pushState: true
			});
		}
	});
	
	// $(function(){
	// 		  new WorkspaceRouter();
	// 		  new HelpPaneRouter();
	// 		  Backbone.history.start({pushState: true, root: "/"});
	// 		});

	$('.main-menu .top-bar .top-bar-section ul li a').on('click', function(event) {
		event.preventDefault();
		Backbone.history.navigate(event.currentTarget.pathname, {
			trigger: true
		});
		$('.top-bar .top-bar-section ul li').removeClass("active");
		$(this).parent().addClass("active");
		$(this).parent().parent().parent().addClass("active");
	});

	$('.logo h1 a').on('click', function(event) {
		event.preventDefault();
		Backbone.history.navigate(event.currentTarget.pathname, {
			trigger: true
		});
		$('.top-bar .top-bar-section ul li').removeClass("active");
		$('.top-bar .top-bar-section ul li.home-target').addClass("active");
		$('.top-bar .top-bar-section ul li.home-target').addClass("active");
	});

	$('body').on('click', "a[class*='d-menu']", function(event) {
		event.preventDefault();
		Backbone.history.navigate(event.currentTarget.pathname, {
			trigger: true
		});
		$("a[class*='d-menu']").removeClass("active");
		$(this).parent().addClass("active");
	});

	$('body').on('click', ".pagination span[class*='d-menu'] a", function(event) {
		event.preventDefault();
		Backbone.history.navigate(event.currentTarget.pathname, {
			trigger: true
		});
		$(".pagination span[class*='d-menu'] a").removeClass("current");
		$(this).parent().addClass("current");
	});
	
	var wds = $('body').width();
	
	if(wds < 800){
		$('body').on('click', ".top-bar-section ul li a", function(event) {
	        $('.toggle-topbar').click();
	    });
	}
	
	/************************************************************************
	Play mp4 videos with mediaelement.js in fancyBox
	Francisco Diaz (JFK) / picssel.com
	Version 1.0
	************************************************************************/
	// Detecting IE more effectively : http://msdn.microsoft.com/en-us/library/ms537509.aspx
	function getInternetExplorerVersion() {
	    // Returns the version of Internet Explorer or -1 (other browser)
	    var rv = -1; // Return value assumes failure.
	    if (navigator.appName == 'Microsoft Internet Explorer') {
	        var ua = navigator.userAgent;
	        var re = new RegExp("MSIE ([0-9]{1,}[\.0-9]{0,})");
	        if (re.exec(ua) != null)
	            rv = parseFloat(RegExp.$1);
	    };
	    return rv;
	};
	// set some general variables
	var $video_player, _videoHref, _videoPoster, _videoWidth, _videoHeight, _dataCaption, _player, _isPlaying = false, _dataYoutube, _verIE = getInternetExplorerVersion();
	jQuery(document).ready(function ($) {  
	    jQuery(".fancy_video")
		.attr('rel', 'videos')
	    .prepend("<span class=\"playbutton\"/>") //cosmetic : append a play button image
	    .fancybox({
	        // set type of content (remember, we are building the HTML5 <video> tag as content)
	        type       : "html",
	        // other API options
	        scrolling  : "no",
			width	   : '100%',
			maxWidth   : 600,
			maxHeight  : 340,
	        padding    : 0,
	        nextEffect : "fade",
	        prevEffect : "fade",
	        nextSpeed  : 0,
	        prevSpeed  : 0,
	        fitToView  : false,
	        autoSize   : false,
	        modal      : true, // hide default close and navigation buttons
	        helpers    : {
	            title  : {
	                type : "over"
	            },
				//media : {},
	            buttons: {} // use buttons helpers so navigation button won't overlap video controls
				
	        },
	        beforeLoad : function () {
	            // if video is playing and we navigate to next/prev element of a fancyBox gallery
	            // safely remove Flash objects in IE
	            if (_isPlaying && (_verIE > -1)) {
	                // video is playing AND we are using IE
	                _verIE < 9.0 ? _player.remove() : $video_player.remove(); // remove player instance for IE
	                _isPlaying = false; // reinitialize flag
	            };
	            // build the HTML5 video structure for fancyBox content with specific parameters
	            _videoHref   = this.href;
	            // validates if data values were passed otherwise set defaults
	            _videoPoster = typeof this.element.data("poster")  !== "undefined" ? this.element.data("poster")  :  "";
	            _videoWidth  = typeof this.element.data("width")   !== "undefined" ? this.element.data("width")   : 360;
	            _videoHeight = typeof this.element.data("height")  !== "undefined" ? this.element.data("height")  : 360;
	            _dataCaption = typeof this.element.data("caption") !== "undefined" ? this.element.data("caption") :  "";
				_dataYoutube = typeof this.element.data("youtube") !== "undefined" ? this.element.data("youtube") :  "";
	            // construct fancyBox title (optional)
	            this.title = _dataCaption ? _dataCaption : (this.title ? this.title : "");
					
				if(_dataYoutube == 'on'){
					// set fancyBox content and pass parameters
					this.content = "<video id='video_player' src='" + _videoHref + "' style='width:100%;height:100%;' width='100%' height='100%' controls='controls' type='video/youtube' preload='none' autoplay='true'></video>";
				}else{
					// set fancyBox content and pass parameters
		            this.content = "<video id='video_player' src='" + _videoHref + "'  poster='" + _videoPoster + "' style='width:100%;height:100%;' width='100%' height='100%' controls='controls' preload='none' ></video>";
				}
	            
	            // set fancyBox dimensions
	            //this.width = _videoWidth;
	            //this.height = _videoHeight;
	        },
	        afterShow : function () {
	            // initialize MEJS player
	            var $video_player = new MediaElementPlayer('#video_player', {
	                    defaultVideoWidth : this.width,
	                    defaultVideoHeight : this.height,
	                    success : function (mediaElement, domObject) {
	                        _player = mediaElement; // override the "mediaElement" instance to be used outside the success setting
	                        _player.load(); // fixes webkit firing any method before player is ready
	                        _player.play(); // autoplay video (optional)
	                        _player.addEventListener('playing', function () {
	                            _isPlaying = true;
	                        }, false);
	                    } // success
	                });
	        },
	        beforeClose : function () {
	            // if video is playing and we close fancyBox
	            // safely remove Flash objects in IE
	            if (_isPlaying && (_verIE > -1)) {
	                // video is playing AND we are using IE
	                _verIE < 9.0 ? _player.remove() : $video_player.remove(); // remove player instance for IE
	                _isPlaying = false; // reinitialize flag
	            };
	        }
	    });
	}); // ready

	function loadContent(target, toLoad) {
		$(target).load(toLoad, '', function(response, status, xhr) {
			if (status == 'error') {
				if (xhr.status == 0) {
					var msg = "<p id='page-loading'>Connection timed out, please check your internet connection</p>";
					$(target).html(msg);
				} else {
					var msg = "Sorry but there was an error: ";
					$(target).html(msg + xhr.status + " " + xhr.statusText);
				}
			}
			
			var a = !1,
			    b = "";

			function c(d) {
			    d = d.match(/[\d]+/g);
			    d.length = 3;
			    return d.join(".")
			}
			if (navigator.plugins && navigator.plugins.length) {
			    var e = navigator.plugins["Shockwave Flash"];
			    e && (a = !0, e.description && (b = c(e.description)));
			    navigator.plugins["Shockwave Flash 2.0"] && (a = !0, b = "2.0.0.11")
			} else {
			    if (navigator.mimeTypes && navigator.mimeTypes.length) {
			        var f = navigator.mimeTypes["application/x-shockwave-flash"];
			        (a = f && f.enabledPlugin) && (b = c(f.enabledPlugin.description))
			    } else {
			        try {
			            var g = new ActiveXObject("ShockwaveFlash.ShockwaveFlash.7"),
			                a = !0,
			                b = c(g.GetVariable("$version"))
			        } catch (h) {
			            try {
			                g = new ActiveXObject("ShockwaveFlash.ShockwaveFlash.6"), a = !0, b = "6.0.21"
			            } catch (i) {
			                try {
			                    g = new ActiveXObject("ShockwaveFlash.ShockwaveFlash"), a = !0, b = c(g.GetVariable("$version"))
			                } catch (j) {}
			            }
			        }
			    }
			}
			var k = b;
			if(a){
				//alert("flash version: " + k);
				addStyleAttribute($('.no-flash'), 'display: none !important');
				addStyleAttribute($('.flash-support'), 'display: block !important');
				//addStyleAttribute($('.flash-support'), 'display: block !important');
			}else{
				addStyleAttribute($('.no-flash'), 'display: block !important');
				addStyleAttribute($('.flash-support'), 'display: none !important');
				addStyleAttribute($('.notification'), 'display: block !important; z-index:9999;');
				//alert("no flash found");
			}

			//Layerslider plugin
			jQuery("#layerslider").layerSlider({
				responsive: false,
				responsiveUnder: 1024,
				layersContainer: 1024,
				skin: 'noskin',
				hoverPrevNext: false,
				skinsPath: './layerslider/skins/'
			});

			$('ul.links a').on('click', function() {
				var load_target = $(this).attr('href');
				$.scrollTo(load_target, 800, {
					offset: 0
				});
			});

			//Jquery hcaptions plugin
			// $('.hover-caption').hcaptions({
			// 		effect: "fade"
			// });
			// $('.event-caption').hcaptions({
			// 		effect: "fade"
			// });
			//Image hover overlay
			$('.playlist-item').hover(function() {
				$(".cap-overlay", this).fadeIn('slow');
			}, function() {
				$(".cap-overlay", this).fadeOut('slow');
			});

			$('.playlist-l-item').hover(function() {
				$(".cap-overlay", this).fadeIn('slow');
			}, function() {
				$(".cap-overlay", this).fadeOut('slow');
			});

			$('.music-item').hover(function() {
				$(".cap-overlay", this).fadeIn('slow');
			}, function() {
				$(".cap-overlay", this).fadeOut('slow');
			});

			$('.event-item').hover(function() {
				$(".event-overlay", this).fadeIn('slow');
			}, function() {
				$(".event-overlay", this).fadeOut('slow');
			});

			//News ticker plugin
			$('.news-ticker').easyTicker({
				direction: 'up',
				easing: 'swing',
				speed: 'slow',
				interval: 8000,
				height: 'auto',
				visible: 4,
				mousePause: 1,
				controls: {
					up: '',
					down: '',
					toggle: '',
					playText: 'Play',
					stopText: 'Stop'
				}
			});

			$('#dy-table').dataTable({
				searching: false,
				"pageLength": 20,
				"lengthMenu": [20, 40, 60, 80, 100]
			});

			var ws = $('.ws').width();
			$('.item-text').width(ws - 165);

			$(window).resize(function() { //Fires when window is resized
				var ws = $('.ws').width();
				$('.item-text').width(ws - 165);
			});

			var artist_info = $('.upcoming-artist-home').width();
			
			if($('body').width() < 801){
				$('.artist-info').width();
			}else{
				$('.artist-info').width(artist_info - 320);
			}

			$(window).resize(function() { //Fires when window is resized
				var artist_info = $('.upcoming-artist-home').width();
				
				if($('body').width() < 801){
					$('.artist-info').width();
				}else{
					$('.artist-info').width(artist_info - 320);
				}
			});
			var d_height = $('.banner-right').height();
			$('.banner-right').height(d_height);
			$('#layerslider').height(d_height);


			$(window).resize(function() { //Fires when window is resized
				var d_height = $('.banner-right').height();
				$('.banner-right').height(d_height);
				$('#layerslider').height(d_height);
			});
			
			twttr.widgets.load();
			
			$(document).foundation();
			
			var playerx, isPlayingx = false;

			// initialize MEJS player
			var video_playerx = new MediaElementPlayer('#player', {
					pluginPath: '/js/vendor/',
			        defaultVideoWidth : 600,
			        defaultVideoHeight : 400,
			        success : function (mediaElement, domObject) {
			            playerx = mediaElement; // override the "mediaElement" instance to be used outside the success setting
			            playerx.load(); // fixes webkit firing any method before player is ready
			            //playerx.play(); // autoplay video (optional)
			            playerx.addEventListener('playing', function () {
			                isPlayingx = true;
			            }, false);
			        } // success
			});

		});
	}

	function hideLoader() {
		$('#paging-loading').fadeOut('normal');
	}
		
	$(document).foundation();
});

