<?php

namespace App\Enums;

enum PermissionsEnum:string {
	case DELETEUSER = 'delete user';
	case GIVEROLE = 'give role';

	case EDITPOST = 'edit post';
	case DELETEPOST = 'delete post';
	case CREATEPOST = 'create post';

	case VIEWDASHBOARD = 'view dashboard';
	case VIEWADMINDASHBOARD = 'view admin dashboard';
	case VIEWEDITORDASHBOARD = 'view editor dashboard';
}