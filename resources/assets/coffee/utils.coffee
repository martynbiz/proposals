# Display a cofirm prompt before submitting a form (e.g. when deleting)
# @param string message The message to confirm (e.g. Are you sure...?)
# 
# $('#deleteQuestionForm').confirmSubmit()
#
$.fn.confirmSubmit = (message) ->
  if confirm(message)
    $(this).submit()