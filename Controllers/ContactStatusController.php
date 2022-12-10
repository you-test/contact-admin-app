<?php

class ContactStatusController
{
    public static function statusJudge(string $status): string
    {
        if ($status === '進行中') {
            return 'class="background-yellow"';
        } elseif ($status === '未対応') {
            return 'class="background-red"';
        }
        return '';
    }
}
