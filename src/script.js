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

let uploadedImage = '';

function openOwnImage() {
    document.getElementById("fileInput").click();
}

function showImagePreview(event) {
    const file = event.target.files[0];

    const reader = new FileReader();
    reader.onload = function (e) {
        uploadedImage = e.target.result

        const img = document.createElement("img");
        
        img.src = e.target.result;

        const previewContainer = document.getElementById("imagePreview");
        previewContainer.innerHTML = "";
        previewContainer.appendChild(img);
    };
    reader.readAsDataURL(file);
}

document.getElementById('uploadBtn').addEventListener("click", openOwnImage);
document.getElementById('fileInput').addEventListener("change", showImagePreview);

function showExamplePost() {
    const getUserMessage = document.getElementById("postNewMessage").value;
    const pElement = document.getElementById("userMessage");
    const showImageExample = document.getElementById("showImageExample");

    pElement.innerHTML = "";
    showImageExample.innerHTML = "";

    pElement.innerHTML = getUserMessage;

    if (uploadedImage) {
        const imgElement = document.createElement("img");

        imgElement.src = uploadedImage;
        imgElement.classList.add("w-full", "h-96");

        showImageExample.appendChild(imgElement);
    }


}
document.getElementById("seeExampleButton").addEventListener("click", showExamplePost);