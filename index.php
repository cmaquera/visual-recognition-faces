<!DOCTYPE html>
<html>
<head>
	<title>Visual recognition Face</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link 
	  href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
 	  rel="stylesheet" 
	  integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" 
	  crossorigin="anonymous">
	<link rel="stylesheet" href="stylesheet.css" />
	<script
      src="https://code.jquery.com/jquery-3.2.1.min.js"
      integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
      crossorigin="anonymous"></script>
	<script 
	  src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" 
	  integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" 
	  crossorigin="anonymous"></script>
    <script src="jquery.ajax-progress.js"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div>
                <canvas id="myCanvas"></canvas>
            </div>
            <div>
        	    <img id="uploadPreview" />
            </div>        
            <div>
                <input id="uploadImage" type="file" name="foto" onchange="PreviewImage();" />        
                <button id="upload">Enviar</button>
            </div>
            <div>
        	    <canvas id="faceCanvas" />
            </div>
            <div>
        	    <img id="facePreview" />
            </div>
        </div>
    </div>
    
    <script type="text/javascript" src="main.js"></script>
</body>
</html>