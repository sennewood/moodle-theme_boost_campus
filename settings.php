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
 * Theme Boost Campus - Settings file
 *
 * @package    theme_boost_campus
 * @copyright  2017 Kathrin Osswald, Ulm University <kathrin.osswald@uni-ulm.de>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

if ($ADMIN->fulltree) {

    // Create settings page with tabs.
    $settings = new theme_boost_admin_settingspage_tabs('themesettingboost_campus',
        get_string('configtitle', 'theme_boost_campus'));


    // Create general tab.
    $page = new admin_settingpage('theme_boost_campus_general', get_string('generalsettings', 'theme_boost'));

    // Settings title to group preset related settings together with a common heading. We don't want a description here.
    $setting = new admin_setting_heading('theme_boost_campus/presetheading',
        get_string('presetheadingsetting', 'theme_boost_campus', null, true), null);
    $page->add($setting);

    // Replicate the preset setting from theme_boost.
    $name = 'theme_boost_campus/preset';
    $title = get_string('preset', 'theme_boost');
    $description = get_string('preset_desc', 'theme_boost');
    $default = 'default.scss';

    // We list files in our own file area to add to the drop down. We will provide our own function to
    // load all the presets from the correct paths.
    $context = context_system::instance();
    $fs = get_file_storage();
    $files = $fs->get_area_files($context->id, 'theme_boost_campus', 'preset', 0, 'itemid, filepath, filename', false);

    $choices = [];
    foreach ($files as $file) {
        $choices[$file->get_filename()] = $file->get_filename();
    }
    // These are the built in presets from Boost.
    $choices['default.scss'] = 'default.scss';
    $choices['plain.scss'] = 'plain.scss';

    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);


    // Preset files setting.
    $name = 'theme_boost_campus/presetfiles';
    $title = get_string('presetfiles', 'theme_boost');
    $description = get_string('presetfiles_desc', 'theme_boost');

    $setting = new admin_setting_configstoredfile($name, $title, $description, 'preset', 0,
        array('maxfiles' => 20, 'accepted_types' => array('.scss')));
    $page->add($setting);

    // Settings title to group brand color related settings together with a common heading. We don't want a description here.
    $setting = new admin_setting_heading('theme_boost_campus/brandcolorheading',
        get_string('brandcolorheadingsetting', 'theme_boost_campus', null, true), null);
    $page->add($setting);

    // Variable $brand-color.
    // We use an empty default value because the default colour should come from the preset.
    $name = 'theme_boost_campus/brandcolor';
    $title = get_string('brandcolor', 'theme_boost');
    $description = get_string('brandcolor_desc', 'theme_boost');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Variable $brand-succes-color.
    $name = 'theme_boost_campus/brandsuccesscolor';
    $title = get_string('brandsuccesscolorsetting', 'theme_boost_campus');
    $description = get_string('brandsuccesscolorsetting_desc', 'theme_boost_campus');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Variable $brand-info-color.
    $name = 'theme_boost_campus/brandinfocolor';
    $title = get_string('brandinfocolorsetting', 'theme_boost_campus');
    $description = get_string('brandinfocolorsetting_desc', 'theme_boost_campus');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Variable $brand-warning-color.
    $name = 'theme_boost_campus/brandwarningcolor';
    $title = get_string('brandwarningcolorsetting', 'theme_boost_campus');
    $description = get_string('brandwarningcolorsetting_desc', 'theme_boost_campus');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Variable $brand-warning-color.
    $name = 'theme_boost_campus/branddangercolor';
    $title = get_string('branddangercolorsetting', 'theme_boost_campus');
    $description = get_string('branddangercolorsetting_desc', 'theme_boost_campus');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Settings title to group favicon related settings together with a common heading. We don't want a description here.
    $setting = new admin_setting_heading('theme_boost_campus/faviconheading',
        get_string('faviconheadingsetting', 'theme_boost_campus', null, true), null);
    $page->add($setting);

    // Favicon upload.
    $name = 'theme_boost_campus/favicon';
    $title = get_string('faviconsetting', 'theme_boost_campus');
    $description = get_string('faviconsetting_desc', 'theme_boost_campus');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'favicon', 0,
        array('maxfiles' => 1, 'accepted_types' => array('.ico', '.png')));
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Add tab to settings page.
    $settings->add($page);


    // Create advanced settings tab.
    $page = new admin_settingpage('theme_boost_campus_advanced', get_string('advancedsettings', 'theme_boost'));

    // Raw SCSS to include before the content.
    $setting = new admin_setting_configtextarea('theme_boost_campus/scsspre',
        get_string('rawscsspre', 'theme_boost'), get_string('rawscsspre_desc', 'theme_boost'), '', PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Raw SCSS to include after the content.
    $setting = new admin_setting_configtextarea('theme_boost_campus/scss', get_string('rawscss', 'theme_boost'),
        get_string('rawscss_desc', 'theme_boost'), '', PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Add tab to settings page.
    $settings->add($page);


    // Create layout settings tab.
    $page = new admin_settingpage('theme_boost_campus_layout', get_string('layoutsettings', 'theme_boost_campus'));

    // Settings title to group course related settings together with a common heading. We don't want a description here.
    $setting = new admin_setting_heading('theme_boost_campus/courselayoutheading',
        get_string('courselayoutheadingsetting', 'theme_boost_campus', null, true), null);
    $page->add($setting);

    // Setting for displaying section-0 title in courses.
    $setting = new admin_setting_configcheckbox('theme_boost_campus/section0title',
        get_string('section0titlesetting', 'theme_boost_campus', null, true),
        get_string('section0titlesetting_desc', 'theme_boost_campus', null, true), 'no', 'yes', 'no'); // Overriding default values
        // yes = 1 and no = 0 because of the use of empty() in theme_boost_campus_get_pre_scss() (lib.php). Default 0 value would
        // not write the variable to scss that could cause the scss to crash if used in that file. See MDL-58376.
        $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Setting for displaying edit on / off button addionally in course header.
    $setting = new admin_setting_configcheckbox('theme_boost_campus/courseeditbutton',
        get_string('courseeditbuttonsetting', 'theme_boost_campus', null, true),
        get_string('courseeditbuttonsetting_desc', 'theme_boost_campus', null, true), 0);
        $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Setting to display information of a switched role in the course header.
    $setting = new admin_setting_configcheckbox('theme_boost_campus/showswitchedroleincourse',
        get_string('showswitchedroleincoursesetting', 'theme_boost_campus', null, true),
        get_string('showswitchedroleincoursesetting_desc', 'theme_boost_campus', null, true), 'no', 'yes', 'no'); // Overriding
        // default values yes = 1 and no = 0 because of the use of empty() in theme_boost_campus_get_pre_scss() (lib.php). #
        // Default 0 value would not write the variable to scss that could cause the scss to crash if used in that file.
        // See MDL-58376.
        $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Settings title to group footer related settings together with a common heading. We don't want a description here.
    $setting = new admin_setting_heading('theme_boost_campus/footerlayoutheading',
        get_string('footerlayoutheadingsetting', 'theme_boost_campus', null, true), null);
    $page->add($setting);

    // Setting for enabling blocks with different layouts in the footer.
    $footerlayoutoptions = [
     // Don't use string lazy loading (= false) because the string will be directly used and would produce a PHP warning otherwise.
    '0columns' => get_string('footerblocks0columnssetting', 'theme_boost_campus', null, false),
    '1columns' => get_string('footerblocks1columnssetting', 'theme_boost_campus', null, true),
    '2columns' => get_string('footerblocks2columnssetting', 'theme_boost_campus', null, true),
    '3columns' => get_string('footerblocks3columnssetting', 'theme_boost_campus', null, true)
    ];

    $setting = new admin_setting_configselect('theme_boost_campus/footerblocks',
        get_string('footerblockssetting', 'theme_boost_campus', null, true),
        get_string('footerblockssetting_desc', 'theme_boost_campus', null, true),
        $footerlayoutoptions['0columns'], $footerlayoutoptions);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Settings title to group the settings footerhelplink, footerlogininfo and footerhomelink together with a common description.
    // We don't need another heading here, only the description text.
    $setting = new admin_setting_heading('theme_boost_campus/footerlinksheading',
        null, get_string('footerlinksheadingsetting_desc', 'theme_boost_campus', null, true));
    $page->add($setting);

    // Helplink.
    $setting = new admin_setting_configcheckbox('theme_boost_campus/footerhidehelplink',
        get_string('footerhidehelplinksetting', 'theme_boost_campus', null, true),
        get_string('footerlinks_desc', 'theme_boost_campus', null, true), 'no', 'yes', 'no' ); // Overriding default values
        // yes = 1 and no = 0 because of the use of empty() in theme_boost_campus_get_pre_scss() (lib.php). Default 0 value would
        // not write the variable to scss that could cause the scss to crash if used in that file. See MDL-58376.
        $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Logininfo.
    $setting = new admin_setting_configcheckbox('theme_boost_campus/footerhidelogininfo',
        get_string('footerhidelogininfosetting', 'theme_boost_campus', null, true),
        get_string('footerlinks_desc', 'theme_boost_campus', null, true), 'no', 'yes', 'no' ); // Overriding default values
        // yes = 1 and no = 0 because of the use of empty() in theme_boost_campus_get_pre_scss() (lib.php). Default 0 value would
        // not write the variable to scss that could cause the scss to crash if used in that file. See MDL-58376.
        $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Homelink.
    $setting = new admin_setting_configcheckbox('theme_boost_campus/footerhidehomelink',
        get_string('footerhidehomelinksetting', 'theme_boost_campus', null, true),
        get_string('footerlinks_desc', 'theme_boost_campus', null, true), 'no', 'yes', 'no' ); // Overriding default values
        // yes = 1 and no = 0 because of the use of empty() in theme_boost_campus_get_pre_scss() (lib.php). Default 0 value would
        // not write the variable to scss that could cause the scss to crash if used in that file. See MDL-58376.
        $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Settings title to group footer related settings together with a common heading. We don't want a description here.
    $setting = new admin_setting_heading('theme_boost_campus/navdrawerheading',
        get_string('navdrawerheadingsetting', 'theme_boost_campus', null, true), null);
    $page->add($setting);

    // Set navdrwaer to full width on small screens when expanded.
    $setting = new admin_setting_configcheckbox('theme_boost_campus/nawdrawerfullwidth',
        get_string('nawdrawerfullwidthsetting', 'theme_boost_campus', null, true),
        get_string('nawdrawerfullwidthsettings_desc', 'theme_boost_campus', null, true), 'no', 'yes', 'no' ); // Overriding default values
        // yes = 1 and no = 0 because of the use of empty() in theme_boost_campus_get_pre_scss() (lib.php). Default 0 value would
        // not write the variable to scss that could cause the scss to crash if used in that file. See MDL-58376.
        $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Add tab to settings page.
    $settings->add($page);


     // Create design settings tab.
    $page = new admin_settingpage('theme_boost_campus_design', get_string('designsettings', 'theme_boost_campus'));

    // Settings title to group login page related settings together with a common heading. We don't want a description here.
    $setting = new admin_setting_heading('theme_boost_campus/loginpagedesignheading',
        get_string('loginpagedesignheadingsetting', 'theme_boost_campus', null, true), null);
    $page->add($setting);

    // Login page background setting.
    $name = 'theme_boost_campus/loginbackgroundimage';
    $title = get_string('loginbackgroundimagesetting', 'theme_boost_campus');
    $description = get_string('loginbackgroundimagesetting_desc', 'theme_boost_campus');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'loginbackgroundimage', 0,
        array('maxfiles' => 10, 'accepted_types' => 'web_image'));
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Setting to change the position and design of the login form.
    $setting = new admin_setting_configcheckbox('theme_boost_campus/loginform',
        get_string('loginform', 'theme_boost_campus', null, true),
        get_string('loginform_desc', 'theme_boost_campus', null, true), 'no', 'yes', 'no'); // Overriding default values
        // yes = 1 and no = 0 because of the use of empty() in theme_boost_campus_get_pre_scss() (lib.php). Default 0 value would
        // not write the variable to scss that could cause the scss to crash if used in that file. See MDL-58376.
        $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Settings title to group font related settings together with a common heading. We don't want a description here.
    $setting = new admin_setting_heading('theme_boost_campus/fontdesignheading',
        get_string('fontdesignheadingsetting', 'theme_boost_campus', null, true), null);
    $page->add($setting);

    // Font files upload.
    $name = 'theme_boost_campus/fontfiles';
    $title = get_string('fontfilessetting', 'theme_boost_campus');
    $description = get_string('fontfilessetting_desc', 'theme_boost_campus');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'fontfiles', 0,
            array('maxfiles' => 100, 'accepted_types' => array('.ttf', '.eot', '.woff', '.woff2')));
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Settings title to group block related settings together with a common heading. We don't want a description here.
    $setting = new admin_setting_heading('theme_boost_campus/blockdesignheading',
        get_string('blockdesignheadingsetting', 'theme_boost_campus', null, true), null);
    $page->add($setting);

    // Setting for displaying a standard Font Awesome icon in front of the block title
    $setting = new admin_setting_configcheckbox('theme_boost_campus/blockicon',
        get_string('blockiconsetting', 'theme_boost_campus', null, true),
        get_string('blockiconsetting_desc', 'theme_boost_campus', null, true) .
        get_string('blockiconsetting_desc_code', 'theme_boost_campus', null, true),'no', 'yes', 'no'); // Overriding default values
        // yes = 1 and no = 0 because of the use of empty() in theme_boost_campus_get_pre_scss() (lib.php). Default 0 value would
        // not write the variable to scss that could cause the scss to crash if used in that file. See MDL-58376.
        $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

     // Settings title to group navbar related settings together with a common heading. We don't want a description here.
    $setting = new admin_setting_heading('theme_boost_campus/navbardesignheading',
        get_string('navbardesignheadingsetting', 'theme_boost_campus', null, true), null);
    $page->add($setting);

    $setting = new admin_setting_configcheckbox('theme_boost_campus/darknavbar',
        get_string('darknavbarsetting', 'theme_boost_campus', null, true),
        get_string('darknavbarsetting_desc', 'theme_boost_campus', null, true), 'no', 'yes', 'no' ); // Overriding default values
        // yes = 1 and no = 0 because of the use of empty() in theme_boost_campus_get_pre_scss() (lib.php). Default 0 value would
        // not write the variable to scss that could cause the scss to crash if used in that file. See MDL-58376.
        $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Add tab to settings page.
    $settings->add($page);
}
