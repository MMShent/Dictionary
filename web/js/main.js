$(document).ready(function(){

      // Search with ENTER/RETURN
      $('#searchTerm').keyup(function(e) {
        if(e.keyCode == 13) {
          doSearch();
        }
      });

});


function doSearch()
{
  var term = $('#searchTerm').val();
  var url = '/search/' + term;
  
  window.location.href = url;
}