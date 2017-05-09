<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Theme Boost Campus - Language pack
 *
 * @package    theme_boost_campus
 * @copyright  2017 Kathrin Osswald, Ulm University <kathrin.osswald@uni-ulm.de>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['pluginname'] = 'Boost Campus';
$string['choosereadme'] = 'Theme Boost Campus is a child theme to be used on university campuses.';

/* Settings */
$string['configtitle'] = 'Boost Campus settings';
$string['layoutsettings'] = 'Layout Settings';
$string['designsettings'] = 'Design Settings';

$string['loginbackgroundimagesetting'] = 'Login page background images';
$string['loginbackgroundimagesetting_desc'] = 'Images uploaded in this setting will be randomly displayed on the login page as background images.';

$string['loginform'] = 'Login form';
$string['loginform_desc'] = 'With this setting you can optimize the login form to fit to a greater variety background images (if checked). This means that the login form will be moved to the left of the login page, will get smaller in width and will get a background that let the background image shine through. The login form will be placed on the left because many images have their main content rather in the center and so we keep this content visible. Note: You can also activate this setting if no background images are uploaded, of course.';

$string['footerblocks0columnssetting'] = 'No blocks in footer';
$string['footerblocks1columnssetting'] = 'One block columns in footer';
$string['footerblocks2columnssetting'] = 'Two block columns in footer';
$string['footerblocks3columnssetting'] = 'Three block columns in footer';
$string['footerblockssetting'] = 'Footer blocks';
$string['footerblockssetting_desc'] = 'You can chose if you want to enable the possibility to place blocks into the footer. If enabled, you can choose between one, two or three block columns. These columns are only displayed on large screens. On small screens the columns will be automatically reduced to one column for better readability and layout.';

$string['faviconsetting'] = 'Favicon';
$string['faviconsetting_desc'] = 'You can upload one image (.ico or .png format) that the browser will show as the favicon of your Moodle website.';

$string['region-footer-left'] = 'Footer (left)';
$string['region-footer-middle'] = 'Footer (middle)';
$string['region-footer-right'] = 'Footer (right)';
$string['region-side-pre'] = 'Right';

$string['courseeditbuttonsetting'] = 'Course edit button';
$string['courseeditbuttonsetting_desc'] = 'With this setting you can add an additional course edit on / off button to the course header for faster accessibility of this often used function.';

$string['section0titlesetting'] = 'Section 0: Title';
$string['section0titlesetting_desc'] = 'This setting can change the behaviour Moodle displays the title for the first course section. Moodle does not display it as long as the default title for this section is set. As soon as a user changes the title, it will appear. With this setting (option is checked), you can achieve a consistent behaviour by always showing the title for section 0.';

$string['showswitchedroleincoursesetting'] = 'Position of switch role information';
$string['showswitchedroleincoursesetting_desc'] = 'With this setting you can choose the place where the information to which role a user has switched is being displayed. If not checked (default value), the role information will be displayed right beneath the user\'s name in the user menu (like in theme Boost). If checked, this information - together with a link to switch back - will be displayed beneath the course, as this functionality is course related.';
$string['switchedroleto'] = 'You are viewing this course currently with the role:';

$string['fontfilessetting'] = 'Font files';
$string['fontfilessetting_desc'] = 'With this dialogue you can upload own font files. The uplaod is resricted to the font files of type .eot, .woff, .woff2, .ttf and .svg. <br/>
Important: To be able to use the uploaded fonts within this theme, you have to add related code to your "Raw SCSS" area in the tab "Advanced Settings". A full example for this can be found in the README.md file.';

$string['loginpagedesignheadingsetting'] = 'Login page';
$string['fontdesignheadingsetting'] = 'Fonts';

$string['footerlinksheadingsetting'] = 'Default footer links';
$string['footerlinksheadingsetting_desc'] = 'Moodle provides some default links in the footer: Link to the Moodle docs, login information, and a link to the webpage start. <br/> With the following three settings you can decide if you want to hide specific links because you think that your users won\'t need them in your instance.';

$string['footerlinks_desc'] = 'If checked, the link will not be displayed in the footer. If not checked (default), it will be shown.';

$string['footerhidehelplinksetting'] = 'Hide link to the Moodle docs';
$string['footerhidelogininfosetting'] = 'Hide login information';
$string['footerhidehomelinksetting'] = 'Hide link to the webpage start';

$string['courselayoutheadingsetting'] = 'Course layout';
$string['footerlayoutheadingsetting'] = 'Footer layout';

$string['blockdesignheadingsetting'] = 'Blocks';
$string['blockiconsetting'] = 'Block icon';
$string['blockiconsetting_desc'] = 'With this setting you can add a default Font Awesome icon in front of the block title.  If checked, we additionally provide individual icon replacements for many Moodle core blocks and also some widely used blocks. You also can change the icons easily for each block individually in your raw SCSS via the change of the Font Awesome content. For all available icons please visit http://fontawesome.io/icons/ and use the Unicode value of the icon to replace the default one. <br/> The code to change the icon looks like this example change for the block "People": <br/>';
$string['blockiconsetting_desc_code'] = '.block_people .card-block .card-title::before { content: \'\f0c0\' ; }';

$string['presetheadingsetting'] = 'Theme presets';
$string['brandcolorheadingsetting'] = 'Brand colors';
$string['faviconheadingsetting'] = 'Favicon';
$string['brandsuccesscolorsetting'] = 'Brand success color';
$string['brandsuccesscolorsetting_desc'] = 'This color is used for example in regards to form validations.';
$string['brandinfocolorsetting'] = 'Brand info color';
$string['brandinfocolorsetting_desc'] = 'This color is used for example for availabiity information of course activities or resources.';
$string['brandwarningcolorsetting'] = 'Brand warning color';
$string['brandwarningcolorsetting_desc'] = 'This color is used for example for warning texts.';
$string['branddangercolorsetting'] = 'Brand danger color';
$string['branddangercolorsetting_desc'] = 'This color is used for example in regards to form validations.';

$string['navbardesignheadingsetting'] = 'Navbar';
$string['darknavbarsetting'] = 'Dark navbar';
$string['darknavbarsetting_desc'] = 'By checking this setting you can invert the default light navbar to a dark one with white links.';

$string['navdrawerheadingsetting'] = 'Nav drawer';
$string['nawdrawerfullwidthsetting'] = 'Nav drawer width on small screens';
$string['nawdrawerfullwidthsettings_desc'] = 'By checking this setting you can enlarge the expanded nav drawer menu to the full page width on small screens. This may be wanted because on small screens only very few of the main content area in the background is visible. And a full width menu might serve the users\' expectations how menus are displayed on small screens.';
