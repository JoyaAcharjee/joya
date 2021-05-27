<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Multiple Image Upload</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    @if(count($errors)>0)
        <div class="alert alert-danger">
        <strong>There were some problems with your input</strong>
            <ul>
                @foreach ($errors -> all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h2>Image upload using Intervation</h2>
    @if(Session::has('msg'))
        <div class="alert alert-success">
            {{ Session::get('msg')}}
        </div>
    @endif
    <form method="post" action="{{ URL::to('upload-image') }}" enctype="multipart/form-data" >
        {{ csrf_field() }}
          <!-- <div class="form-group">
          <label>Title</label>
           <input type="text" class="form-control" name="title">

            </div> -->
        <div class="form-group">
            <label>Select Images</label>
            <input  type="file" class="form-control" id="imgInp" name="images[]" multiple>
                <div id="blah" width="300px" class="blah"></div>
            <!-- <img id="blah" src="#" alt="your image" /> -->
        </div>
        <!-- <div class="gallery">
        </div> -->
<!-- {{--        <div class="form-group">--}}
{{--            <label>Alttext</label>--}}
{{--            <input type="text" class="form-control" name="alttext" id="">--}}
{{--        </div>--}} -->
        <div class="form-group">
            <button type="submit" class="btn btn-success"> Upload</button>
        </div>

    </form>
    <hr>
    <div>
        @if($images)
            @foreach($images as $i)
                <img width="273px" src="{{ asset('images/'.$i->filename) }}">
            @endforeach
        @endif
    </div>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
$(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('#imgInp').on('change', function() {
        imagesPreview(this, 'div.blah');
    });
});
</script>
<!-- {{--<script>--}}
{{--    function readURL(input) {--}}
{{--        if (input.files && input.files[0]) {--}}
{{--            var reader = new FileReader();--}}

{{--            reader.onload = function(e) {--}}
{{--                $('#blah').attr('src', e.target.result);--}}
{{--            }--}}

{{--            reader.readAsDataURL(input.files[0]); // convert to base64 string--}}
{{--        }--}}
{{--    }--}}
{{--    $("#imgInp").change(function() {--}}
{{--        readURL(this);--}}
{{--    });--}}
{{--</script>--}} -->
</body>
</html>
