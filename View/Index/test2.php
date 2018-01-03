<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>progressbar demo</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.12.4.js"></script>
  <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>
 
 <form>
  <input type="file" id="file"  multiple />

  <div id="progressbar"></div>
 </form>
<script>
  // on identifie les fichiers
  var inputElement = $('#file');
  
  console.log(inputElement) ;

  inputElement.change(function(){
      
        var files = inputElement.attr('files');

        var file = files[0]['name'];

      console.log(file) ;

        var xhr = new XMLHttpRequest();

        // div pregressbar 
        $( "#progressbar" ).progressbar({ value: 0   });
        xhr.open('POST', 'upload.php');

        xhr.onprogress = function(e){
          var loaded = Math.round((e.loaded / e.total) * 100 ) ;
          $( "#progressbar" ).progressbar('value',loaded) ;
        }
        xhr.onload = function(){
          $('#progressbar').progressbar('value', 100);
        }

        var form = new FormData();
        form.append('file', inputElement.file);

        xhr.send(form);

    });

 

 


</script>
 
</body>
</html>