

<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
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
//for alert message in seller on how long to display the alert message
function alertTimeout() {
    setTimeout(function(){ 
        document.getElementsById("alertMsg").innerHTML= "<div></div>"
     }, 1000);
}

//function sortItem(id){
//    alert(id);
//    document.getElementById(id).style.display = "none";
//}

// function sortItem(str){
//     var everyChild = document.querySelectorAll("div");
//      for (var i = 0; i<everyChild.length; i++) {
//         var itemId = document.getElementsByTagName("div")[i];
//          alert(itemId.id);
//         if(itemId.id.includes(str) != true){
//              if(itemId.id != ""){
//                document.getElementById(itemId.id).style.display = "none";
//             }
                
//         }
        
//     } 
// }

function searchItem(str) {
        if (str == "") {
            document.getElementById("searchItem").innerHTML = "";
            return;
        } else {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("searchItem").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","sortItem.php?search="+str,true);
            xmlhttp.send();
        }
    }


</script>
<footer id="footer" style="margin-top: 40px;color: white">
       <p class="text-center">Copyright OSS &copy; 2017</p>
</footer>
</body>
</html>