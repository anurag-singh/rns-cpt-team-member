<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    RNS_CPT_Team_Member
 * @subpackage RNS_CPT_Team_Member/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<table style="width:100%">
  <tr>
    <td class="field-heading">
      <label for="post_title"><?php _e( 'Member Name', 'prfx-textdomain' )?></label>
    </td>
    <td>
      <input type="text" name="post_title" value="<?php  echo the_title(); ?>" />
    </td>
  </tr>
  <tr>
    <td class="field-heading">
      <label for="member_desig" class="prfx-row-title"><?php _e( 'Member Designation', 'prfx-textdomain' )?></label>
    </td>
    <td>
      <input type="text" name="member_desig" value="<?php if ( isset ( $member_designation['rns_member_designation'] ) ) echo $member_designation['rns_member_designation'][0]; ?>" />
    </td>
  </tr>
  
  <tr>
    <td class="field-heading">
      <label for="fb" class="prfx-row-title"><?php _e( 'Facebook', 'prfx-textdomain' )?></label>
    </td>
    <td>
      <input type="text" name="fb" value="<?php if ( isset ( $member_fb_profile['rns_member_fb_profile'] ) ) echo $member_fb_profile['rns_member_fb_profile'][0]; ?>" />
    </td>
  </tr>
  <tr>
    <td class="field-heading">
      <label for="tw" class="prfx-row-title"><?php _e( 'Twitter', 'prfx-textdomain' )?></label>
    </td>
    <td>
      <input type="text" name="tw" value="<?php if ( isset ( $member_tw_profile['rns_member_tw_profile'] ) ) echo $member_tw_profile['rns_member_tw_profile'][0]; ?>" />
    </td>
  </tr>
  <tr>
    <td class="field-heading">
      <label for="gplus" class="prfx-row-title"><?php _e( 'Google Plus', 'prfx-textdomain' )?></label>
    </td>
    <td>
      <input type="text" name="gplus" value="<?php if ( isset ( $member_gplus_profile['rns_member_gplus_profile'] ) ) echo $member_gplus_profile['rns_member_gplus_profile'][0]; ?>" />
    </td>
  </tr>

  <tr>
    <td class="field-heading">
      <label for="member_intro" class="prfx-row-title"><?php _e( 'Member Intro', 'prfx-textdomain' )?></label>
    </td>
    <td>
      <textarea class="prfx-row-title" cols="40" name="member_intro" id="member_intro"><?php if ( isset ( $member_intro['rns_member_intro'] ) ) echo $member_intro['rns_member_intro'][0]; ?></textarea>
    </td>
  </tr>
 
  
</table>