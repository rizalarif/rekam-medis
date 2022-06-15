<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="library/jquery-1.8.0.js"></script>
<script>
   $(document).ready(function(){
   setInterval(function(){
      $('#divjam').load('jam.php?acak'+ Math.random());
	  }, 1000);
   });
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<div id="divjam" style="font-family:tahoma;"></div>
</body>
</html>
