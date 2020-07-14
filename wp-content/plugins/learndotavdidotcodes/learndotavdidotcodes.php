<?php
/*
Plugin Name: Site Plugin for learn.avdi.codes
Description: Site specific code changes for learn.avdi.codes
*/

function lac_add_login_link_to_course_info($post_type, $course_id, $user_id) {
    ?>
        <span class="lac-infobar-login-link">or <a href="#login">log in</a></span>
    <?php
}
add_action('learndash-course-infobar-action-cell-after', 'lac_add_login_link_to_course_info', 10, 3);

function lac_maybe_show_lesson_video_script($post_id, $course_id, $user_id) {
    $video_script_content = get_field('video_script');
    if( $video_script_content ) {
        $video_script_section_content = do_shortcode(
            '[su_spoiler title="Video transcript &amp; code" style="default" icon="chevron"]' .
            '<div class="video_script">' . $video_script_content . "</div>" .
            '[/su_spoiler]'
        );
        echo $video_script_section_content;
    }
}
add_action('learndash-content-tabs-after', 'lac_maybe_show_lesson_video_script', 10, 3);

function lac_link_to_lesson_discourse_thread($post_id, $course_id, $user_id) {
    $discuss_url = get_post_meta($post_id, 'discourse_permalink', true);
    $comment_count = get_post_meta($post_id, 'discourse_comments_count', true);
    if($discuss_url) {
        ?>
            <div class="lac-lesson-discuss">
                <a href="<?php echo $discuss_url ?>" target="lac_discuss">
                    💬 Discuss this! (<?php echo $comment_count ?> comments)
                </a>
            </div>
        <?php
    }
}
add_action('learndash-content-tabs-after', 'lac_link_to_lesson_discourse_thread', 10, 3);

function lac_mail_from_address($email){
    return 'support@avdi.codes';
}
add_filter('wp_mail_from', 'lac_mail_from_address');

function lac_mail_from_name($from_name){
    return "learn.avdi.codes";
}
add_filter('wp_mail_from_name', 'lac_mail_from_name');
