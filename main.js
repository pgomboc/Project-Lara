function delete_row(id) {
  let el = this;

  $.ajax({
    type: 'POST',
    url: 'delete.php',
    data: {
      delete_row: 'delete_row',
      row_id: id,
    },
    success: (response) => {
      if (response == "success") {
         $(el).closest('tr').fadeOut(800, () => {
           $(this).remove();
         });
         alert('Da li zelite da obrisete studenta?');
         window.location.reload();
      }
    }
  });
}
   