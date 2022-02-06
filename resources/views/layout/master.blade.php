<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
	<meta charset="utf-8"/>
	<title>@yield('title')</title>
	

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<meta content="" name="description"/>
	<meta content="" name="author"/>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
	<link href="{{url('assets')}}/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="{{url('assets')}}/css/custom.css" rel="stylesheet" type="text/css"/>
	<link href="{{url('assets')}}/css/style.min.css" rel="stylesheet" type="text/css"/>

	<script src="{{url('assets')}}/js/jquery.min.js" type="text/javascript"></script>
	<script defer src="https://widget-js.cometchat.io/v2/cometchatwidget.js"></script>

	<style type="text/css">
	
</style>
</head>
<body class="page-header-fixed page-sidebar-closed-hide-logo page-sidebar-closed-hide-logo">
	@include('layout.topheader')
	<div class="page-container">
		@include('layout.sidebar')
		@yield('content')

	</div>
	<script>
		
        window.addEventListener('DOMContentLoaded', (event) => {
        	CometChatWidget.init({
        		"appID": "19929707733ed06e",
        		"appRegion": "us",
        		"authKey": "f8e0229c413295303a48b075ea431afcb183f4bf"
        	}).then(response => {
        		console.log("Initialization completed successfully");
        		
        		CometChatWidget.login({
        			"uid": "admin1"
        		}).then(response => {
        			CometChatWidget.launch({
        				"widgetID": "c4d1e1bf-9068-4fb4-b820-4c5ccbc1f938",
        				"docked": "true",
                    "alignment": "right", //left or right
                    "roundedCorners": "true",
                    "height": "200px",
                    "width": "200px",
                    "defaultID": 'admin1', //default UID (user) or GUID (group) to show,
                    "defaultType": 'user' //user or group
                });
        		}, error => {
        			console.log("User login failed with error:", error);
                //Check the reason for error and take appropriate action.
            });
        	}, error => {
        		console.log("Initialization failed with error:", error);
            //Check the reason for error and take appropriate action.
        });
        });
    </script>
    <script src="{{url('assets')}}/js/popper.min.js" type="text/javascript"></script>
    <script src="{{url('assets')}}/js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>