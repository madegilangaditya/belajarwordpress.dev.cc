class ExtendsTestimonialCarouselElementorHandler extends elementorModules.frontend.handlers.Base {

    getDefaultSettings() {
        return {
            selectors: {
                wrapper: '.swiper-container',
                pagination: '.swiper-pagination',
                next: '.swiper-button-next',
                prev: '.swiper-button-prev',
                slide_view: '#slide-per-view',
                slide_scroll: '#slide-scroll',
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
            $slide_view: this.$element.find(selectors.slide_view),
            $slide_scroll: this.$element.find(selectors.slide_scroll),
        };
    }
    
    bindEvents() {
        console.log(this.elements.$slide_view);
        const swiper = new Swiper(this.elements.$wrapper[0], {
            spaceBetween: 30,
            slidesPerView: this.elements.$slide_view[0].value,
            slidesPerGroup: this.elements.$slide_scroll[0].value,
            autoplay:true,
            loop:true,
            breakpoints: {
                768: {
                    slidesPerView: this.elements.$slide_view[0].value,
                    slidesPerGroup: this.elements.$slide_scroll[0].value,
                    spaceBetween: 20,
                },
                1025: {
                    slidesPerView: this.elements.$slide_view[0].value,
                    slidesPerGroup: this.elements.$slide_scroll[0].value,
                    spaceBetween: 20,
                },
            
            },
        
            pagination: {
            el: this.elements.$pagination[0],
            clickable: true,
            },
            navigation: {
            nextEl: this.elements.$next[0],
            prevEl: this.elements.$prev[0],
            },
        
        });
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
    