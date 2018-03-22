
@extends('template.master')

@section('title', 'Transfert')

@section('main')
    <style>


    </style>

<h1 class="title-drag">Drag files here</h1>
    <form enctype="multipart/form-data" id="yourregularuploadformId">
        <div class="droparea">
            <img src="../../images/file.png" alt="" class="img-background">
            <input type="file" name="files[]" multiple="multiple" class='file-input' width="100%">

        </div>

    </form>

    <div class="row-fluid container-result">
        <h1 class="title-drag">Get files from here</h1>
        <div class="result_div col-md-6 col-md-offset-3 ">

            <ul class="result" id="results">


            </ul>
        </div>

    </div>
    <script type="text/javascript">
        update()
        function update() {
            $.ajax({
                url : "/gettransfert",
                type : "GET",
                dataType: 'json',
                success : function(ret) {
                    var resultats = $('#results');
                    resultats.empty();
                    for (i=2;i<ret.length;i++){
                        var name = ret[i].split(".");
                        if (name[name.length-1] !== "php"){
                            var item = $('<li></li>');
                            var link =  $('<a></a>');
                            link.attr('target', "blank");
                            link.attr('href', "../../storage/app/transfert/" + ret[i]);
                            link.text(ret[i]);
                            item.append(link);
                            resultats.append(item)
                        }

                    }
                }
            });
        }
        $("#yourregularuploadformId").bind("drop", function(e) {
            var files = e.originalEvent.dataTransfer.files;
            processFileUpload(files);

            // forward the file object to your ajax upload method
            return false;
        });

        function processFileUpload(droppedFiles) {
            // add your files to the regular upload form
            var uploadFormData = new FormData();
            if(droppedFiles.length > 0) { // checks if any files were dropped
                for(var f = 0; f < droppedFiles.length; f++) { // for-loop for each file dropped
                    uploadFormData.append("files[]",droppedFiles[f]);  // adding every file to the form so you could upload multiple files
                }
            }


            $.ajax({
                url : "../../../php/upload_files.php", // use your target
                type : "POST",
                data : uploadFormData,
                cache : false,
                contentType : false,
                processData : false,
                success : function(ret) {
                    update();
                }
            });

        }
    </script>
@endsection