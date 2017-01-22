$(function(){

  $(".edit-live-view").click(function(){
    $(this).closest(".editarea").find(".edit-blog-data-input").hide();
    $(this).closest(".editarea").find(".edit-blog-data").show();
  });

  $(".edit-text-view").click(function(){
    $(this).closest(".editarea").find(".edit-blog-data").hide();
    $(this).closest(".editarea").find(".edit-blog-data-input").show();
  });
});
