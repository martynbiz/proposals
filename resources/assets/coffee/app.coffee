# To use, simply pass flash_message='...' with the view/ redirect
# To make the message stay on the screen, pass flash_message_important=true

# our custom alert flash message box
$(".alert")
  .not(".alert-important")
  .delay(3000)
  .slideUp(300)

# activate bootstrap modals -- can't remember how this is used
$("#myModal")
    .modal();
    
    