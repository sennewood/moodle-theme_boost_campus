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
 * Theme Boost Campus - JS code breadcrumb fixed to top
 *
 * @package    theme_boost_campus
 * @copyright  2017 Kathrin Osswald, Ulm University <kathrin.osswald@uni-ulm.de>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

define(['jquery'], function($) {

    $(document).ready(function() {
        $(window).scroll(function() {
            /* This fixes course context setting to the top of the page
             * directly beneath the page header if the page is scrolled past the course header. */
            if ($(this).scrollTop() > $('header').height()) {
                $('#page-header .context-header-settings-menu').css({'position': 'fixed', 'z-index': '100', 'top':'47px',
                  'border-bottom': '1px solid #373a3c', 'right': '45px'});
                $('#page-header .context-header-settings-menu.dropdown-toggle::after').css({'margin-left': '0.1em'});
            } else {
                // This resets the above defined style if the user is on top of the page and sees the course header.
                $('#page-header .context-header-settings-menu').removeAttr('style');
            }
            /* This fixes the breadcrumb nav to the top of the page
             * directly beneath the page header if the page is scrolled past the course header. */
            if ($(this).scrollTop() > ($('.page-context-header').height() + $('.breadcrumb-nav').height() - 12)) {
                $('#page-header .breadcrumb-nav').css({'position': 'fixed', 'z-index': '100', 'top': '50px',
                  'border-bottom': '1px solid #373a3c', 'background': '#fff'});
            } else {
                // This resets the above defined style if the user is on top of the page and sees the course header.
                $('#page-header .breadcrumb-nav').removeAttr('style');
            }
            // Remove the style if the user scrolls beneath the footer.
            if ($(this).scrollTop() > ($('#page').height() - ($('.breadcrumb-nav').height() / 2) - 7)){
                $('#page-header .breadcrumb-nav').removeAttr('style');
                $('#page-header .context-header-settings-menu').removeAttr('style');
            }
        });
    });

    return {};

});
