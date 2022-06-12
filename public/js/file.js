function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        const preview = document.getElementById('profile-image');

        reader.addEventListener("load", function () {
            // convert image file to base64 string
            preview.src = reader.result;
        }, false);
        document.getElementById('profile-image').style.visibility='visible';

        reader.readAsDataURL(input.files[0]);
        // var fileLabel = document.getElementById('file-label');
        // fileLabel.innerText = input.files[0].name;
    }
}




