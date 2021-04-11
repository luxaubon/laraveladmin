
<!--<form action="test_multi.php" method="POST" enctype="multipart/form-data" name="myform" id="myform">
-->
<div class="horizontal_dotted_line" id="select">
	<input type="file" id="files" class="horizontal" accept="image/*" name="files[]" multiple />
	<input name="idphoto" type="hidden" id="idphoto" value="" />
</div>
       <div id="list"></div>
<!-- </form>-->

<script>
  function handleFileSelect(evt) {
          document.getElementById('select').style.display = "none"; 
          document.getElementById('list').style.display = "block"; 
       
    var files = evt.target.files; // FileList object
          
    // Loop through the FileList and render image files as thumbnails.
    for (var i = 0, f; f = files[i]; i++) {

      // Only process image files.
      if (!f.type.match('image.*')) {
        continue;
      }

      var reader = new FileReader();

      // Closure to capture the file information.
      reader.onload = (function(theFile) {
        return function(e) {
          // Render thumbnail.
          var span = document.createElement('span');
         
          span.innerHTML = ['<div class="image-select" style="background:url(', e.target.result,'); background-size:cover; background-position:center center;"></div>'].join('');
          document.getElementById('list').insertBefore(span, null);
         
        };
      })(f);

      // Read in the image file as a data URL.
      reader.readAsDataURL(f);
    }
  }

  document.getElementById('files').addEventListener('change', handleFileSelect, false);
</script>