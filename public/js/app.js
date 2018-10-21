$('select').on('change', function() {
    var source =  this.value ;  //gets the selected news source from the news source dropdown menu
    var _token = $('input[name="_token"]').val();
  
     $.ajax({
          type: "POST",
          url: "/source_id",
          data: { source: source, _token : _token }, //posts the selected option to our ApiController file
          success:function(result){
      // On success it gets `result`, which is a full html page that displays topnews from the news source selected.
            $('#appendDivNews').html(result);    // Append the html result to the div that has an id  of  `appendDivNews`
            },
  
          error:function(){
            alert("An error occoured, please try again!")
          }
      });
  
  })