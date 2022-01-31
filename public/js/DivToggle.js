function DivToggle(id) {
    var id;
    var id = document.getElementById(id);
    if (id.style.visibility === "hidden") {
        id.style.visibility = "visible";
    } else {
        id.style.visibility = "hidden";
    }
}
$('#triggerpictureinput').on('click', function() {
    $('#pictureinput').trigger('click');
});
