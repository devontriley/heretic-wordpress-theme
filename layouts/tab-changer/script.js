const tabChangerLayouts = document.querySelectorAll(".layout-tab-changer");

tabChangerLayouts.forEach((layout) => {
    let collapse = layout.querySelectorAll(".collapse"),
        collapseButtons = layout.querySelectorAll(".collapse-button"),
        collapseSelect = layout.querySelector('.form-select');

    console.log( collapseSelect )

    const collapseInstances = [...collapse].map( ( el, index ) => {
        return new bootstrap.Collapse(el, {
            toggle: 0 === index
        })
    });

    collapseSelect.addEventListener( 'change', e => {
        const index = collapseSelect.options[collapseSelect.selectedIndex].value

        collapseInstances[index].show()

        // Update list group in case of resize
        updateListButtons( collapseButtons[index] )
    })

    collapseButtons.forEach((button, index) => {
        button.addEventListener("click", (e) => {

            updateListButtons( button )

            collapseInstances[index].show()

            // Update select in case of resize
            collapseSelect.value = index

            e.preventDefault();
        });
    });

    function updateListButtons( button ) {
        collapseButtons.forEach(btn => {
            btn.setAttribute( 'aria-expanded', false )
            btn.setAttribute( 'aria-current', false )
        })

        button.setAttribute( 'aria-expanded', true )
        button.setAttribute( 'aria-current', true )
    }
});
