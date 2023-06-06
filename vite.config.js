import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/admin/admindashboard/admindashboard.js',
                'resources/js/admin/sector/sector.js',
                'resources/js/admin/userdata/userdata.js',
                'resources/js/admin/userdata/userdata-edit.js',
                'resources/js/admin/users/users.js',
                'resources/js/user/dashboard/dashboard.js',
                'resources/js/user/investorlocation/investorlocation.js',
                'resources/js/user/detail/detail.js',
                'resources/js/user/contribution/contribution.js',
                'resources/js/profile/avatar.js',
                'resources/js/profile/profileinfo.js',
                'resources/js/profile/profilepassword.js',
            ],
            refresh: true,
        }),
    ],
});
