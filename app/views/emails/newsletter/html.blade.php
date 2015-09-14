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

		    h2 small {
		        color: #999999;
		    }

		    .images img {
		        clear: both;
		    }

		    .details, .images {
		        width: 100%;
		    }


		    div.dl-horizontal {
		        margin-top: 20px;
		        width: 100%;

		    }
		    div.dl-horizontal .title, div.dl-horizontal .value {
		        float: left;
		        padding: 5px 0;
		    }

		    div.dl-horizontal .title {
		        font-weight: bold;
		        width: 30%;
		    }
		    div.dl-horizontal .value {
		        font-weight: normal;
		        width: 50%;
		        padding-left: 5px;
		    }

		    .images .img-responsive {
		        max-width: 100%;
		        margin-bottom: 5px;
		    }

		</style>
	</head>
	<body style="background-color: #EFEFEF;">
	    <div style="width: 500px;border: 1px solid #CDCDCD; background-color: #FFF; margin: 40px auto; padding: 40px;">
	        <div style="display: inline-block; margin-left: 10px;position: relative;margin-top: -40px;vertical-align: top;width: 60px;background: #00C35E url('http://www.classiccarseurope.eu/public/assets/build/img/classiccarseurope-icon.png') no-repeat center center;height: 50px;overflow: hidden;">
	            &nbsp;
	        </div>
            <h2 style="margin-top: 20px;">{{$subject}} <small>&euro; {{$car['price']}}</small></h2>
            <div class="details">
                <p>{{$catalog['description']}}</p>
                <a style="background: #00C35F; padding: 5px 10px; color: #FFF;" href="http://www.classiccarseurope.eu/inventory/{{$catalog['id']}}/details" title="{{$catalog['title']}}">More information</a>
                <p style="height: 10px;"> </p>
                <div class="dl-horizontal">
                    @if (strlen($catalog['id'] > 0))
                    <div class="title">Inventory #</div><div class="value">{{$catalog['id'] }}</div>
                    @endif
                    @if (strlen($car['location'] > 0))
                    <div class="title">Location</div><div class="value">{{ $car['location'] }}</div>
                    @endif
                    @if (strlen($car['make'] > 0))
                    <div class="title">Make</div><div class="value">{{ $car['make'] }}</div>
                    @endif
                    @if (strlen($car['brand'] > 0))
                    <div class="title">Brand</div><div class="value">{{ $car['brand'] }}</div>
                    @endif
                    @if (strlen($car['engine'] > 0))
                    <div class="title">Engine</div><div class="value">{{ $car['engine'] }}</div>
                    @endif
                    @if (strlen($car['type'] > 0))
                    <div class="title">Type</div><div class="value">{{ $car['type'] }}</div>
                    @endif
                    @if (strlen($car['status'] > 0))
                    <div class="title">Status</div><div class="value">{{ $car['status'] }}</div>
                    @endif
                    @if (strlen($car['milage'] > 0))
                    <div class="title">Millage</div><div class="value">{{ $car['milage'] }}</div>
                    @endif
                    @if (strlen($car['transmission'] > 0))
                    <div class="title">Transmission</div><div class="value">{{ $car['transmission'] }}</div>
                    @endif
                </dl>
                <p style="height: 10px;"> </p>
            </div>
            <div class="images">
                @foreach($pictures as $picture)
                    @if (strpos($images, $picture['url']) !== false)
                        <a href="http://www.classiccarseurope.eu/inventory/{{$catalog['id']}}/details" title="{{$catalog['title']}}">
                            <img src="http://www.classiccarseurope.eu/custom/owner_images/{{$catalog['id'] }}/500-{{ $picture['url'] }}" class="img-responsive" alt="{{$catalog['title']}}" style="border: 0;" />
                        </a>
                    @endif
                @endforeach
            </div>
            <div class="footer" style="font-size: 10px; text-align:center; margin-top: 10px; border-top: 1px solid #CDCDCD; padding-top: 10px;">
                <a href="http://www.classiccarseurope.eu/newsletter/unsubscribe/{{$user['id']}}/">Unsubscribe to this newsletter</a>
                - <a href="http://www.classiccarseurope.eu/">Classiccarseurope.eu</a>
            </div>
		</div>
	</body>
</html>
