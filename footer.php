

<script>

function editItem($elementId){
    document.getElementById("price-".concat($elementId)).disabled = false;
    document.getElementById("availability-".concat($elementId)).disabled = false;
    document.getElementById("cancelEditItemButton-".concat($elementId)).hidden = false;
    document.getElementById("editItemButton-".concat($elementId)).outerHTML = "<button class='btn btn-primary' type='submit' id='submitButton' name='editItem' value='"+$elementId+"'>Submit</button>";
}

function cancelEditItem($elementId){
    document.getElementById("cancelEditItemButton-".concat($elementId)).hidden = true;
    document.getElementById("price-".concat($elementId)).disabled = true;
    document.getElementById("availability-".concat($elementId)).disabled = true;
    document.getElementById("submitButton").outerHTML = "<button type='button' class='btn btn-primary' id='editItemButton-"+$elementId+"' onClick={editItem("+$elementId+")} >Edit</button>";
}
//for modal picture in view receipt
function centerModal() {
    $(this).css('display', 'block');
    var $dialog = $(this).find(".modal-dialog");
    var offset = ($(window).height() - $dialog.height()) / 2;
    // Center modal vertically in window
    $dialog.css("margin-top", offset);
}

$('.modal').on('show.bs.modal', centerModal);
$(window).on("resize", function () {
    $('.modal:visible').each(centerModal);
});
//for popover in seller menu
$(function () {
  $('[data-toggle="popover"]').popover()
})
//function sortItem(id){
//    alert(id);
//    document.getElementById(id).style.display = "none";
//}

</script>
<footer id="footer" style="margin-top: 40px;color: white">
       <p class="text-center">Copyright OSS &copy; 2017</p>
</footer>
</body>
</html>