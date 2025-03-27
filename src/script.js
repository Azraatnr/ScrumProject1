function dropDownMenuPost() {
    const dropdownButtons = document.querySelectorAll(".dropdown-btn");

    dropdownButtons.forEach((button) => {
        button.addEventListener("click", function (event) {
            const menuId = button.id.replace("Button", "Menu");
            const menu = document.getElementById(menuId);

            document.querySelectorAll(".dropdown-menu").forEach((dropdown) => {
                if (dropdown !== menu) {
                    dropdown.classList.add("hidden")
                }
            });
            menu.classList.toggle("hidden");
        });
    });
}

dropDownMenuPost();

function openOwnImage() {
    document.getElementById("fileInput").click();
}

document.getElementById('uploadBtn').addEventListener("click", openOwnImage);