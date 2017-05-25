<aside class="main-sidebar">

    <section class="sidebar">
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    [
                        'label' => 'Безопасность',
                        'icon' => 'fa fa-users',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Пользователи', 'icon' => 'fa fa-user-plus', 'url' => ['/user']],
                            ['label' => 'Роли', 'icon' => 'fa fa-user-secret', 'url' => ['/role']],
                            ['label' => 'Доступы', 'icon' => 'fa fa-key', 'url' => ['/permission']],
                        ],
                    ],
                    ['label' => 'Карты', 'icon' => 'fa fa-id-badge', 'url' => ['/card']],
                    ['label' => 'Деки', 'icon' => 'fa fa-cubes', 'url' => ['/deck']],
                    ['label' => 'Записи', 'icon' => 'fa fa-pencil-square', 'url' => ['/post']],
                    ['label' => 'Комментарии', 'icon' => 'fa fa-comments-o', 'url' => ['/comment']],
                    ['label' => 'Настройки', 'icon' => 'fa fa-cog', 'url' => ['/settings']],
                ],
            ]
        ) ?>

    </section>

</aside>
