$(document).ready(function () {

  /*========================Checkbox=======================================*/
  $("#mytable #checkall").click(function () {
    if ($("#mytable #checkall").is(':checked')) {
      $("#mytable input[type=checkbox]").each(function () {
        $(this).prop("checked", true);
      });

    } else {
      $("#mytable input[type=checkbox]").each(function () {
        $(this).prop("checked", false);
      });
    }
  });

  $("[data-toggle=tooltip]").tooltip();
  /*=========================Dropdow=======================================*/

  $(".sidebar-dropdown > a").click(function () {
    $(".sidebar-submenu").slideUp(200);
    if (
      $(this)
      .parent()
      .hasClass("active")
    ) {
      $(".sidebar-dropdown").removeClass("active");
      $(this)
        .parent()
        .removeClass("active");
    } else {
      $(".sidebar-dropdown").removeClass("active");
      $(this)
        .next(".sidebar-submenu")
        .slideDown(200);
      $(this)
        .parent()
        .addClass("active");
    }
  });

/*===========================Sidebar=======================================*/

  $("#close-sidebar").click(function () {
    $(".page-wrapper").removeClass("toggled");
  });
  $("#show-sidebar").click(function () {
    $(".page-wrapper").addClass("toggled");
  });
   
/*===============================Select2*===================================*/
  $('#department').select2({
      allowClear: true,
        placeholder:'Vui lòng chọn phòng ban'
  });
  $('#position').select2({
      allowClear: true,
        placeholder:'Vui lòng chọn chức vụ'
  });
  $('#staff').select2({
      allowClear: true,
        placeholder:'Vui lòng chọn nhân viên'
  });
/*===============================ShowPassword======================================*/
});



