<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body><script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>
<span id="editor">
        
    </span>
    <script>
        ClassicEditor
            .create( document.querySelector( 'span#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script> 
</body>
</html>
