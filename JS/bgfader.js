function bgfader(images, _options){
	var options = {
		speed: 3000,
		timeout: 3000,
		opacity: 0.5
	}
	images = images && images.length ? images : [  ]
	var isPlaying = true
	var to = null
	var inTransition = false

	var $container = $(this)
	var originalContainerStyle = {  }
	var $imageSet = $('<div>', {
		'id': 'bgfader_imageset_' + $('.bgfader').length,
		'class': 'bgfader'
	})
	$imageSet.data('no', $('.bgfader').length)
	var $overlay = $('<div>', {
		'class': 'bgfader-overlay'
	})

	options = $.extend({  }, options, _options)

	var _createImageTag = function(url){
		var $image = $('<div>', {
			'class': 'image'
		})
		return $image
	}

	var _getBackgroundUrl = function($image) {
		return $image.css('background-image')
	}
	var _setBackgroundUrl = function($image) {
		if(typeof $image.data('loading-image') !== 'undefined') return $image
		if(_isLoading($image)) return $image

		$image.data('loading-image', true)
		var index = _getImageIndex($image)

		if(index === -1) return $image

		$('<img>').attr('src', images[index]).load(function(){
			$image.css('background-image', 'url(' + images[index] + ')')
			$image.data('loading-image', false)
			$(this).remove()
		})
		return $image
	}

	var _isLoading = function($image) {
		return $image.data('loading-image') === true
	}

	var _hasBackgroundImage = function($image){
		return $image.css('background-image') !== 'none'
	}

	var _getImageIndex = function($image) {
		return $('.image').index($image)
	}

	var _set = function(){
		originalContainerStyle = {
			'position': $container.css('position'),
			'z-index': $container.css('z-index')
		}
		$container.css({
			'position': 'relative',
			'z-index': 0
		})

		$overlay.css('background', 'rgba(0, 0, 0, ' + options.opacity + ')')
		$container.append($imageSet).append($overlay)
		$imageSet.show()

		$.each(images, function(index, url) {
			var $imageTag = _createImageTag(url)
			$imageSet.append($imageTag)
		})
	}

	var _getVisibleImage = function() {
		return $imageSet.find('.image:visible')
	}

	var _getLastImage = function() {
		return $imageSet.find('.image:last')
	}

	var _getFirstImage = function() {
		return $imageSet.find('.image:first')
	}

	var _next = function(image){
		if(image.next().length){
			_show(image.next())
		}else{
			start()
		}
		return this
	}

	var _prev = function(image) {
		if(image.prev().length){
			_show(image.prev())
		}else{
			_show(_getLastImage())
		}
		return this
	}

	var _setBg = function($image){
		$imageSet.css('background-image', $image.css('background-image'))
	}

	var _show = function(image) {
		if(!inTransition){
			_getVisibleImage().hide()
			inTransition = true
			image = _setBackgroundUrl(image)
			image.fadeIn(options.speed, function(){
				if(_hasBackgroundImage(image)){
					_setBg(image)
				}
				var nextImage = image.next()
				if(!_hasBackgroundImage(nextImage)){
					_setBackgroundUrl(nextImage)
				}
				inTransition = false
				if(isPlaying){
					to = setTimeout(function() {
						_next(image)
					}, options.timeout);
				}
			})
		}
	}

	var start = function(){
		isPlaying = true
		_show(_getFirstImage())
		return this
	}

	var stop = function() {
		isPlaying = false
		clearTimeout(to)
		return this
	}

	var next = function() {
		stop()
		_next(_getVisibleImage())
		return this
	}

	var prev = function() {
		stop()
		_prev(_getVisibleImage())
		return this
	}

	var destroy = function() {
		stop()
		$overlay.remove()
		$imageSet.remove()
		$container.css(originalContainerStyle)
		return null
	}

	_set()
	return {
		'next': next,
		'prev': prev,
		'start': start,
		'stop': stop,
		'destroy': destroy
	}
}


jQuery.fn.extend({
	'bgfader': bgfader
})
