(function ($) {

    $.fn.crossfade = function (startOptions, endOptions) {
        var defaults = {
            'start' : {
                'type' : 'mouseenter',
                'delay' : 1000,
                'callback' : null,
                'condition' : function () { return true; }
            },
            
            'end' : {
                'type' : 'mouseleave',
                'delay' : 1000,
                'callback' : null,
                'condition' : function () { return true; }
            }
        };
        
        if (typeof options == 'number') {
            options = {
                'start' : { 'delay' : options },
                'end' : { 'delay' : options }
            };
        }
        
        var settings = {};
        settings.start = $.extend({}, defaults.start, startOptions);
        settings.end = $.extend({}, defaults.end, endOptions);

        // return this;
        return this.each(function (i) { 
            var $$ = $(this);
            var targetImage = $$.css('backgroundImage').replace(/^url|[\(\)"']/g, '');
            var hiddenImage = $$.wrap('<span style="position: relative;"></span>')
                .parent()
                .prepend('<img>')
                .find(':first-child')
                .attr('src', targetImage);
                
            // CSS tweaks to position the starting image correctly
            if ($.browser.msie || $.browser.mozilla) {
                $$.css({
                    'position' : 'absolute', 
                    'left' : 0,
                    'background' : '',
                    'top' : this.offsetTop
                });
            } else if ($.browser.opera && $.browser.version < 9.5) {
                // opera < 9.5 has a render bug - so this is required to get around it
                // we can't apply the 'top' : 0 separately because Mozilla strips
                // the style set originally somehow...
                $$.css({
                    'position' : 'absolute', 
                    'left' : 0,
                    'background' : '',
                    'top' : "0"
                });
            } else {
                $$.css({
                    'position' : 'absolute', 
                    'left' : 0,
                    'background' : ''
                });
            }
            
            if (settings.start.type) {
                $$.bind(settings.start.type, function () {
                    if (settings.start.condition.call(this)) {
                        $(this).stop().animate({
                            opacity: 0
                        }, settings.start.delay);
                    }
                    if (settings.start.callback) return settings.start.callback.call(this);
                });
            }
            
            if (settings.end.type) {
                $$.bind(settings.end.type, function () {
                    if (settings.end.condition.call(this)) {
                        $(this).stop().animate({
                            opacity: 1
                        }, settings.end.delay);
                    }
                    if (settings.end.callback) return settings.end.callback.call(this);
                });
            }
        });
    };
    
})(jQuery);
