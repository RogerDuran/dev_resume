<?php
	include_once("../php_includes/check_login_status.php");
	// Initialize any variables that the page might echo
	$u = "";
	$sex = "Male";
	$userlevel = "";
	$country = "";
	$joindate = "";
	$lastsession = "";
	// Make sure the _GET username is set, and sanitize it
	if(isset($_GET["u"]) && isset($_SESSION['username']) ){
		$u = preg_replace('#[^a-z0-9]#i', '', $_GET['u']);
	} else {
		header("location: ../login.php");
		exit();	
	}
	// Select the member from the users table
	$sql = "SELECT * FROM users WHERE username='$u' AND activated='1' LIMIT 1";
	$user_query = mysqli_query($db_conx, $sql);
	// Now make sure that user exists in the table
	$numrows = mysqli_num_rows($user_query);
	if($numrows < 1){
	echo "That user does not exist or is not yet activated, press back";
		exit();	
	}
	// Check to see if the viewer is the account owner
	$isOwner = "no";
	if($u == $log_username && $user_ok == true){
		$isOwner = "yes";
	}
	// Fetch the user row from the query above
	while ($row = mysqli_fetch_array($user_query, MYSQLI_ASSOC)) {
		$profile_id = $row["id"];
		$gender = $row["gender"];
		$country = $row["country"];
		$userlevel = $row["userlevel"];
		$signup = $row["signup"];
		$lastlogin = $row["lastlogin"];
		$joindate = strftime("%b %d, %Y", strtotime($signup));
		$lastsession = strftime("%b %d, %Y", strtotime($lastlogin));
		if($gender == "f"){
			$sex = "Female";
		}
	}
?>

<!DOCTYPE html>

<html>
<head>

<script type="text/javascript">
function yo_loader(url){ 
 
 try{(new Image()).src = url;}catch(e){ } 
 }

</script>
<script type="text/javascript">yo_loader("http://cdn-us-ec.yottaa.net/52e2a71d3c881677d7000369/rwz.myperfectresume.com/v~4.38//account/~/ImageGenerationService.axd?FileID=124509391&yocs=_&yoloc=us");

</script>

<!-- Google Website Optimizer Tracking Script -->

<!-- End of Google Website Optimizer Tracking Script -->
    <title>My Perfect Resume</title>
    
    <link id="ctl00_lnkfaviconimg" rel="shortcut icon" />
    <link type="text/css" rel="stylesheet" href="../css/usercss.css"></link>
    
    <link id="ctl00_lnkStyleSheet4" rel="stylesheet" type="text/css" media="all" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" /></link>
    
	<link id="ctl00_lnkStyleSheetcandidate" rel="stylesheet" type="text/css" media="all" href="../css/usercss1.css"/>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js" type="text/javascript"></script>     
    <script type="text/javascript" src="../js/user.js"></script>   

    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<script src="../js/optimizely.js"></script> 
	
	<script> var _prum = [['id', '522f34dcabe53d934b000000'], ['mark', 'firstbyte', (new Date()).getTime()]]; (function() { var s = document.getElementsByTagName('script')[0], p = document.createElement('script'); p.async = 'async'; p.src = '//rum-static.pingdom.net/prum.min.js';s.parentNode.insertBefore(p, s); })();</script><script type="text/javascript"> var _kmq = _kmq || []; var _kmk = _kmk || '7d9493c382c7cdf6bc07893cf1a50443c13c692d'; function _kms(u){ setTimeout(function(){ var d = document, f = d.getElementsByTagName('script')[0], s = d.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = u; f.parentNode.insertBefore(s, f); }, 1); } _kms('//i.kissmetrics.com/i.js');  _kms('//doug1izaerwt3.cloudfront.net/' + _kmk + '.1.js');</script>
 <!-- REMOVE BY TRANSFORMER. SELECTOR=<script[~.*(var partyid)(?!.*SaveValue.*).*]> --> 
                     
<!--[if IE 8]> <html class="ie8"> <![endif]--> 
<!--[if IE 9]> <html class="ie9"> <![endif]-->  
<!--[if IE 10]> <html class="ie10"> <![endif]-->
<link href="../css/usercss2.css" type="text/css" rel="stylesheet" /></head>
<!-- END OF YOTTAA PREFETCH LOCATION=<body> -->
<!--PREFETCH COOKIES START-->

<script type="text/javascript">yo_loader("yo-app-sequencer.png?v=9NO8HsvHirLkOBVnvssOb9JYSMIxSDjno3qU4SMp3pw37vfkqZ6RdDNDXsVc3uyFJf7MhvmXskax0n2NM5JAEA==&t=o9u412f4G6x6YjxjwU8foQ==&s=e7b74dddc243296656761a14d8683136");

</script>
<!--PREFETCH COOKIES END-->
<body id="ctl00_MasterPageBodyTag" class="bg">
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-3P2N" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript> <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-3P2N');</script>
        
    <form name="aspnetForm" method="post" action="resume-home-rwz.aspx?productid=17" onsubmit="javascript:return WebForm_OnSubmit();" id="aspnetForm">
<div>
<input type="hidden" name="__EVENTTARGET" id="__EVENTTARGET" value="" />
<input type="hidden" name="__EVENTARGUMENT" id="__EVENTARGUMENT" value="" />
<input type="hidden" name="__LASTFOCUS" id="__LASTFOCUS" value="" />
<input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="/wEPDwULLTEyNzQ0OTQzMTgPFhIeCGpvYnRpdGxlBQJhYR4GcmVzdWx0AuaDCh4MdXNlcmxvY2F0aW9uBQJVUx4HanVqdVVSTAXoAWh0dHA6Ly9hcGkuanVqdS5jb20vam9icz9wYXJ0bmVyaWQ9Y2JlYmFmZjk4YWY2ZjcwMmI2YTAwMDgxMDllYTIxMGMmY2hhbm5lbD1tcHJfaG9tZSZrPWFhJmw9MzAwMCZjbz11cyZsaW1pdD0xMCZzdGFydD0wJmlwYWRkcmVzcz01NC4xOTMuMjQuMTcmdXNlcmFnZW50PU1vemlsbGEvNS4wIChXaW5kb3dzIE5UIDYuMTsgV09XNjQ7IHJ2OjI5LjApIEdlY2tvLzIwMTAwMTAxIEZpcmVmb3gvMjkuMCZwYWdlPTAeBnBhZ2VJZGQeBHBlbmQFAjEwHgZwc3RhcnQFATAeCGltYWdlVXJsBS1+L0ltYWdlR2VuZXJhdGlvblNlcnZpY2UuYXhkP0ZpbGVJRD0xMjQxODYyNjQeB3ppcGNvZGUFBDMwMDAWAmYPZBYEAgEPZBYgAgUPFgIeBGhyZWYFFi4uL0NTUy9tdWx0aXBvcnRhbC5jc3NkAgYPFgIfCQUWLi4vQ1NTL3J3ei9idXR0b25zLmNzc2QCBw8WAh8JBRguLi9DU1Mvcnd6L3N0eWxlLXJ3ei5jc3NkAggPFgIfCQVMaHR0cHM6Ly9hamF4Lmdvb2dsZWFwaXMuY29tL2FqYXgvbGlicy9qcXVlcnl1aS8xLjgvdGhlbWVzL2Jhc2UvanF1ZXJ5LXVpLmNzc2QCDA8WAh8JBR0uLi9DU1MvY2FuZGlkYXRlL2NuZHRXenJkLmNzc2QCDg8WAh4EVGV4dAVvPHNjcmlwdCBzcmM9Imh0dHBzOi8vYWpheC5nb29nbGVhcGlzLmNvbS9hamF4L2xpYnMvanF1ZXJ5LzEuNy4xL2pxdWVyeS5taW4uanMiIHR5cGU9InRleHQvamF2YXNjcmlwdCI+PC9zY3JpcHQ+ZAIPDxYCHwoFdTxzY3JpcHQgc3JjPSJodHRwczovL2FqYXguZ29vZ2xlYXBpcy5jb20vYWpheC9saWJzL2pxdWVyeXVpLzEuOC4xNi9qcXVlcnktdWkubWluLmpzIiB0eXBlPSJ0ZXh0L2phdmFzY3JpcHQiPjwvc2NyaXB0PmQCEA8WAh8KBUo8c2NyaXB0IHNyYz0iLi4vLi4vamF2YXNjcmlwdC9yd3ovcnd6LmpzIiB0eXBlPSJ0ZXh0L2phdmFzY3JpcHQiPjwvc2NyaXB0PmQCEQ8WAh8KBVs8c2NyaXB0IGxhbmd1YWdlPSJKYXZhU2NyaXB0IiB0eXBlPSJ0ZXh0L2phdmFzY3JpcHQiIHNyYz0iL2phdmFzY3JpcHQvd2luZG93cy5qcyI+PC9zY3JpcHQ+ZAISDxYCHgdWaXNpYmxlaGQCFQ8WAh8JBRkuLi9pbWFnZXMvcnd6L2Zhdmljb24ucG5nZAIWDxYCHwkFIy4uL2ltYWdlcy9yd3ovdG91Y2gtaWNvbi1pcGhvbmUucG5nZAIXDxYCHwkFIS4uL2ltYWdlcy9yd3ovdG91Y2gtaWNvbi1pcGFkLnBuZ2QCGA8WAh8JBSouLi9pbWFnZXMvcnd6L3RvdWNoLWljb24taXBob25lLXJldGluYS5wbmdkAhkPFgIfCQUoLi4vaW1hZ2VzL3J3ei90b3VjaC1pY29uLWlwYWQtcmV0aW5hLnBuZ2QCHA8WAh8KBdAHPHNjcmlwdCBzcmM9Ii8vY2RuLm9wdGltaXplbHkuY29tL2pzLzEzMDg3MjE1OC5qcyI+PC9zY3JpcHQ+IDxzY3JpcHQ+IHZhciBfcHJ1bSA9IFtbJ2lkJywgJzUyMmYzNGRjYWJlNTNkOTM0YjAwMDAwMCddLCBbJ21hcmsnLCAnZmlyc3RieXRlJywgKG5ldyBEYXRlKCkpLmdldFRpbWUoKV1dOyAoZnVuY3Rpb24oKSB7IHZhciBzID0gZG9jdW1lbnQuZ2V0RWxlbWVudHNCeVRhZ05hbWUoJ3NjcmlwdCcpWzBdLCBwID0gZG9jdW1lbnQuY3JlYXRlRWxlbWVudCgnc2NyaXB0Jyk7IHAuYXN5bmMgPSAnYXN5bmMnOyBwLnNyYyA9ICcvL3J1bS1zdGF0aWMucGluZ2RvbS5uZXQvcHJ1bS5taW4uanMnO3MucGFyZW50Tm9kZS5pbnNlcnRCZWZvcmUocCwgcyk7IH0pKCk7PC9zY3JpcHQ+PHNjcmlwdCB0eXBlPSJ0ZXh0L2phdmFzY3JpcHQiPiB2YXIgX2ttcSA9IF9rbXEgfHwgW107IHZhciBfa21rID0gX2ttayB8fCAnN2Q5NDkzYzM4MmM3Y2RmNmJjMDc4OTNjZjFhNTA0NDNjMTNjNjkyZCc7IGZ1bmN0aW9uIF9rbXModSl7IHNldFRpbWVvdXQoZnVuY3Rpb24oKXsgdmFyIGQgPSBkb2N1bWVudCwgZiA9IGQuZ2V0RWxlbWVudHNCeVRhZ05hbWUoJ3NjcmlwdCcpWzBdLCBzID0gZC5jcmVhdGVFbGVtZW50KCdzY3JpcHQnKTsgcy50eXBlID0gJ3RleHQvamF2YXNjcmlwdCc7IHMuYXN5bmMgPSB0cnVlOyBzLnNyYyA9IHU7IGYucGFyZW50Tm9kZS5pbnNlcnRCZWZvcmUocywgZik7IH0sIDEpOyB9IF9rbXMoJy8vaS5raXNzbWV0cmljcy5jb20vaS5qcycpOyAgX2ttcygnLy9kb3VnMWl6YWVyd3QzLmNsb3VkZnJvbnQubmV0LycgKyBfa21rICsgJy4xLmpzJyk7PC9zY3JpcHQ+PHNjcmlwdCB0eXBlPSJ0ZXh0L2phdmFzY3JpcHQiID4gaWYgKF9rbXEgIT0gbnVsbCkgeyB2YXIgcGFydHlpZCA9ICc2OTU3NTM1OCc7ICBpZiAocGFydHlpZCA+IDApIHsgX2ttcS5wdXNoKFsnaWRlbnRpZnknLCBwYXJ0eWlkXSk7IH0gfTwvc2NyaXB0PmQCAw8WAh4FY2xhc3MFAmJnFghmDxYCHwoF8QM8bm9zY3JpcHQ+PGlmcmFtZSBzcmM9Ii8vd3d3Lmdvb2dsZXRhZ21hbmFnZXIuY29tL25zLmh0bWw/aWQ9R1RNLTNQMk4iIGhlaWdodD0iMCIgd2lkdGg9IjAiIHN0eWxlPSJkaXNwbGF5Om5vbmU7dmlzaWJpbGl0eTpoaWRkZW4iPjwvaWZyYW1lPjwvbm9zY3JpcHQ+IDxzY3JpcHQ+KGZ1bmN0aW9uKHcsZCxzLGwsaSl7d1tsXT13W2xdfHxbXTt3W2xdLnB1c2goeydndG0uc3RhcnQnOm5ldyBEYXRlKCkuZ2V0VGltZSgpLGV2ZW50OidndG0uanMnfSk7dmFyIGY9ZC5nZXRFbGVtZW50c0J5VGFnTmFtZShzKVswXSxqPWQuY3JlYXRlRWxlbWVudChzKSxkbD1sIT0nZGF0YUxheWVyJz8nJmw9JytsOicnO2ouYXN5bmM9dHJ1ZTtqLnNyYz0nLy93d3cuZ29vZ2xldGFnbWFuYWdlci5jb20vZ3RtLmpzP2lkPScraStkbDtmLnBhcmVudE5vZGUuaW5zZXJ0QmVmb3JlKGosZik7fSkod2luZG93LGRvY3VtZW50LCdzY3JpcHQnLCdkYXRhTGF5ZXInLCdHVE0tM1AyTicpOzwvc2NyaXB0PmQCAQ8WAh8LaGQCAg9kFg5mD2QWAgIBD2QWAmYPFgIfC2hkAgEPZBYQAgEPFgIfDAUGYWN0aXZlFgJmDxYCHwkFNGh0dHA6Ly93d3cubXlwZXJmZWN0cmVzdW1lLmNvbS8vYWNjb3VudC9teXN0dWZmLmFzcHhkAgMPZBYEZg8WAh8JBThodHRwOi8vcnd6Lm15cGVyZmVjdHJlc3VtZS5jb20vL2FjY291bnQvcmVzdW1lLWhvbWUuYXNweGQCAg9kFhICAQ9kFgJmDxYCHwkFOGh0dHA6Ly9yd3oubXlwZXJmZWN0cmVzdW1lLmNvbS8vYWNjb3VudC9yZXN1bWUtaG9tZS5hc3B4ZAIDD2QWAmYPFgIfCQU+aHR0cDovL3J3ei5teXBlcmZlY3RyZXN1bWUuY29tLy9qb2JtYWlsL0NyZWF0ZU1haWxBY2NvdW50LmFzcHhkAgUPZBYCZg8WAh8JBS9odHRwOi8vd3d3Lm15cGVyZmVjdHJlc3VtZS5jb20vL3Jlc3VtZS1leGFtcGxlc2QCBw8WAh8LaBYCZg8WAh8JBT9odHRwOi8vd3d3Lm15cGVyZmVjdHJlc3VtZS5jb20vL3Jlc3VtZS1idWlsZGVyL3Jlc3VtZS10ZW1wbGF0ZXNkAgkPFgIfC2gWAmYPFgIfCQUraHR0cDovL3d3dy5teXBlcmZlY3RyZXN1bWUuY29tLy9yZXN1bWUtdGlwc2QCCw8WAh8LaBYCZg8WAh8JBSxodHRwOi8vd3d3Lm15cGVyZmVjdHJlc3VtZS5jb20vL3Jlc3VtZS1jaGVja2QCDQ9kFgJmDxYCHwkFOmh0dHA6Ly9yd3oubXlwZXJmZWN0cmVzdW1lLmNvbS8vYmlsbGluZy9yZXN1bWUtcmV2aWV3LmFzcHhkAg8PFgIfC2gWAmYPFgIfCQU9aHR0cDovL3d3dy5teXBlcmZlY3RyZXN1bWUuY29tLy9yZXN1bWUtYnVpbGRlci9yZXN1bWUtcG9zdGluZ2QCEQ9kFgJmDxYCHwkFO2h0dHA6Ly9yd3oubXlwZXJmZWN0cmVzdW1lLmNvbS8vYmlsbGluZy9yZXN1bWUtd3JpdGluZy5hc3B4ZAIFD2QWBGYPFgIfCQU4aHR0cDovL3J3ei5teXBlcmZlY3RyZXN1bWUuY29tLy9hY2NvdW50L3Jlc3VtZS1ob21lLmFzcHhkAgIPZBYKAgEPZBYCZg8WAh8JBThodHRwOi8vcnd6Lm15cGVyZmVjdHJlc3VtZS5jb20vL2FjY291bnQvcmVzdW1lLWhvbWUuYXNweGQCAw9kFgJmDxYCHwkFPmh0dHA6Ly9yd3oubXlwZXJmZWN0cmVzdW1lLmNvbS8vam9ibWFpbC9DcmVhdGVNYWlsQWNjb3VudC5hc3B4ZAIFDxYCHwtoFgJmDxYCHwkFNWh0dHA6Ly93d3cubXlwZXJmZWN0cmVzdW1lLmNvbS8vY292ZXItbGV0dGVyLWV4YW1wbGVzZAIHDxYCHwtoFgJmDxYCHwkFMWh0dHA6Ly93d3cubXlwZXJmZWN0cmVzdW1lLmNvbS8vY292ZXItbGV0dGVyLXRpcHNkAgkPZBYCZg8WAh8JBTRodHRwOi8vd3d3Lm15cGVyZmVjdHJlc3VtZS5jb20vL2NvdmVyLWxldHRlci13cml0aW5nZAIHDxYCHwtoFgJmDxYCHwkFPWh0dHA6Ly9yd3oubXlwZXJmZWN0cmVzdW1lLmNvbS8vY2FuZGlkYXRlL2NhbmRpZGF0ZS1ob21lLmFzcHhkAgkPZBYIZg8WAh8JBTBodHRwOi8vd3d3Lm15cGVyZmVjdHJlc3VtZS5jb20vL2ludGVydmlldy12aWRlb3NkAgIPFgIfC2gWAmYPFgIfCQUwaHR0cDovL3d3dy5teXBlcmZlY3RyZXN1bWUuY29tLy9pbnRlcnZpZXctdmlkZW9zZAIEDxYCHwtoFgJmDxYCHwkFLmh0dHA6Ly93d3cubXlwZXJmZWN0cmVzdW1lLmNvbS8vaW50ZXJ2aWV3LXRpcHNkAgYPZBYCZg8WAh8JBTNodHRwOi8vd3d3Lm15cGVyZmVjdHJlc3VtZS5jb20vL2ludGVydmlldy1xdWVzdGlvbnNkAgsPZBYIZg8WAh8JBRpodHRwOi8vam9icy5saXZlY2FyZWVyLmNvbWQCAg8WAh8JBRpodHRwOi8vam9icy5saXZlY2FyZWVyLmNvbWQCBA8WAh8JBSlodHRwOi8vd3d3Lm15cGVyZmVjdHJlc3VtZS5jb20vL2pvYnMtdGlwc2QCBg8WAh8JBTpodHRwOi8vd3d3Lm15cGVyZmVjdHJlc3VtZS5jb20vL1NhbGFyeUhvbWUvU2FsYXJ5SG9tZS5hc3B4ZAIND2QWBAIBDxYCHwkFMmh0dHA6Ly93d3cubXlwZXJmZWN0cmVzdW1lLmNvbS8vdGVzdC9UZXN0SG9tZS5hc3B4ZAICD2QWCgIBD2QWAmYPFgIfCQUpaHR0cDovL3d3dy5teXBlcmZlY3RyZXN1bWUuY29tLy9lZHVjYXRpb25kAgMPZBYCZg8WAh8JBTJodHRwOi8vd3d3Lm15cGVyZmVjdHJlc3VtZS5jb20vL3Rlc3QvVGVzdEhvbWUuYXNweGQCBQ9kFgJmDxYCHwkFK2h0dHA6Ly93d3cubXlwZXJmZWN0cmVzdW1lLmNvbS8vY2FyZWVyLXRpcHNkAgcPZBYCZg8WAh8JBTpodHRwOi8vd3d3Lm15cGVyZmVjdHJlc3VtZS5jb20vL1NhbGFyeUhvbWUvU2FsYXJ5SG9tZS5hc3B4ZAIJDxYCHwtoFgJmDxYCHwkFK2h0dHA6Ly93d3cubXlwZXJmZWN0cmVzdW1lLmNvbS8vY2FyZWVyLW5ld3NkAg8PFgIfC2gWAmYPFgIfC2dkAgIPZBYCAgEPZBYCZg8WAh8LaGQCAw9kFg5mDxYCHwtoZAICDxYCHwtoZAIEDxYEHwkFFy4uL0R5bmFtaWNNZW51L21lbnUuY3NzHwtoZAIGDxYCHwtoFgRmD2QWBGYPZBYCAgEPDxYCHghJbWFnZVVybAUXL0ltYWdlcy9sb2dvX2hlYWRlci5naWZkZAICDw8WAh8LaGRkAgQPFgIfC2hkAggPFgIfC2cWBgIDD2QWAgIFDxYCHwtoZAIEDxYEHwoFsAEgPHVsIGNsYXNzPSdjaG9vc2UyJz4gPGxpPjxzcGFuPkNob29zZSBUZW1wbGF0ZTwvc3Bhbj48L2xpPjxsaT48c3Bhbj5CdWlsZCBZb3VyIFJlc3VtZTwvc3Bhbj48L2xpPjxsaT48c3Bhbj5GaW5hbGl6ZTwvc3Bhbj48L2xpPjxsaT48c3BhbiBjbGFzcz0nbGFzdCc+RG93bmxvYWQ8L3NwYW4+PC9saT48L3VsPh8LaGQCBQ8WBB8KBZUBPHVsIGNsYXNzPSdicmVhZGNydW1iJz4gPGxpIGNsYXNzPSdmaXJzdCc+UmVzdW1lIEhlYWRpbmc8L2xpPjxsaT5Xb3JrIEhpc3Rvcnk8L2xpPjxsaT5FZHVjYXRpb248L2xpPjxsaT5Ta2lsbHM8L2xpPjxsaT5Qcm9mZXNzaW9uYWwgU3VtbWFyeTwvbGk+PC91bD4fC2hkAgoPZBYCZg9kFgJmDxYCHwtoZAIMD2QWAmYPFgIeCWlubmVyaHRtbGVkAgUPZBYYAgIPEGQPFgECAxYBBRFQbGFpbiBUZXh0ICgudHh0KWRkAgQPDxYCHwplZGQCBg8PFgIeB1Rvb2xUaXAFFkNvcHkgb2YgYWEgYWEgUmVzdW1lIDJkZAIJDw8WAh8PBQ5hYSBhYSBSZXN1bWUgMmRkAgwPZBYCAgEPEGQPFgECAxYBBRFQbGFpbiBUZXh0ICgudHh0KWRkAg8QEGQQFQMOYWEgYWEgUmVzdW1lIDIOYWEgYWEgUmVzdW1lIDEOYWEgYWEgTGV0dGVyIDEVAw00NTI2NTgxOF5SU01FDTQ0ODQ2OTYyXlJTTUUNNDUxMjQ1OTZeTEVUUhQrAwNnZ2cWAWYUKwADBQdSZXN1bWVzBQdSZXN1bWVzBQdMZXR0ZXJzZAISDxYCHwtnZAIUDxYCHwkFOy4uL3J3ei9hY3Rpb25zL2Rvd25sb2FkLXJ3ei5hc3B4P2RvY2lkPTQ1MjY1ODE4JmRvY1R5cGU9VFhUZAIVDxYCHgVzdHlsZQUPZGlzcGxheTppbmxpbmU7ZAIWDxYCHxAFDWRpc3BsYXk6bm9uZTtkAhcPFgIfC2dkAhsPFgIfC2cWBgICDw8WAh8KBSZQYWdlIDxiPjEgb2YgMTY0MzM8L2I+IGZvciBhYSAgaW4gMzAwMGRkAgQPZBYCZg8WAh4LXyFJdGVtQ291bnQCChYUZg9kFgJmDxUMlAFodHRwOi8vd3d3LmpvYi1zZWFyY2gtZW5naW5lLmNvbS9qYWQvMDAwMDAwMDBja3d6NWM/aW1wcmVzc2lvbl9pZD1BSkFicmVqQVJhMkpVUXZjNjEzWlZ3JnBhcnRuZXJpZD1jYmViYWZmOThhZjZmNzAyYjZhMDAwODEwOWVhMjEwYyZjaGFubmVsPW1wcl9ob21lG2p1anVfcGFydG5lcih0aGlzLCAnOTgyOCcpOxRIZWFsdGhjYXJlIFJlY3J1aXRlchZPbndhcmQgSGVhbHRoY2FyZSBJbmMuCkxpdmluZ3N0b24FRXNzZXgCTkoCVVOyAeKApm9yIGFueSBvdGhlciBjbGFzc2lmaWNhdGlvbiBwcm90ZWN0ZWQgYnkgZmVkZXJhbCwgc3RhdGUgYW5kIGxvY2FsIGxhd3MgYW5kIG9yZGluYW5jZXMsIG5hdGlvbmFsbHkgYW5kIGludGVybmF0aW9uYWxseS4gIDxCPkFBPC9CPiAvRU9FL00vRi9EL1YgSGVhbHRoY2FyZSBSZWNydWl0ZXIgU2FsYXJ5OiBET0WUAWh0dHA6Ly93d3cuam9iLXNlYXJjaC1lbmdpbmUuY29tL2phZC8wMDAwMDAwMGNrd3o1Yz9pbXByZXNzaW9uX2lkPUFKQWJyZWpBUmEySlVRdmM2MTNaVncmcGFydG5lcmlkPWNiZWJhZmY5OGFmNmY3MDJiNmEwMDA4MTA5ZWEyMTBjJmNoYW5uZWw9bXByX2hvbWUbanVqdV9wYXJ0bmVyKHRoaXMsICc5ODI4Jyk7CzI3IGRheXMgYWdvZAIBD2QWAmYPFQyUAWh0dHA6Ly93d3cuam9iLXNlYXJjaC1lbmdpbmUuY29tL2phZC8wMDAwMDAwMGNqdDV2dD9pbXByZXNzaW9uX2lkPURQU0xGS0ZBUmZDNTNON0VVVWlRSkEmcGFydG5lcmlkPWNiZWJhZmY5OGFmNmY3MDJiNmEwMDA4MTA5ZWEyMTBjJmNoYW5uZWw9bXByX2hvbWUbanVqdV9wYXJ0bmVyKHRoaXMsICc5ODI4Jyk7HlRydWNrIERyaXZlci1SZWdpb25hbCBEZWxpdmVyeQZNb2hhd2sHRnJlbW9udAdBbGFtZWRhAkNBAlVTsgHigKZTaG91bGQgYmUgZmFtaWxpYXIgd2l0aCB0aGUgcmVnaW9uIGluIGdlbmVyYWwgYW5kIHRoZSByb3V0ZSBzcGVjaWZpY2FsbHkuIEVFTy8gPEI+QUE8L0I+IC9NRkRWIEVtcGxveWVyIERydWctRnJlZS9Ub2JhY2NvLUZyZWUgV29ya3BsYWNlIE9wdGlvbnMgOiBBcHBseSBmb3IgdGhpcyBqb2Igb25saW5lIEdvlAFodHRwOi8vd3d3LmpvYi1zZWFyY2gtZW5naW5lLmNvbS9qYWQvMDAwMDAwMDBjanQ1dnQ/aW1wcmVzc2lvbl9pZD1EUFNMRktGQVJmQzUzTjdFVVVpUUpBJnBhcnRuZXJpZD1jYmViYWZmOThhZjZmNzAyYjZhMDAwODEwOWVhMjEwYyZjaGFubmVsPW1wcl9ob21lG2p1anVfcGFydG5lcih0aGlzLCAnOTgyOCcpOwo0IGRheXMgYWdvZAICD2QWAmYPFQyUAWh0dHA6Ly93d3cuam9iLXNlYXJjaC1lbmdpbmUuY29tL2phZC8wMDAwMDAwMGNqaG9tcD9pbXByZXNzaW9uX2lkPUFXZk5ROUVTU2llbHAwSmFucHVUNHcmcGFydG5lcmlkPWNiZWJhZmY5OGFmNmY3MDJiNmEwMDA4MTA5ZWEyMTBjJmNoYW5uZWw9bXByX2hvbWUbanVqdV9wYXJ0bmVyKHRoaXMsICc5ODI4Jyk7FFRydWNrIERyaXZlci1TaHV0dGxlBk1vaGF3awdPcmxhbmRvBk9yYW5nZQJGTAJVU7IB4oCmU2hvdWxkIGJlIGZhbWlsaWFyIHdpdGggdGhlIHJlZ2lvbiBpbiBnZW5lcmFsIGFuZCB0aGUgcm91dGUgc3BlY2lmaWNhbGx5LiBFRU8vIDxCPkFBPC9CPiAvTUZEViBFbXBsb3llciBEcnVnLUZyZWUvVG9iYWNjby1GcmVlIFdvcmtwbGFjZSBPcHRpb25zIDogQXBwbHkgZm9yIHRoaXMgam9iIG9ubGluZSBHb5QBaHR0cDovL3d3dy5qb2Itc2VhcmNoLWVuZ2luZS5jb20vamFkLzAwMDAwMDAwY2pob21wP2ltcHJlc3Npb25faWQ9QVdmTlE5RVNTaWVscDBKYW5wdVQ0dyZwYXJ0bmVyaWQ9Y2JlYmFmZjk4YWY2ZjcwMmI2YTAwMDgxMDllYTIxMGMmY2hhbm5lbD1tcHJfaG9tZRtqdWp1X3BhcnRuZXIodGhpcywgJzk4MjgnKTsKNSBkYXlzIGFnb2QCAw9kFgJmDxUMlAFodHRwOi8vd3d3LmpvYi1zZWFyY2gtZW5naW5lLmNvbS9qYWQvMDAwMDAwMDBjZ3ZjbWw/aW1wcmVzc2lvbl9pZD1iWnNnaklCTFM0cUhQZmRkVjd1Vl9RJnBhcnRuZXJpZD1jYmViYWZmOThhZjZmNzAyYjZhMDAwODEwOWVhMjEwYyZjaGFubmVsPW1wcl9ob21lG2p1anVfcGFydG5lcih0aGlzLCAnOTgyOCcpOxBPVFItVHJ1Y2sgRHJpdmVyBk1vaGF3awdGYXlldHRlB0ZheWV0dGUCQUwCVVOyAeKAplNob3VsZCBiZSBmYW1pbGlhciB3aXRoIHRoZSByZWdpb24gaW4gZ2VuZXJhbCBhbmQgdGhlIHJvdXRlIHNwZWNpZmljYWxseS4gRUVPLyA8Qj5BQTwvQj4gL01GRFYgRW1wbG95ZXIgRHJ1Zy1GcmVlL1RvYmFjY28tRnJlZSBXb3JrcGxhY2UgT3B0aW9ucyA6IEFwcGx5IGZvciB0aGlzIGpvYiBvbmxpbmUgR2+UAWh0dHA6Ly93d3cuam9iLXNlYXJjaC1lbmdpbmUuY29tL2phZC8wMDAwMDAwMGNndmNtbD9pbXByZXNzaW9uX2lkPWJac2dqSUJMUzRxSFBmZGRWN3VWX1EmcGFydG5lcmlkPWNiZWJhZmY5OGFmNmY3MDJiNmEwMDA4MTA5ZWEyMTBjJmNoYW5uZWw9bXByX2hvbWUbanVqdV9wYXJ0bmVyKHRoaXMsICc5ODI4Jyk7CzExIGRheXMgYWdvZAIED2QWAmYPFQyUAWh0dHA6Ly93d3cuam9iLXNlYXJjaC1lbmdpbmUuY29tL2phZC8wMDAwMDAwMGNrd3o0YT9pbXByZXNzaW9uX2lkPXQ0bGgydW5kUjEtN1RpSEpjdE80UkEmcGFydG5lcmlkPWNiZWJhZmY5OGFmNmY3MDJiNmEwMDA4MTA5ZWEyMTBjJmNoYW5uZWw9bXByX2hvbWUbanVqdV9wYXJ0bmVyKHRoaXMsICc5ODI4Jyk7HkJ1c2luZXNzIERldmVsb3BtZW50IEFzc29jaWF0ZRJPbndhcmQgU2VhcmNoIEluYy4NU2FuIEZyYW5jaXNjbw1TYW4gRnJhbmNpc2NvAkNBAlVTtAHigKZvdGhlciBjbGFzc2lmaWNhdGlvbiBwcm90ZWN0ZWQgYnkgZmVkZXJhbCwgc3RhdGUgYW5kIGxvY2FsIGxhd3MgYW5kIG9yZGluYW5jZXMsIG5hdGlvbmFsbHkgYW5kIGludGVybmF0aW9uYWxseSAgPEI+QUE8L0I+IC9FT0UvTS9GL0QvViBCdXNpbmVzcyBEZXZlbG9wbWVudCBBc3NvY2lhdGUgU2FsYXJ5OiBET0WUAWh0dHA6Ly93d3cuam9iLXNlYXJjaC1lbmdpbmUuY29tL2phZC8wMDAwMDAwMGNrd3o0YT9pbXByZXNzaW9uX2lkPXQ0bGgydW5kUjEtN1RpSEpjdE80UkEmcGFydG5lcmlkPWNiZWJhZmY5OGFmNmY3MDJiNmEwMDA4MTA5ZWEyMTBjJmNoYW5uZWw9bXByX2hvbWUbanVqdV9wYXJ0bmVyKHRoaXMsICc5ODI4Jyk7CzE1IGRheXMgYWdvZAIFD2QWAmYPFQyUAWh0dHA6Ly93d3cuam9iLXNlYXJjaC1lbmdpbmUuY29tL2phZC8wMDAwMDAwMGNrd3ozMT9pbXByZXNzaW9uX2lkPXpaZGtFQmhDUXNlRzNEV2lUczZQWlEmcGFydG5lcmlkPWNiZWJhZmY5OGFmNmY3MDJiNmEwMDA4MTA5ZWEyMTBjJmNoYW5uZWw9bXByX2hvbWUbanVqdV9wYXJ0bmVyKHRoaXMsICc5ODI4Jyk7FUludGVyYWN0aXZlIFJlY3J1aXRlchJPbndhcmQgU2VhcmNoIEluYy4LTG9zIEFuZ2VsZXMLTG9zIEFuZ2VsZXMCQ0ECVVOpAeKApnByb3RlY3RlZCBieSBmZWRlcmFsLCBzdGF0ZSBhbmQgbG9jYWwgbGF3cyBhbmQgb3JkaW5hbmNlcywgbmF0aW9uYWxseSBhbmQgaW50ZXJuYXRpb25hbGx5ICA8Qj5BQTwvQj4gL0VPRS9NL0YvRC9WIFdobyBXZSBMb29rIEZvciBUaGUgT253YXJkIFNlYXJjaCB0ZWFtIGlzIGEgZ3JvdXAgb2aUAWh0dHA6Ly93d3cuam9iLXNlYXJjaC1lbmdpbmUuY29tL2phZC8wMDAwMDAwMGNrd3ozMT9pbXByZXNzaW9uX2lkPXpaZGtFQmhDUXNlRzNEV2lUczZQWlEmcGFydG5lcmlkPWNiZWJhZmY5OGFmNmY3MDJiNmEwMDA4MTA5ZWEyMTBjJmNoYW5uZWw9bXByX2hvbWUbanVqdV9wYXJ0bmVyKHRoaXMsICc5ODI4Jyk7CzIyIGRheXMgYWdvZAIGD2QWAmYPFQyUAWh0dHA6Ly93d3cuam9iLXNlYXJjaC1lbmdpbmUuY29tL2phZC8wMDAwMDAwMGNrd3ozaj9pbXByZXNzaW9uX2lkPU5LZW5NS0pSUllxU3ByVkxuYkdoS0EmcGFydG5lcmlkPWNiZWJhZmY5OGFmNmY3MDJiNmEwMDA4MTA5ZWEyMTBjJmNoYW5uZWw9bXByX2hvbWUbanVqdV9wYXJ0bmVyKHRoaXMsICc5ODI4Jyk7Ek9wZXJhdGlvbnMgTWFuYWdlchZPbndhcmQgSGVhbHRoY2FyZSBJbmMuCE1lbHZpbGxlB1N1ZmZvbGsCTlkCVVOwAeKApm9yIGFueSBvdGhlciBjbGFzc2lmaWNhdGlvbiBwcm90ZWN0ZWQgYnkgZmVkZXJhbCwgc3RhdGUgYW5kIGxvY2FsIGxhd3MgYW5kIG9yZGluYW5jZXMsIG5hdGlvbmFsbHkgYW5kIGludGVybmF0aW9uYWxseS4gIDxCPkFBPC9CPiAvRU9FL00vRi9EL1YgT3BlcmF0aW9ucyBNYW5hZ2VyIFNhbGFyeTogRE9FlAFodHRwOi8vd3d3LmpvYi1zZWFyY2gtZW5naW5lLmNvbS9qYWQvMDAwMDAwMDBja3d6M2o/aW1wcmVzc2lvbl9pZD1OS2VuTUtKUlJZcVNwclZMbmJHaEtBJnBhcnRuZXJpZD1jYmViYWZmOThhZjZmNzAyYjZhMDAwODEwOWVhMjEwYyZjaGFubmVsPW1wcl9ob21lG2p1anVfcGFydG5lcih0aGlzLCAnOTgyOCcpOwsyNyBkYXlzIGFnb2QCBw9kFgJmDxUMlAFodHRwOi8vd3d3LmpvYi1zZWFyY2gtZW5naW5lLmNvbS9qYWQvMDAwMDAwMDBja3d6NTI/aW1wcmVzc2lvbl9pZD1OblNZR1F6WVNjaVpiMnZReGJzeEdBJnBhcnRuZXJpZD1jYmViYWZmOThhZjZmNzAyYjZhMDAwODEwOWVhMjEwYyZjaGFubmVsPW1wcl9ob21lG2p1anVfcGFydG5lcih0aGlzLCAnOTgyOCcpOxNSZWNydWl0bWVudCBNYW5hZ2VyFk9ud2FyZCBIZWFsdGhjYXJlIEluYy4MTW91bnQgTGF1cmVsCkJ1cmxpbmd0b24CTkoCVVOwAeKApm9yIGFueSBvdGhlciBjbGFzc2lmaWNhdGlvbiBwcm90ZWN0ZWQgYnkgZmVkZXJhbCwgc3RhdGUgYW5kIGxvY2FsIGxhd3MgYW5kIG9yZGluYW5jZXMsIG5hdGlvbmFsbHkgYW5kIGludGVybmF0aW9uYWxseSAgPEI+QUE8L0I+IC9FT0UvTS9GL0QvViBSZWNydWl0bWVudCBNYW5hZ2VyIFNhbGFyeTogRE9FlAFodHRwOi8vd3d3LmpvYi1zZWFyY2gtZW5naW5lLmNvbS9qYWQvMDAwMDAwMDBja3d6NTI/aW1wcmVzc2lvbl9pZD1OblNZR1F6WVNjaVpiMnZReGJzeEdBJnBhcnRuZXJpZD1jYmViYWZmOThhZjZmNzAyYjZhMDAwODEwOWVhMjEwYyZjaGFubmVsPW1wcl9ob21lG2p1anVfcGFydG5lcih0aGlzLCAnOTgyOCcpOwsyNyBkYXlzIGFnb2QCCA9kFgJmDxUMlAFodHRwOi8vd3d3LmpvYi1zZWFyY2gtZW5naW5lLmNvbS9qYWQvMDAwMDAwMDBja3d6MWk/aW1wcmVzc2lvbl9pZD1EWmE3WTc0d1NfU3F5dUxybnJCdFhRJnBhcnRuZXJpZD1jYmViYWZmOThhZjZmNzAyYjZhMDAwODEwOWVhMjEwYyZjaGFubmVsPW1wcl9ob21lG2p1anVfcGFydG5lcih0aGlzLCAnOTgyOCcpOxRIZWFsdGhjYXJlIFJlY3J1aXRlchZPbndhcmQgSGVhbHRoY2FyZSBJbmMuBldpbHRvbglGYWlyZmllbGQCQ1QCVVOyAeKApm9yIGFueSBvdGhlciBjbGFzc2lmaWNhdGlvbiBwcm90ZWN0ZWQgYnkgZmVkZXJhbCwgc3RhdGUgYW5kIGxvY2FsIGxhd3MgYW5kIG9yZGluYW5jZXMsIG5hdGlvbmFsbHkgYW5kIGludGVybmF0aW9uYWxseS4gIDxCPkFBPC9CPiAvRU9FL00vRi9EL1YgSGVhbHRoY2FyZSBSZWNydWl0ZXIgU2FsYXJ5OiBET0WUAWh0dHA6Ly93d3cuam9iLXNlYXJjaC1lbmdpbmUuY29tL2phZC8wMDAwMDAwMGNrd3oxaT9pbXByZXNzaW9uX2lkPURaYTdZNzR3U19TcXl1THJuckJ0WFEmcGFydG5lcmlkPWNiZWJhZmY5OGFmNmY3MDJiNmEwMDA4MTA5ZWEyMTBjJmNoYW5uZWw9bXByX2hvbWUbanVqdV9wYXJ0bmVyKHRoaXMsICc5ODI4Jyk7CzI3IGRheXMgYWdvZAIJD2QWAmYPFQyUAWh0dHA6Ly93d3cuam9iLXNlYXJjaC1lbmdpbmUuY29tL2phZC8wMDAwMDAwMGNqeXZ6aT9pbXByZXNzaW9uX2lkPU4zWlRyQXVjVHpPNy1IS1pWLUFxZUEmcGFydG5lcmlkPWNiZWJhZmY5OGFmNmY3MDJiNmEwMDA4MTA5ZWEyMTBjJmNoYW5uZWw9bXByX2hvbWUbanVqdV9wYXJ0bmVyKHRoaXMsICc5ODI4Jyk7KkJyYW5jaCBNYW5hZ2VyIFRyYWluZWUgSW50ZXJuIChXb29kYnJpZGdlKRVUaGUgSGVydHogQ29ycG9yYXRpb24KV29vZGJyaWRnZQlNaWRkbGVzZXgCTkoCVVO0AeKApmJhY2tncm91bmQgc2NyZWVuaW5nLiAqKkFsbCBjYW5kaWRhdGVzIHdpdGggYSBjb2xsZWdlIGRlZ3JlZSBhcmUgZW5jb3VyYWdlZCB0byBhcHBseS4qKiBFT0UvIDxCPkFBPC9CPiAgTS9GL0QvViBPcHRpb25zIDogWW91ciBhcHBsaWNhdGlvbiBjaG9pY2VzIGFyZTogQXBwbHkgZm9yIHRoaXMgam9iIG9ubGluZZQBaHR0cDovL3d3dy5qb2Itc2VhcmNoLWVuZ2luZS5jb20vamFkLzAwMDAwMDAwY2p5dnppP2ltcHJlc3Npb25faWQ9TjNaVHJBdWNUek83LUhLWlYtQXFlQSZwYXJ0bmVyaWQ9Y2JlYmFmZjk4YWY2ZjcwMmI2YTAwMDgxMDllYTIxMGMmY2hhbm5lbD1tcHJfaG9tZRtqdWp1X3BhcnRuZXIodGhpcywgJzk4MjgnKTsKNCBkYXlzIGFnb2QCBQ9kFgICAQ8PFgweCVBhZ2VDb3VudAIKHghQYWdlU2l6ZQIKHhBUb3RhbE5vT2ZSZWNvcmRzAuaDCh4NU2hvd0ZpcnN0TGFzdGgeCVBhZ2VJbmRleAIBHwtnZGQCBg9kFgRmD2QWAgIBDxYCHwtoZAIHDxYCHwtnZAIHD2QWAmYPFgIfC2hkAgMPFgIfC2hkZKcckBhT6xQuQGN9wnqaS/pyNKZT" />
</div>

<script type="text/javascript">
//<![CDATA[
var theForm = document.forms['aspnetForm'];
if (!theForm) {
    theForm = document.aspnetForm;
}
function __doPostBack(eventTarget, eventArgument) {
    if (!theForm.onsubmit || (theForm.onsubmit() != false)) {
        theForm.__EVENTTARGET.value = eventTarget;
        theForm.__EVENTARGUMENT.value = eventArgument;
        theForm.submit();
    }
}
//]]>
</script>




<script src="../js/user1.js" type="text/javascript"></script>
<script type="text/javascript" src="../js/user2.js"></script>
<script type="text/javascript" src="../js/userscript.js"></script>

<div>

	<input type="hidden" name="__EVENTVALIDATION" id="__EVENTVALIDATION" value="/wEWIAKL29ywDwKlgfWhBwKm6OfxBgLbv9v5DQKg6KfxBgLI8ozzCQLNpMDHBgKarfnoDQLV943HAwKFrfJrAquNp64DAqzU2a8FAtnLjZYLAteTrZINAurv79kIAtGT7ZINArmJxpACArzfiqQNAuvWs4sGAq/7zu8MAtm3/uYKAsLsr5IPAszQi9oCAuXm+mgChIb0rQEChomYpQ4C0d35mAsC4ef6wgIC+JeD5g4C5ZOK8QwCspCA+A4CuJC86QsP4UZszHXC8KxELO4OI3Q9759S3Q==" />
</div>
     <!--START of New header of LSR-->
       
      <!--END of New header of LSR-->
      
        <div id="container" style="">            
            <div id="main" style="">   
             
            <!--header begins here-->
			<script type="text/javascript">
   
    $(function () {
        $(".stng").mouseenter(function () {
            $("#stng-submenu").show();
        }).mouseleave(function () {
            $("#stng-submenu").hide();
        });

        $("#stng-submenu").mouseenter(function () {
            $(this).show();
        }).mouseleave(function () {
            $(this).hide();
        });

    });
</script>

<div id="ctl00_Header1_dvHeader" class="hdr  myRLHdr">
    <h1 id="ctl00_Header1_h1MPR">
        <a href="#" style="background:url(image/user/LogoMPR.gif) no-repeat scroll 0 0 rgba(0, 0, 0, 0); height: 41px;width: 260px;">
        <strong>MyPerfectResume</strong></a>
    </h1>
    <!--end Logo-->
    <div id="dialogResumeHome" class="myPopup" style="display: none; background-color: White;
        width: 300px; height: 146px;">
        <p class="topHd">
            Are you sure?</p>
        <div class="myPopupContent">
            <a href="#" class="close" title="Close" onclick="javascript:return HideresumehomePopUp(1);">
                Close</a>
            <p>
                Any changes you've made on this page will not be saved if you return to My Home.
            </p>
            <p class="btn">
                <span><a href="#" class="button white" onclick="javascript:return HideresumehomePopUp(0);">
                    Yes, go to my home</a></span> <span><a href="#" class="button white" onclick="javascript:return HideresumehomePopUp(1);">
                        Cancel</a></span>
            </p>
        </div>
        <!--end myPopupContent-->
    </div>
    <div id="ctl00_Header1_dvNormalMPRHeader" class="hdrRight">
        <span class="saveRtrn">
            <a href="javascript://" style="display:none" onclick="javascript:showresumehomepopup();">My
                Home</a></span> <span id="myaccountLink"><a
                    href="javascript://" id="testmyacnt" class="myAccount" title="My Account">Account
                    ID:69575358</a>
                    <div class="myAccntOption" style="display: none;">
                        <ul>
                            <li><a href="../profile/settings.php?u=<?php echo $u ?>">My Settings</a> </li>
                            <li><a href="../logout.php">Sign Out</a> </li>
                        </ul>
                    </div>
                    <!--end myAccntOption-->
                </span>
        <!-- BEGIN LivePerson Button Code -->
        <div style="overflow: hidden; height: 50px; float: left; margin: 0 10px 0 0;">
            <div id="lpButDivID-1348467363042">
            </div>
            
            <script type="text/javascript" language="javascript">GenerateLiveHelp("https://server.iad.liveperson.net/hc/69789679/?cmd=mTagRepstate&site=69789679&buttonID=55&divID=lpButDivID-1348467363042&bt=1&c=1");</script>
        </div>
        <!-- END LivePerson Button code -->
    </div>
     <!--end hdrWrapper-->
    <!--end hdrRight-->
    <ul id="ctl00_Header1_myResumeHomeNav" class="myRLNav">
        <li id="ctl00_Header1_myResumesLi"><a href="#" class="act" id="myresumes">
            my resumes<span class="arrow"></span></a> </li>
        <li id="ctl00_Header1_myLettersLi"><a href="#"
            id="myletters">my letters<span class="arrow"></span></a> </li>
        
        <li id="ctl00_Header1_myInterviewLi"><a href="http://www.myperfectresume.com/interview/video/video.aspx">
        my interviews<span class="arrow"></span></a> </li>
        <li id="ctl00_Header1_myResumeReviewLi"><a id="ancResReview" style="display:none;" href="http://rwz.myperfectresume.com/../review/MPR/ResumeReviewStatus.aspx">my resume review<span class="arrow"></span></a> </li>
    </ul>
    <!--end myRLNav-->
    
    
    <!--end top navigation-->
    <script language="javascript" type="text/javascript" src="../js/userscript1.js"></script>
    <a href="#" class="prvwRsm">Preview Resume</a>
</div>






<!--end hdr-->
<div class="clear"></div>
<!--end clear-->
  
         
            <!--header ends here-->
                <!--main content begins here-->            
                         
                <div id="maincontent">            
                 <script type="text/javascript">
//<![CDATA[
Sys.WebForms.PageRequestManager._initialize('ctl00$ScriptManager2', 'aspnetForm', [], [], [], 90, 'ctl00');
//]]>
</script>

                
    
    <link rel="stylesheet" href="../css/usercss3.css" type="text/css" media="all" />    
    <script language="JavaScript" type="text/javascript" src="http://cdn-us-ec.yottaa.net/52e2a71d3c881677d7000369/rwz.myperfectresume.com/v~4.38//javascript/windows.js?yocs=_&amp;yoloc=us"></script>
    <!--[if gte IE 9]>
  <style type="text/css">
  .gradient{filter: none;}
  </style>
<![endif]-->
    <style type="text/css">       
        .notify
        {
            width: 595px;
            padding: 5px 10px;
            background-color: #FFF8AB;
            box-shadow: 3px 2px 2px #888;
            -moz-box-shadow: 3px 2px 2px #888;
            -webkit-box-shadow: 3px 2px 2px #888;
            margin: -10px 150px 10px 295px;
            position: relative;
            z-index: 99; /*vertical-align: middle;*/
        }
        .notify a, .notify a:visited
        {
            color: #1B6496; /*text-decoration: underline;*/
            line-height: 10px;
            vertical-align: baseline;
        }
        .notify a:hover
        {
            text-decoration: none;
        }
        
        #TB_window
        {
            top: 0 !important;
            margin-top: 0 !important;
            z-index: 1001 !important;
        }
        #TB_overlay
        {
            z-index: 1000 !important;
        }
        #TB_title
        {
            display: none !important;
        }
        
        .myPopup p.topHd
        {
            font-size: 14px;
        }
        
        #GB_window .close
        {
            background-image: none;
            right: 0;
            top: 2px;
        }
        
        #rateMe
        {
            float: left;
            clear: both;
            width: 100%;
            height: auto;
            padding: 0px;
            margin: 0px;
        }
        #rateMe li
        {
            float: left;
            list-style: none;
        }
        #rateMe li a:hover, #rateMe .on
        {
            background: url(../../Images/full-star.png) no-repeat;
        }
        #rateMe a
        {
            float: left;
            background: url(../../Images/empty-star.png) no-repeat;
            width: 25px;
            height: 25px;
            cursor: pointer;
        }
        #ratingSaved
        {
            display: none;
        }
        
        
        body.starrating .ui-dialog
        {
            padding: 0 !important;
            width: 500px !important;
            left: 39.2% !important;
            top: 6.9% !important;
            border-radius: 13px 13px 5px 5px !important;
        }
        body.starrating .ui-dialog .ui-dialog-content
        {
            width: 500px !important;
        }
        .strRatingPop
        {
            padding: 20px 10px;
        }
        .strRtnRow
        {
            overflow: hidden;
            margin: 0 0 15px 0;
        }
        .strRatingPop h3
        {
            font-size: 20px;
            font-weight: normal;
            margin: 0 0 15px 0;
        }
        .strRatingPop .fbBox
        {
            width: 395px;
            margin: 15px 0 0 35px;
            border: 1px solid #CCCCCC;
            padding: 5px;
            height: 150px;
            resize: none;
        }
        .strRatingPop input.BtnSbmit
        {
            margin: 0 0 0 66px;
        }
        .copyright
        {
            text-align: center;
            font-size: 11px;
            font-family: Tahoma;
        }
        .copyright a
        {
            color: #0066CC;
        }
        #divThankyou .alignC
        {
            text-align: center;
            margin-top: 180px;
        }
        .mailTo
        {
            color: #0066CC !important;
        }
        .ui-dialog .ui-dialog-content div.copyright
        {
            text-align: center;
        }
        .ui-dialog .ui-dialog-content div.alignC
        {
            text-align: center;
        }
        /* .ui-widget-content{background-image: none !important; border: none !important; background-color: #FFFFFF;}*/
        
        #dialogShareResume
        {
            width: 300px !important;
            min-height: 180px;
        }
        #dialogShareResume .socialLinks
        {
            margin: 34px 15px auto;
            text-align: center;
        }
        #dialogShareResume .socialLinks li
        {
            list-style: none;
            display: inline-block;
            margin: 0 14px 0 0;
        }
        #dialogShareResume .socialLinks li a
        {
            background: url(../Images/resume-home/social-icons.gif) no-repeat 0 0;
            display: block;
            width: 45px;
            height: 45px;
            cursor: pointer;
        }
        #dialogShareResume .socialLinks li a.fb
        {
            background-position: 0 0;
        }
        #dialogShareResume .socialLinks li a.twitter
        {
            background-position: -135px 0;
        }
        #dialogShareResume .socialLinks li a.linked
        {
            background-position: -68px 0;
        }
        #dialogShareResume .socialLinks li a strong
        {
            display: none;
        }
    </style>
    <!-- Start CSS for JobFeed -->
    <style type="text/css">
        /*Start Fonts Source Sans Pro*/
        @font-face
        {
            font-family: 'Source Sans Pro';
            font-style: normal;
            font-weight: 200;
            src: local('Source Sans Pro ExtraLight'),local('SourceSansPro-ExtraLight'),url(http://themes.googleusercontent.com/static/fonts/sourcesanspro/v7/toadOcfmlt9b38dHJxOBGMa9awK0IKUjIWABZIchFI8.woff) format('woff');
        }
        @font-face
        {
            font-family: 'Source Sans Pro';
            font-style: normal;
            font-weight: 300;
            src: local('Source Sans Pro Light'),local('SourceSansPro-Light'),url(http://themes.googleusercontent.com/static/fonts/sourcesanspro/v7/toadOcfmlt9b38dHJxOBGNbE_oMaV8t2eFeISPpzbdE.woff) format('woff');
        }
        @font-face
        {
            font-family: 'Source Sans Pro';
            font-style: normal;
            font-weight: 400;
            src: local('Source Sans Pro'),local('SourceSansPro-Regular'),url(http://themes.googleusercontent.com/static/fonts/sourcesanspro/v7/ODelI1aHBYDBqgeIAH2zlBM0YzuT7MdOe03otPbuUS0.woff) format('woff');
        }
        @font-face
        {
            font-family: 'Source Sans Pro';
            font-style: normal;
            font-weight: 600;
            src: local('Source Sans Pro Semibold'),local('SourceSansPro-Semibold'),url(http://themes.googleusercontent.com/static/fonts/sourcesanspro/v7/toadOcfmlt9b38dHJxOBGJ6-ys_j0H4QL65VLqzI3wI.woff) format('woff');
        }
        @font-face
        {
            font-family: 'Source Sans Pro';
            font-style: normal;
            font-weight: 700;
            src: local('Source Sans Pro Bold'),local('SourceSansPro-Bold'),url(http://themes.googleusercontent.com/static/fonts/sourcesanspro/v7/toadOcfmlt9b38dHJxOBGFkQc6VGVFSmCnC_l7QZG60.woff) format('woff');
        }
        @font-face
        {
            font-family: 'Source Sans Pro';
            font-style: normal;
            font-weight: 900;
            src: local('Source Sans Pro Black'),local('SourceSansPro-Black'),url(http://themes.googleusercontent.com/static/fonts/sourcesanspro/v7/toadOcfmlt9b38dHJxOBGHiec-hVyr2k4iOzEQsW1iE.woff) format('woff');
        }
        @font-face
        {
            font-family: 'Source Sans Pro';
            font-style: italic;
            font-weight: 200;
            src: local('Source Sans Pro ExtraLight Italic'),local('SourceSansPro-ExtraLightIt'),url(http://themes.googleusercontent.com/static/fonts/sourcesanspro/v7/fpTVHK8qsXbIeTHTrnQH6PwwJPUC4r0o28cUCbhjOjM.woff) format('woff');
        }
        @font-face
        {
            font-family: 'Source Sans Pro';
            font-style: italic;
            font-weight: 300;
            src: local('Source Sans Pro Light Italic'),local('SourceSansPro-LightIt'),url(http://themes.googleusercontent.com/static/fonts/sourcesanspro/v7/fpTVHK8qsXbIeTHTrnQH6GGomRtBD2u8FwSY4jjlmeA.woff) format('woff');
        }
        @font-face
        {
            font-family: 'Source Sans Pro';
            font-style: italic;
            font-weight: 400;
            src: local('Source Sans Pro Italic'),local('SourceSansPro-It'),url(http://themes.googleusercontent.com/static/fonts/sourcesanspro/v7/M2Jd71oPJhLKp0zdtTvoMzNrcjQuD0pTu1za2FULaMs.woff) format('woff');
        }
        @font-face
        {
            font-family: 'Source Sans Pro';
            font-style: italic;
            font-weight: 600;
            src: local('Source Sans Pro Semibold Italic'),local('SourceSansPro-SemiboldIt'),url(http://themes.googleusercontent.com/static/fonts/sourcesanspro/v7/fpTVHK8qsXbIeTHTrnQH6PULlOK_XQENnt2ryrY843E.woff) format('woff');
        }
        @font-face
        {
            font-family: 'Source Sans Pro';
            font-style: italic;
            font-weight: 700;
            src: local('Source Sans Pro Bold Italic'),local('SourceSansPro-BoldIt'),url(http://themes.googleusercontent.com/static/fonts/sourcesanspro/v7/fpTVHK8qsXbIeTHTrnQH6Nog-We9VNve39Jr4Vs_aDc.woff) format('woff');
        }
        @font-face
        {
            font-family: 'Source Sans Pro';
            font-style: italic;
            font-weight: 900;
            src: local('Source Sans Pro Black Italic'),local('SourceSansPro-BlackIt'),url(http://themes.googleusercontent.com/static/fonts/sourcesanspro/v7/fpTVHK8qsXbIeTHTrnQH6ONg1gFYvjbPSGxSBhvPu6E.woff) format('woff');
        }
        /*End Fonts Source Sans Pro*/
        
        /*Start CSS3 Button*/
        .bluBtn
        {
            background: #68a5f0; /* Old browsers */ /* IE9 SVG, needs conditional override of 'filter' to 'none' */
            background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iIzY4YTVmMCIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiMyNzY4YjQiIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
            background: -moz-linear-gradient(top,  #68a5f0 0%, #2768b4 100%); /* FF3.6+ */
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#68a5f0), color-stop(100%,#2768b4)); /* Chrome,Safari4+ */
            background: -webkit-linear-gradient(top,  #68a5f0 0%,#2768b4 100%); /* Chrome10+,Safari5.1+ */
            background: -o-linear-gradient(top,  #68a5f0 0%,#2768b4 100%); /* Opera 11.10+ */
            background: -ms-linear-gradient(top,  #68a5f0 0%,#2768b4 100%); /* IE10+ */
            background: linear-gradient(to bottom,  #68a5f0 0%,#2768b4 100%); /* W3C */
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#68a5f0', endColorstr='#2768b4',GradientType=0 ); /* IE6-8 */
        }
        .bluBtn:hover
        {
            background: #2768b4; /* Old browsers */ /* IE9 SVG, needs conditional override of 'filter' to 'none' */
            background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iIzI3NjhiNCIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiM2OGE1ZjAiIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
            background: -moz-linear-gradient(top,  #2768b4 0%, #68a5f0 100%); /* FF3.6+ */
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#2768b4), color-stop(100%,#68a5f0)); /* Chrome,Safari4+ */
            background: -webkit-linear-gradient(top,  #2768b4 0%,#68a5f0 100%); /* Chrome10+,Safari5.1+ */
            background: -o-linear-gradient(top,  #2768b4 0%,#68a5f0 100%); /* Opera 11.10+ */
            background: -ms-linear-gradient(top,  #2768b4 0%,#68a5f0 100%); /* IE10+ */
            background: linear-gradient(to bottom,  #2768b4 0%,#68a5f0 100%); /* W3C */
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#2768b4', endColorstr='#68a5f0',GradientType=0 ); /* IE6-8 */
        }
        
        .grayBtn
        {
            background: #aaaaaa; /* Old browsers */ /* IE9 SVG, needs conditional override of 'filter' to 'none' */
            background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2FhYWFhYSIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiM4OTg5ODkiIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
            background: -moz-linear-gradient(top,  #aaaaaa 0%, #898989 100%); /* FF3.6+ */
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#aaaaaa), color-stop(100%,#898989)); /* Chrome,Safari4+ */
            background: -webkit-linear-gradient(top,  #aaaaaa 0%,#898989 100%); /* Chrome10+,Safari5.1+ */
            background: -o-linear-gradient(top,  #aaaaaa 0%,#898989 100%); /* Opera 11.10+ */
            background: -ms-linear-gradient(top,  #aaaaaa 0%,#898989 100%); /* IE10+ */
            background: linear-gradient(to bottom,  #aaaaaa 0%,#898989 100%); /* W3C */
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#aaaaaa', endColorstr='#898989',GradientType=0 ); /* IE6-8 */
        }
        .grayBtn:hover
        {
            background: #898989; /* Old browsers */ /* IE9 SVG, needs conditional override of 'filter' to 'none' */
            background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iIzg5ODk4OSIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiNhYWFhYWEiIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
            background: -moz-linear-gradient(top,  #898989 0%, #aaaaaa 100%); /* FF3.6+ */
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#898989), color-stop(100%,#aaaaaa)); /* Chrome,Safari4+ */
            background: -webkit-linear-gradient(top,  #898989 0%,#aaaaaa 100%); /* Chrome10+,Safari5.1+ */
            background: -o-linear-gradient(top,  #898989 0%,#aaaaaa 100%); /* Opera 11.10+ */
            background: -ms-linear-gradient(top,  #898989 0%,#aaaaaa 100%); /* IE10+ */
            background: linear-gradient(to bottom,  #898989 0%,#aaaaaa 100%); /* W3C */
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#898989', endColorstr='#aaaaaa',GradientType=0 ); /* IE6-8 */
        }
        /*End CSS3 Button*/
        
        .feedContent
        {
            min-height: inherit;
        }
        
        .feedWrapper, .feedWrapper input
        {
            font-family: 'Source Sans Pro';
            font-style: normal;
        }
        .feedWrapper > h2
        {
            font-weight: 700;
            color: #2B7CDC;
        }
        .feedWrapper a:link, .feedWrapper a:visited, .feedWrapper a:hover
        {
            color: #2B7CDC;
            text-decoration: none;
        }
        .topSrchForm
        {
            clear: both;
            margin: 0;
            overflow: hidden;
        }
        .topSrchForm > h2
        {
            font-weight: 400;
            font-size: 16px;
            color: #666;
            margin: 0 0 10px 0;
        }
        .topSrchForm > input[type=text]
        {
            font-size: 16px;
            color: #666;
            border: 1px solid #DEDEDE;
            border-radius: 5px;
            padding: 14px 16px;
            width: 287px;
            float: left;
            margin: 0 11px 0 0;
        }
        .topSrchForm > a.bluBtnLarge:link, .topSrchForm > a.bluBtnLarge:visited
        {
            font-weight: 700;
            width: 230px;
            text-align: center;
            color: #FFF;
            text-decoration: none;
            display: block;
            float: left;
            cursor: pointer;
            font-size: 24px;
            text-transform: uppercase;
            border-radius: 10px;
            padding: 17px 0;
        }
        .topSrchForm > .bluBtnLarge:hover
        {
            color: #FFF;
            text-decoration: none;
        }
        .topSrchForm span.srchIcon
        {
            background: transparent url("../images/feedIcons.png") -3px -284px no-repeat;
            display: inline-block;
            margin: 0 5px 0 0;
            width: 18px;
            text-indent: -9999999px;
        }
        
        .fltrSec
        {
            float: left;
            width: 230px;
            margin: 35px 50px 0 0;
        }
        .fltrOption
        {
            border: 1px solid #DEDEDE;
            border-radius: 5px;
            margin: 0 0 10px 0;
        }
        .fltrOption > ul > li
        {
            border-bottom: 1px solid #DEDEDE;
            position: relative;
            list-style: none;
        }
        .fltrOption > ul > li.last
        {
            border-bottom: none;
        }
        .fltrOption > ul > li > a
        {
            background: transparent url("../images/feedIcons.png") 198px -94px no-repeat;
            padding: 12px 15px;
            font-size: 16px;
            font-weight: 600;
            color: #5092E4;
            display: block;
        }
        .fltrOption > ul > li > a:hover, .fltrOption > ul > li.active > a
        {
            text-decoration: none;
            background-position: 198px -130px;
            color: #FFF;
            background-color: #2B7CDC;
        }
        .fltrOption > ul > li.first > a
        {
            border-radius: 5px 5px 0 0;
        }
        .fltrOption > ul > li.last > a
        {
            border-radius: 0 0 5px 5px;
        }
        .fltrOption > ul > li.last.active > a
        {
            border-radius: 0;
        }
        .fltrSec a.grayBtnLarge:link, .fltrSec a.grayBtnLarge:visited
        {
            font-weight: 600;
            text-align: center;
            color: #FFF;
            text-decoration: none;
            display: block;
            cursor: pointer;
            font-size: 18px;
            text-transform: uppercase;
            border-radius: 5px;
            padding: 13px 0;
        }
        .fltrSec span.fltrIcon
        {
            background: transparent url("../images/feedIcons.png") -3px -329px no-repeat;
            display: inline-block;
            margin: 0 5px 0 0;
            width: 18px;
            text-indent: -9999999px;
        }
        
        .fltrOption > ul > li > ul
        {
            padding: 0 18px;
            display: none;
        }
        .fltrOption > ul > li.active > ul
        {
            display: block;
        }
        .fltrOption > ul > li > ul > li
        {
            border: none;
            position: relative;
            list-style: none;
        }
        .fltrOption > ul > li > ul > li > a:link, .fltrOption > ul > li > ul > li > a:visited
        {
            background: transparent url("../images/feedIcons.png") -3px -176px no-repeat;
            padding: 12px 0 12px 22px;
            font-size: 14px;
            color: #333;
            display: block;
        }
        .fltrOption > ul > li > ul > li > a:hover, .fltrOption > ul > li > ul > li.slctd > a
        {
            text-decoration: none;
            background-position: -3px -221px;
        }
        
        .rsltSec
        {
            float: left;
            width: 600px;
            padding: 0 15px 0 0;
            margin: 35px 0 0 0;
        }
        .rsltSec > p.rsltSmry
        {
            margin: 0 0 10px 0;
            font-size: 18px;
            font-weight: 300;
        }
        
        .rsltRow
        {
            clear: both;
            padding: 20px 0;
            border-top: 1px solid #DDD;
        }
        .rsltRowStrt
        {
            border: none;
        }
        .rsltRow > h2, .rsltRow > h3
        {
            font-size: 18px;
            font-weight: 400;
            margin: 0 0 10px 0;
            color: #2B7CDC;
        }
        .rsltRow > h3
        {
            color: #333;
            font-size: 16px;
        }
        .rsltRow > p
        {
            color: #666;
            font-size: 16px;
            font-weight: 300;
            line-height: 27px;
        }
        .rsltRow > p.pstd
        {
            font-size: 14px;
            font-weight: 300;
            font-style: italic;
        }
        .rsltNav
        {
            float: right;
        }
        .rsltNav > li
        {
            list-style: none;
            float: left;
            margin: 0 5px;
        }
        .rsltNav > li a
        {
            font-weight: 600;
        }
        .rsltNav > li.actv a:link, .rsltNav > li.actv a:visited
        {
            color: #666;
            cursor: text;
        }
      </style>
    <!-- End CSS for JobFeed -->
    <!--start job feed left filter UI script-->
    <script>
        $(function () {
            /** Show hide fltrOption */
            $(".fltrOption>ul>li>a").on("click", function (e) {
                e.preventDefault();
                $(".fltrOption").find("li").removeClass("active");
                $(this).parent("li").addClass("active");
            });
        });
    </script>
    <!--end job feed left filter UI script-->
    <!-- Start Script for SurveyMonkey -->
    <script type="text/javascript">
        var GB_ROOT_DIR = "greybox/";                             
    </script>
    <link href="http://cdn-us-ec.yottaa.net/52e2a71d3c881677d7000369/rwz.myperfectresume.com/v~4.38//account/greybox/gb_styles.css.Y$DU.css?yocs=_&amp;yoloc=us" rel="stylesheet" type="text/css" media="all" />
    
    
    
    <script type="text/javascript" src="http://cdn-us-ec.yottaa.net/52e2a71d3c881677d7000369/rwz.myperfectresume.com/v~4.38/bbd066669faf0ef69a070bcc3e67c47dY$C.js?yocs=_&amp;yoloc=us&amp;origin=022136c11811"></script>
    <script type="text/javascript">
        var ratingStarVal = '';
        $(document).ready(function () {
            var sHasResumes = 'y'
            if(sHasResumes == 'y')
            {
                $('.intrw').removeAttr('style');
            }

            //Added by Priyanka Jain with context to OPS-1490 on 6 Aug 2013
            
	                var showStarRatingReviewDialog = 'False'
	                var showhdnRatingView = getCookie('Rating_45265818');
	                if (showhdnRatingView == null) {
	                    setCookie('Rating_45265818', 'True', 365);
	                    showhdnRatingView = 'True';
	                }
	                else {
	                    showhdnRatingView = getCookie('Rating_45265818');
	                }
	    
	                if (showStarRatingReviewDialog == 'True' && showhdnRatingView == 'True') {
	                        ShowStarRatingReviewDialog();
	                    }
            

            $(".subsCtiptionRowWrap").on('click',function(){
	            $('.lblRad').removeClass('selected');
	            $(this).find('.lblRad').addClass('selected');
	            $(this).find('input').prop('checked',true);
            });
          
        });
//        function loadGreyBox() {
//            var sUrl = '';
//            if (sUrl != '') {
//                $(".myRLHdr").css({ "z-index": 0 });
//                return GB_show('', '', 680, 970);
//            }
//        } 
         
    </script>
    <!-- End Script for SurveyMonkey -->
    <script type="text/javascript">
        var IsPremiumUser = 'False';
        var DocumentId = '45265818';        
        function OpenPrintWindow(vURL) {
            var DocId = '45265818';
            var Doctype = 'RSME';
            if (DocId != '') {

                

                if (IsPremiumUser == 'True') {
                    if (Doctype == 'LETR') {
                        vURL = 'http://rwz.myperfectresume.com/rwz/actions/print-rwz.aspx?docid=45265818' + '&iefix=fix.pdf';
                        openCenteredWindow(vURL, "print", 600, 640, "location=No,scrollbars=Yes,toolbar=No,resizable=No,directories=No,status=No,menubar=No,hotkeys=No,center=Yes", false);
                    
                    }
                    //                    else {
                    //                        window.location = vURL;
                    //                    }
                }
                else {
                    window.location = "../../billing/SubscriptionMain.aspx?docid=45265818&from=htmlprint";
                }
            }
            else {
                showinfopopup();
            }

        }

        function ShowStarRatingReviewDialog() {

            $('body').addClass('starrating');
            $("#errRating").hide();
            $("#errComment").hide();
            document.getElementById('errRequired').style.visibility = 'hidden';
            //var showStarRatingReviewDialog = 'False'     
 
            //if (showStarRatingReviewDialog == 'True') {               
                $('#divStarRating').show();
                $('#divStarRating').dialog({ resizable: false, modal: true });
                $('#divStarRating').dialog("open");
                $('.ui-dialog-titlebar-close').hide();
                $('.ui-dialog-titlebar').hide();
                return false;
            //}
           
        }

        /* SandeepG.13Nov2013#LCMAIN-1500 - Starts */
        function FireKMEvent(eventstep) {
             
             if (_kmq != null) {
                    if (eventstep == 'MPRTXTDOWNLOAD')
                    _kmq.push(['record', 'Downloads Resume', { 'DocID': '45265818', 'Document file type': 'TXT'}]);                   
        }
             
        }
        /* SandeepG.13Nov2013#LCMAIN-1500 - Ends */

        function CloseReviewDialog() {
              setCookie('Rating_45265818', 'False', 365);
                 $("#divStarRating").dialog('close');
            $('body').removeClass('starrating');
            return true;
        }

        function rateIt(me) {
            clk = 2;
            ratingStarVal = me.title;
        }

        function CheckValid() {
            var IsStarReviewValid = '';
            var IsCommentValid = '';

            if (ratingStarVal == '') {
                $("#errRating").show();
                IsReviewValid = false;
                IsStarReviewValid = false;

            }
            else {
                $("#errRating").hide();
                IsReviewValid = true;
                IsStarReviewValid = true;
            }

            if (document.getElementById("ctl00_ContentPlaceHolder1_txtComment").value == '') {
            
                $("#errComment").show();
                IsReviewValid = false;
                IsCommentValid = false;
            }
            else {
                $("#errComment").hide();
                IsReviewValid = true;
                IsCommentValid = true;
            }
            if (IsStarReviewValid == false || IsCommentValid == false) {
                document.getElementById('errRequired').style.visibility = 'visible';
            }
            else {
                document.getElementById('errRequired').style.visibility = 'hidden';
            }

        }


        function SaveUserReview() {
             CheckValid();
            if (IsReviewValid == true) {
                 var ratingVal = ratingStarVal;
                var commentVal = document.getElementById("ctl00_ContentPlaceHolder1_txtComment").value;
                var subjectVal = commentVal.substring(0, 30);

                $.ajax({
                    type: "POST",
                    url: "resume-home-rwz.aspx/SaveUserReview",
                    data: "{rating:'" + ratingVal + "', subject: '" + subjectVal + "' ,comment: '" + commentVal + "'}",
                    contentType: "application/json; charset=utf-8",
                    dataType: "json",
                    success: function (msg) {
                        UserReviewId = msg.d;
                        //alert(msg.d);
                        document.getElementById("divFeedback").style.display = 'none';
                        document.getElementById("divThankyou").style.display = 'block';
                    },
                    error: function (xhr, status, error) {
                        //alert(xhr.responseText);
                    }
                });
            }

            return false;
        }
        

        function showinfopopup() {
            $('#dialogInfo').show();
            $('#dialogInfo').dialog({ resizable: false });
            $('#dialogInfo').dialog("open");
            $('.ui-dialog-titlebar-close').hide();
            $('.ui-dialog-titlebar').hide();
            $('#dialogInfo').parent().appendTo($("form:first"));    
            //return false;
        }
        function HideInfoPopUp() {
            $("#dialogInfo").dialog('close');
            return true;
        }

        //LCMAIN-1935 start
        
        function showdeleteinfopopup() {
            var isUnderReview = 'False';
            if (isUnderReview == 'True')
            {
                $("#dialog2").dialog('close');
                $('#divReviewIPDelete').show();
                $('#divReviewIPDelete').dialog({ resizable: false });
                $('#divReviewIPDelete').dialog("open");
                $('.ui-dialog-titlebar-close').hide();
                $('.ui-dialog-titlebar').hide();
                $('#divReviewIPDelete').parent().appendTo($("form:first")); 
                return false;
            }
            else
            {
                $("#dialog2").dialog('close');
                return true;
            }
            return false;
        }
        function HideDeleteInfoPopUp() {
            $("#divReviewIPDelete").dialog('close');
            return true;
        }

        function showEditInfoPopup() {
            var isUnderReview = 'False';
            if (isUnderReview == 'True')
            {
                $('#divReviewIPEdit').show();
                $('#divReviewIPEdit').dialog({ resizable: false });
                $('#divReviewIPEdit').dialog("open");
                $('.ui-dialog-titlebar-close').hide();
                $('.ui-dialog-titlebar').hide();
                $('#divReviewIPEdit').parent().appendTo($("form:first")); 
                return false;
            }
            else {
            location = "../rwz/build/final-resume.aspx?mode=edit&docid=45265818";
            }
        }
        function hideEditInfoPopUp() {
            $("#divReviewIPEdit").dialog('close');
            window.location = '../rwz/build/final-resume.aspx?mode=edit&docid=45265818';
            return true;
        }
        $(document).ready(function() {
        var showRR = "False";
            var isMPR = "True";

            if (showRR == "True") {
                if (isMPR == "True")
                    $("#ancResReview").show();
                else {
                    $("#mpclAnchResumeReview").show();
                }
            }
        });

        //LCMAIN-1935 end

        function showdownloadpopup() {      
            var DocId = '45265818';
           
            if (DocId != '') {
                $('#dialog1').show();
                $('#dialog1').dialog({ resizable: false, modal: true });
                $('#dialog1').dialog("open");
                $('.ui-dialog-titlebar-close').hide();
                $('.ui-dialog-titlebar').hide();
                $('#dialog1').parent().appendTo($("form:first"));
            }
            else {
                showinfopopup();
            }
            //return false;
        }



        function HideDownloadPopUp() {
           $("#dialog1").dialog('close');
       }
       function LogKissMatricsDownLoad() {
           var isPremiumUser = 'False';
           var rblSelectedValue = $("#ctl00_ContentPlaceHolder1_rdBtnListFormat input:checked").val();//Added by AB on 7th Jan, 2014 for AN-35
           if (isPremiumUser) {
               if (_kmq != null) {
                   _kmq.push(['record', 'Downloads Resume', { 'DocID': '45265818', 'Document file type': rblSelectedValue}]);
               }
           }
       }
        function LogKissMatricsMailSent() {
          if (_kmq != null) {

              _kmq.push(['record', 'Emails Resume', { 'DocID': '45265818'}]);
            }
        }
        function showdeletepopup() {
            var DocId = '45265818';
            if (DocId != '') {             
                if ($("#lblDeleteErrMsg").text() == "")
                    $('#errMsg').hide();
                $('#dialog2').show();
                $('#dialog2').dialog({ resizable: false, modal: true });
                $('#dialog2').dialog("open");
                $('.ui-dialog-titlebar-close').hide();
                $('.ui-dialog-titlebar').hide();
                $('#dialog2').parent().appendTo($("form:first"));
               
                //return false;
            }
            else {
                showinfopopup();
            }
        }

        function HideDeletePopUp() {
            $("#dialog2").dialog('close');
            return true;
        }

        function showduplicatepopup() {
            var DocId = '45265818';
            if (DocId != '') {
                $("#lblDuplicateErrMsg").html('');
                $('#dialog3').show();
                $('#dialog3').dialog({ resizable: false, modal: true });
                $('#dialog3').dialog("open");
                $('.ui-dialog-titlebar-close').hide();
                $('.ui-dialog-titlebar').hide();
                $('#dialog3').parent().appendTo($("form:first"));
                //return false;
            }
            else {
                showinfopopup();
            }
        }
        function HideDuplicatePopUp() {
            $("#dialog3").dialog('close');
            return true;
        }
        function showrenamepopup() {
            var DocId = '45265818';
            if (DocId != '') {
                $("#lblRenameErrMsg").html('');
                $('#dialog4').show();
                $('#dialog4').dialog({ resizable: false, modal: true });
                $('#dialog4').dialog("open");
                $('.ui-dialog-titlebar-close').hide();
                $('.ui-dialog-titlebar').hide();
                $('#dialog4').parent().appendTo($("form:first"));

                //return false;
            }
            else {
                showinfopopup();
            }
        }

        function RenameFocus(e) {

            var unicode = e.keyCode ? e.keyCode : e.charCode
            if (unicode == 13) {
                $('#btnRename').click(); return false;
            }

        }


        function DuplicateFocus(e) {
            var unicode = e.keyCode ? e.keyCode : e.charCode
            if (unicode == 13) {
                $('#btnDuplicate').click(); return false;
            }

        }


        function HideRenamePopUp() {
            $("#dialog4").dialog('close');
            return true;
        }

        function DuplicateDocument() {
            var DuplicateDocName = $("#txtDuplicateRsmName").val();
            var result = ValidateName(DuplicateDocName);
            if (result == "1") {
                $.ajax({
                    type: "POST",
                    url: "resume-home-rwz.aspx/DuplicateDocument",
                    data: "{'DuplicateDocName': '" + DuplicateDocName + "','DocId': '45265818','PartyId': '69575358'}",
                    contentType: "application/json",
                    dataType: "json",
                    success: function (msg) {
                        if (msg.d == "-2") {
                            $("#lblDuplicateErrMsg").html("\"" + DuplicateDocName + "\" already exists. Please enter a different name.");
                        }
                        else if (msg.d == "-1") {
                            $("#lblDuplicateErrMsg").html("Please enter name for duplicate resume");
                        }
                        else if (msg.d == "0") {
                            $("#lblDuplicateErrMsg").html("There is some isssue with saving the duplicate resume");
                        }
                        else {
                            HideDuplicatePopUp();
                            window.location = "resume-home-rwz.aspx?skipevm=1&docid=" + msg.d;
                        }
                    },
                    error: function (xhr, status, error) {
                        //alert(xhr.responseText);
                    }
                });
            }
            else {
                $("#lblDuplicateErrMsg").html(result);
            }
        }

        function RenameDocument() {
            var NewDocName = $("#txtRenameRsm").val();
            var result = ValidateName(NewDocName);
            if (result == "1") {
                $.ajax({
                    type: "POST",
                    url: "resume-home-rwz.aspx/RenameDocument",
                    data: "{'NewDocName': '" + NewDocName + "','DocId': '45265818','PartyId': '69575358'}",
                    contentType: "application/json",
                    dataType: "json",
                    success: function (msg) {
                        if (msg.d == "-2") {
                            $("#lblRenameErrMsg").html("\"" + NewDocName + "\" already exists. Please enter a different name.");
                        }
                        else if (msg.d == "-1") {
                            $("#lblRenameErrMsg").html("Please enter name for renaming the resume");
                        }
                        else if (msg.d == "0") {
                            $("#lblRenameErrMsg").html("There is some isssue with renaming resume");
                        }
                        else {
                            HideRenamePopUp();
                            window.location = "resume-home-rwz.aspx?skipevm=1&docid=" + msg.d;
                        }
                    },
                    error: function (xhr, status, error) {
                        //alert(xhr.responseText);
                    }
                });
            }
            else {
                $("#lblRenameErrMsg").html(result);
            }
        }
        function ValidateName(name)
        // check for invalid characters 
        {
            var strString = name;
            var strValidChars = "!@#$%^&*()+=[]\\;,/{}|\":<>?";
            var strChar;
            var result = "1";

            // test strString consists of invalid characters listed above 
            for (i = 0; i < strString.length && result == true; i++) {
                strChar = strString.charAt(i);
                if (strValidChars.indexOf(strChar) != -1) {
                    result = "0";
                    return "Please do not use special characters";
                }
            }
            return result;
        }               

        $(document).ready(function () {
         //Added by Amit Dutta for LCMAIN-1848
         var showIntvVal = '';
         if(showIntvVal == "Y")
         {
         GB_show('', 'https://www.surveymonkey.com/s/MPR_Interview_Survey', 680, 970);
            $.ajax({
                    type: "POST",
                    url: "resume-home-rwz.aspx/SaveUserPreference",
                    contentType: "application/json; charset=utf-8",
                    dataType: "json",
                    success: function (msg) {                  
                    },
                    error: function (xhr, status, error) {
         }
                });
         }

            var i = 0;
            var search = location.search;
            var srchValues = search.substr(1).split('&');

            var doctyp = "RSME";
            if (doctyp == "RSME") {
                $("#myresumes").addClass("act");
                $("#myletters").removeClass("act");
                $("#mpclresumes").addClass("act");
                $("#mpclletters").removeClass("act");
            }
            else if (doctyp == "LETR") {
                $("#myresumes").removeClass("act");
                $("#myletters").addClass("act");
                $("#mpclresumes").removeClass("act");
                $("#mpclletters").addClass("act");
                $("#docImage").prop("alt","Letter");
            }

            if (DocumentId == "") {
                $('#aPrintLink').removeClass("thickbox");
            }
            else {
                $('#aPrintLink').addClass("thickbox");
            }

        });

        function gotoBuilder() {
            showEditInfoPopup();
            //location = "../rwz/build/final-resume.aspx?mode=edit&docid=45265818";
        }

        $('#aSSdismiss').live('click', function () {
            $('#dvSSNotify').slideUp('fast', function () { $('#dvSSNotify').remove(); });
        });

        $(function () {
            notify('<div style="text-align:left; width:100%">There is a problem with your subscription. Please review your payment details.<a href=""> Fix it now >></a><div style="float:right; vertical-align:middle; margin-top:3px;"><a id=aSSdismiss href="#">[x]</a></div></div>', 0);

            notify('<div style="text-align:center"><a href="http://www.myperfectresume.com//general/transfer.aspx?targ=http%3a%2f%2fcl.myperfectcoverletter.com%2fmpcl%2ftemplate%2fcoverletter.aspx">New! Create a Cover Letter to send with your resume >></a></div>', 1);
        });

        function notify(msg, flag) {
            if (flag == 0)
                $('<div>').add('#dvSSNotify').addClass('notify').html(msg).slideDown();
            if (flag == 1)
                $('<div>').add('#dvCLNotify').addClass('notify').html(msg).slideDown();

        }
        function ValidatePrint(documentId) {
            if (documentId == "") {
                showinfopopup(); return false;
            }
            else {
                return true;
            }

        }
        function setCookie(c_name, value, exdays) {
            var exdate = new Date();
            exdate.setDate(exdate.getDate() + exdays);
            var c_value = escape(value) + ((exdays == null) ? "" : "; expires=" + exdate.toUTCString());
            document.cookie = c_name + "=" + c_value;
        }
        function getCookie(c_name) {
            var c_value = document.cookie;
            var c_start = c_value.indexOf(" " + c_name + "=");
            if (c_start == -1) {
                c_start = c_value.indexOf(c_name + "=");
            }
            if (c_start == -1) {
                c_value = null;
            }
            else {
                c_start = c_value.indexOf("=", c_start) + 1;
                var c_end = c_value.indexOf(";", c_start);
                if (c_end == -1) {
                    c_end = c_value.length;
                }
                c_value = unescape(c_value.substring(c_start, c_end));
            }
            return c_value;
        }

                //LCMAIN - 1574 Start
        function showResumeCheckLink() {
            var chkPrem = 'True';
            if (chkPrem == 'True') {
                $("[id*='liResCheck']").show();
            
            //check to true for paid user
            if (IsPremiumUser == 'True') {
                $("[id*='aResCheck']").attr('href', '#');
                $("[id*='aResCheck']").attr('onclick', 'javascript:redirectToResumeCheck();');
            }
            else {
                $("[id*='aResCheck']").attr('href', '#');
                $("[id*='aResCheck']").attr('onclick', 'javascript:redirectToBilling();');
            }
            }
        }

        function redirectToBilling() {
            logKMEvent('USRC');            
            window.location.replace("http://rwz.myperfectresume.com//billing/SubscriptionMain.aspx?from=resumehome&docid=45265818");
        }

        function redirectToResumeCheck() {
            logKMEvent('SRC');
            //window.location.replace("http://rwz.myperfectresume.com/rwz/build/final-resume.aspx?mode=edit&resumeCheck=true&docid=45265818");
            var redirectURL = "../rwz/build/final-resume.aspx?mode=edit&docid=45265818";
            if (redirectURL.indexOf("targ") == -1)
                redirectURL = redirectURL + "&resumeCheck=true";
            else
                redirectURL = redirectURL + "%26resumeCheck%3Dtrue";
            window.location.replace(redirectURL); //LCMAIN-2021
        }

        function logKMEvent(eventstep) {
            if (_kmq != null) {
                if (eventstep == 'SRC') {
                    _kmq.push(['record', 'Paid Resume Check Home']);
                }
                else if (eventstep == 'USRC')
                    _kmq.push(['record', 'UnPaid Resume Check Home']);
            }
        }
        //LCMAIN - 1574 End
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
        showResumeCheckLink();//to show Resume Check button - LCMAIN - 1574
            var doctyp = "RSME";
            if (doctyp == "LETR") {
                  $('#logo a').css('background', 'url("image/user/logo.png") no-repeat scroll 0 0 transparent')
                    $('#logo a').css('width', '360')
                    $('#logo a').css('height', '50')
                 
                    $('.hdr.myRLHdr h1 a').css('background', 'url("image/user/logo.png") no-repeat scroll 0 0 transparent')
                    $('.hdr.myRLHdr h1 a').css('width', '360')
                    $('.hdr.myRLHdr h1 a').css('height', '50')
                   
            } else {
                
                    $('.hdr.myRLHdr h1 a').css('background', 'url("image/user/LogoMPR.gif") no-repeat scroll 0 0 transparent')
                    $('.hdr.myRLHdr h1 a').css('width', '360')
                    $('.hdr.myRLHdr h1 a').css('height', '50')
                
            }
        });

        function getParameterByName(name) {
         name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
         var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
         results = regex.exec(location.search);
        return results == null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
        }

        function showResumeSharePopup(){
        
            var DocId = '45265818';
           
            if (DocId != '') {
                $('#dialogShareResume').show();
                $('#dialogShareResume').dialog({ resizable: false, modal: true });
                $('#dialogShareResume').dialog("open");
                $('.ui-dialog-titlebar-close').hide();
                $('.ui-dialog-titlebar').hide();
                $('#dialogShareResume').parent().appendTo($("form:first"));
            }
            
          }

      function HideResumeSharePopUp() {
       $("#dialogShareResume").dialog('close');
//            $('#overlayDiv').hide();
//            $("#dialogShareResume").hide();
            return true;
        }

         function opennewwindow(vURL,Flag) {
       HideResumeSharePopUp();
            var hdFlag = document.getElementById("ctl00_ContentPlaceHolder1_hd2");
            if (hdFlag != null) {
                hdFlag.value = Flag;
                document.aspnetForm.submit();
            }
            openCenteredWindow(vURL, 'Share', 500, 300, "location=No,scrollbars=Yes,toolbar=No,resizable=No,directories=No,status=No,menubar=No,hotkeys=No,center=Yes", false);
		var hd = document.getElementById("ctl00_ContentPlaceHolder1_hdf1");
	
		if (hd != null) {
	    hd.value = "1";
		    //document.aspnetForm.submit();
	}
	    
	}
    </script>
    <style type="text/css">
        #GB_window
        {
            left: 0;
            top: 0;
            font-size: 1px;
            position: absolute;
            overflow: visible;
            z-index: 1002 !important;
        }
    </style>
    <script src="http://cdn-us-ec.yottaa.net/52e2a71d3c881677d7000369/rwz.myperfectresume.com/v~4.38/javascript/rwz/thickbox-print.js?yocs=_&amp;yoloc=us" type="text/javascript"></script>
    <link href="http://cdn-us-ec.yottaa.net/52e2a71d3c881677d7000369/rwz.myperfectresume.com/v~4.38/CSS/rwz/thickbox.css.Y$DU.css?yocs=_&amp;yoloc=us" rel="stylesheet" type="text/css" />
    
    <input type="hidden" name="ctl00$ContentPlaceHolder1$hdf1" id="ctl00_ContentPlaceHolder1_hdf1" value="0" />
    <div id="dialogInfo" class="myPopup" style="display: none; background-color: White">
        <p class="topHd topHdOthr">
            Information</p>
        <div class="myPopupContent">
            <a href="#" class="close" title="Close" onclick="javascript:HideInfoPopUp();">Close</a>
            <p>
                <strong>You don't have any
                    resume
                    to perform this action.
                    <br />
                    Please create atleast one
                    resume.</strong>
            </p>
            <p class="btn">
                <a href="#" class="button white" onclick="javascript:HideInfoPopUp();">OK</a>
            </p>
        </div>
        <!--end myPopupContent-->
    </div>
    <!--end dialogInfo-->
    <!--LCMAIN-1935 start-->
        <div id="divReviewIPDelete" class="myPopup" style="display: none; background-color: White">
        <p class="topHd topHdOthr">
            Information about your resume</p>
        <div class="myPopupContent">
            <a href="#" class="close" title="Close" onclick="javascript:HideDeleteInfoPopUp();">Close</a>
            <p>
                Your Resume Review is currently in progress for this resume, so we are unable to delete it at this time.
            </p>
            <p class="btn">
                <a href="#" class="button white" onclick="javascript:HideDeleteInfoPopUp();">OK</a>
            </p>
        </div>
        <!--end myPopupContent-->
    </div>
    <!--end divReviewIPDelete-->
            <div id="divReviewIPEdit" class="myPopup" style="display: none; background-color: White">
        <p class="topHd topHdOthr">
            Information about your resume</p>
        <div class="myPopupContent">
            <a href="#" class="close" title="Close" onclick="javascript:hideEditInfoPopUp();">Close</a>
            <p>
                You have a resume review in progress, so any changes that you make to your resume now <strong style="font-weight: bold;">will not</strong> be reflected in your Review.
            </p>
            <p class="btn" style="display:block; padding: 0;">
                <a href="#" class="button white" onclick="javascript:hideEditInfoPopUp();">OK</a>
            </p>
        </div>
        <!--end myPopupContent-->
    </div>
    <!--end divReviewIPEdit-->
    <!--LCMAIN-1935 end-->

    <div id="dialog1" class="myPopup" style="display: none; background-color: White">
        <p class="topHd topHdOthr">
            Download</p>
        <div class="myPopupContent">
            <a href="#" class="close" title="Close" onclick="javascript:HideDownloadPopUp();">Close</a>
            <p>
                <strong>Which format do you want to use?</strong>
            </p>
            <p>
                <table id="ctl00_ContentPlaceHolder1_rdBtnListFormat" border="0">
	<tr>
		<td><input id="ctl00_ContentPlaceHolder1_rdBtnListFormat_0" type="radio" name="ctl00$ContentPlaceHolder1$rdBtnListFormat" value="PDF" checked="checked" /><label for="ctl00_ContentPlaceHolder1_rdBtnListFormat_0">Adobe PDF (.pdf)</label></td>
	</tr><tr>
		<td><input id="ctl00_ContentPlaceHolder1_rdBtnListFormat_1" type="radio" name="ctl00$ContentPlaceHolder1$rdBtnListFormat" value="HTML" /><label for="ctl00_ContentPlaceHolder1_rdBtnListFormat_1">Web Page (.html)</label></td>
	</tr><tr>
		<td><input id="ctl00_ContentPlaceHolder1_rdBtnListFormat_2" type="radio" name="ctl00$ContentPlaceHolder1$rdBtnListFormat" value="RTF" /><label for="ctl00_ContentPlaceHolder1_rdBtnListFormat_2">Rich Text (.rtf)</label></td>
	</tr><tr>
		<td><input id="ctl00_ContentPlaceHolder1_rdBtnListFormat_3" type="radio" name="ctl00$ContentPlaceHolder1$rdBtnListFormat" value="TXT" /><label for="ctl00_ContentPlaceHolder1_rdBtnListFormat_3">Plain Text (.txt)</label></td>
	</tr><tr>
		<td><input id="ctl00_ContentPlaceHolder1_rdBtnListFormat_4" type="radio" name="ctl00$ContentPlaceHolder1$rdBtnListFormat" value="DOCX" /><label for="ctl00_ContentPlaceHolder1_rdBtnListFormat_4">MS Word document (.docx)</label></td>
	</tr>
</table>
            </p>
            <p class="btn">
                <a href="#" class="button white" onclick="javascript:HideDownloadPopUp();">Cancel</a>
                <input type="button" name="ctl00$ContentPlaceHolder1$btnDownload" value="Download" onclick="javascript:HideDownloadPopUp();LogKissMatricsDownLoad();__doPostBack('ctl00$ContentPlaceHolder1$btnDownload','')" id="ctl00_ContentPlaceHolder1_btnDownload" class="button white" />
            </p>
        </div>
        <!--end myPopupContent-->
    </div>
    <!--end dialog1-->
    <div id="dialog2" class="myPopup" style="display: none; background-color: White">
        <p class="topHd topHdOthr">
            Delete</p>
        <div class="myPopupContent">
            <a href="#" class="close" title="Close" onclick="javascript:HideDeletePopUp();">Close</a>
            <p id="errMsg">
                <span id="lblDeleteErrMsg" style="color:Red;"></span>
                &nbsp;
            </p>
            
            <p>
                <strong>Are you sure you want to delete this
                    resume?</strong>
            </p>
            <p class="btn">
                <a href="#" class="button white" onclick="javascript:HideDeletePopUp();">Cancel</a>
                <input type="submit" name="ctl00$ContentPlaceHolder1$btnDelete" value="Delete" onclick="return showdeleteinfopopup();" id="ctl00_ContentPlaceHolder1_btnDelete" class="button white" /><!--LCMAIN-1935-->
            </p>
            
        </div>
        <!--end myPopupContent-->
    </div>
    <!--end dialog2-->
    <div id="dialog3" class="myPopup" style="display: none; background-color: White;">
        <p class="topHd topHdOthr">
            Duplicate</p>
        <div class="myPopupContent">
            <a href="#" class="close" title="Close" onclick="javascript:HideDuplicatePopUp();">Close</a>
            <p>
                <strong>What do you want to name your duplicate
                    resume?</strong>
            </p>
            <p>
                <input name="ctl00$ContentPlaceHolder1$txtDuplicateRsmName" type="text" value="Copy of aa aa Resume 2" id="txtDuplicateRsmName" title="Copy of aa aa Resume 2" class="txt" onkeyup="javascript:DuplicateFocus(event);" />
            </p>
            <p>
                <span id="lblDuplicateErrMsg" style="color:Red;"></span>
            </p>
            <p class="btn">
                <a href="#" class="button white" onclick="javascript:HideDuplicatePopUp();">Cancel</a>
                <a href="#" id="btnDuplicate" class="button white" onclick="javascript:DuplicateDocument();">Save</a>
            </p>
        </div>
        <!--end myPopupContent-->
    </div>
    <!--end dialog3-->
    <div id="dialog4" class="myPopup" style="display: none; background-color: White">
        <p class="topHd topHdOthr">
            Rename</p>
        <div class="myPopupContent">
            <a href="#" class="close" title="Close" onclick="javascript:HideRenamePopUp();">Close</a>
            <p>
                <strong>What do you want to rename your
                    resume?</strong>
            </p>
            <p>
                <input name="ctl00$ContentPlaceHolder1$txtRenameRsm" type="text" value="aa aa Resume 2" id="txtRenameRsm" title="aa aa Resume 2" class="txt" onkeyup="javascript:RenameFocus(event);" />
            </p>
            <p>
                <span id="lblRenameErrMsg" style="color:Red;"></span>
            </p>
            <p class="btn">
                <a href="#" class="button white" onclick="javascript:HideRenamePopUp();">Cancel</a>
                <a href="#" id="btnRename" class="button white" onclick="javascript:RenameDocument();">Rename</a>
            </p>
        </div>
        <!--end myPopupContent-->
    </div>
    <!--end dialog4-->
    <div id="EmailDialog" class="myPopup">
        

    <style>
   
   *{margin: 0; padding: 0;}
  body{font-family: Tahoma, Geneva, sans-serif; font-size:12px; color:#333333;}
 .myPopupContent{font-family: Verdana,?Arial,?sans-serif;}
 .myPopupContent p{font-size: 12px;}
 .clear{clear: both;}
 #inline{display: none;}
.emailPopWrap{margin: 0 auto; padding: 0 0 5px 0; width: 456px; border: 2px solid #e6e6e5; border-radius: 4px; -moz-border-radius: 4px; -webkit-border-radius: 4px; background-color: #FFFFFF; line-height: 22px; position: relative;}
.emailPopWrap h2{padding: 4px 5px 5px 32px; font-size: 12px; font-weight: bold; color: #FFFFFF; border-radius: 3px 3px 0 0; -moz-border-radius: 3px 3px 0 0; -webkit-border-radius: 3px 3px 0 0; background: #007ad9 url(../../Images/rwz/mail.png) no-repeat 5px 0; font-family: Verdana;}
.emailContentWrap{width: 630px; overflow: hidden; padding: 0 0 5px 0;}
.emailPopWrap .alignC{text-align: center;}
.emailForm{margin: 0; padding: 0;}
.emailContentWrap p.closeConfrm{padding: 190px 0 0 0;}
.emailContentWrap p.thanksMsg{padding: 20px 0;}
.emailContentWrap a{color: #0000EE; text-decoration: underline;}
.emailForm li{list-style: none; border-bottom: 1px solid #e6e6e5; margin: 0; position: relative;}
.emailForm li.last{ margin: 0; overflow: hidden; border: none;}
.emailForm label{float: left; padding: 0 5px 0 10px;}
.emailForm input{border:none;  padding: 5px; width: 353px; color: #777777; font-size: 12px; font-family: Verdana;}
.emailForm input.emailBtn{float: right; width:115px; height:42px; display:block; cursor:pointer; background: url(../../Images/rwz/btn-send-mpr.png) no-repeat 0 bottom; text-indent: -99999px; margin: 22px 10px 0 0}
.emailForm .msgBox{border:none; padding: 5px; width: 625px; color: #777777; overflow: auto;resize: none; height: 180px;}
.error{color:#ff0000; font-size: 12px; margin: 0 5px 0 0; float: left;}

.attachementBox{float: left; text-align: center; border: 1px solid #e6e6e5; padding: 5px; border-radius:3px; -moz-border-radius:3px; -webkit-border-radius:3px; margin: 5px 0 0 5px;}
.attachementBox span{display: block; clear:both; padding:0 5px; line-height: normal; color:#777777; font-size: 10px; font-weight: bold;}
.attachementBox span.resumeName{color:#0463ad; }


.btnClose{display: block; height: 12px; width: 12px; position:absolute; right:10px; top:10px; background: url(../../Images/rwz/button-close.png) no-repeat 0 0;}
.btnClose em{display: none;}

/*  .errorMsg{color: Red; display: block; left: 67px; position: absolute; top: 2px;} */

.errorMsg{color: Red; margin-left:10px;}

 /* .ui-dialog, .ui-widget-content, .ui-corner-all, .ui-draggable{width: 456px !important;}

.homePopup .ui-dialog .ui-dialog-content
        {
            width: 456px !important;
        }*/
        
        
        body.dialogFormat .ui-dialog
        {
           
             left: 39.5% !important;             
             top: 24% !important;           
        }       
               
    
        
         body.homePopup .ui-dialog
        {
            padding: 0 !important;
            width: 630px !important;
            border-radius: 10px 10px 5px 5px !important;
            -moz-border-radius: 10px 10px 5px 5px !important;
            -webkit-border-radius: 10px 10px 5px 5px !important;
             left: 38.2% !important;             
            top: 17% !important;
           
        }
        body.homePopup .ui-dialog .ui-dialog-content
        {
            width: 630px !important;          
        
       
        }  
        
       

    </style>
       
<input type="hidden" name="ctl00$ContentPlaceHolder1$EMailControl$hdnDocFormat" id="ctl00_ContentPlaceHolder1_EMailControl_hdnDocFormat" value="0" />

<script type="text/javascript" language="javascript">
    var pageUrl = 'resume-home-rwz.aspx?skipevm=1';
    function showemailformatpopup() {
        var DocId = '45265818';
        var resumeName = 'aa aa Resume 2';
        if (DocId != null && DocId != '') {
            $('#ctl00_ContentPlaceHolder1_EMailControl_rdBtnDocListFormat').find("input[value='PDF']").attr("checked", "checked");
            document.getElementById('ctl00_ContentPlaceHolder1_EMailControl_hdnDocFormat').value = 'PDF';
            $('#dialogEmailFormat').show();
            $('#dialogEmailFormat').dialog({ resizable: false, modal: true });
            $('#dialogEmailFormat').dialog("open");
            $('.ui-dialog-titlebar-close').hide();
            $('.ui-dialog-titlebar').hide();
            $("#spnDocName").text(resumeName);
            $("#ctl00_ContentPlaceHolder1_EMailControl_txtSubject").val(resumeName);
            $("#divConfirmEMail").dialog('close');
            $('body').removeClass('homePopup');
            $('body').addClass('dialogFormat');
            

            var blnPremiumUserVal = 'False';
            if (blnPremiumUserVal != 'True') {
                $('#lnkSelect').click(function () {
                    $('.bg').removeClass('homePopup');
                });
                $('.btnClose').click(function () {
                    $('body').removeClass('homePopup');
                });
        }

        }
        else {
            showinfopopup();
        }

    }

    function HideEmailFormatPopup() {
        $("#dialogEmailFormat").dialog('close');
        $('body').removeClass('dialogFormat');
        return true;
    }

    function ShowEmailMessagePopup() {
        var rdbVal = document.getElementById('ctl00_ContentPlaceHolder1_EMailControl_hdnDocFormat').value;
        var DocId = '45265818';

        if (DocId != null && DocId != '') {
            
                    if (_kmq != null) {
                        _kmq.push(['record', ' Emails resume', { 'DocID': DocId, 'Document file type': rdbVal}]);//Added by AB on 7th Jan, 2014 for AN-35
            }
            
            var blnPremiumUserVal = 'False';
            if (blnPremiumUserVal == 'True' || rdbVal == 'TXT') {
            HideEmailFormatPopup();
            $('#EmailMessageDialog').show();
            $('#EmailMessageDialog').dialog({ resizable: false, modal: true });
            $('#EmailMessageDialog').dialog("open");
            $('.ui-dialog-titlebar-close').hide();
            $('.ui-dialog-titlebar').hide();
            $('#EmailMessageDialog').parent().appendTo($("form:first"));
            $("#ctl00_ContentPlaceHolder1_EMailControl_rqFldTo").css('display', 'none');
            $("#ctl00_ContentPlaceHolder1_EMailControl_rqFldFrom").css('display', 'none');
            $("#ctl00_ContentPlaceHolder1_EMailControl_regExTo").css('display', 'none');
            $("#ctl00_ContentPlaceHolder1_EMailControl_regExFrom").css('display', 'none');

            if (rdbVal == 'PDF') {
                $("#imgDocIcon").attr('src', '../../Images/rwz/pdf.png');
            }
            else if (rdbVal == 'html') {
                    $("#imgDocIcon").attr('src', '../../Images/rwz/html-mpr.png');
            }
            else if (rdbVal == 'RTF') {
                    $("#imgDocIcon").attr('src', '../../Images/rwz/file_rtf.png');
            }
            else if (rdbVal == 'TXT') {
                    $("#imgDocIcon").attr('src', '../../Images/rwz/txt-mpr.png');
            }
                else if (rdbVal == 'DOC' || rdbVal == 'DOCX') {
                $("#imgDocIcon").attr('src', '../../Images/rwz/word-mpr.png');
                }               

            return false;
        }
            else {

                window.location = "../../billing/SubscriptionMain.aspx?docid=45265818";
    }
        }

    }

    function HideEmailMessagePopup() {
        $("#ctl00_ContentPlaceHolder1_EMailControl_rqFldTo").css('display', 'none');
        $("#ctl00_ContentPlaceHolder1_EMailControl_rqFldFrom").css('display', 'none');
        $("#ctl00_ContentPlaceHolder1_EMailControl_regExTo").css('display', 'none');
        $("#ctl00_ContentPlaceHolder1_EMailControl_regExFrom").css('display', 'none');
        ClearTextBoxValues();
        $("#EmailMessageDialog").dialog('close');
        return true;
    }


    function ShowEMailConfirmPopup() {
        
            $('#divConfirmEMail').show();
            $('#divConfirmEMail').dialog({ resizable: false, modal: true });
            $('#divConfirmEMail').dialog("open");
            $('.ui-dialog-titlebar-close').hide();
            $('.ui-dialog-titlebar').hide();
        $('.bg').addClass('homePopup');      
        ClearTextBoxValues();
            return false;

        }

        function HideEMailConfirmPopup() {
            $("#divConfirmEMail").dialog('close');
        $('body').removeClass('homePopup');     
        window.location.href = pageUrl ;
            return false;

        }

        function FromAddressFocus(e) {
            var unicode = e.keyCode ? e.keyCode : e.charCode
            $("#ctl00_ContentPlaceHolder1_EMailControl_rqFldTo").css('display', 'none');
            $("#ctl00_ContentPlaceHolder1_EMailControl_rqFldFrom").css('display', 'none');
            $("#ctl00_ContentPlaceHolder1_EMailControl_regExTo").css('display', 'none');
        $("#ctl00_ContentPlaceHolder1_EMailControl_regExFrom").css('display', 'none');
        var txtToVal = $.trim($("#ctl00_ContentPlaceHolder1_EMailControl_txtTo").val());
        $("#ctl00_ContentPlaceHolder1_EMailControl_txtTo").val(txtToVal);

        }

        function ClearTextBoxValues() {
            $("#ctl00_ContentPlaceHolder1_EMailControl_txtTo").val('');
            $("#ctl00_ContentPlaceHolder1_EMailControl_txtFrom").val('');
            $("#ctl00_ContentPlaceHolder1_EMailControl_txtSubject").val('');
            $("#ctl00_ContentPlaceHolder1_EMailControl_txtMessage").val('');
        }

    function ShowEMailError(message) {
            $('#divEmailErrorMsg').show();
            $('#divEmailErrorMsg').dialog({ resizable: false, modal: true });
            $('#divEmailErrorMsg').dialog("open");
            $('.ui-dialog-titlebar-close').hide();
            $('.ui-dialog-titlebar').hide();
            $("#spnEMailErrMsg").text(message);
        $('.bg').addClass('homePopup');
            return false;

        }

        function HideEMailError() {
            $("#divEmailErrorMsg").dialog('close');
            $('body').removeClass('homePopup');
        $('body').removeClass('homePopup');
            window.location.href = pageUrl;
            return false;

        }

    $(document).ready(function () {
        var blnPremiumUserVal = 'False';
        $("#ctl00_ContentPlaceHolder1_EMailControl_rdBtnDocListFormat input").change(function () {
            var rdBtnVal = $(this).val();
            //  alert(rdBtnVal;);
            document.getElementById('ctl00_ContentPlaceHolder1_EMailControl_hdnDocFormat').value = rdBtnVal;
            if (blnPremiumUserVal != 'True') {
                if (rdBtnVal == 'TXT') {
                    $('#lnkSelect').click(function () {
                        $('.bg').addClass('homePopup');
                    });
                    $('.btnClose').click(function () {
                        $('body').removeClass('homePopup');
                    });
                }
                else {
                    $('#lnkSelect').click(function () {
                        $('.bg').removeClass('homePopup');
                    });
                    $('.btnClose').click(function () {
                        $('body').removeClass('homePopup');
                    });
                }
            }


            if (blnPremiumUserVal == 'True' || rdBtnVal == 'TXT') {
                if (rdBtnVal == 'PDF') {
                    $("#imgDocIcon").attr('src', '../../Images/rwz/pdf.png');
            }
                else if (rdBtnVal == 'html') {
                    $("#imgDocIcon").attr('src', '../../Images/rwz/html-mpr.png');
                }
                else if (rdBtnVal == 'RTF') {
                    $("#imgDocIcon").attr('src', '../../Images/rwz/file_rtf.png');
                }
                else if (rdBtnVal == 'TXT') {
                    $("#imgDocIcon").attr('src', '../../Images/rwz/txt-mpr.png');
                }
                else if (rdBtnVal == 'DOC' || rdBtnVal == 'DOCX') {
                    $("#imgDocIcon").attr('src', '../../Images/rwz/word-mpr.png');
                }

            }

        });
    });
      

</script>

<div id="dialogEmailFormat" class="myPopup" style="display: none; background-color: White">
        <p class="topHd topHdOthr">
            Email</p>
        <div class="myPopupContent">
            <a href="#" class="close" title="Close" onclick="javascript:HideEmailFormatPopup();">Close</a>
            <p>
                <strong>Which format do you want to use?</strong>
            </p>
            <p>
                <table id="ctl00_ContentPlaceHolder1_EMailControl_rdBtnDocListFormat" border="0" style="vertical-align:text-bottom">
	<tr>
		<td><input id="ctl00_ContentPlaceHolder1_EMailControl_rdBtnDocListFormat_0" type="radio" name="ctl00$ContentPlaceHolder1$EMailControl$rdBtnDocListFormat" value="PDF" /><label for="ctl00_ContentPlaceHolder1_EMailControl_rdBtnDocListFormat_0">Adobe PDF (.pdf)</label></td>
	</tr><tr>
		<td><input id="ctl00_ContentPlaceHolder1_EMailControl_rdBtnDocListFormat_1" type="radio" name="ctl00$ContentPlaceHolder1$EMailControl$rdBtnDocListFormat" value="html" /><label for="ctl00_ContentPlaceHolder1_EMailControl_rdBtnDocListFormat_1">Web Page (.html)</label></td>
	</tr><tr>
		<td><input id="ctl00_ContentPlaceHolder1_EMailControl_rdBtnDocListFormat_2" type="radio" name="ctl00$ContentPlaceHolder1$EMailControl$rdBtnDocListFormat" value="RTF" /><label for="ctl00_ContentPlaceHolder1_EMailControl_rdBtnDocListFormat_2">Rich Text (.rtf)</label></td>
	</tr><tr>
		<td><input id="ctl00_ContentPlaceHolder1_EMailControl_rdBtnDocListFormat_3" type="radio" name="ctl00$ContentPlaceHolder1$EMailControl$rdBtnDocListFormat" value="TXT" /><label for="ctl00_ContentPlaceHolder1_EMailControl_rdBtnDocListFormat_3">Plain Text (.txt)</label></td>
	</tr><tr>
		<td><input id="ctl00_ContentPlaceHolder1_EMailControl_rdBtnDocListFormat_4" type="radio" name="ctl00$ContentPlaceHolder1$EMailControl$rdBtnDocListFormat" value="DOCX" /><label for="ctl00_ContentPlaceHolder1_EMailControl_rdBtnDocListFormat_4">MS Word document (.docx)</label></td>
	</tr>
</table>
            </p>
            <p class="btn">
                <a href="#" class="button white" onclick="javascript:HideEmailFormatPopup();">Cancel</a>
                 <a id="lnkSelect" href="#" class="button white" onclick="javascript:ShowEmailMessagePopup();">Select</a>       
               
            </p>
        </div>
       
        <!--end myPopupContent-->
    </div>
     
    <div class="emailPopWrap" id="EmailMessageDialog" style="display:none;background-color: White ">
  <h2>Email</h2>
  <div class="emailContentWrap">    
        <ul class="emailForm">
          <li>
			<label for="Recipients">To:</label>
			<input name="ctl00$ContentPlaceHolder1$EMailControl$txtTo" type="text" id="ctl00_ContentPlaceHolder1_EMailControl_txtTo" />  
            <br />
            <span id="ctl00_ContentPlaceHolder1_EMailControl_rqFldTo" class="errorMsg" style="color:Red;display:none;">Please enter valid email address.</span>      
            <span id="ctl00_ContentPlaceHolder1_EMailControl_regExTo" class="errorMsg" style="color:Red;display:none;">Please enter valid email address.</span>
          </li>
          <li>
			<label for="Sender">From:</label>		
            <input name="ctl00$ContentPlaceHolder1$EMailControl$txtFrom" type="text" id="ctl00_ContentPlaceHolder1_EMailControl_txtFrom" />  
            <br />
            <span id="ctl00_ContentPlaceHolder1_EMailControl_rqFldFrom" class="errorMsg" style="color:Red;display:none;">Please enter valid email address.</span>
            <span id="ctl00_ContentPlaceHolder1_EMailControl_regExFrom" class="errorMsg" style="color:Red;display:none;">Please enter valid email address.</span>
          </li>
          <li>
			<label for="Subject">Subject:</label>
			<input name="ctl00$ContentPlaceHolder1$EMailControl$txtSubject" type="text" id="ctl00_ContentPlaceHolder1_EMailControl_txtSubject" /> 
          </li>
          <li>
			<label for="Message"></label>         
            <textarea name="ctl00$ContentPlaceHolder1$EMailControl$txtMessage" rows="2" cols="20" id="ctl00_ContentPlaceHolder1_EMailControl_txtMessage" class="msgBox">
</textarea> 
          </li>
          <li class="last">
            <div class="attachementBox">
             <span><img id="imgDocIcon" src="image/user/pdf.png" alt="word file" /></span>
             <span id="spnDocName" class="resumeName">Christana resume</span>
             <span>64.5KB</span>
            </div><!--end -->
            <input type="button" name="ctl00$ContentPlaceHolder1$EMailControl$btnSendMail" value="Send" onclick="LogKissMatricsMailSent();WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$ContentPlaceHolder1$EMailControl$btnSendMail&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, true))" id="ctl00_ContentPlaceHolder1_EMailControl_btnSendMail" class="emailBtn" />
          </li>
        </ul>      
  </div><!-- end emailContentWrap -->
  
  <a href="#" class="btnClose" onclick="javascript:HideEmailMessagePopup();"><em>Close</em></a>
</div><!--end emailPopWrap -->

<div id="divConfirmEMail" class="emailPopWrap" style="display:none;background-color: White">
  <h2>Email</h2>
  <div class="emailContentWrap alignC">
    <p class="thanksMsg">Email sent! If you'd like to send it again, click <a href="#" onclick="javascript:showemailformatpopup();">here</a>.</p>
    <p class="closeConfrm"><a href="#" onclick="javascript:HideEMailConfirmPopup();">Close</a></p>
  </div><!-- end emailContentWrap -->  
  <a href="#" class="btnClose" onclick="javascript:HideEMailConfirmPopup();"><em>Close</em></a>
</div><!--end divConfirmEMail -->


<div id="divEmailErrorMsg" class="emailPopWrap" style="display:none;background-color: White">
  <h2>Email</h2>
  <div class="emailContentWrap alignC">
    <p class="thanksMsg">Email Not sent! There is an error occured during sending E-mail.</p>
      <span id="spnEMailErrMsg" ></span>
  </div><!-- end emailContentWrap -->  
 <a href="#" class="btnClose" onclick="javascript:HideEMailError();"><em>Close</em></a>
</div><!--end divEmailErrorMsg -->

    </div>
    <!--start StarRating Popup-->
    <div id="divStarRating" style="display: none; background-color: White;" class="myPopup">
        <div id="divFeedback">
            <p class="topHd topHdOthr">
                We love your feedback!</p>
            
            <div class="myPopupContent strRatingPop">
                <a href="#" class="close" title="Close" onclick="javascript:CloseReviewDialog();">Close</a>
                <h3>
                    How would you rate our site?</h3>
                <div class="strRtnRow">
                    <table width="99%">
                        <tr>
                            <td width="30%" style="vertical-align: top;">
                                <label for="rating">
                                    <span id="errRating" class="errorMsg">*</span> Overall Rating:
                                </label>
                            </td>
                            <td valign="middle">
                                <div id="rateMe" onmouseout="fixOnMouseOut(this, event);">
                                    <a onclick="rateIt(this)" id="_1" title="1" onmouseover="rating(this)" onmouseout="off(this)">
                                    </a><a onclick="rateIt(this)" id="_2" title="2" onmouseover="rating(this)" onmouseout="off(this)">
                                    </a><a onclick="rateIt(this)" id="_3" title="3" onmouseover="rating(this)" onmouseout="off(this)">
                                    </a><a onclick="rateIt(this)" id="_4" title="4" onmouseover="rating(this)" onmouseout="off(this)">
                                    </a><a onclick="rateIt(this)" id="_5" title="5" onmouseover="rating(this)" onmouseout="off(this)">
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            </td>
                            <td>
                            </td>
                        </tr>
                    </table>
                </div>
                <!--end strRtnRow-->
                <div class="strRtnRow">
                    <label for="comment">
                        <span id="errComment" class="errorMsg">*</span> Please provide your feedback:</label>
                    <br />
                    <textarea name="ctl00$ContentPlaceHolder1$txtComment" rows="2" cols="20" id="ctl00_ContentPlaceHolder1_txtComment" class="fbBox">
</textarea>
                </div>
                <!--end strRtnRow-->
                <div class="strRtnRow">
                    <span id="errRequired" class="errorMsg">* Fields Required </span>
                    <input id="btnSubmit" type="button" value="Submit" onclick="SaveUserReview()" class="button white BtnSbmit" />
                </div>
                <!--end strRtnRow-->
            </div>
        </div>
        <input type="hidden" name="ctl00$ContentPlaceHolder1$hdnRatingView" id="ctl00_ContentPlaceHolder1_hdnRatingView" value="True" />
        <div id="divThankyou" style="display: none">
            
            <p class="topHd topHdOthr">
                We love your feedback!</p>
            <div class="myPopupContent strRatingPop">
                <a href="#" class="close" title="Close" onclick="javascript:CloseReviewDialog();">Close</a>
                <h3>
                    Thank you!</h3>
                <p>
                    Your feedback helps us continuosly improve our service so that we can help people
                    achieve their career goals.</p>
                <p>
                    If you have any additional feedback, please send us an email to <a class="mailTo"
                        href="mailto:feedback@myperfectresume.com">feedback@myperfectresume.com</a></p>
                <div class="strRtnRow alignC">
                    <input id="btnDone" type="button" value="Close" class="button white" onclick="CloseReviewDialog()" />
                </div>
                <!--end strRtnRow-->
            </div>
        </div>
        <div class="strRtnRow copyright">
            Copyright &copy; 2004-2013, LiveCareer, Ltd. First publication dates for works posted
            range from 2004-2013, all rights reserved. <a href="#" onclick="window.open('http://www.myperfectresume.com/information/termsofuse.aspx','MyPerfectResume', 'width=780,height=550,scrollbars=1,toolbar=0,resize=1,menubar=0');">
                Terms &amp; Conditions</a>
        </div>
        <!--end strRtnRow-->
    </div>
    <!--end StarRating Popup-->
    <div id="dialogShareResume" class="myPopup" style="display: none; background-color: White">
        <p class="topHd topHdOthr">
            Share Resume</p>
        <div class="myPopupContent">
            <a href="#" class="close" title="Close" onclick="javascript:HideResumeSharePopUp();">
                Close</a>
            <p>
                Share <b>
                    aa aa Resume 2</b> on:</p>
            <ul class="socialLinks">
                <li><a href="#" class="fb" onclick="opennewwindow('https://www.facebook.com/sharer/sharer.php?p[url]=http://www.myperfectresume.com/resume/aa-aa-Business-Bulacan-State-University-a-45265818.html?k=2bBd2rBy3i9pAi&s=100&p[title]=aa aa Resume 2&p[summary]=I+just+created+my+%23resume+using+MyPerfectResume%27s+online+resume+builder.&p[images][0]=http://www.myperfectresume.com//ImageGenerationService.axd?FileID=124186264&cfs=1&upscale',1);"><strong>Facebook</strong></a></li>
                <li><a href="#" class="linked" onclick="opennewwindow('http://www.linkedin.com/shareArticle?mini=true&url=http%3a%2f%2fwww.myperfectresume.com%2fresume%2faa-aa-Business-Bulacan-State-University-a-45265818.html?k=2bBd2rBy3i9pAi&title=aa+aa+Resume+2&summary=I+just+created+my+resume+online+using+MyPerfectResume&source=http%3a%2f%2fwww.myperfectresume.com%2fresume%2faa-aa-Business-Bulacan-State-University-a-45265818.html',2);"><strong>
                    Linkedin</strong></a></li>
                <li><a href="#" class="twitter" onclick="opennewwindow('http://twitter.com/home?status=I+just+created+my+%23resume+using+%40Perfect_Resume_+http%3a%2f%2fwww.myperfectresume.com%2fresume%2faa-aa-Business-Bulacan-State-University-a-45265818.html?k=2bBd2rBy3i9pAi',3);"><strong>
                    Twitter</strong></a></li>
            </ul>
            <div style="clear: both">
                <br />
            </div>
            <div style="clear: both">
            </div>
        </div>
        <!--end myPopupContent-->
    </div>
    <!--Start Middle Content-->
    <div class="midBoxWrapper myRLWrapper">
        <div class="midBoxInner" style="position: relative;">
            <div id="dvNotify" style="left: -130px; position: absolute;">
                
            </div>
            <div class="midBoxContent">
                <div>
                    <div style="float: left">
                        <h2>
                            My
                            Resumes</h2>
                    </div>
                    
                    <div style="float: right; color: #CC6601; text-align: center;">
                        FOLLOW US
                        <br />
                        <a href="https://plus.google.com/u/2/b/103471280099620810557/103471280099620810557/posts"
                            target="_blank">
                            <img src="http://www.livecareer.com/images/uploaded/google-plus1.gif" alt="Google" /></a><a
                                href="https://www.facebook.com/MyPerfectResume" target="_blank"><img src="http://www.livecareer.com/images/uploaded/icoFb.gif" alt="Facebook" /></a><a href="https://twitter.com/Perfect_Resume_" target="_blank"><img src="http://www.livecareer.com/images/uploaded/icon-twitter-mpr.gif" alt="Twitter" /></a>
                    </div>
                    
                </div>
                <div class="clear">
                </div>
                <select name="ctl00$ContentPlaceHolder1$ddlResumeAndLetters" onchange="javascript:setTimeout(&#39;__doPostBack(\&#39;ctl00$ContentPlaceHolder1$ddlResumeAndLetters\&#39;,\&#39;\&#39;)&#39;, 0)" id="ctl00_ContentPlaceHolder1_ddlResumeAndLetters" style="width:195px;">
	<optgroup label="Resumes"><option selected="selected" value="45265818^RSME">aa aa Resume 2</option>
	<option value="44846962^RSME">aa aa Resume 1</option>
	</optgroup><optgroup label="Letters"><option value="45124596^LETR">aa aa Letter 1</option>
	</optgroup>
</select>
                <div class="miniGap">
                </div>
                <!--end miniGap-->
                <div class="miniGap">
                </div>
                <!--end miniGap-->
                <div class="rlMinor">
                    <div id="ctl00_ContentPlaceHolder1_thumbnail" class="thumbSec" onclick="javascript:gotoBuilder();">
                        <img src="http://cdn-us-ec.yottaa.net/52e2a71d3c881677d7000369/rwz.myperfectresume.com/v~4.38//account/~/ImageGenerationService.axd?FileID=124186264&amp;yocs=_&amp;yoloc=us" alt="Resume" id="docImage" />
                        <span id="ctl00_ContentPlaceHolder1_linkedit"><a href="#" onclick="javascript:FireKMEvent('P6');return showEditInfoPopup();"
                            class="edtLnk">Edit this
                            resume</a> </span>
                    </div>
                </div>
                <!--end rlMinor-->
                <div class="rlMajor">
                    <h3>
                        <strong>FULL Access</strong> <span id="ctl00_ContentPlaceHolder1_basicUserText">- Upgrade for instant
                            access to these features</span></h3>
                    <ul class="actOpt">
                        <li><a href="javascript:showdownloadpopup();" class="dwnld">Download</a></li>
                        <li id="liLetternSubscription">
                            <a href="javascript:OpenPrintWindow('http://rwz.myperfectresume.com/rwz/build/print-preview.aspx?docid=45265818');"
                                class="prnt">Print</a></li>
                        
                        <li><a href="javascript:showemailformatpopup();" class="email">E-Mail</a></li>
                        <li style="display:none;"><a href="http://www.myperfectresume.com//general/transfer.aspx?targ=http%3a%2f%2fcl.myperfectcoverletter.com%2fmpcl%2ftemplate%2fcoverletter.aspx" class="createLetter">
                            Create Cover Letter</a></li>
                        <li id="liResCheck" style="display: none;"><a id="aResCheck" class="resChk" href="#"
                            title="ResumeCheck"></a></li>
                        <li><a href="http://www.myperfectresume.com/interview/video/video.aspx" class="intrw" style="visibility: hidden;">Interview</a></li>
                    </ul>
                    <!--end actOpt-->
                    <h3>
                        <strong>FREE Access</strong></h3>
                    <ul class="actOpt">
                        <li><a href="../rwz/build/final-resume.aspx?mode=edit&docid=45265818" onclick="javascript:FireKMEvent('P5');" class="edtMpr">
                            Edit</a></li>
                        
                        <li></li>
                        <li><a href="../rwz/template/choose-template.aspx" onclick="javascript:FireKMEvent('P7');" class="newResume">
                            Create New Resume</a></li>
                        <li style="display:block;"><a href="http://www.myperfectresume.com//general/transfer.aspx?targ=http%3a%2f%2fcl.myperfectcoverletter.com%2fmpcl%2ftemplate%2fcoverletter.aspx" onclick="javascript:FireKMEvent('P8');"
                            class="createLetter">Create Cover Letter</a></li>
                        </ul><ul class='actOpt'>
                        <li><a href="javascript:showduplicatepopup();" class="duplct">Duplicate</a></li>
                        <li><a href="javascript:showdeletepopup();" class="dlt">Delete</a></li>
                        <li id="ctl00_ContentPlaceHolder1_renameRsmLi" style="display:inline;"><a href="javascript:showrenamepopup();" class="rnm">
                            Rename</a></li>
                        <li id="ctl00_ContentPlaceHolder1_renameLtrLi" style="display:none;"><a href="javascript:showrenamepopup();" class="rnl">
                            Rename</a></li>
                        <li id="liAddShare"><a href="javascript:void(0);"
                            onclick="javascript:return showResumeSharePopup();" class="share">Share</a></li>
                        
                    <!--end actOpt-->
                   </ul>
                   <!--LCMAIN-1935 START ADD PREMIUM SERVICES-->
                    <div id="ctl00_ContentPlaceHolder1_divPremium" class="shdwBox" style="display: none;">
                        <h3>
                            <strong>Premium Services</strong></h3>
                        <ul class="PremiumserviceList">
                            <li><a id="aResumeReviewLink" href="" class="btnBlue"><span
                                class="btnTitle"><i class="icon-button icon-RR"></i>Resume Review</span> <span class="btnDesc">
                                    Have a Resume Expert review your resume!</span></a> </li>
                        </ul>
                </div>
                    <!--LCMAIN-1935 END-->
                </div>
                <!--end rlMajor-->
            </div>
            <!--end midBoxContent-->
        </div>
        <!--end midBoxInner-->
    </div>
     
    <!--end midBoxWrapper myRLWrapper-->
    <div class="miniGap">
    </div>
    <!--end miniGap-->
    <div id="ctl00_ContentPlaceHolder1_fullAccessLinkArea" class="midBoxWrapper">
        <div class="midBoxInner">
            <div class="midBoxContent feedContent">
                <div class="feedWrapper">
                    <h2>
                        My Job Feed</h2>
                    <div class="topSrchForm">
                        <h2>
                            Look for jobs in your area</h2>
                        <input name="ctl00$ContentPlaceHolder1$txtWhat" type="text" value="aa" id="ctl00_ContentPlaceHolder1_txtWhat" title="Job Title" onblur="if(this.value=='') this.value='Job Title';" onfocus="if(this.value == 'Job Title') this.value='';" />
                        <input name="ctl00$ContentPlaceHolder1$txtwhere" type="text" value="3000" id="ctl00_ContentPlaceHolder1_txtwhere" title="Location" onblur="if(this.value=='') this.value='Location';" onfocus="if(this.value == 'Location') this.value='';" />
                        <a class="bluBtn bluBtnLarge" href="javascript:redirectPage();void(0);"><span class="srchIcon">
                            Icon</span>search</a>
                    </div>
                    <!--end topSrchForm-->
                    <div class="clear">
                    </div>
                    <!--end clear-->
                    
                    <div class="fltrSec">
                        <div class="fltrOption">
                            <ul>
                                <li class="first active"><a href="javascript:void(0);">Distance</a>
                                    <ul>
                                        <li ><a href="resume-home-rwz.aspx?doctypecd=RSME&k=aa&l=3000&r=1">1 Mile</a></li>
                                        <li ><a href="resume-home-rwz.aspx?doctypecd=RSME&k=aa&l=3000&r=2">2 Miles</a></li>
                                        <li ><a href="resume-home-rwz.aspx?doctypecd=RSME&k=aa&l=3000&r=3">3 Miles</a></li>
                                        <li ><a href="resume-home-rwz.aspx?doctypecd=RSME&k=aa&l=3000&r=10">+10 Miles</a></li>
                                    </ul>
                                </li>
                                
                            </ul>
                        </div>
                        <!--end fltrOption-->
                        
                    </div>
                    <!--end fltrSec-->
                    <div class="rsltSec">
                        <p class="rsltSmry">
                            <span id="ctl00_ContentPlaceHolder1_searchheader">Page <b>1 of 16433</b> for aa  in 3000</span></p>
                        
                        <center>
                            
                        </center>
                        <div style="border: 0px solid;">
                            <div style="float: left; border: 0px solid;">
                                <div id="adcontainer1" style="padding-bottom: 12px;">
                                </div>
                                <div id="adcontainer2" style="padding-bottom: 12px;">
                                </div>
                                <div id="adcontainer3" style="padding-bottom: 12px;">
                                </div>
                                

    <div class="rsltRow">
              <h2><a target="_blank" href="http://www.job-search-engine.com/jad/00000000ckwz5c?impression_id=AJAbrejARa2JUQvc613ZVw&partnerid=cbebaff98af6f702b6a0008109ea210c&channel=mpr_home"  onclick="juju_partner(this, '9828');">Healthcare Recruiter</a></h2>
              <h3>Onward Healthcare Inc. - Livingston Essex, NJ ,US</h3>
              <p>…or any other classification protected by federal, state and local laws and ordinances, nationally and internationally.  <B>AA</B> /EOE/M/F/D/V Healthcare Recruiter Salary: DOE <a target="_blank" href="http://www.job-search-engine.com/jad/00000000ckwz5c?impression_id=AJAbrejARa2JUQvc613ZVw&partnerid=cbebaff98af6f702b6a0008109ea210c&channel=mpr_home"  onclick="juju_partner(this, '9828');">more info</a></p>
              <p class="pstd">posted 27 days ago  </p>
            </div><!--end rsltRow-->   
    

    <div class="rsltRow">
              <h2><a target="_blank" href="http://www.job-search-engine.com/jad/00000000cjt5vt?impression_id=DPSLFKFARfC53N7EUUiQJA&partnerid=cbebaff98af6f702b6a0008109ea210c&channel=mpr_home"  onclick="juju_partner(this, '9828');">Truck Driver-Regional Delivery</a></h2>
              <h3>Mohawk - Fremont Alameda, CA ,US</h3>
              <p>…Should be familiar with the region in general and the route specifically. EEO/ <B>AA</B> /MFDV Employer Drug-Free/Tobacco-Free Workplace Options : Apply for this job online Go <a target="_blank" href="http://www.job-search-engine.com/jad/00000000cjt5vt?impression_id=DPSLFKFARfC53N7EUUiQJA&partnerid=cbebaff98af6f702b6a0008109ea210c&channel=mpr_home"  onclick="juju_partner(this, '9828');">more info</a></p>
              <p class="pstd">posted 4 days ago  </p>
            </div><!--end rsltRow-->   
    

    <div class="rsltRow">
              <h2><a target="_blank" href="http://www.job-search-engine.com/jad/00000000cjhomp?impression_id=AWfNQ9ESSielp0JanpuT4w&partnerid=cbebaff98af6f702b6a0008109ea210c&channel=mpr_home"  onclick="juju_partner(this, '9828');">Truck Driver-Shuttle</a></h2>
              <h3>Mohawk - Orlando Orange, FL ,US</h3>
              <p>…Should be familiar with the region in general and the route specifically. EEO/ <B>AA</B> /MFDV Employer Drug-Free/Tobacco-Free Workplace Options : Apply for this job online Go <a target="_blank" href="http://www.job-search-engine.com/jad/00000000cjhomp?impression_id=AWfNQ9ESSielp0JanpuT4w&partnerid=cbebaff98af6f702b6a0008109ea210c&channel=mpr_home"  onclick="juju_partner(this, '9828');">more info</a></p>
              <p class="pstd">posted 5 days ago  </p>
            </div><!--end rsltRow-->   
    

    <div class="rsltRow">
              <h2><a target="_blank" href="http://www.job-search-engine.com/jad/00000000cgvcml?impression_id=bZsgjIBLS4qHPfddV7uV_Q&partnerid=cbebaff98af6f702b6a0008109ea210c&channel=mpr_home"  onclick="juju_partner(this, '9828');">OTR-Truck Driver</a></h2>
              <h3>Mohawk - Fayette Fayette, AL ,US</h3>
              <p>…Should be familiar with the region in general and the route specifically. EEO/ <B>AA</B> /MFDV Employer Drug-Free/Tobacco-Free Workplace Options : Apply for this job online Go <a target="_blank" href="http://www.job-search-engine.com/jad/00000000cgvcml?impression_id=bZsgjIBLS4qHPfddV7uV_Q&partnerid=cbebaff98af6f702b6a0008109ea210c&channel=mpr_home"  onclick="juju_partner(this, '9828');">more info</a></p>
              <p class="pstd">posted 11 days ago  </p>
            </div><!--end rsltRow-->   
    

    <div class="rsltRow">
              <h2><a target="_blank" href="http://www.job-search-engine.com/jad/00000000ckwz4a?impression_id=t4lh2undR1-7TiHJctO4RA&partnerid=cbebaff98af6f702b6a0008109ea210c&channel=mpr_home"  onclick="juju_partner(this, '9828');">Business Development Associate</a></h2>
              <h3>Onward Search Inc. - San Francisco San Francisco, CA ,US</h3>
              <p>…other classification protected by federal, state and local laws and ordinances, nationally and internationally  <B>AA</B> /EOE/M/F/D/V Business Development Associate Salary: DOE <a target="_blank" href="http://www.job-search-engine.com/jad/00000000ckwz4a?impression_id=t4lh2undR1-7TiHJctO4RA&partnerid=cbebaff98af6f702b6a0008109ea210c&channel=mpr_home"  onclick="juju_partner(this, '9828');">more info</a></p>
              <p class="pstd">posted 15 days ago  </p>
            </div><!--end rsltRow-->   
    

    <div class="rsltRow">
              <h2><a target="_blank" href="http://www.job-search-engine.com/jad/00000000ckwz31?impression_id=zZdkEBhCQseG3DWiTs6PZQ&partnerid=cbebaff98af6f702b6a0008109ea210c&channel=mpr_home"  onclick="juju_partner(this, '9828');">Interactive Recruiter</a></h2>
              <h3>Onward Search Inc. - Los Angeles Los Angeles, CA ,US</h3>
              <p>…protected by federal, state and local laws and ordinances, nationally and internationally  <B>AA</B> /EOE/M/F/D/V Who We Look For The Onward Search team is a group of <a target="_blank" href="http://www.job-search-engine.com/jad/00000000ckwz31?impression_id=zZdkEBhCQseG3DWiTs6PZQ&partnerid=cbebaff98af6f702b6a0008109ea210c&channel=mpr_home"  onclick="juju_partner(this, '9828');">more info</a></p>
              <p class="pstd">posted 22 days ago  </p>
            </div><!--end rsltRow-->   
    

    <div class="rsltRow">
              <h2><a target="_blank" href="http://www.job-search-engine.com/jad/00000000ckwz3j?impression_id=NKenMKJRRYqSprVLnbGhKA&partnerid=cbebaff98af6f702b6a0008109ea210c&channel=mpr_home"  onclick="juju_partner(this, '9828');">Operations Manager</a></h2>
              <h3>Onward Healthcare Inc. - Melville Suffolk, NY ,US</h3>
              <p>…or any other classification protected by federal, state and local laws and ordinances, nationally and internationally.  <B>AA</B> /EOE/M/F/D/V Operations Manager Salary: DOE <a target="_blank" href="http://www.job-search-engine.com/jad/00000000ckwz3j?impression_id=NKenMKJRRYqSprVLnbGhKA&partnerid=cbebaff98af6f702b6a0008109ea210c&channel=mpr_home"  onclick="juju_partner(this, '9828');">more info</a></p>
              <p class="pstd">posted 27 days ago  </p>
            </div><!--end rsltRow-->   
    

    <div class="rsltRow">
              <h2><a target="_blank" href="http://www.job-search-engine.com/jad/00000000ckwz52?impression_id=NnSYGQzYSciZb2vQxbsxGA&partnerid=cbebaff98af6f702b6a0008109ea210c&channel=mpr_home"  onclick="juju_partner(this, '9828');">Recruitment Manager</a></h2>
              <h3>Onward Healthcare Inc. - Mount Laurel Burlington, NJ ,US</h3>
              <p>…or any other classification protected by federal, state and local laws and ordinances, nationally and internationally  <B>AA</B> /EOE/M/F/D/V Recruitment Manager Salary: DOE <a target="_blank" href="http://www.job-search-engine.com/jad/00000000ckwz52?impression_id=NnSYGQzYSciZb2vQxbsxGA&partnerid=cbebaff98af6f702b6a0008109ea210c&channel=mpr_home"  onclick="juju_partner(this, '9828');">more info</a></p>
              <p class="pstd">posted 27 days ago  </p>
            </div><!--end rsltRow-->   
    

    <div class="rsltRow">
              <h2><a target="_blank" href="http://www.job-search-engine.com/jad/00000000ckwz1i?impression_id=DZa7Y74wS_SqyuLrnrBtXQ&partnerid=cbebaff98af6f702b6a0008109ea210c&channel=mpr_home"  onclick="juju_partner(this, '9828');">Healthcare Recruiter</a></h2>
              <h3>Onward Healthcare Inc. - Wilton Fairfield, CT ,US</h3>
              <p>…or any other classification protected by federal, state and local laws and ordinances, nationally and internationally.  <B>AA</B> /EOE/M/F/D/V Healthcare Recruiter Salary: DOE <a target="_blank" href="http://www.job-search-engine.com/jad/00000000ckwz1i?impression_id=DZa7Y74wS_SqyuLrnrBtXQ&partnerid=cbebaff98af6f702b6a0008109ea210c&channel=mpr_home"  onclick="juju_partner(this, '9828');">more info</a></p>
              <p class="pstd">posted 27 days ago  </p>
            </div><!--end rsltRow-->   
    

    <div class="rsltRow">
              <h2><a target="_blank" href="http://www.job-search-engine.com/jad/00000000cjyvzi?impression_id=N3ZTrAucTzO7-HKZV-AqeA&partnerid=cbebaff98af6f702b6a0008109ea210c&channel=mpr_home"  onclick="juju_partner(this, '9828');">Branch Manager Trainee Intern (Woodbridge)</a></h2>
              <h3>The Hertz Corporation - Woodbridge Middlesex, NJ ,US</h3>
              <p>…background screening. **All candidates with a college degree are encouraged to apply.** EOE/ <B>AA</B>  M/F/D/V Options : Your application choices are: Apply for this job online <a target="_blank" href="http://www.job-search-engine.com/jad/00000000cjyvzi?impression_id=N3ZTrAucTzO7-HKZV-AqeA&partnerid=cbebaff98af6f702b6a0008109ea210c&channel=mpr_home"  onclick="juju_partner(this, '9828');">more info</a></p>
              <p class="pstd">posted 4 days ago  </p>
            </div><!--end rsltRow-->   
    

                            </div>
                        </div>
                        <br class="clear" />
                        <div id="ctl00_ContentPlaceHolder1_divpagerlink" class="rsltNav">
                            <span id="ctl00_ContentPlaceHolder1_CustomPager1">1&nbsp;&nbsp;<a href="javascript:__doPostBack(&#39;ctl00$ContentPlaceHolder1$CustomPager1&#39;,&#39;2&#39;)" class="nextprenavigation"><u>2</u></a>&nbsp;&nbsp;<a href="javascript:__doPostBack(&#39;ctl00$ContentPlaceHolder1$CustomPager1&#39;,&#39;3&#39;)" class="nextprenavigation"><u>3</u></a>&nbsp;&nbsp;<a href="javascript:__doPostBack(&#39;ctl00$ContentPlaceHolder1$CustomPager1&#39;,&#39;4&#39;)" class="nextprenavigation"><u>4</u></a>&nbsp;&nbsp;<a href="javascript:__doPostBack(&#39;ctl00$ContentPlaceHolder1$CustomPager1&#39;,&#39;5&#39;)" class="nextprenavigation"><u>5</u></a>&nbsp;&nbsp;<a href="javascript:__doPostBack(&#39;ctl00$ContentPlaceHolder1$CustomPager1&#39;,&#39;6&#39;)" class="nextprenavigation"><u>6</u></a>&nbsp;&nbsp;<a href="javascript:__doPostBack(&#39;ctl00$ContentPlaceHolder1$CustomPager1&#39;,&#39;7&#39;)" class="nextprenavigation"><u>7</u></a>&nbsp;&nbsp;<a href="javascript:__doPostBack(&#39;ctl00$ContentPlaceHolder1$CustomPager1&#39;,&#39;8&#39;)" class="nextprenavigation"><u>8</u></a>&nbsp;&nbsp;<a href="javascript:__doPostBack(&#39;ctl00$ContentPlaceHolder1$CustomPager1&#39;,&#39;9&#39;)" class="nextprenavigation"><u>9</u></a>&nbsp;&nbsp;<a href="javascript:__doPostBack(&#39;ctl00$ContentPlaceHolder1$CustomPager1&#39;,&#39;10&#39;)" class="nextprenavigation"><u>10</u></a>&nbsp;&nbsp;<a href="javascript:__doPostBack(&#39;ctl00$ContentPlaceHolder1$CustomPager1&#39;,&#39;Next&#39;)" class="nextprenavigation"><u>Next&gt;</u></a>&nbsp;&nbsp;</span>
                        </div>
                        <!--// SG. JIRA LCMAIN-910, May-23-2013  Changed according to Juju -->
                          <div id="ctl00_ContentPlaceHolder1_jobsjujulogo" class="float-left">
                            <span id="juju_at"><a target="_blank" href="http://www.job-search-engine.com/" title="Job Search" style="line-height: 18px;">Jobs</a> by <a target="_blank" href="http://www.job-search-engine.com/" title="Job Search" style="line-height: 18px;">
                                    <img width="63px" src="http://www.job-search-engine.com/assets/images/juju_logo.png" style="border: 0; margin: -3px 0 0 0; width: 63px;" alt="Juju.com" />
                                </a></span>
                </div>
                    </div>
                    <!--end fltrSec-->
                    
                </div>
                <!--end feedWrapper-->
            </div>
            <!--end midBoxContent-->
        </div>
        <!--end midBoxInner-->
    </div>
    <!--end midBoxWrapper-->
    
    <!--End Middle Content-->
    <!--end myPopupContent-->
    <script type="text/javascript" charset="utf-8">
        var txtWht = 'ctl00_ContentPlaceHolder1_txtWhat';
        var txtwhr = 'ctl00_ContentPlaceHolder1_txtwhere';


        if (txtWht != null && txtWht.value != null && document.getElementById(txtWht).value == '') {
            document.getElementById(txtWht).value = "Job Title";
        }

        if (txtwhr != null && txtwhr.value != null && document.getElementById('ctl00_ContentPlaceHolder1_txtwhere').value == '') {
            document.getElementById('ctl00_ContentPlaceHolder1_txtwhere').value = "Location";
        }

        function useractionredirect(url) {
            if (url != "") {
                window.location = url;
            }
        }

        function redirectPage() {
            
            var sJobtitle = document.getElementById('ctl00_ContentPlaceHolder1_txtWhat').value;
            var sZipCode = document.getElementById('ctl00_ContentPlaceHolder1_txtwhere').value;

            if (sJobtitle == "Job Title") {
                sJobtitle = "";
            }

            if (sZipCode == "Location") {
                sZipCode = "";
            }

            if (sJobtitle == "" && sZipCode == "") {
                alert('Please fill Job Title or Zip Code');
            }
            else {
                if (sJobtitle != "") {
                    sJobtitle ="&k=" + sJobtitle;
        }

                if (sZipCode != "") {
                    sZipCode = "&l=" + sZipCode;
                }                              

                var url = "resume-home-rwz.aspx?doctypecd=RSME" + sJobtitle + sZipCode;
                window.location.href = url;// "resume-home-rwz.aspx" + sJobtitle + sZipCode; 
            }
        }
        
    </script>
                 
                      
                <br class="clear" />
                </div>           
                             
            <!--main content ends here-->
            <!--footer begins here-->
             
<style type="text/css">
    #foot .socialSec a
    {
        border: none;
        padding: 0 3px;
    }
</style>
<script language="JavaScript" type="text/javascript">
    function OpenFeedBackWindow() {
        var FeedBack = "";
        FeedBack = 'http://www.myperfectresume.com/includes/FeedBack.aspx?PartyID=69575358&Prod=10';
        FeedBackWindow(FeedBack + "&Target=" + escape(location.href));
    } 
</script>
<!--footer begins here-->
 <div style="clear:both;"></div>
<div id="foot">
    <div style="margin-top: 10px">
        

<style type="text/css">
/*Start Social Icons Styles*/
.socialSec {clear: both; padding: 10px 0; width: 310px; margin: 0 auto; overflow: hidden;}
.socialSec span {text-transform: uppercase; font-weight: bold; float: left; padding: 0;}
.socialSec span.txtColr {color: #CD6600; padding: 6px 4px 0 0;}
.addthis_default_style .at300b, .addthis_default_style .at300bo, .addthis_default_style .at300m {padding: 0 3px;}
/*End Social Icons Styles*/
</style>
<!--Start Social Icons Section-->
<!--end socialSec-->
<!--End Social Icons Section-->
    </div>
    
   
      <div class="grey">
       
        &copy; <span id="ctl00_Footer1_Label1"></span>, LiveCareer, Ltd. All rights reserved.
            
            </div>
            <div id="ctl00_Footer1_Authenticated" class="links">
        <br />

   <a href="#" onclick="window.open('http://www.myperfectresume.com/information/termsofuse.asp','livecareer', 'width=780,height=550,scrollbars=1,toolbar=0,resize=1,menubar=0');"
            title="Terms Of Use" class="first">Terms &amp; conditions</a> <a href="#" onclick="window.open('http://www.myperfectresume.com/information/privacy.asp','livecareer', 'width=780,height=550,scrollbars=1,toolbar=0,resize=1,menubar=0');"
                title="Privacy Policy">Privacy Policy</a>

        
        
        <a href="#" onclick="javascript:OpenFeedBackWindow();">Feedback</a>
        
            
                <a href="#" onclick="window.open('http://www.myperfectresume.com/information/contact.aspx','livecareer', 'width=780,height=550,scrollbars=1,toolbar=0,resize=1,menubar=0');" title="Contact Us">Contact Us</a>
        
        <a href="#" onclick="window.open('http://www.myperfectresume.com/customer-service','livecareer','width=780,height=550,scrollbars=1,toolbar=0,resize=1,menubar=0');" title="Customer Service/Billing">Customer Service/Billing</a>
    </div>
    
</div>

<div id="ctl00_Footer1_footerMPR" class="ftr">
    <script language="javascript" type="text/javascript">
        //hide RB footer
        document.getElementById("foot").style.display = 'none';
    </script>
  
     
     
        &copy; 2014, LiveCareer, Ltd. All rights reserved.

    <br />
    <span class="first"><a href="#" onclick="window.open('http://www.myperfectresume.com/information/termsofuse.aspx','livecareer', 'width=780,height=550,scrollbars=1,toolbar=0,resize=1,menubar=0');"
        title="Terms Of Use">Terms &amp; Conditions</a></span> <span><a href="#" onclick="window.open('http://www.myperfectresume.com/information/privacy.aspx','livecareer', 'width=780,height=550,scrollbars=1,toolbar=0,resize=1,menubar=0');"
            title="Privacy Policy">Privacy Policy</a></span> <span class="lastLink"><a href="#"
                onclick="javascript:OpenFeedBackWindow();">Feedback</a></span>
                <span>
                    
                    <a href="#" onclick="window.open('http://www.myperfectresume.com/information/contact.aspx','livecareer', 'width=780,height=550,scrollbars=1,toolbar=0,resize=1,menubar=0');" title="Contact Us">Contact Us</a>
                    

                </span> 
                 <span class="lastLink"><a href="#" title="Customer Reviews" target="_blank">Customer Reviews</a></span>
</div>


<div id="footerWrap">

</div>


<!-- sell page Footer -->

<!--Start Footer-->

<!--footer ends here-->

       
                <!--footer ends here-->              
                            
            </div>        
        </div>  
         
        <!--START of New Footer of LSR-->
          
      <!--End of New Footer of LSR-->
    
<script type="text/javascript">
//<![CDATA[
var Page_Validators =  new Array(document.getElementById("ctl00_ContentPlaceHolder1_EMailControl_rqFldTo"), document.getElementById("ctl00_ContentPlaceHolder1_EMailControl_regExTo"), document.getElementById("ctl00_ContentPlaceHolder1_EMailControl_rqFldFrom"), document.getElementById("ctl00_ContentPlaceHolder1_EMailControl_regExFrom"));
//]]>
</script>

<script type="text/javascript">
//<![CDATA[
var ctl00_ContentPlaceHolder1_EMailControl_rqFldTo = document.all ? document.all["ctl00_ContentPlaceHolder1_EMailControl_rqFldTo"] : document.getElementById("ctl00_ContentPlaceHolder1_EMailControl_rqFldTo");
ctl00_ContentPlaceHolder1_EMailControl_rqFldTo.controltovalidate = "ctl00_ContentPlaceHolder1_EMailControl_txtTo";
ctl00_ContentPlaceHolder1_EMailControl_rqFldTo.focusOnError = "t";
ctl00_ContentPlaceHolder1_EMailControl_rqFldTo.errormessage = "Please enter valid email address.";
ctl00_ContentPlaceHolder1_EMailControl_rqFldTo.display = "Dynamic";
ctl00_ContentPlaceHolder1_EMailControl_rqFldTo.evaluationfunction = "RequiredFieldValidatorEvaluateIsValid";
ctl00_ContentPlaceHolder1_EMailControl_rqFldTo.initialvalue = "";
var ctl00_ContentPlaceHolder1_EMailControl_regExTo = document.all ? document.all["ctl00_ContentPlaceHolder1_EMailControl_regExTo"] : document.getElementById("ctl00_ContentPlaceHolder1_EMailControl_regExTo");
ctl00_ContentPlaceHolder1_EMailControl_regExTo.controltovalidate = "ctl00_ContentPlaceHolder1_EMailControl_txtTo";
ctl00_ContentPlaceHolder1_EMailControl_regExTo.errormessage = "Please enter valid email address.";
ctl00_ContentPlaceHolder1_EMailControl_regExTo.display = "Dynamic";
ctl00_ContentPlaceHolder1_EMailControl_regExTo.evaluationfunction = "RegularExpressionValidatorEvaluateIsValid";
ctl00_ContentPlaceHolder1_EMailControl_regExTo.validationexpression = "\\s*((([a-zA-Z0-9_\\-\\.]+)@((\\[[0-9]{1,3}\\.[0-9]{1,3}\\.[0-9]{1,3}\\.)|(([a-zA-Z0-9\\-]+\\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\\]?)(\\s*;\\s*|\\s*$))*)\\s*";
var ctl00_ContentPlaceHolder1_EMailControl_rqFldFrom = document.all ? document.all["ctl00_ContentPlaceHolder1_EMailControl_rqFldFrom"] : document.getElementById("ctl00_ContentPlaceHolder1_EMailControl_rqFldFrom");
ctl00_ContentPlaceHolder1_EMailControl_rqFldFrom.controltovalidate = "ctl00_ContentPlaceHolder1_EMailControl_txtFrom";
ctl00_ContentPlaceHolder1_EMailControl_rqFldFrom.focusOnError = "t";
ctl00_ContentPlaceHolder1_EMailControl_rqFldFrom.errormessage = "Please enter valid email address.";
ctl00_ContentPlaceHolder1_EMailControl_rqFldFrom.display = "Dynamic";
ctl00_ContentPlaceHolder1_EMailControl_rqFldFrom.evaluationfunction = "RequiredFieldValidatorEvaluateIsValid";
ctl00_ContentPlaceHolder1_EMailControl_rqFldFrom.initialvalue = "";
var ctl00_ContentPlaceHolder1_EMailControl_regExFrom = document.all ? document.all["ctl00_ContentPlaceHolder1_EMailControl_regExFrom"] : document.getElementById("ctl00_ContentPlaceHolder1_EMailControl_regExFrom");
ctl00_ContentPlaceHolder1_EMailControl_regExFrom.controltovalidate = "ctl00_ContentPlaceHolder1_EMailControl_txtFrom";
ctl00_ContentPlaceHolder1_EMailControl_regExFrom.errormessage = "Please enter valid email address.";
ctl00_ContentPlaceHolder1_EMailControl_regExFrom.display = "Dynamic";
ctl00_ContentPlaceHolder1_EMailControl_regExFrom.evaluationfunction = "RegularExpressionValidatorEvaluateIsValid";
ctl00_ContentPlaceHolder1_EMailControl_regExFrom.validationexpression = "\\s*(\\w+([-+.\']\\w+)*@\\w+([-.]\\w+)*\\.\\w+([-.]\\w+)*)\\s*";
//]]>
</script>


<script type="text/javascript">
//<![CDATA[

var Page_ValidationActive = false;
if (typeof(ValidatorOnLoad) == "function") {
    ValidatorOnLoad();
}

function ValidatorOnSubmit() {
    if (Page_ValidationActive) {
        return ValidatorCommonOnSubmit();
    }
    else {
        return true;
    }
}
        
document.getElementById('ctl00_ContentPlaceHolder1_EMailControl_rqFldTo').dispose = function() {
    Array.remove(Page_Validators, document.getElementById('ctl00_ContentPlaceHolder1_EMailControl_rqFldTo'));
}

document.getElementById('ctl00_ContentPlaceHolder1_EMailControl_regExTo').dispose = function() {
    Array.remove(Page_Validators, document.getElementById('ctl00_ContentPlaceHolder1_EMailControl_regExTo'));
}

document.getElementById('ctl00_ContentPlaceHolder1_EMailControl_rqFldFrom').dispose = function() {
    Array.remove(Page_Validators, document.getElementById('ctl00_ContentPlaceHolder1_EMailControl_rqFldFrom'));
}

document.getElementById('ctl00_ContentPlaceHolder1_EMailControl_regExFrom').dispose = function() {
    Array.remove(Page_Validators, document.getElementById('ctl00_ContentPlaceHolder1_EMailControl_regExFrom'));
}
//]]>
</script>
</form>
    
   <!-- BEGIN LivePerson Monitor. --><script type="text/javascript" language='javascript'>                                         var lpMTagConfig = { 'lpServer': "server.iad.liveperson.net", 'lpNumber': "69789679", 'lpProtocol': (document.location.toString().indexOf('https:') == 0) ? 'https' : 'http' }; function lpAddMonitorTag(src) { if (typeof (src) == 'undefined' || typeof (src) == 'object') { src = lpMTagConfig.lpMTagSrc ? lpMTagConfig.lpMTagSrc : '/hcp/html/mTag.js'; } if (src.indexOf('http') != 0) { src = lpMTagConfig.lpProtocol + "://" + lpMTagConfig.lpServer + src + '?site=' + lpMTagConfig.lpNumber; } else { if (src.indexOf('site=') < 0) { if (src.indexOf('?') < 0) src = src + '?'; else src = src + '&'; src = src + 'site=' + lpMTagConfig.lpNumber; } }; var s = document.createElement('script'); s.setAttribute('type', 'text/javascript'); s.setAttribute('charset', 'iso-8859-1'); s.setAttribute('src', src); document.getElementsByTagName('head').item(0).appendChild(s); } if (window.attachEvent) window.attachEvent('onload', lpAddMonitorTag); else window.addEventListener("load", lpAddMonitorTag, false);</script><!-- END LivePerson Monitor. -->
   
</body>
</html>

