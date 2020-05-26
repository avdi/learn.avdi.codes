<?php
/*
Plugin Name: Site Plugin for learn.avdi.codes
Description: Site specific code changes for learn.avdi.codes
*/

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

