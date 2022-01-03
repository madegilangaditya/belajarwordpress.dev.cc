class ExtendsTestimonialCarouselElementorHandler extends elementorModules.frontend.handlers.Base {

    getDefaultSettings() {
        return {
            selectors: {
                wrapper: '.swiper-container',
                pagination: '.swiper-pagination',
                next: '.swiper-button-next',
                prev: '.swiper-button-prev',
                slide_editor_settings: '.extends-testimonial__carousel',
            },
        };
    }
    
    getDefaultElements() {
        const selectors =  this.getSettings('selectors');
    
        return {
            $wrapper: this.$element.find(selectors.wrapper),
            $pagination: this.$element.find(selectors.pagination),
            $next: this.$element.find(selectors.next),
            $prev: this.$element.find(selectors.prev),
            $slide_editor_settings: this.$element.find(selectors.slide_editor_settings),
        };
    }
    
    bindEvents() {
        const arrows = this.elements.$slide_editor_settings[0].dataset.arrows;
        if (arrows != 'yes'){
            this.elements.$next.remove();
            this.elements.$prev.remove();
        } 

        const pagination = this.elements.$slide_editor_settings[0].dataset.pagination;
        if(pagination == ''){
            this.elements.$pagination.remove();
        }

        const slidePerView = parseInt(this.elements.$slide_editor_settings[0].dataset.slides);
        const slideScroll = parseInt(this.elements.$slide_editor_settings[0].dataset.scroll);
        const autoPlay = this.elements.$slide_editor_settings[0].dataset.autoplay != 'yes' ? false : true;
        const pauseOnHover = this.elements.$slide_editor_settings[0].dataset.pausehover == 'yes' ? true:false;
        const pauseInteraction = this.elements.$slide_editor_settings[0].dataset.pauseinteraction == 'yes' ? true:false;
        const loop = this.elements.$slide_editor_settings[0].dataset.loop == 'yes' ? true:false;
        const spaceBetween = parseInt(this.elements.$slide_editor_settings[0].dataset.space);
        const speed = parseInt(this.elements.$slide_editor_settings[0].dataset.speed);
        
        console.log(slidePerView);
        console.log(autoPlay);
        const swiper = new Swiper(this.elements.$wrapper[0], {
            slidesPerView: slidePerView,
            slidesPerGroup: slideScroll,
            autoplay: {
                // autoplay:autoPlay,
                disableOnInteraction:pauseInteraction,
                pauseOnMouseEnter:pauseOnHover,
            },
            // autoplay:autoPlay,
            
            loop:loop,
            speed:speed,

            navigation: {
                nextEl: this.elements.$next[0],
                prevEl: this.elements.$prev[0],
            },

            breakpoints: {
                768: {
                    slidesPerView: slidePerView,
                    slidesPerGroup: slideScroll,
                    spaceBetween:spaceBetween,
                }
            
            },
        
            pagination: {
                el: this.elements.$pagination[0],
                clickable: true,
                type: pagination,
            },

            
        
        });

        if (autoPlay == false) {
            swiper.autoplay.stop();
        }else{
            swiper.autoPlay.start();
        }
    }
    
    }
    
    jQuery(window).on('elementor/frontend/init', () => {
    const addHandler = ($element) => {
        elementorFrontend.elementsHandler.addHandler(ExtendsTestimonialCarouselElementorHandler, {
            $element,
        });
    };
    // Add our handler to the my-elementor Widget (this is the slug we get from get_name() in PHP)
    elementorFrontend.hooks.addAction('frontend/element_ready/extends_testimonial_carousel.default', addHandler);
    })
    