<?php

class PermissionController
{
    public static function getPermissionName(int $permissionId): string
    {
        switch($permissionId) {
            case 1:
                return '管理者';
                break;
            case 2:
                return '編集者';
                break;
            case 3:
                return '閲覧者';
                break;
            default:
                return '';
                break;
        }
    }
}
