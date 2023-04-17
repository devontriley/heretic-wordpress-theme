if ( "function" == typeof Glide ) {
    const carousels = document.querySelectorAll(".layout-hero.carousel-active");

    carousels.forEach( carousel => {

        const content = carousel.querySelector(".glide.content")
        const images = carousel.querySelector(".glide.images")
        let glideContent, glideImages

        if ( content ) {
            glideContent = new Glide(content, {
                type:"carousel",
                animationDuration:0,
                swipeThreshold:!1,
                dragThreshold:!1
            }).mount()
        }

        if ( images ) {
            glideImages = new Glide( images, {
                type:"carousel",
                animationDuration:0,
                swipeThreshold:!1,
                dragThreshold:!1
            }).mount()
        }

        let prevBtn = carousel.querySelector(".prev")
        let nextBtn = carousel.querySelector(".next")

        if ( prevBtn ) {
            prevBtn.addEventListener("click", e => {
                e.preventDefault()

                if ( glideContent ) glideContent.go("<")
                if ( glideImages ) glideImages.go("<")
            })
        }

        if ( nextBtn ) {
            nextBtn.addEventListener("click", e => {
                e.preventDefault()

                if ( glideContent ) glideContent.go(">")
                if ( glideImages ) glideImages.go(">")
            })
        }
    })
}