To make this work, also have to replace in functions.php where we enqueue our script to:

wp_register_script( 'sleeky', get_template_directory_uri() . '/js/scripts.js', array('wp-util'), '1.0.0', true );

The change is adding (wp-util) to the dependencies, so we can use ajax the way we need.

In the template file, is the flexible content file you would have, with a basic example, $display is how many pictures per page you want to display.
Currently it echoes the ID of the image, but this is just a basic example so we can use it on other projects as well.

You will need to change all the names on the have_rows() and get_sub_field(), to match your ACF, but I'm sure I don't need to say that.
