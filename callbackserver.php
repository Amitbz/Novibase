<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript">
    $( document ).ready(function(){
        var sPageURL = String(window.location);
        var access_token = sPageURL.substring((sPageURL.indexOf("access_token=")+13), sPageURL.indexOf("&"));
        window.location.href = "/user-space.php?access_token="+access_token;
    });
</script>