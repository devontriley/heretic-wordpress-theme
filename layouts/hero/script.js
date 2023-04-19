if ( "function" == typeof Glide ) {
    const carousels = document.querySelectorAll(".layout-hero.carousel-active");

    carousels.forEach( carousel => {

        const content = carousel.querySelector(".glide.content")
        const images = carousel.querySelector(".glide.images")
        let glideContent, glideImages, imageIsChanging = false

        if ( content ) {
            glideContent = new Glide(content, {
                type: 'carousel',
                animationDuration: 0,
                swipeThreshold:!1,
                dragThreshold:!1
            })

            glideContent.mount()
        }

        if ( images ) {
            glideImages = new Glide( images, {
                type: 'slider',
                animationDuration: 500,
                swipeThreshold:!1,
                dragThreshold:!1,
                classes: {
                    activeSlide: 'glide__slide--active'
                }
            })

            glideImages.on( 'run', () => {
                imageIsChanging = true
                const nextIndex = glideImages.index
                const slides = glideImages.selector.querySelectorAll( '.glide__slide' )
                slides[ nextIndex ].classList.add( 'glide__slide--next' )
            })

            glideImages.on( 'run.after', () => {
                imageIsChanging = false
                const index = glideImages.index
                const slides = glideImages.selector.querySelectorAll( '.glide__slide' )
                slides[ index ].classList.remove( 'glide__slide--next' )
            })

            glideImages.mount()
        }

        let prevBtn = carousel.querySelector(".prev")
        let nextBtn = carousel.querySelector(".next")

        if ( prevBtn ) {
            prevBtn.addEventListener("click", e => {
                e.preventDefault()

                if ( glideContent && !imageIsChanging ) glideContent.go("<")
                if ( glideImages && !imageIsChanging ) glideImages.go("<")
            })
        }

        if ( nextBtn ) {
            nextBtn.addEventListener("click", e => {
                e.preventDefault()

                if ( glideContent && !imageIsChanging ) glideContent.go(">")
                if ( glideImages && !imageIsChanging ) glideImages.go(">")
            })
        }
    })
}