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

            let prevBtn = carousel.querySelector(".prev")
            let nextBtn = carousel.querySelector(".next")

            prevBtn.addEventListener("click", e => {
                e.preventDefault()

                glideContent.go("<")
                glideImages.go("<")
            })

            nextBtn.addEventListener("click", e => {
                e.preventDefault()

                console.log('WOOO')

                glideContent.go(">")
                glideImages.go(">")
            })
        }

    })
}