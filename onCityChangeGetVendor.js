$(document).ready(function()
{
	$("#city").change(function()
{
	
var vv=$(this).val();

var dataString = 'id='+ vv;

$.ajax
({
type: "POST",
url: "ajax_change_vendorForCity.php",
data: dataString,
cache: false,
success: function(html)
{
if(html != "None" ){
$("#vendor").html(html);
}
else
{
$("#vendor").html("");
}

} 
});

});

	
	
});