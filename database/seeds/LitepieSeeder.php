<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Setting;

class LitepieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setting = $this->findSetting('site.title');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => 'Site Title',
                'value'        => 'Site Title',
                'details'      => '',
                'type'         => 'text',
                'order'        => 1,
                'group'        => 'Site',
            ])->save();
        }

        $setting = $this->findSetting('site.description');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => 'Site Description',
                'value'        => 'Site Description',
                'details'      => '',
                'type'         => 'text',
                'order'        => 2,
                'group'        => 'Site',
            ])->save();
        }

        $setting = $this->findSetting('site.logo');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => 'Site Logo',
                'value'        => '',
                'details'      => '',
                'type'         => 'image',
                'order'        => 3,
                'group'        => 'Site',
            ])->save();
        }

        $setting = $this->findSetting('site.google_analytics_tracking_id');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => 'Google Analytics Tracking ID',
                'value'        => '',
                'details'      => '',
                'type'         => 'text',
                'order'        => 4,
                'group'        => 'Site',
            ])->save();
        }

        $setting = $this->findSetting('admin.bg_image');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => 'Admin Background Image',
                'value'        => '',
                'details'      => '',
                'type'         => 'image',
                'order'        => 5,
                'group'        => 'Admin',
            ])->save();
        }

        $setting = $this->findSetting('admin.title');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => 'Admin Title',
                'value'        => 'Voyager',
                'details'      => '',
                'type'         => 'text',
                'order'        => 1,
                'group'        => 'Admin',
            ])->save();
        }

        $setting = $this->findSetting('admin.description');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => 'Admin Description',
                'value'        => 'Welcome to Voyager. The Missing Admin for Laravel',
                'details'      => '',
                'type'         => 'text',
                'order'        => 2,
                'group'        => 'Admin',
            ])->save();
        }

        $setting = $this->findSetting('admin.loader');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => 'Admin Loader',
                'value'        => '',
                'details'      => '',
                'type'         => 'image',
                'order'        => 3,
                'group'        => 'Admin',
            ])->save();
        }

        $setting = $this->findSetting('admin.icon_image');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => 'Admin Icon Image',
                'value'        => '',
                'details'      => '',
                'type'         => 'image',
                'order'        => 4,
                'group'        => 'Admin',
            ])->save();
        }

        $setting = $this->findSetting('admin.google_analytics_client_id');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => 'Google Analytics Client ID (used for admin dashboard)',
                'value'        => '',
                'details'      => '',
                'type'         => 'text',
                'order'        => 1,
                'group'        => 'Admin',
            ])->save();
        }

        $setting = $this->findSetting('site.building');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => 'Side Building',
                'value'        => 'Jogjakarta, Indonesia',
                'details'      => '',
                'type'         => 'text',
                'order'        => 4,
                'group'        => 'Site',
            ])->save();
        }

        $setting = $this->findSetting('site.app_name');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => 'Site App Name',
                'value'        => 'litepie',
                'details'      => '',
                'type'         => 'text',
                'order'        => 2,
                'group'        => 'Site',
            ])->save();
        }

        $setting = $this->findSetting('general.google_site_verification');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => 'Google Site Verification',
                'value'        => '',
                'details'      => '',
                'type'         => 'code_editor',
                'order'        => 8,
                'group'        => 'General',
            ])->save();
        }

        $setting = $this->findSetting('general.facebook_sdk');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => 'Facebook SDK',
                'value'        => '',
                'details'      => '',
                'type'         => 'code_editor',
                'order'        => 9,
                'group'        => 'General',
            ])->save();
        }

        $setting = $this->findSetting('general.facebook_fans_page');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => 'Facebook Fans Page',
                'value'        => 'https://www.facebook.com/litepieweb',
                'details'      => '',
                'type'         => 'text',
                'order'        => 10,
                'group'        => 'General',
            ])->save();
        }

        $setting = $this->findSetting('general.social_media');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => 'Social Media',
                'value'        => '<ul class="list-inline">
                                    <li>
                                        <a href="https://www.facebook.com/litepieweb" target="_blank"><i class="fa fa-facebook facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="https://github.com/litepieweb" target="_blank"><i class="fa fa-github github"></i></a>
                                    </li>
                                    <li>
                                        <a href="https://www.youtube.com" target="_blank"><i class="fa fa-youtube youtube"></i></a>
                                    </li>
                                </ul>',
                'details'      => '',
                'type'         => 'code_editor',
                'order'        => 11,
                'group'        => 'General',
            ])->save();
        }

        $setting = $this->findSetting('general.disqus');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => 'Disqus',
                'value'        => 'https://your.disqus.com',
                'details'      => '',
                'type'         => 'text',
                'order'        => 12,
                'group'        => 'General',
            ])->save();
        }

        $setting = $this->findSetting('quick-adsense.footer_ads');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => 'Footer Ads',
                'value'        => '',
                'details'      => '',
                'type'         => 'code_editor',
                'order'        => 18,
                'group'        => 'Quick Adsense',
            ])->save();
        }

        $setting = $this->findSetting('quick-adsense.header_ads');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => 'Header Ads',
                'value'        => '',
                'details'      => '',
                'type'         => 'code_editor',
                'order'        => 13,
                'group'        => 'Quick Adsense',
            ])->save();
        }

        $setting = $this->findSetting('quick-adsense.random_ads');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => 'Random Ads',
                'value'        => '',
                'details'      => '',
                'type'         => 'code_editor',
                'order'        => 15,
                'group'        => 'Quick Adsense',
            ])->save();
        }

        $setting = $this->findSetting('admin.admin_prefix');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => 'Admin Prefix',
                'value'        => 'your/dashboard',
                'details'      => '',
                'type'         => 'text',
                'order'        => 16,
                'group'        => 'Admin',
            ])->save();
        }

        $setting = $this->findSetting('site.site_background');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => 'Site Background',
                'value'        => 'images/notebook.jpg',
                'details'      => '',
                'type'         => 'text',
                'order'        => 7,
                'group'        => 'site',
            ])->save();
        }

        $setting = $this->findSetting('quick-adsense.article_ads');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => 'Article Ads',
                'value'        => '',
                'details'      => '',
                'type'         => 'code_editor',
                'order'        => 14,
                'group'        => 'Quick Adsense',
            ])->save();
        }
    }

    /**
     * [setting description].
     *
     * @param [type] $key [description]
     *
     * @return [type] [description]
     */
    protected function findSetting($key)
    {
        return Setting::firstOrNew(['key' => $key]);
    }
}
