<?php require_once(dirname(__FILE__) . '/includes/common.inc.php'); ?>
<html>
<head>
        <title>AJAX Things</title>
        <!-- Our includes and stuff -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script type="text/javascript" src="ajax-scripts.js"></script>
</head>
<body style="margin-bottom: 100px;">
        <div class="container">
                <!-- Random number generator -->
                <div class="card" style="margin-top: 50px;">
                  <h5 class="card-header">Random Integer Generator</h5>
                  <div class="card-body">
                    <h5 class="card-title">Generate a random integer via AJAX</h5>
                    <p class="card-text">Click the button below to generate a random integer via AJAX.</p>
                    <p class="card-text">To specify a minimum and maximum bound, fill out the inputs below. <b>Default range: 1-100</b></p>
                        <div class="input-group input-group-lg">
                                <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Min</span>
                                </div>
                                <input type="text" class="form-control" placeholder="Minimum Bound" aria-label="Minimum" aria-describedby="basic-addon1" id="minimum-bound">
                                <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Max</span>
                                </div>
                                <input type="text" class="form-control" placeholder="Maximum Bound" aria-label="Maximum" aria-describedby="basic-addon1" id="maximum-bound">
                        </div>
                <a href="#" class="btn btn-primary" id="generate-integer" style="margin-top: 25px; margin-bottom: 25px;">Generate Random Integer</a>
                <div class="input-group input-group-lg">
                        <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Your Integer:</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Generated integer will go here." aria-label="Integer" aria-describedby="basic-addon1" id="generated-integer">
                </div>
                  </div>
                </div>
                <!-- End Random number generator -->
                <!-- BEGIN Option Setter -->
                <div class="card" style="margin-top: 50px;">
                  <h5 class="card-header">Option Setter</h5>
                  <div class="card-body">
                        <div id="set-alert-placeholder"></div>
                    <h5 class="card-title">Set an option in the database via AJAX</h5>
                    <p class="card-text">Fill out the key and value fields, then click the button to insert the option into the database.</p>
                        <div class="input-group input-group-lg">
                                <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Key</span>
                                </div>
                                <input type="text" class="form-control" placeholder="Key" aria-label="Minimum" aria-describedby="basic-addon1" id="option-key">
                                <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Value</span>
                                </div>
                                <input type="text" class="form-control" placeholder="Value" aria-label="Maximum" aria-describedby="basic-addon1" id="option-value">
                        </div>
                <a class="btn btn-primary" id="set-option" style="margin-top: 25px;">Set Option</a>
                  </div>
                </div>
                <!-- END Option Setter -->
                <!-- BEGIN Option Setter -->
                <div class="card" style="margin-top: 50px;">
                        <h5 class="card-header">Option Getter</h5>
                        <div class="card-body">
                                <div id="get-alert-placeholder"></div>
                                <h5 class="card-title">Get an option out of the database via AJAX</h5>
                                <p class="card-text">Fill out the key, then click the button to get the option from the database.</p>
                                <div class="input-group input-group-lg">
                                        <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Key</span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Key" aria-label="Minimum" aria-describedby="basic-addon1" id="get-option-key">
                                </div>
                                <a href="#" class="btn btn-primary" id="get-option" style="margin-top: 25px;">Get Option</a>
                        </div>
                </div>
                <!-- END Option Setter -->
                <!-- BEGIN Option Setter -->
                <div class="card" style="margin-top: 50px;">
                        <h5 class="card-header">File Writer</h5>
                        <div class="card-body">
                                <div id="alert-well">
                                        <div class="alert alert-danger" role="alert" id="writer-alert" style="display: none;">
                                                <div id="error-bucket"></div>
                                        </div>
                                </div>
                                <h5 class="card-title">Write some shit</h5>
                                <p class="card-text">Specify the contents of a file, and a path, then write the file.</p>
                                <div class="input-group input-group-lg">
                                        <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Contents</span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Contents here will be written to file" aria-label="Minimum" aria-describedby="basic-addon1" id="file-writer-contents">
                                        <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">File Path</span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="This is where the file will be written." aria-label="Minimum" aria-describedby="basic-addon1" id="file-writer-path">
                                </div>
                                <a class="btn btn-primary" id="write-file" style="margin-top: 25px;">Write File</a>
                        </div>
                </div>
                <!-- END Option Setter -->
                <!-- BEGIN Option Setter -->
                <div class="card" style="margin-top: 50px;">
                        <h5 class="card-header">File Reader</h5>
                        <div class="card-body">
                                <h5 class="card-title">Read ur file</h5>
                                <p class="card-text">Specify the path of a file, then read that fucker.</p>
                                <div class="input-group input-group-lg">
                                        <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">File path</span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Contents here will be written to file" aria-label="Minimum" aria-describedby="basic-addon1" id="file-reader-path">
                                </div>
                                <a class="btn btn-primary" id="read-file" style="margin-top: 25px;">Write File</a>
                                <div id="file-reader-well"></div>
                        </div>
                </div>
                <!-- END Option Setter -->
        </div>
</body>
</html>
