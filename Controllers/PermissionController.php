<?php

class PermissionController
{
    public const PERMISSION_ID = [
        'admin' => 1,
        'editor' => 2,
        'reader' => 3,
    ];

    public static function getPermissionName(int $permissionId): string
    {
        switch($permissionId) {
            case self::PERMISSION_ID['admin']:
                return '管理者';
                break;
            case self::PERMISSION_ID['editor']:
                return '編集者';
                break;
            case self::PERMISSION_ID['reader']:
                return '閲覧者';
                break;
            default:
                return '';
                break;
        }
    }

    public static function isAdmin(int $permissionId): bool
    {
        if ($permissionId === self::PERMISSION_ID['admin']) {
            return true;
        } else {
            return false;
        }
    }

    public static function isAdminOrEditor(int $permissionId):bool
    {
        if ($permissionId === self::PERMISSION_ID['admin'] || $permissionId === self::PERMISSION_ID['editor']) {
            return true;
        } else {
            return false;
        }
    }

    public static function addDisabledOrNot(int $permissionId): string
    {
        if ($permissionId === self::PERMISSION_ID['reader']) {
            return 'disabled';
        } else {
            return '';
        }
    }
}
