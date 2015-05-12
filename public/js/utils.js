(function() {
  $.fn.confirmSubmit = function(message) {
    if (confirm(message)) {
      return $(this).submit();
    }
  };

}).call(this);

//# sourceMappingURL=utils.js.map