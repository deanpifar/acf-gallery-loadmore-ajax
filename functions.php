add_action( 'wp_ajax_nopriv_load_more', 'sleeky_load_more_posts' );
add_action( 'wp_ajax_load_more', 'sleeky_load_more_posts' );

function sleeky_load_more_posts() {

    $page = $_POST['page'];
    $display = $_POST['display'];
    $postID = $_POST['postid'];
    $total = $_POST['total'];
    $maxPage = $_POST['maxpage'];

    $from = $page * $display;
    $to = $from + $display;

    ob_start(); ?>

    <?php if(have_rows('flexible_layouts', $postID)) {
        while( have_rows('flexible_layouts', $postID)) {
            the_row();
            if( get_row_layout() == 'sleeky__gallery' ) {
                if( have_rows('images')) {
                    while( have_rows('images')) {
                        the_row();
                        $i++;
                        if($i > $from) {
                            if($i <= $to ) {
                                echo "<li>";
                                echo the_sub_field('image');
                                echo "</li>";
                            } else {
                            }
                        }
                    }
                 }
            }
        }
    }

    $my_html = ob_get_contents();

    ob_end_clean();
    wp_send_json_success($my_html);
}
