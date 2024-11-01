/* Tortoiz Addons for Elementor v3.1.0 */

!(function ($) {
	// Owl Carousel for some Slider or Carousel
	function tortoizAddonsOwl(owl) {
		var itemLg = owl.data('item-lg'),
			itemLg = itemLg ? itemLg : 2,
			itemMd = owl.data('item-md'),
			itemMd = itemMd ? itemMd : 2,
			itemSm = owl.data('item-sm'),
			itemSm = itemSm ? itemSm : 1,
			slideIn = owl.data('slide-anim'),
			slideOut = owl.data('slide-anim-out'),
			slideOut = 'none' == slideOut ? false : slideOut;
			slideIn = 'none' == slideIn ? false : slideIn,
			play = owl.data('autoplay') ? true : false,
			pause = owl.data('pause') ? true : false,
			center = owl.data('center') ? true : false,
			nav = owl.data('nav') ? true : false,
			dots = owl.data('dots') ? true : false,
			mouse = owl.data('mouse-drag') ? true : false,
			touch = owl.data('touch-drag') ? true : false,
			loop = owl.data('loop') ? true : false,
			speed = owl.data('speed'),
			speed = speed ? speed : 500,
			delay = owl.data('delay');

		// Initialize carousel
		owl.owlCarousel({
			animateOut: slideOut,
			animateIn: slideIn,
			autoplay: play,
			autoplayHoverPause: pause,
			center: center,
			nav: nav,
			dots: dots,
			mouseDrag: mouse,
			touchDrag: touch,
			loop: loop,
			smartSpeed: speed,
			autoplayTimeout: delay,
			responsive: {
				0: {
					items: itemSm
				},
				600: {
					items: itemMd
				},
				900: {
					items: itemLg
				},
			}
		});
	}


	function tortoizAddonsBrandCarousel($scope, $) {
		$scope.find('.tortoiz-addons-brand-carousel').each(function () {
			tortoizAddonsOwl( $(this) );
		});
	}

	function tortoizAddonsContentSlider($scope, $) {
		$scope.find('.tortoiz-addons-content-slider').each(function () {
			tortoizAddonsOwl( $(this) );
		});
	}

	function tortoizAddonsPostsCarousel($scope, $) {
		$scope.find('.tortoiz-addons-posts-carousel').each(function () {
			tortoizAddonsOwl( $(this) );
		});
	}

	function tortoizAddonsReviewCarousel($scope, $) {
		$scope.find('.tortoiz-addons-review-carousel').each(function () {
			tortoizAddonsOwl( $(this) );
		});
	}

	function tortoizAddonsAccordion($scope, $) {
		$scope.find('.tortoiz-addons-accordion').each(function () {
			var $this = $(this),
				openF = $this.data('open-first');

			$this.find('.tortoiz-addons-accordion-item').each(function(index, el) {
				var $item = $(this),
					$siblings = $item.siblings('.tortoiz-addons-accordion-item'),
					$header = $item.children('.tortoiz-addons-accordion-header'),
					$body = $item.children('.tortoiz-addons-accordion-body');

				if ( openF && 0 == index ) {
					$body.slideDown(200);
				}

				$header.on('click', function(e) {
					e.stopImmediatePropagation();

					$body.slideToggle(200);
					$siblings.children('.tortoiz-addons-accordion-body').slideUp(200);
					$item.toggleClass('open');
					$siblings.removeClass('open');
				});
			});
		});
	}

	function tortoizAddonsBannerSlider($scope, $) {
		$scope.find('.tortoiz-addons-banner-slider').each(function () {
			function doAnimations( elems ) {
				var animEndEv = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';

				elems.each(function () {
					var $this = $(this),
						$animationType = $this.data('animation');
						$this.removeClass('tortoiz-addons-anim-invisible');

					$this.addClass($animationType).one(animEndEv, function () {
						$this.removeClass($animationType);
					});
				});
			}

			var $this = $(this),
				play = $this.data('autoplay') ? true : false,
				pause = $this.data('pause') ? true : false,
				nav = $this.data('nav') ? true : false,
				dots = $this.data('dots') ? true : false,
				mouse = $this.data('mouse-drag') ? true : false,
				touch = $this.data('touch-drag') ? true : false,
				loop = $this.data('loop') ? true : false,
				partAnim = $this.data('part-anim'),
				speed = $this.data('speed'),
				speed = speed ? speed : 500,
				delay = $this.data('delay');

			//Initialize carousel
			$this.owlCarousel({
				autoplay: play,
				autoplayHoverPause: pause,
				nav: nav,
				dots: dots,
				mouseDrag: mouse,
				touchDrag: touch,
				loop: loop,
				smartSpeed: partAnim ? 5 : speed,
				navSpeed: partAnim ? 5 : speed,
				autoplaySpeed: speed,
				autoplayTimeout: delay,
				responsive: {
					0: {
						items: 1
					},
				}
			});

			if ( partAnim ) {
				var firstItem = $this.find('.owl-item.active').find("[data-animation ^= 'animated']");
				doAnimations( firstItem );

				var oldActive = [ $this.find('.owl-item.active') ];

				$this.on('translated.owl.carousel', function(e) {
					var newActive = $this.find('.owl-item.active');
					var elems = newActive.find("[data-animation ^= 'animated']");
					doAnimations( elems );

					oldActive.push( newActive );
					oldActive[0].find("[data-animation ^= 'animated']").each(function (index, el) {
						var el = $(this);
						el.addClass( 'tortoiz-addons-anim-invisible' );
					});
					oldActive.shift();
				});
			}

		});
	}

	function tortoizAddonsBlogpost($scope, $) {
		$scope.find('.tortoiz-addons-blogpost').each(function () {
			var $this = $(this),
				$isoGrid = $this.children('.tortoiz-addons-bp-grid');

			$this.imagesLoaded( function() {
				$isoGrid.isotope({
					itemSelector: '.tortoiz-addons-bp-col',
					percentPosition: true,
					masonry: {
						columnWidth: '.tortoiz-addons-bp-col',
					}
				});
			});

			var uid = $this.data('uid'),
				postsData = $this.data('posts-data'),
				totalPosts = postsData.total_posts,
				postsNum = postsData.posts_num,
				nonce = $this.find('#tortoiz_addons_load_more_posts'+uid),
				loadMore = $this.find('.tortoiz-addons-load-more'),
				btn = loadMore.children('.tortoiz-addons-load-more-btn'),
				btn = loadMore.children('.tortoiz-addons-load-more-btn'),
				btnText = btn.html();

			btn.on('click', function(e) {
				var offset = $this.data('offset');
				btn.html('Loading...');
				$.post(
					tortoizAddonsAjax.ajaxURL,
					{
						action: "tortoiz_addons_load_more_posts",
						posts_data: JSON.stringify(postsData),
						offset: offset,
						nonce: nonce.val(),
					},
					function( data, status, code ) {
						if ( status == 'success' ) {
							var $items = $(data).find('.tortoiz-addons-bp-col');
							$isoGrid.append($items);
							imagesLoaded($isoGrid, function() {
							    $isoGrid.isotope('appended', $items);
							});

							if ( offset >= (totalPosts - postsNum) ) {
								loadMore.remove()
							}

							btn.html(btnText);
							$this.data('offset', offset + postsNum);
						}
					}
				);
			});

		});
	}

	function tortoizAddonsContactForm($scope, $) {
		$scope.find('.tortoiz-addons-contact-form').each(function () {
			var $this = $(this),
				$uid = $this.data('uid'),
				$inbox = $this.data('inbox'),
				$nonce = $this.children('#tortoiz_addons_contact_nonce'+$uid),
				$success = $this.children('.tortoiz-addons-contact-success'),
				$error = $this.children('.tortoiz-addons-contact-error'),
				$process = $this.children('.tortoiz-addons-contact-process'),
				$name = $this.find('.tortoiz-addons-input-name'),
				$email = $this.find('.tortoiz-addons-input-email'),
				$subject = $this.find('.tortoiz-addons-input-subject'),
				$message = $this.find('.tortoiz-addons-input-message'),
				timeout;

			$this.on('submit', function(e) {
				e.preventDefault();
				clearTimeout(timeout);

				$error.fadeOut(0);
				$success.fadeOut(0);
				$process.fadeIn(200);

				$.post(
					tortoizAddonsAjax.ajaxURL,
					{
						action: "tortoiz_addons_contact",
						inbox: $inbox,
						name: $name.val(),
						email: $email.val(),
						subject: $subject.val(),
						message: $message.val(),
						nonce: $nonce.val(),
					},
					function( data, status, code ) {
						if ( status == 'success' ) {
							if ( data ) {
								$process.fadeOut(0);
								$error.html( data ).fadeIn(200);

								timeout = setTimeout( function() {
									$error.fadeOut(200);
								}, 10000 );
							} else{
								$process.fadeOut(0);
								$success.html( "Thanks for sending Email!" ).fadeIn(200);

								timeout = setTimeout( function() {
									$success.fadeOut(200);
								}, 10000 );
							}
						}
					}
				);

			});
		});
	}

	function tortoizAddonsLoginForm($scope, $) {
		$scope.find('.tortoiz-addons-login-form').each(function () {
			var $this = $(this),
				$uid = $this.data('uid'),
				$url = $this.data('url'),
				$nonce = $this.children('#tortoiz_addons_login_nonce'+$uid),
				$error = $this.children('.tortoiz-addons-login-error'),
				$password = $this.children('.tortoiz-addons-input-password'),
				$email = $this.children('.tortoiz-addons-input-email'),
				$remember = $this.find('.tortoiz-addons-login-remember'),
				timeout;


			$this.on('submit', function(e) {
				e.preventDefault();
				clearTimeout(timeout);

				$error.fadeOut(0);

				$.post(
					tortoizAddonsAjax.ajaxURL,
					{
						action: "tortoiz_addons_login",
						password: $password.val(),
						email: $email.val(),
						remember: $remember.prop('checked'),
						nonce: $nonce.val(),
					},
					function( data, status, code ) {
						if ( status == 'success' ) {
							if ( data ) {
								$error.html( data ).fadeIn(200);

								timeout = setTimeout( function() {
									$error.fadeOut(200);
								}, 10000 );
							} else{
								location.href = $url;
							}
						}
					}
				);
			});
		});
	}

	function tortoizAddonsMCSubscribe($scope, $) {
		$scope.find('.tortoiz-addons-subs-form').each(function () {
			var $this = $(this),
				$uid = $this.data('uid'),
				$nonce = $this.find('#tortoiz_addons_mc_subscribe_nonce'+$uid),
				$fname = $this.find('.tortoiz-addons-input-fname'),
				$lname = $this.find('.tortoiz-addons-input-lname'),
				$email = $this.find('.tortoiz-addons-input-email'),
				$phone = $this.find('.tortoiz-addons-input-phone'),
				$success = $this.children('.tortoiz-addons-subs-success'),
				$error = $this.children('.tortoiz-addons-subs-error'),
				$process = $this.children('.tortoiz-addons-subs-process'),
				timeout;

			$this.on('submit', function(e) {
				e.preventDefault();
				clearTimeout(timeout);

				$error.fadeOut(0);
				$success.fadeOut(0);
				$process.fadeIn(200);


				$.post(
					tortoizAddonsAjax.ajaxURL,
					{
						action: "tortoiz_addons_mc_subscribe",
						fname: $fname.val() || ' ',
						lname: $lname.val() || ' ',
						phone: $phone.val() || ' ',
						email: $email.val(),
						nonce: $nonce.val(),
					},
					function( data, status, code ) {
						if ( status == 'success' ) {
							if ( 'success' == data ) {
								$process.fadeOut(0);
								$success.html( "Thanks for subscribed!" ).fadeIn(200);

								timeout = setTimeout( function() {
									$success.fadeOut(200);
								}, 10000 );
							} else{
								$process.fadeOut(0);
								$error.html( data ).fadeIn(200);

								timeout = setTimeout( function() {
									$error.fadeOut(200);
								}, 10000 );
							}
						}
					}
				);

			});
		});
	}

	function tortoizAddonsCountdown($scope, $) {
		$scope.find('.tortoiz-addons-countdown').each(function (item , index) {
			var $this = $(this),
				year  = $this.find('.tortoiz-addons-cd-year'),
				month = $this.find('.tortoiz-addons-cd-month'),
				week  = $this.find('.tortoiz-addons-cd-week'),
				day   = $this.find('.tortoiz-addons-cd-day'),
				hour  = $this.find('.tortoiz-addons-cd-hour'),
				min   = $this.find('.tortoiz-addons-cd-minute'),
				sec   = $this.find('.tortoiz-addons-cd-second'),
				text  = $this.data('text'),
				mesg  = $this.data('message'),
				link   = $this.data('link'),
				time  = $this.data('time');

			$this.countdown( time ).on('update.countdown', function (e) {
				var m = e.strftime('%m'),
					w = e.strftime('%w'),
					Y = Math.floor(m / 12),
					m = m % 12,
					w = w % 4;

				function addZero(val) {
					if ( val < 10 ) {
						return '0'+val;
					}
					return val;
				}

				year.html( addZero(Y) );
				month.html( addZero(m) );
				week.html( '0'+w );
				day.html( e.strftime('%d') );
				hour.html( e.strftime('%H') );
				min.html( e.strftime('%M') );
				sec.html( e.strftime('%S') );

				if ( text == 'yes' ) {
					year.next().html( Y < 2 ? 'Year' : 'Years' );
					month.next().html( m < 2 ? 'Month' : 'Months' );
					week.next().html( w < 2 ? 'Week' : 'Weeks' );
					day.next().html( e.strftime('%d') < 2 ? 'Day' : 'Days' );
					hour.next().html( e.strftime('%H') < 2 ? 'Hour' : 'Hours' );
					min.next().html( e.strftime('%M') < 2 ? 'Minute' : 'Minutes' );
					sec.next().html( e.strftime('%S') < 2 ? 'Second' : 'Seconds' );
				}

			}).on('finish.countdown', function (e) {
				$this.children().remove();
				if ( mesg ) {
					$this.append('<div class="tortoiz-addons-cd-message">'+ mesg +'</div>');
				} else if( link && elementorFrontend.isEditMode() ){
					$this.append('<h2>You can\'t redirect url from elementor edit mode!!</h2>');
				} else if (link) {
					window.location.href = link;
				} else{
					$this.append('<h2>May be you don\'t enter a valid redirect url</h2>');
				}
			});
		});
	}

	function tortoizAddonsCounter($scope, $) {
		elementorFrontend.waypoint($scope.find('.tortoiz-addons-counter-number'), function () {
			var $this 	= $(this),
				data 	= $this.data(),
				digit	= data.toValue.toString().match(/\.(.*)/);

			if (digit) {
				data.rounding = digit[1].length;
			}

			$this.numerator(data);
		});
	}

	function tortoizAddonsFancytext($scope, $) {
		$scope.find('.tortoiz-addons-fancytext').each(function () {
			var $this = $(this),
				strings = $this.find('.tortoiz-addons-fancytext-strings'),
				anim = $this.data('anim'),
				speed = $this.data('speed'),
				delay = $this.data('delay'),
				cursor = $this.data('cursor') ? true : false,
				loop = $this.data('loop') ? true : false,
				fancyText = $this.data('fancy-text'),
				fancyText = fancyText.split('@@');

			if ( 'typing' == anim ) {
				strings.typed({
					strings: fancyText,
					typeSpeed: speed,
					startDelay: delay,
					showCursor: cursor,
					loop: loop,
				});
			} else{
				strings.Morphext({
					animation: anim,
					separator: '@@',
					speed: delay
				});
			}
		});
	}

	function tortoizAddonsGoogleMap($scope, $) {
		$scope.find('.tortoiz-addons-google-map').each(function () {
			var $this = $(this),
				$id = $this.data('id'),
				$anim = $this.data('anim'),
				$zoom = $this.data('zoom'),
				$lat = $this.data('lat'),
				$long = $this.data('long'),
				$isMarker = $this.data('marker'),
				$marker = $this.data('marker-link');

			var map = new google.maps.Map(document.getElementById($id), {
				center: {
					lat: $lat,
					lng: $long
				},
				zoom: $zoom
			});

			if ( $isMarker && $marker ) {
				var marker = new google.maps.Marker({
					position: new google.maps.LatLng($lat, $long),
					map: map,
					icon: {
						url: $marker,
					},
					animation: google.maps.Animation[$anim]
				});
			}
		});
	}

	function tortoizAddonsImageDiffer($scope, $) {
		$scope.find('.tortoiz-addons-image-differ').each(function () {
			var $this = $(this),
				orientation = $this.data('orientation'),
				before = $this.data('before'),
				after = $this.data('after'),
				offset = $this.data('offset'),
				overlay = $this.data('overlay') ? true : false,
				click = $this.data('click') ? true : false,
				hover = $this.data('hover') ? true : false,
				$cont = $this.children('.twentytwenty-container');

			$cont.twentytwenty({
				default_offset_pct: offset,
				orientation: orientation,
				before_label: before,
				after_label: after,
				no_overlay: overlay,
				move_slider_on_hover: hover,
				click_to_move: click,
			});
		});
	}

	function tortoizAddonsNewsTicker($scope, $) {
		$scope.find('.tortoiz-addons-news-ticker').each(function () {
			var ticker = $(this),
				speed = $(this).data('speed'),
				pause = 'yes' == $(this).data('pause') ? true : false,
				newsContainer = ticker.find( '.tortoiz-addons-news-container' ),
				newsContent = newsContainer.find('.tortoiz-addons-news-content'),
				news = newsContent.children('.tortoiz-addons-news'),
				toWid = 0;

			newsContent.clone().appendTo( newsContainer );
			newsContent.clone().appendTo( newsContainer );

			function newsTicker( sp, ps ) {
				newsContainer.css('marginLeft', 0);
				newsContent.clone().appendTo( newsContainer );

				news.each(function(index, el) {
					toWid += $(this).outerWidth();
				});
				var duration = toWid*sp;

				newsContainer.css('width', toWid*5+'px');
				newsContainer.animate({
					marginLeft:'-='+toWid+'px'
				}, duration, 'linear', function () {
					newsContainer.children('.tortoiz-addons-news-content').first().remove();
					newsTicker( sp, ps );
				});

				if ( ps ) {
					newsContainer.on('mouseenter', function(e) {
						newsContainer.stop();
					});
					newsContainer.on('mouseleave', function(e) {
						newsContainer.animate({
							marginLeft:'-='+toWid+'px'
						}, duration, 'linear', function () {
							newsContainer.children('.tortoiz-addons-news-content').first().remove();
							newsTicker( sp, ps );
						});
					});
				}
			}
			newsTicker( speed, pause );
		});
	}

	function tortoizAddonsProductZoomer($scope, $) {
		$scope.find('.tortoiz-addons-product-zoomer').each(function () {
			var $this = $(this),
				position = $this.data('position'),
				shape = $this.data('shape');

			$this.find('.xzoom, .xzoom-gallery').xzoom({
				position: position,
				lensShape: shape,
			});
		});
	}

	function tortoizAddonsParticleLayer($scope, $) {
		$scope.find('.tortoiz-addons-particle').each(function () {
			var $this = $(this),
				linkColor = $this.data('link-color'),
				ballColor = $this.data('ball-color'),
				number = $this.data('number'),
				link = $this.data('link'),
				clink = $this.data('clink'),
				linkw = $this.data('linkw'),
				size = $this.data('size'),
				speed = $this.data('speed'),
				dlink = $this.data('dlink') ? true : false,
				dmouse = $this.data('dmouse') ? true : false;

			$this.tortoizAddonsParticles({
				lineColor: linkColor,
				fillColor: ballColor,
				particlesNumber: number,
				linkDist: link,
				createLinkDist: clink,
				linksWidth: linkw,
				maxSize: size,
				speed: speed,
				disableLinks: dlink,
				disableMouse: dmouse
			});
		});
	}

	function tortoizAddonsPiechart($scope, $) {
		elementorFrontend.waypoint($scope.find('.tortoiz-addons-piechart-wrap'), function () {
			var $this 		= $(this),
				trackColor	= $this.data('track'),
				trackWidth	= $this.data('track-width'),
				barColor	= $this.data('bar'),
				lineWidth	= $this.data('line'),
				lineCap		= $this.data('cap'),
				animSpeed	= $this.data('speed'),
				scale		= $this.data('scale'),
				size		= $this.data('size');

			$this.easyPieChart({
				trackColor: trackColor,
				barColor: barColor,
				lineWidth: lineWidth,
				lineCap: lineCap,
				animate: animSpeed,
				scaleColor: scale,
				size: size
			});
		});
	}

	function tortoizAddonsPortfolio($scope, $) {
		$scope.find('.tortoiz-addons-portfolio').each(function () {
			var $this = $(this),
				$isoGrid = $this.children('.tortoiz-addons-portfolio-grid'),
				$btns = $this.children('.tortoiz-addons-portfolio-btns'),
				layout = $this.data('layout');

			$this.imagesLoaded( function() {
				if ( 'masonry' == layout ) {
					var $grid = $isoGrid.isotope({
						itemSelector: '.tortoiz-addons-portfolio-item',
						percentPosition: true,
						masonry: {
							columnWidth: '.tortoiz-addons-portfolio-item',
						}
					});
				} else{
					var $grid = $isoGrid.isotope({
						itemSelector: '.tortoiz-addons-portfolio-item',
						layoutMode: 'fitRows'
					});

				}

				$btns.on('click', 'button', function () {
					var filterValue = $(this).attr('data-filter');
					$grid.isotope({filter: filterValue});
				});

				$btns.each(function (i, btns) {
					var btns = $(btns);

					btns.on('click', '.tortoiz-addons-portfolio-btn', function () {
						btns.find('.is-checked').removeClass('is-checked');
						$(this).addClass('is-checked');
					});
				});

			});

			$this.find('.tortoiz-addons-portfolio-zoom').magnificPopup({
				type: 'image',
				gallery: {
					enabled: true
				},
			});

		});
	}

	function tortoizAddonsPostsTab($scope, $) {
		elementorFrontend.waypoint($scope.find('.tortoiz-addons-posts-tab'), function () {
			var $btn = $("[data-tortoiz-addons-pt]");

			$btn.on('click', function(e) {
				$( $(this).data('tortoiz-addons-pt') ).siblings('.tortoiz-addons-pt-item').removeClass('active');
				$( $(this).data('tortoiz-addons-pt') ).addClass('active');
			});
		});
	}

	function tortoizAddonsProgressbars($scope, $) {
		elementorFrontend.waypoint($scope.find('.tortoiz-addons-bar-content'), function () {
			var $this = $(this),
				$perc = $this.data('percentage');

			$this.animate({ width: $perc + '%' }, $perc * 20 );
		});
	}

	function tortoizAddonsModalBox($scope, $) {
		$scope.find('.tortoiz-addons-modal-box').each(function () {
			var $this = $(this),
				$id = $this.data('modal-id'),
				$btn = $('#'+$id),
				$cBtn = $('.tortoiz-addons-modal-close.'+$id),
				$modal = $('.tortoiz-addons-modal-overlay.'+$id);

				$btn.click( function(e) {
					e.preventDefault();
					$modal.fadeIn( 400 );
				});
				$cBtn.click( function() {
					$modal.fadeOut('400');
				});
		});
	}

	function tortoizAddonsUserCounter($scope, $) {
		$scope.find('.tortoiz-addons-user-counter').each(function () {
			var $this = $(this),
				number = $this.children('.tortoiz-addons-uc-number'),
				roles = $this.data('roles'),
				nonce = $this.find('#tortoiz_addons_user_counter_nonce');

			setInterval( function() {
				$.post(
					tortoizAddonsAjax.ajaxURL,
					{
						action: "tortoiz_addons_user_counter",
						roles: roles,
						nonce: nonce.val(),
					},
					function( data, status, code ) {
						if ( status == 'success' ) {
							number.html(data);
						}
					}
				);
			}, 5000);
		});
	}

	function tortoizAddonsVideo($scope, $) {
		$scope.find('.tortoiz-addons-video').each(function () {
			$(this).children('.tortoiz-addons-video-play').magnificPopup({
				type: 'iframe'
			});
		});
	}

	function tortoizAddonsVisitCounter($scope, $) {
		$scope.find('.tortoiz-addons-visit-counter').each(function () {
			var $this = $(this),
				page = $this.data('page'),
				today = $this.find('.tortoiz-addons-visit-today'),
				yesterday = $this.find('.tortoiz-addons-visit-yesterday'),
				nonce = $this.find('#tortoiz_addons_visit_counter_nonce');

			setInterval( function() {
				$.post(
					tortoizAddonsAjax.ajaxURL,
					{
						action: "tortoiz_addons_visit_counter",
						page: page,
						nonce: nonce.val(),
					},
					function( data, status, code ) {
						if ( status == 'success' ) {
							data = data.split('|');
							today.html(data['0']);
							yesterday.html(data['1']);
						}
					}
				);
			}, 5000);
		});
	}


	$(window).on('elementor/frontend/init', function () {
		elementorFrontend.hooks.addAction('frontend/element_ready/tortoiz_addons_accordion.default', tortoizAddonsAccordion);
		elementorFrontend.hooks.addAction('frontend/element_ready/tortoiz_addons_banner_slider.default', tortoizAddonsBannerSlider);
		elementorFrontend.hooks.addAction('frontend/element_ready/tortoiz_addons_blogpost.default', tortoizAddonsBlogpost);
		elementorFrontend.hooks.addAction('frontend/element_ready/tortoiz_addons_brand_carousel.default', tortoizAddonsBrandCarousel);
		elementorFrontend.hooks.addAction('frontend/element_ready/tortoiz_addons_contact_form.default', tortoizAddonsContactForm);
		elementorFrontend.hooks.addAction('frontend/element_ready/tortoiz_addons_login_form.default', tortoizAddonsLoginForm);
		elementorFrontend.hooks.addAction('frontend/element_ready/tortoiz_addons_mc_subscribe.default', tortoizAddonsMCSubscribe);
		elementorFrontend.hooks.addAction('frontend/element_ready/tortoiz_addons_content_slider.default', tortoizAddonsContentSlider);
		elementorFrontend.hooks.addAction('frontend/element_ready/tortoiz_addons_posts_carousel.default', tortoizAddonsPostsCarousel);
		elementorFrontend.hooks.addAction('frontend/element_ready/tortoiz_addons_countdown.default', tortoizAddonsCountdown);
		elementorFrontend.hooks.addAction('frontend/element_ready/tortoiz_addons_counter.default', tortoizAddonsCounter);
		elementorFrontend.hooks.addAction('frontend/element_ready/tortoiz_addons_fancytext.default', tortoizAddonsFancytext);
		elementorFrontend.hooks.addAction('frontend/element_ready/tortoiz_addons_image_differ.default', tortoizAddonsImageDiffer);
		elementorFrontend.hooks.addAction('frontend/element_ready/tortoiz_addons_google_map.default', tortoizAddonsGoogleMap);
		elementorFrontend.hooks.addAction('frontend/element_ready/tortoiz_addons_news_ticker.default', tortoizAddonsNewsTicker);
		elementorFrontend.hooks.addAction('frontend/element_ready/tortoiz_addons_product_zoomer.default', tortoizAddonsProductZoomer);
		elementorFrontend.hooks.addAction('frontend/element_ready/tortoiz_addons_particle_layer.default', tortoizAddonsParticleLayer);
		elementorFrontend.hooks.addAction('frontend/element_ready/tortoiz_addons_piechart.default', tortoizAddonsPiechart);
		elementorFrontend.hooks.addAction('frontend/element_ready/tortoiz_addons_portfolio.default', tortoizAddonsPortfolio);
		elementorFrontend.hooks.addAction('frontend/element_ready/tortoiz_addons_posts_tab.default', tortoizAddonsPostsTab);
		elementorFrontend.hooks.addAction('frontend/element_ready/tortoiz_addons_progressbar.default', tortoizAddonsProgressbars);
		elementorFrontend.hooks.addAction('frontend/element_ready/tortoiz_addons_review_carousel.default', tortoizAddonsReviewCarousel);
		elementorFrontend.hooks.addAction('frontend/element_ready/tortoiz_addons_modal_box.default', tortoizAddonsModalBox);
		elementorFrontend.hooks.addAction('frontend/element_ready/tortoiz_addons_user_counter.default', tortoizAddonsUserCounter);
		elementorFrontend.hooks.addAction('frontend/element_ready/tortoiz_addons_video.default', tortoizAddonsVideo);
		elementorFrontend.hooks.addAction('frontend/element_ready/tortoiz_addons_visit_counter.default', tortoizAddonsVisitCounter);
	});

})(jQuery);
