	;( function( $, window, undefined ) {
	/*	global jQuery 
	* 	author: lgmrain
 	* 	date:2014-01-10
 	*	@version 0.1 2014-01-10
	*/
	/*	need to import modernizr.js */
		var defaultOptions = {
			speedTime: 200,
			easing: 'ease',
			hoverDelay: 0
		};

		$.fn.hoverTransitionBegin = function(options,slideItem){
			new $.hoverTransition(options,this,slideItem);
		};

		$.hoverTransition = function( options,element,slideItem ){
			this.$elem = element; 
			this.slideItem = slideItem ? slideItem : 'div';
			this.options = $.extend(true,{},defaultOptions,options); //deep copy if first argum is true
			this.transitionProp =  'all '+ this.options.speedTime + 'ms '+this.options.easing;
			//if support for transition , use Modernizr
			this.support = Modernizr.csstransitions;
			this.bindEvent();
		};

		$.hoverTransition.prototype = {
			bindEvent: function(){
				var self = this;
				this.$elem.on('mouseenter mouseleave',function(event){
					var $el = $(this),
						$hoverElem = $el.find(self.slideItem),
						direction = self.getDirection($el,{ x: event.pageX, y:event.pageY }),
						styleCss = self.getStyle( direction );
					if(event.type === 'mouseenter'){
						$hoverElem.hide().css(styleCss.from);
						clearTimeout(self.timehover);
						self.timehover = setTimeout( function() {
							$hoverElem.show( 0, function() {
								var $el = $( this );
								if( self.support ) {
									$el.css( 'transition', self.transitionProp );
								}
								self.applyAnimation( $el, styleCss.to, self.options.speed );
							} );	
						}, self.options.hoverDelay );				
					}else{
						$hoverElem.css( 'transition', self.transitionProp );
						clearTimeout( self.timehover );
						self.applyAnimation( $hoverElem, styleCss.from, self.options.speed );
					}
				});
			},
			getDirection: function($el,coord){
				var w = $el.width(),
					h = $el.height(),
					x = ( coord.x - $el.offset().left - ( w/2 )) * ( w > h ? ( h/w ) : 1 ),
					y = ( coord.y - $el.offset().top  - ( h/2 )) * ( h > w ? ( w/h ) : 1 ),
					direction = Math.round((( Math.atan2(y,x) * (180/Math.PI)+180)/90+3)) % 4;
				return direction;
			},
			getStyle: function(direction){
				var objDirection = {
					'fromTop' :  { left : '0px', top : '-100%' },
					'fromBottom':  { left : '0px', top : '100%' },
					'fromRight':  { left : '100%', top : '0px' },
					'fromLeft': { left: '-100%', top:'0px' }
				},
				slideTop = { top:'0px' },
				slideLeft = { left:'0px'};

				switch( direction ){
					// 0: top, 1:right, 2:bottom, 3:left
					case 0 : 
						fromStyle =  objDirection.fromTop;
						toStyle = slideTop;
						break;
					case 1 : 
						fromStyle =  objDirection.fromRight;
						toStyle = slideLeft;
						break;
					case 2 : 
						fromStyle =  objDirection.fromBottom;
						toStyle = slideTop;
						break;
					case 3 : 
						fromStyle =  objDirection.fromLeft;
						toStyle = slideLeft;
						break;
				};
				return { from: fromStyle, to: toStyle};
			},
			applyAnimation: function( el,styleCss,speed ){
				//add compatibility for explore which doesn't support for css transition
				$.fn.applyStyle = this.support ? $.fn.css : $.fn.animate;
				el.stop().applyStyle(styleCss,$.extend( true, [], {duration: speed+'ms' } ) );
			}
		}
	})( jQuery, window );
