let lastScrollTop = window.pageYOffset || document.documentElement.scrollTop,
    scrollDirection = null,
    headerIsSticky = false,
    isSingleServices = document.body.classList.contains( 'single-services' );

const primaryHeader = document.querySelector(".primary-header"),
    notificationBar = document.querySelector(".notification-bar"),
    primaryHeaderHeight = (notificationBar && (primaryHeader.style.top = notificationBar.offsetHeight + "px"), primaryHeader.offsetHeight);

// Responsive iframe embeds
reframe("iframe");

/* Update body padding if notification bar is included */
if ( notificationBar ) {
    document.body.style.paddingTop = ( notificationBar.offsetHeight + primaryHeader.offsetHeight ) + 'px'
}

/* Header search icon click */
let headerSearchFormActive = false
const headerSearchButton = document.querySelector('.header-search');
const headerSearchForm = document.querySelector('.header-search-form');
const headerSearchInput = document.querySelector('.header-search-input');
if ( headerSearchButton && headerSearchInput ) {
    // Search button click handler
    headerSearchButton.addEventListener( 'click', (e) => {
        e.preventDefault();
        e.stopPropagation()
        headerSearchForm.classList.add('active');
        headerSearchInput.focus()
        headerSearchFormActive = true
    })

    // Close search input click handler
    document.addEventListener( 'click', (e) => {
        if ( e.target !== headerSearchInput && headerSearchFormActive ) {
            headerSearchForm.classList.remove('active')
        }
    })

    // Search input submit handler
    headerSearchForm.addEventListener( 'submit', (e) => {
        if ( headerSearchInput.value === '' ) {
            e.preventDefault();
        }
    });
}

/* Hamburger & nav drawer toggle */
const hamburgerButton = document.querySelector( '.hamburger-container .hamburger' )
const navDrawer = document.getElementById( 'nav-drawer' )
let navDrawerOpen = false

/* Nav drawer toggling */
if ( navDrawer ) {
    const navDrawerLinksWithChildren = document.querySelectorAll( '.nav-drawer li.has-children' )

    if( hamburgerButton ) {
        hamburgerButton.addEventListener( 'click', e => {
            hamburgerButton.classList.toggle( 'is-active' )
            toggleNavDrawer( !navDrawerOpen )
        })
    }

    function toggleNavDrawer( open ) {
        if ( open ) {
            /* Stop window from being scrolled */
            document.body.classList.add( 'nav-drawer-open' )

            let navDrawerHeight = window.innerHeight - primaryHeader.offsetHeight

            if ( notificationBar ) {
                /* Are we scrolled so that the notification bar is out of view? */
                if ( window.pageYOffset < notificationBar.offsetHeight ) {
                    console.log('test test test')
                    navDrawerHeight -= notificationBar.offsetHeight - window.pageYOffset
                }
            }

            navDrawer.style.height = navDrawerHeight + 'px'
            navDrawer.classList.add( 'active' )
        } else {
            /* Allow window to be scrolled again */
            document.body.classList.remove( 'nav-drawer-open' )

            navDrawer.classList.remove( 'active' )

            navDrawerLinksWithChildren.forEach(link => {
                link.classList.remove('active')
            })
        }

        navDrawerOpen = !navDrawerOpen
    }

    /* Nav drawer dropdowns */
    navDrawerLinksWithChildren.forEach( link => {
        link.addEventListener( 'click', e => {
            navDrawerLinksWithChildren.forEach(li => {
                li.classList.remove('active')
            })

            link.classList.add( 'active' )
        })
    })
}

function updateScrollDirection() {
    let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    scrollDirection = scrollTop > lastScrollTop ? "down" : "up"
    lastScrollTop = scrollTop
}

function checkStickyHeader() {
    if (!primaryHeader) return false;

    function updateStickyHeader( sticky ) {
        if ( sticky ) {
            headerIsSticky = true
            primaryHeader.classList.add("sticky")
        } else {
            headerIsSticky = false
            primaryHeader.classList.remove("sticky")
        }
    }

    if ( "up" === scrollDirection && !headerIsSticky && lastScrollTop > primaryHeaderHeight ) {
        updateStickyHeader(true)
    }

    if ( "down" === scrollDirection && headerIsSticky ) {
        updateStickyHeader(false)
    }

    if ( notificationBar && lastScrollTop < notificationBar.offsetHeight ) {
        updateStickyHeader(false)
    }

    if ( 0 === lastScrollTop ) {
        updateStickyHeader(false)
    }
}

/* Service nav anchor links */
const serviceNavLinks = document.querySelectorAll( '.service-nav a' )
if ( serviceNavLinks ) {
    const serviceNav = document.querySelector( '.service-nav' )
    serviceNavLinks.forEach( link => {
        link.addEventListener( 'click', e => {
            const anchor = e.target.getAttribute('data-anchor')
            const anchorTarget = document.querySelector('[data-layout-count="'+ anchor +'"]')
            const scrollPosition = anchorTarget.getBoundingClientRect().top + window.pageYOffset - ( serviceNav.offsetHeight + 20 );

            // Remove active class
            serviceNavLinks.forEach( link => { link.classList.remove( 'active' ) })
            // Add active class
            link.classList.add( 'active' )
            // Scroll to element
            window.scrollTo({ top: scrollPosition, behavior: 'smooth' });

            e.preventDefault()
        })
    })
}

/* On scroll events */
window.addEventListener("scroll", () => {
    if( ! isSingleServices ) updateScrollDirection();
});

/* RaF Loop */
function animationLoop() {
    if( ! isSingleServices ) checkStickyHeader()

    window.requestAnimationFrame(animationLoop)
}
window.requestAnimationFrame(animationLoop)