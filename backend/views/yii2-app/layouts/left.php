<aside class="main-sidebar">

    <section class="sidebar">
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    [
                        'label' => 'Users',
                        'icon' => 'fa fa-users',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Users', 'icon' => 'fa fa-user-plus', 'url' => ['/user']],
                            ['label' => 'Roles', 'icon' => 'fa fa-user-secret', 'url' => ['/role']],
                            ['label' => 'Permissions', 'icon' => 'fa fa-key', 'url' => ['/permission']],
                        ],
                    ],
                    ['label' => 'Cards', 'icon' => 'fa fa-id-badge', 'url' => ['/card']],
                    ['label' => 'Decks', 'icon' => 'fa fa-cubes', 'url' => ['/deck']],
                    ['label' => 'Posts', 'icon' => 'fa fa-pencil-square', 'url' => ['/post']],
                    ['label' => 'Comments', 'icon' => 'fa fa-comments-o', 'url' => ['/comment']],
                    ['label' => 'Settings', 'icon' => 'fa fa-cog', 'url' => ['/settings']],
                ],
            ]
        ) ?>

    </section>

</aside>
