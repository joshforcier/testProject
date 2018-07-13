<?php
require_once(dirname(__FILE__) . '/includes/common.inc.php');
route_request();
function route_request() {
        $mode = grab_request_var('mode');
        switch($mode) {
                case 'generate_random_integer':
                        generate_random_integer();
                        break;
                case 'set_option':
                        ajax_set_option();
                        break;
                case 'get_option':
                        ajax_get_option();
                        break;
                case 'write_file':
                        ajax_write_file();
                        break;
                case 'read_file':
                        ajax_read_file();
                        break;
                default:
                        break;
        }
}
function generate_random_integer() {
        $min = intval(grab_request_var('minimum', '0'));
        $max = intval(grab_request_var('maximum', '100'));
        $random_integer = rand($min, $max);
        echo $random_integer;
}
function ajax_set_option() {
        $key = grab_request_var('option_key');
        $value = grab_request_var('option_value');
        $error_count = 0;
        $errors = array();
        if ($key == '') {
                $error_count++;
                $errors[] = 'Please specify a key.';
        }
        if ($value == '') {
                $error_count++;
                $errors[] = 'Please specify a value.';
        }
        $error_string = '';
        if ($error_count > 0) {
                foreach($errors as $error) {
                        $error_string .= "$error<br>";
                }
                echo $error_string;
                exit;
        }
        set_option($key, $value);
        echo '<div class="alert alert-success" role="alert">Your option was set with the key of: <b>' . $key . '</b><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        exit;
}
function ajax_get_option() {
        $key = grab_request_var('option_key');
        if ($key == '') {
                echo '<div class="alert alert-danger" role="alert">Specify a key please.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                exit;
        }
        $option = get_option($key);
        if ($option == '') {
                echo '<div class="alert alert-danger" role="alert">I could not find an option with that key.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                exit;
        }
        echo '<div class="alert alert-success" role="alert">Your option, sir: <b>' . $option . '</b><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        exit;
}
function ajax_write_file()
{
        $error_count = 0;
        $errors = array();
        $error_string = '';
        $contents = grab_request_var('file_contents', '');
        $path = grab_request_var('file_path', '');
        if (empty($contents)) {
                $error_count++;
                $errors[] = 'Please specify your file contents.';
        }
        if (empty($path)) {
                $error_count++;
                $errors[] = 'Please specify your file path.';
        }
        if ($error_count > 0) {
                // Compile error string
                foreach($errors as $error) {
                        $error_string .= "$error<br>";
                }
                echo $error_string;
        }
        file_put_contents("$path", "$contents");
        if (file_exists($path)) {
                echo '<div class="alert alert-success" role="alert">Your File was written.</div>';
        } else {
                echo '<div class="alert alert-danger" role="alert">We failed to write your file.</div>';
        }
}
function ajax_read_file()
{
        $path = grab_request_var('file_reader_path');
        $contents = file_get_contents($path);
        echo $contents;
        exit;
}
