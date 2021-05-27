<!DOCTYPE html>
<html lang="en">
<head>
    <title>Multiple Image Upload</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <!-- jQuery library -->


    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<div class="container">

    <div class="row">
        <div class="col-md-8 offset-2 clone">
            <h1>Upload Multiple Image</h1>
            @if ($message = Session::get('msg'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <!-- @if (count($errors) > 0)

                <div class="alert alert-danger">

                    <strong>Error!</strong>

                    <ul>

                        @foreach ($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif -->
            <form action="{{URL::to('upload-image')}}" enctype="multipart/form-data" method="post" class="my-5">
                @csrf
                <div class="form-group increment">
                    <label for="images">Choose Multiple Image:</label>
                    <input  type="file" class="form-control" id="imgInp" name="images[]" multiple>
                <div id="blah" class="blah"></div>
                    <!-- <img id="blah" src="" alt="your image" /> -->
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Upload</button>
            </form>
        </div>
    </div>
</div>

<!-- <div class="container">
    <div class="row">
        <div class="row">
            @foreach($images as $img)
                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a class="thumbnail" href="#">
                        <img class="img-thumbnail"
                             src="{{asset('images/')."/". $img->image}}"
                             alt="Another alt text">
                    </a>
                </div>
            @endforeach
        </div>
        <div class="row">
            {{ $images->links() }}
        </div>
        <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="image-gallery-title"></h4>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span
                                    class="sr-only">Close</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img id="image-gallery-image" class="img-responsive col-md-12" src="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary float-left" id="show-previous-image"><i
                                    class="fa fa-arrow-left"></i>
                        </button>
                        <button type="button" id="show-next-image" class="btn btn-secondary float-right"><i
                                    class="fa fa-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
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
<script>
// function readURL(input) {
//   if (input.files && input.files[0]) {
//     var reader = new FileReader();
    
//     reader.onload = function(e) {
//       $('#blah').attr('src', e.target.result);
//     }
    
//     reader.readAsDataURL(input.files[0]); // convert to base64 string
//   }
// }
//  $("#imgInp").change(function() {
//     readURL(this);

// });
</script>


</body>
</html>