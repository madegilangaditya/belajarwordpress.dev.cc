class ExtendsTestimonialCarouselElementorHandler extends elementorModules.frontend.handlers.Base {

    getDefaultSettings() {
        return {
            selectors: {
                wrapper: '.swiper-container',
                pagination: '.swiper-pagination',
                next: '.swiper-button-next',
                prev: '.swiper-button-prev',
                // slide_add_settings: '.elementor-element',
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
            // $slide_add_settings: this.$element.find(selectors.slide_add_settings),
            $slide_editor_settings: this.$element.find(selectors.slide_editor_settings),
        };
    }
    
    bindEvents() {
        console.log(this.elements.$slide_editor_settings);
        const arrows = this.elements.$slide_editor_settings[0].dataset.arrows;
        let arrowShow = '';
        if (arrows != 'yes'){
            this.elements.$next.remove();
            this.elements.$prev.remove();
        } else{
            arrowShow = false;
        }
        // console.log(this.elements.$slide_editor_settings.prevObject[0].dataset.settings);
        // let slideSettings = JSON.parse(this.elements.$slide_editor_settings.prevObject[0].dataset.settings);
        console.log(this.elements.$slide_editor_settings[0].dataset.arrows);
        console.log(arrowShow);
        console.log(typeof arrowShow);
        // console.log(slideSettings.show_arrows);
        const swiper = new Swiper(this.elements.$wrapper[0], {
            slidesPerView: 1,
            slidesPerGroup: 1,
            autoplay:true,
            loop:true,
            speed:500,
            breakpoints: {
                768: {
                    slidesPerView: 2,
                    slidesPerGroup: 2,
                    spaceBetween:20,
                },
            
            },
        
            pagination: {
                el: this.elements.$pagination[0],
                clickable: true,
            },
            // arrowShow,
            navigation: {
                nextEl: this.elements.$next[0],
                prevEl: this.elements.$prev[0],
                // // hiddenClass:'.swiper-button-hidden',
                // disabledClass:'swiper-button-disabled',
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
    