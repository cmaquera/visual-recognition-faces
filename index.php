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
    <script type="text/javascript" src="jquery.ajax-progress.js"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <h1 class="text-center">Face Detection Watson and Custom Classifier</h1>
        </div>
        <div class="row">
            <div class="canvas">
                <canvas id="myCanvas"></canvas>
            </div>
            <div class"imagen">
        	    <img id="uploadPreview" style="display: none;"/>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4. space">
                <div class="text-center">
                    <label class="btn btn-lg btn-success">                          
                        Buscar Imagen
                        <input id="uploadImage" type="file" name="foto" onchange="PreviewImage();" style="display: none;" accept="image/*">
                    </label>                 
                </div>                
            </div>
            <div class="col-md-4 space">
                <div class="text-center">
                    <button class="btn btn-lg btn-success" id="upload">Enviar</button>
                </div>
                
            </div>
            <div class="face-canvas" style="display: none;">
                <canvas id="faceCanvas" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 info-faces">
               
                <div class="info" style="display: none;">
                    <div>
                        <h4>Cesar Maquera</h4>
                        <div><span>Edad : 21</span></div>
                        <div><span>Sexo: Masculino</span></div>
                        <div><span>Probabilidad:</span></div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%">
                            50%
                        </div>
                    </div>
                </div>                
                      
            </div>            
        </div>      
        
    </div>
    <footer class="footer">
        <div class="container">
            <p class="text-muted">Todos los derechos reservados de <a href="https://www.linkedin.com/in/cesar-maquera-731952a8/" style="color: #48d8a0;">Cesar Maquera</a>, Proyecto en <a href="https://github.com/xXelCheXx/visual-recognition-faces" style="color: #48d8a0;">GitHub</a></p>
        </div>
    </footer>
    <script type="text/javascript" src="main.js"></script>
    <script type="text/javascript">
    </script>
</body>
</html>