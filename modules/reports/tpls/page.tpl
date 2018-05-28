<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<script language="JavaScript" type="text/javascript">

	</script>
	<style>
	body {
		font-family: Gotham, Helvetica Neue, Helvetica, Arial," sans-serif";
		font-size: 13px;
	}
	
	a.backbutton { 
        display: block !important; 
        color:dodgerblue !important; 
        background-color: #aaa; 
        border-radius: 20px; 
        padding: 0 8px; 
        text-decoration: none; 
        font-weight: bold; 
        font-family: "Helvetica Neue", Helvetica, sans-serif; 
        font-size: 20px;
        text-align: center; 
        width: 40px;
    }
	
	.projectItem{
		width: 240px;
		float: left;
		background-color: white;
		padding: 5px;
	}
	.projectItem td{
		font-size: 11px;
	}
	.projectItem table{
		border: solid;
		border-width: 1px;
		border-color: lightgray;
	}
	a.button {
    	display: block !important; 
        color:#fff !important; 
        background-color: #aaa; 
        border-radius: 20px; 
        padding: 0 8px; 
        text-decoration: none; 
        font-weight: bold; 
        font-family: "Helvetica Neue", Helvetica, sans-serif; 
        font-size: 16px;
        text-align: center;
        width: 75%;
		height: 25px;
		opacity: .7;
	}
	
	.showMore {
		font-size: 14px;
		display: block;
		text-decoration: underline;
		cursor: pointer;
	}
	.showMore + input {
		display:none;
	}
	.showMore + input + * {

		max-height: 0;
		/*and eventually delay an overflow:auto; */
		overflow:hidden;
		transition: max-height 0.5s, overflow 0s;
	}
	.showMore + input:checked + * { 
		/* here comes the compromise, set a max-height that would for your usual contents*/
		max-height: 100%;
		overflow:auto;
		transition: max-height 0.5s, overflow 0.5s 0.5s;
	}

	div.msgGraf{
		float: left;
		width: 50%;
		height: auto;
	}

	.idbcell{
		width: 40px;
		height: 25px;
	}

	table.projectDb{
		width: 100%;
		border: solid;
		border-color: lightgray;
		border-width: 1px;
	}
	
	@media only screen and (max-device-width: 480px) and (orientation: portrait) {
    	/* mobile-specific CSS styles go here */
    	table[class="emailContent"] { width: 100% !important; }
    	div[class="projectItem"]{height:auto !important; width:97% !important;max-width:97% !important;}
		div[class="projectItem"] td{
			font-size: 13px;
		}
		div[class="msgGraf"]{
			width: 100%;
		}
	}
	
	@media only screen and (max-device-width: 480px) and (orientation: landscape) {
    	/* mobile-specific CSS styles go here */
    	table[class="emailContent"] { width: 100% !important; }
		div[class="projectItem"] td{
			font-size: 13px;
		}
		div[class="msgGraf"]{
			width: 100%;
		}

	}
	
	table.emailContent {
        width: 100%;
    }

	#content {
		width: 100%; /* Ширина слоя */
		margin: 0 auto 50px; /* Выравнивание по центру */
	}
	#footer {
		position: fixed; /* Фиксированное положение */
		left: 0; bottom: 0; /* Левый нижний угол */
		padding: 10px; /* Поля вокруг текста */
		background: white; /* Цвет фона */
		color: #fff; /* Цвет текста */
		width: 100%; /* Ширина слоя */
	}
</style>
</head>

<body>
<div id="content">
	<table cellpadding="0" cellspacing="0" class="emailContent">
	<tr>
		<td>zp:messageheader:</td>
	</tr>
	<tr>
		<td>zp:messagedata:</td>
	</tr>
	</table>
</div>
<div id="footer">
	<a href="javascript:history.back()" class="backbutton">&larr;</a>
	<a href="zp:maillink:">zp:maillinktext:</a>
</div>
</body>
</html>

