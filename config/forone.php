<?php
/**
 * User : YuGang Yang
 * Date : 7/27/15
 * Time : 15:26
 * Email: smartydroid@gmail.com
 */

return [
    'site_config'  => [
        'site_name'   => 'your site name',
        'title'       => 'your site title',
        'description' => 'you site description'
    ],
    'RedirectAfterLoginPath' => 'admin/roles', // 登录后跳转页面
    'RedirectIfAuthenticatedPath' => 'admin/roles', // 如果授权后直接跳转到指定页面

    'menus'        => [
        '文章管理'  => [
            'active_uri'      => 'articals',
            'icon'            => 'mdi-action-tab',
            'permission_name' => 'admin.roles.index',
            'route_name'      => 'admin.articals.index',
            'is_redirect'     => true,

        ],
        '标签管理'  => [
            'active_uri'      => 'tags',
            'icon'            => 'mdi-action-tab',
            'permission_name' => 'admin.roles.index',
            'route_name'      => 'admin.tags.index',
            'is_redirect'     => true,

        ],
        '分类管理'  => [
            'active_uri'      => 'categories',
            'icon'            => 'mdi-action-subject',
            'permission_name' => 'admin.roles.index',
            'route_name'      => 'admin.categories.index',
            'is_redirect'     => true,
        ],
        '权限' => [
            'icon'            => 'mdi-toggle-radio-button-on',
            'active_uri'      => 'roles|permissions|admins|navs',
            'permission_name' => 'permissions#',
            'route_name'      => 'permissions#',
            'is_redirect'     => false,
            'children'        => [
                '角色管理'  => [
                    'active_uri'      => 'roles',
                    'icon'            => null,
                    'permission_name' => 'admin.roles.index',
                    'route_name'      => 'admin.roles.index',
                    'is_redirect'     => true,
                ],
                '权限管理'  => [
                    'active_uri'      => 'permissions',
                    'icon'            => null,
                    'permission_name' => 'admin.permissions.index',
                    'route_name'      => 'admin.permissions.index',
                    'is_redirect'     => true,
                ],
                '管理员管理' => [
                    'active_uri'      => 'admins',
                    'icon'            => null,
                    'permission_name' => 'admin.admins.index',
                    'route_name'      => 'admin.admins.index',
                    'is_redirect'     => true,
                ]
            ],
        ],
    ],

    'nav_titles'   => [
        'admin.roles.index'        => '角色管理',
        'admin.roles.create'       => '创建角色',
        'admin.permissions.index'  => '权限管理',
        'admin.permissions.create' => '创建权限',
        'admin.admins.index'       => '管理员管理',
        'admin.admins.create'      => '创建管理员管理',
        'admin.tags.index'          => '标签管理',
        'admin.tags.create'         => '新建标签',
        'admin.tags.edit'           => '编辑标签',
        'admin.tags.show'           => '查看标签',
        'admin.categories.index'          => '标签管理',
        'admin.categories.create'         => '新建标签',
        'admin.categories.edit'           => '编辑标签',
        'admin.categories.show'           => '查看标签',
        'admin.articals.index'          => '标签管理',
        'admin.articals.create'         => '新建标签',
        'admin.articals.edit'           => '编辑标签',
        'admin.articals.show'           => '查看标签',
    ],
];