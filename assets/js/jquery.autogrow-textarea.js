// Based off https://code.google.com/p/gaequery/source/browse/trunk/src/static/scripts/jquery.autogrow-textarea.js?r=2
// Modified by David Beck

(function($) {

	var autogrowVerticallyIE8 = function(){
		return this.each(function(){
			// Variables
			var colsDefault = this.cols;
			var rowsDefault = this.rows;

			//Functions
			var grow = function() {
				growByRef(this);
			};

			var growByRef = function(obj) {
				var linesCount = 0;
				var lines = obj.value.split('\n');

				for (var i=lines.length-1; i>=0; --i)
				{
					linesCount += Math.floor((lines[i].length / colsDefault / 2) + 1);
				}

				if (linesCount >= rowsDefault)
					obj.rows = linesCount + 1;
				else
					obj.rows = rowsDefault;
			};

			var characterWidth = function (obj){
				var characterWidth = 0;
				var temp1 = 0;
				var temp2 = 0;
				var tempCols = obj.cols;

				obj.cols = 1;
				temp1 = obj.offsetWidth;
				obj.cols = 2;
				temp2 = obj.offsetWidth;
				characterWidth = temp2 - temp1;
				obj.cols = tempCols;

				return characterWidth;
			};

			this.style.height = "auto";
			this.style.overflow = "hidden";
			this.onkeyup = grow;
			this.onfocus = grow;
			this.onblur = grow;
			growByRef(this);
		});
	};
	
    /*
     * Auto-growing textareas; technique ripped from Facebook
     */
    $.fn.autogrow = function(options) {
        
		options = $.extend( {
			vertical: true,
			horizontal: false
		}, options);
		
		if( options.vertical && ! options.horizontal && $.browser.msie && $.browser.version < 9 )
			return autogrowVerticallyIE8.apply( this, arguments );
		
        this.filter('textarea').each(function() {
            
            var $this       = $(this),
                minHeight   = $this.height(),
				maxHeight	= $this.attr( "maxHeight" ),
                lineHeight  = $this.css('lineHeight'),
				minWidth	= typeof( $this.attr( "minWidth" ) ) == "undefined" ? 0 : $this.attr( "minWidth" );
            
			if( typeof( maxHeight ) == "undefined" ) maxHeight = 1000000;
			
            var shadow = $('<div class="autogrow-shadow"></div>').css({
                position:   'absolute',
                top:        -10000,
                left:       -10000,
                fontSize:   $this.css('fontSize'),
                fontFamily: $this.css('fontFamily'),
				fontWeight: $this.css('fontWeight'),
                lineHeight: $this.css('lineHeight'),
                resize:     'none'
            }).appendTo(document.body);
            
            var update = function() {
    
                var times = function(string, number) {
                    for (var i = 0, r = ''; i < number; i ++) r += string;
                    return r;
                };
                
                var val = this.value;
				
				if( options.vertical )
					val = val.replace(/</g, '&lt;')
						.replace(/>/g, '&gt;')
						.replace(/&/g, '&amp;')
						.replace(/\n$/, '<br/>&nbsp;')
						.replace(/\n/g, '<br/>')
						.replace(/ {2,}/g, function(space) { return times('&nbsp;', space.length -1) + ' '; });
				
				//if( options.horizontal )
				//	val = $.trim( val );
				
                shadow.html(val).css( "width", "auto" );
				
				if( options.horizontal )
				{
					var maxWidth = options.maxWidth;
					if( typeof( maxWidth ) == "undefined" ) maxWidth = $this.parent().width() - 12;
					$(this).css( "width", Math.min( Math.max( shadow.width() + 9, minWidth ), maxWidth ) );
				}
								
				if( options.vertical )
				{
					shadow.css( "width", $(this).width() - parseInt($this.css('paddingLeft'),10) - parseInt($this.css('paddingRight'),10) );
					var shadowHeight = shadow.height();
					var newHeight = Math.min( Math.max( shadowHeight, minHeight ), maxHeight );
					$(this).css( "height", newHeight );
					$(this).css( "overflow", newHeight == maxHeight ? "auto" : "hidden" );
				}
            };
            
            $(this)
				.change(update)
				.keyup(update)
				.keydown(update)
				.bind( "remove.autogrow", function() {
					shadow.remove();
				} );
            
            update.apply(this);
            
        });
        
        return this;
    };
    
})(jQuery);