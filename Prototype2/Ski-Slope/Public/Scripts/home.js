$(document).ready(function(){
    $("a[name='registerModal']").on("click", function(){
        $("#loginModal").modal("hide");
        $("#registerModal").modal({onVisible: function(){$("#registerModal").modal("refresh");}}).modal("show").focus();
    });
    
    $("a[name='loginModal']").on("click", function(){
        $("#registerModal").modal("hide");
        $("#loginModal").modal({onVisible: function(){$("#registerModal").modal("refresh");}}).modal("show").focus();
    });
});