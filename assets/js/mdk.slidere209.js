$.widget("michaeldk.slider", {

    options: {
        'slides': [],
        'activeSlide': -1,
        'hasPrevious': false,
        'hasNext': false,
        'working': false,
        'createControllers': false,
        'paused': false
    },

    _create: function() {
        var $slides = $(this.element).find('.timeline_slide');
        this.options.slides = $slides;

        var $controllersContainer = $(this.element).find('.timeline_controllers');
        var $widget = $(this.element);
        $widget.hover(function() {
            $(this).slider('paused', true);
        }, function() {
            $(this).slider('paused', false);
        });

        var $slides_wrapper = $widget.find('.timeline_slides');
        $slides_wrapper.css('height', $slides_wrapper.height());

        for (var i = 0; i < this.options.slides.length; i++) {
            var $slide = $(this.options.slides[i]);
            var $controller = $controllersContainer.children().eq(i);

            if ($slide.hasClass('active')) {
                this.options.activeSlide = i;
                $controller.addClass('active');
            }

            $controller.data('index', i);
            $controller.click({index: i}, function(event) {
                $widget.slider('moveTo', event.data.index);
            });
        }

        if (this.options.hasPrevious) {
            var $prevButton = $('.timeline_prev');
            $prevButton.click(function() {
                var newIndex = $widget.slider('option', 'activeSlide') - 1;
                if (newIndex < 0) {
                    return;
                }

                $widget.slider('moveTo', newIndex);
            });
            // $controllersContainer.prepend($prevButton);
        }
        if (this.options.hasNext) {
            var $nextButton = $('.timeline_next');
            $nextButton.click(function() {
                var newIndex = $widget.slider('option', 'activeSlide') + 1;
                if (newIndex >= $widget.slider('option', 'slides').length) {
                    return;
                }

                $widget.slider('moveTo', newIndex);
            });
            // $controllersContainer.append($nextButton);
        }

        // setTimeout(function() {
        //     $widget.slider('autoMove');
        // }, 10000);
    },

    _setOption: function( key, value ) {
        this.options[ key ] = value;
    },

    working: function( value ) {

        // No value passed, act as a getter.
        if ( value === undefined ) {
            return this.options.working;

        // Value passed, act as a setter.
        } else {
            this.options.working = value;
        }

    },

    paused: function( value ) {

        // No value passed, act as a getter.
        if ( value === undefined ) {
            return this.options.paused;

        // Value passed, act as a setter.
        } else {
            this.options.paused = value;
        }

    },

    moveTo: function(index) {
        if (index >= this.options.slides.length) {
            index = 0;
        } else if (index < 0) {
            index = this.options.slides.length - 1;
        }
        if (this.options.working || this.options.activeSlide == index) return;
        this.options.working = true;
        var $widget = $(this.element);

        var $previousSlide = $(this.options.slides[this.options.activeSlide]);
        var $nextSlide = $(this.options.slides[index]);

        nextNumber = $widget.find('.timeline_controllers li').eq(index).html();
        speed = Math.abs(500 / (nextNumber - actualNumber));
        var sequence = getTimelineSequence($previousSlide, $nextSlide, $widget);
        
        $.Velocity.RunSequence(sequence);

        this.options.activeSlide = index;
        $widget.find('.timeline_controllers li.active').removeClass('active');
        $widget.find('.timeline_controllers li').eq(index).addClass('active');
    },

    next: function() {
        var $widget = $(this.element);
        if (!this.options.paused) {
            $widget.slider('moveTo', this.options.activeSlide + 1);
        }
    },

    prev: function() {
        var $widget = $(this.element);
        if (!this.options.paused) {
            $widget.slider('moveTo', this.options.activeSlide - 1);
        }
    },

    autoMove: function() {
        var $widget = $(this.element);
        if (!this.options.paused) {
            $widget.slider('moveTo', this.options.activeSlide + 1);
        }
        setTimeout(function() {
            $widget.slider('autoMove');
        }, 10000);
    },

});
