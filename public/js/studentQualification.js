const element = document.getElementById("duplicate");
element.remove();

function addElement(e) {
    newElement = element.cloneNode(true);
    parent = e.parentNode.parentNode;
    parent.insertBefore(newElement,e.parentNode.nextElementSibling);
}

function removeElement(e){
    e.parentNode.remove();
}

$("#form").submit(function (e) {
    e.preventDefault();

    $.ajax({
        url: $(this).attr("action"),
        method: "post",
        data: $(this).serialize(),
        success: function(r){
            console.log(r);
        }
    })
});