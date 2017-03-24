$(document).ready(function(){
    $("a[name='registerModal']").on("click", function(){
        $("#loginModal").modal("hide");
        $("#registerModal").modal({onVisible: function(){$("#registerModal").modal("refresh");}}).modal("show");
    });
});