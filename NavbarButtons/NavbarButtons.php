<?php
# 
# Copyright (c) 2024 Pasquale Pizzuti
# 
# Permission is hereby granted, free of charge, to any person obtaining a copy
# of this software and associated documentation files (the "Software"), to deal
# in the Software without restriction, including without limitation the rights
# to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
# copies of the Software, and to permit persons to whom the Software is
# furnished to do so, subject to the following conditions:
# 
# The above copyright notice and this permission notice shall be included in all
# copies or substantial portions of the Software.
# 
# THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
# IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
# FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
# AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
# LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
# OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
# SOFTWARE.

class NavbarButtonsPlugin extends MantisPlugin {

    function register() {

        $this->name        = plugin_lang_get( 'title' );
        $this->description = plugin_lang_get( 'description' );

        $this->version = '1.0.1';

        $this->requires = array(
            'MantisCore' => '2.14.0',
        );

        $this->author  = 'Pasquale Pizzuti';
        $this->contact = 'paspiz85@gmail.com';
        $this->url     = 'https://github.com/paspiz85/MantisBT-NavbarButtons';
    }

    function config() {
        return array(
            'buttons' => array(),
        );
    }

    function hooks() {
        return array(
            'EVENT_LAYOUT_NAVBAR_BUTTONS_END' => 'html_print_buttons',
        );
    }

    function html_print_buttons() {
        $t_buttons = plugin_config_get('buttons');
        foreach( $t_buttons as $t_button ) {
            if ( array_key_exists('any_project_level_threshold', $t_button) && !access_has_any_project_level( $t_button['any_project_level_threshold'] ) ) {
                continue;
            }
            $t_title = $t_button['title'];
            $t_label = $t_button['label'];
            $t_html_title = empty( $t_title ) ? '' : ' title="' . string_html_specialchars( $t_title ) . '"';
            echo '<a class="btn btn-primary btn-sm" href="' . $t_button['url'] . '"' . $t_html_title . '>';
            print_icon( $t_button['icon'] );
            if ( !empty( $t_label ) ) {
                echo ' ' . string_html_specialchars( $t_label );
            }
            echo '</a>';
        }
    }

}
