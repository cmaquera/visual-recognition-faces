	
	var canvas=null;
	var ctx=null;	    
	var img=null;
    
    var canvas=document.getElementById("myCanvas");
	var ctx=canvas.getContext("2d");
	
	var face_canvas=document.getElementById("faceCanvas");
	
	var img=document.getElementById("uploadPreview");
    
    function PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadPreview").src = oFREvent.target.result;
        };
    };
    
    function DrawImage(){
        canvas=document.getElementById("myCanvas");
	    ctx=canvas.getContext("2d");	    
	    img=document.getElementById("uploadPreview");
    	canvas.width = img.naturalWidth;
	    canvas.height = img.naturalHeight;
	    ctx.drawImage(img, 0, 0, canvas.width, canvas.height);
    }
    
    function DrawRect(rect){
    	ctx.rect(rect.left, rect.top, rect.width, rect.height);
		ctx.stroke();	
		console.log('dibujado cara');
    }
    
    function DrawInfo(face){
        ctx.font="10px Comic Sans MS";
        ctx.fillStyle = "Red";
        ctx.fillText("Sexo: " + face.gender.gender, face.face_location.left, face.face_location.top + face.face_location.height + 10);
        ctx.fillText("Edad : " + ((face.age.max + face.age.min)/2), face.face_location.left, face.face_location.top + face.face_location.height + 20);
    }
    
    function Recognition(face){
        
        var face_ctx=face_canvas.getContext("2d");
        face_canvas.height = face.height;
        face_canvas.width = face.width;
            
        face_ctx.putImageData(ctx.getImageData(face.left, face.top, face.width, face.height), 0, 0);
        
        Send_Face(take_face(face_canvas));
    }
    
    function Send_Face(dataURL){
        
        var name = guid();
        
        $.ajax({
            url: 'recognition.php',
            dataType: 'text',
            data: { 
                imgBase64: dataURL,
                nameImg: name
            },                         
            type: 'post',
            success: function(data){                        
                console.log(data);
            }
        });
    }
    
    function take_face(canvas){
        var dataURL = canvas.toDataURL();
        document.getElementById('facePreview').src = dataURL;
        return dataURL;
    }
    
    function guid() {
        return s4() + s4() + '-' + s4() + '-' + s4() + '-' +
        s4() + '-' + s4() + s4() + s4();
    }
    
    function s4() {
        return Math.floor((1 + Math.random()) * 0x10000)
        .toString(16)
        .substring(1);
    }
    
    $('#upload').on('click', function() {
        var file_data = $('#uploadImage').prop('files')[0];   
        var form_data = new FormData();                  
        form_data.append('file', file_data);
        
        $.ajax({
                    url: 'faces.php',
                    dataType: 'text',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,                         
                    type: 'post',
                    success: function(data){                        
                        DrawImage();
                        
                        var faces = JSON.parse(data);
                        for(var i = 0; i< faces.length; i++){
                            DrawRect(faces[i].face_location);
                            DrawInfo(faces[i]);
                            Recognition(faces[i].face_location);
                        }
                    },
                    progress: function(e) {
                        //make sure we can compute the length
                        if(e.lengthComputable) {
                            //calculate the percentage loaded
                            var pct = (e.loaded / e.total) * 100;
                
                            //log percentage loaded
                            console.log(pct);
                        }
                        //this usually happens when Content-Length isn't set
                        else {
                            console.warn('Content Length not reported!');
                        }
                    }
         });
    });
    