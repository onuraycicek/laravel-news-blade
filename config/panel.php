<?php

return [
	[
			'name' => 'Editor',
			'permission' => 'view editor dashboard',
			'items' => [
					[
							'name' => 'Taslaklar',
							'route' => 'dashboard.editor.drafts.show',
					],
					[
							'name' => 'Yazılar',
							'route' => 'dashboard.editor.posts.show',
					],
			],
	],
	[
			'name' => 'Yönetici',
			'permission' => 'view admin dashboard',
			'items' => [
					[
							'name' => 'Kullanıcılar',
							'route' => 'dashboard.admin.users',
					],
			],
	],
];