<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Uploader</title>
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.js"></script>
        <script type="text/javascript" src="ajaxupload.js"></script>
        <script type="text/javascript" src="index.js"></script>
    </head>
    <body>

        <div class="panel panel-default">
            <div class="panel-body">
                <div class="media">
                    <div class="media-top media-middle" style=" height: 300px;">
                        <table class="table" id="container-files">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>

                    <div class="media-body"><br>
                        <button id="btnAddPhoto" type="button" class="btn btn-default">Upload new Photo</button>
                    </div>
                    <input type="hidden" id="hdncont" value="1" />
                </div>
            </div>
        </div>

    </body>
</html>
