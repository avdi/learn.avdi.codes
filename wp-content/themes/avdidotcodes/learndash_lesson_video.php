<?php
/**
 * [avdi.codes] This file overrides wp-content/plugins/sfwd-lms/templates/learndash_lesson_video.php
 * It has been augmented to show the video script, if provided in the
 * video_script custom field.
 * 
 * Displays a lesson/topic Video. 
 *
 * Note this template is called a few steps BEFORE the main Lesson/Topic template and is used 
 * primarily to add the video if used to the content.
 *
 * Available Variables:
 * 
 * $content 		: string/html The original lesson/video content
 * $video_content 	: string/html The video HTML element to be displayed. 
 * $video_settings	: array of settings from the Lesson/Topic Video options.  
 * $video_data		: array of run-time values for the video.  
 * 
 * @since 2.4.5
 * 
 * @package LearnDash\Lesson
 */

// Basic usage. If the [ld_video] placeholder (not a shortcode) is added to the 
// lesson/topic content the video will be inserted at that place within the 
// $content. 
// If not then the $video_content will be appended to the end of the $content. 


if ( !empty( $video_content ) ) {
	if ( strpos( $content, '[ld_video]' ) !== false ) {
		$content = str_replace( '[ld_video]', $video_content, $content );
	} else {
		$content = $video_content . $content;
	}
} else {
	if ( strpos( $content, '[ld_video]' ) !== false ) {
		$content = str_replace( '[ld_video]', '', $content );
	}
}
echo $content;

// Show video script, if provided
$video_script_content = get_field('video_script');
if( $video_script_content ) {
	$video_script_section_content = do_shortcode(
		'[su_spoiler title="Video transcript &amp; code" style="default" icon="chevron"]' .
		'<div class="video_script">' . $video_script_content . "</div>" .
		'[/su_spoiler]'
	);
	echo $video_script_section_content;
}


// https://youtu.be/ALu-whwI8fA
// https://youtu.be/HECa3bAFAYk
