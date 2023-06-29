const teamMemberDialog = document.getElementById("team-members-dialog");
if (teamMemberDialog) {
    const openButtons = document.querySelectorAll(".team-member-open-drawer");
    const closeButton = document.querySelector(".close-team-members-dialog");

    closeButton.addEventListener("click", (e) => {
        e.preventDefault();
        teamMemberDialog.close();
    });

    openButtons.forEach((button) => {
        button.addEventListener("click", (e) => {
            e.preventDefault();
            const id = e.target.dataset.id;
            if (id) {
                teamMemberDialog.querySelector('.team-member[data-id="' + id + '"]').classList.add("d-block");
            }
            teamMemberDialog.showModal();
        });
    });

    teamMemberDialog.addEventListener("close", (e) => {
        teamMemberDialog.querySelectorAll(".team-member").forEach((member) => {
            member.classList.remove("d-block");
        });
    });

    teamMemberDialog.addEventListener("click", (e) => {
        const rect = teamMemberDialog.getBoundingClientRect();
        if (
            e.clientX < rect.left ||
            e.clientX > rect.right ||
            e.clientY < rect.top ||
            e.clientY > rect.bottom
        ) {
            teamMemberDialog.close();
        }
    });
}