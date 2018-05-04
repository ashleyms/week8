$('#login').click(function() {

$.ajax({
 type: "POST",
 url: "../../classes/login.php",
 data: { name: "John" }
}).done(function( msg ) {
 alert( "Data Saved: " + msg );
});

   });
