$(document).ready(function() {
        $( '#generate-integer' ).click(function(data) {
                // Grab the values form our input fields
                var minimum = $( '#minimum-bound' ).val();
                if (minimum === '') {
                        minimum = '0';
                }
                var maximum = $( '#maximum-bound' ).val();
                if (maximum === '') {
                        maximum = '100';
                }
                $.ajax({
                    url: 'ajax.php',
                    type: 'POST',
                    data: { mode : 'generate_random_integer', minimum : minimum, maximum : maximum },
                    success: function(data) {
                        $( '#generated-integer' ).val(data);
                    },
                    error: function(xhr, error_string, error_thrown) {
                        alert('Apologies. We could not generate your integer.');
                    }
                });
        });
        $( '#set-option' ).click(function(data) {
                // Grab the values form our input fields
                var key = $( '#option-key' ).val();
                var value = $( '#option-value' ).val();
                $.ajax({
                    url: 'ajax.php',
                    type: 'POSt',
                    data: { mode : 'set_option', option_key : key, option_value : value },
                    success: function(data) {
                        // Reset the values of our form
                        $( '#option-key' ).val('');
                        $( '#option-value' ).val('');
                        // Give an alert if successful
                        $( '#set-alert-placeholder' ).html(data);
                    },
                    error: function(xhr, error_string, error_thrown) {
                        alert('Apologies. Something hinky is going on.');
                    }
                });
        });
        $( '#get-option' ).click(function(data) {
                // Grab the values form our input fields
                var key = $( '#get-option-key' ).val();
                $.ajax({
                    url: 'ajax.php',
                    type: 'POSt',
                    data: { mode : 'get_option', option_key : key },
                    success: function(data) {
                        // Reset the values of our form
                        $( '#get-option-key' ).val('');
                        // Give an alert if successful
                        $( '#get-alert-placeholder' ).html(data);
                    },
                    error: function(xhr, error_string, error_thrown) {
                        alert('Apologies. Something hinky is going on.');
                    }
                });
        });
        $( '#write-file' ).click(function(data) {
                // Grab the values form our input fields
                var contents = $( '#file-writer-contents' ).val();
                var path = $( '#file-writer-path' ).val();
                $.ajax({
                    url: 'ajax.php',
                    type: 'POST',
                    data: { mode : 'write_file', file_contents : contents, file_path: path },
                    success: function(data) {
                        // Give an alert if successful
                        //$( '#error-bucket' ).html(data);
                        //$( '#writer-alert' ).show();
                        $( '#alert-well' ).html(data);
                    },
                    error: function(xhr, error_string, error_thrown) {
                        alert('Apologies. Something hinky is going on.');
                    }
                });
        });
        $( '#read-file' ).click(function(data) {
                // Grab the values form our input fields
                var path = $( '#file-reader-path' ).val();
                $.ajax({
                    url: 'ajax.php',
                    type: 'POST',
                    data: { mode : 'read_file', file_reader_path : path },
                    success: function(data) {
                        $( '#file-reader-well' ).html(data);
                    },
                    error: function(xhr, error_string, error_thrown) {
                        alert('Apologies. Something hinky is going on.');
                    }
                });
        });
});
