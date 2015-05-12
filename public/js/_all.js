(function() {
  $(".alert").not(".alert-important").delay(3000).slideUp(300);

  $("#myModal").modal();

}).call(this);

//# sourceMappingURL=app.js.map
(function() {
  $.fn.confirmSubmit = function(message) {
    if (confirm(message)) {
      return $(this).submit();
    }
  };

}).call(this);

//# sourceMappingURL=utils.js.map
//# sourceMappingURL=_all.js.map