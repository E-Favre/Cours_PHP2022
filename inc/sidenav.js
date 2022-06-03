$(document).ready(function(){
    $("#sidebarCollapse").on("click", function() {
    $("#sidebar").toggleClass("active");
    $(this).togggleClass("acitve");
    $(".col-sm-8").toggleClass("col-sm-10");
});
});