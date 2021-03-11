<?php

namespace App;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;

class H
{
    public static function getLang()
    {
        if (App::isLocale('en')) {
            return 'en';
        } else if (App::isLocale('fa')) {
            return 'fa';
        } else {
            return 'fa';
        }
    }

    public static function setLang($lang)
    {
        if ($lang === 'en') {
            App::setLocale($lang);
            return true;
        } else if ($lang === 'fa') {
            App::setLocale($lang);
            return true;
        } else {
            App::setLocale('fa');
            return false;
        }
        return false;
    }


    // region mobile
    public static function isMobile(?string $value): bool
    {
        return (bool)preg_match('~^(((\+|00)?98)|0)?9\d{9}$~', $value);
    }

    public static function toMobile(?string $value): ?string
    {
        return H::isMobile($value)
            ? '+98' . Str::substr($value, Str::length($value) - 10, 10)
            : null;
    }
    // endregion mobile


    // region username
    public static function isValidUsername($username)
    {
        if (is_string($username)) {
            return preg_match('~^[a-zA-Z_][a-zA-Z0-9_]{2,19}$~', $username);
        }

        return false;
    }
    // endregion username

}
