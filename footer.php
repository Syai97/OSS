


<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>

function editItem($elementId){
    document.getElementById("price-".concat($elementId)).disabled = false;
    document.getElementById("availability-".concat($elementId)).disabled = false;
    document.getElementById("editItemButton-".concat($elementId)).outerHTML = "<button class='btn btn-primary' type='submit' name='editItem'>Submit</button>";
}

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