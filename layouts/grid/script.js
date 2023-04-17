const teamMemberDrawer = document.getElementById("team-members-bio-drawer");

if ( teamMemberDrawer ) {
    const teamMemberDrawerBios = teamMemberDrawer.querySelectorAll(".team-member");
    const teamMemberDrawerOffcanvas = new bootstrap.Offcanvas("#team-members-bio-drawer");
    const teamMemberOpenButtons = document.querySelectorAll(".team-member-open-drawer");

    teamMemberDrawer.addEventListener("hidden.bs.offcanvas", event => {
        teamMemberDrawerBios.forEach(bio => {
            bio.classList.remove("d-block");
        });
    });

    document.addEventListener("click", event => {
        if (event.target.classList.contains("team-member-open-drawer")) {
            event.preventDefault();
            let id = event.target.dataset.id;
            if (id) {
                let member = teamMemberDrawer.querySelector('.team-member[data-id="' + id + '"]');
                member.classList.add("d-block");
                teamMemberDrawerOffcanvas.show();
            }
        }
    });
}