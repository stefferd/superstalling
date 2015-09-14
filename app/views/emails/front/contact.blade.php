<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
		<style>
		    html, body {
		        font: normal 14px/18px Arial, Helvetica, sans-serif;
		        color: #000;
		    }

		    h2 {
		        font-size: 20px;
		    }
		</style>
	</head>
	<body style="background-color: #EFEFEF;">
	    <div style="width: 500px;border: 1px solid #CDCDCD; background-color: #FFF; margin: 40px auto; padding: 40px;">
	        <div style="display: inline-block; margin-left: 10px;position: relative;margin-top: -40px;vertical-align: top;width: 60px;background: #00C35E url('http://www.milkimclassiccars.nl/assets/build/img/icon-milkim-classic-cars.png') no-repeat center center;height: 50px;overflow: hidden;">
	            &nbsp;
	        </div>
            <h2 style="margin-top: 20px;">{{$subject}}</h2>
            <p>From : <strong>{{ $from_name }} <{{ $from }}></strong></p>
            @if (isset($phone))
                <p>Phonenumber : <strong>{{ $phone }}</strong></p>
            @endif
            <p>{{ $from_message }}</p>
		</div>
	</body>
</html>
