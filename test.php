<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>

<p id="para">There isn't much of a background to this code except for the fact that it uses JavaScript as a base to execute and yes, this is completely client side scripted. You could do the same thing in a server side scripting language or environment such as ASP; however, it would more than likely be less effective.There isn't much of a background to this code except for the fact that it uses JavaScript as a base to execute and yes, this is completely client side scripted. You could do the same thing in a server side scripting language or environment such as ASP; however, it would more than likely be less effective.</p>


<script src="assets/js/jquery-1.11.1.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.backstretch.min.js"></script>
<script src="assets/js/scripts.js"></script>
<script type="text/javascript">
var items = [];

$('#para').each(function (i, e) {
  items.push($(e).text());
});

for(var i =0; i < items.length; i++)
{
	$('#para').after(items[i]);
}
</script>


</body>
</html>