<html>

<head>
	<script defer src="https://widget-js.cometchat.io/v3/cometchatwidget.js"></script>
</head>

<body>
	<div id="cometchat"></div>
	<script>
	window.addEventListener('DOMContentLoaded', (event) => {
		CometChatWidget.init({
			"appID": "19929707733ed06e",
			"appRegion": "us",
			"authKey": "f8e0229c413295303a48b075ea431afcb183f4bf"
		}).then(response => {
			console.log("Initialization completed successfully");
			//You can now call login function.
			CometChatWidget.login({
				"uid": "9"
			}).then(response => {
				CometChatWidget.launch({
					"widgetID": "08808dcb-d91a-4085-bf89-adee1beb98f3",
					"target": "#cometchat",
					"roundedCorners": "true",
					"height": "600px",
					"width": "800px",
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
</body>

</html>