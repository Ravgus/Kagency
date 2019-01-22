<?php

class Validator
{
    public static function validate($regexp, $content)
    {
        return preg_match($regexp, $content);
    }

    public static function validateUser($content)
    {
        $regexps = [
            '/^[\\w\\s]{1,99}$/',
            '/^.{1,99}$/',
            '/^[\\w]{8,25}$/',
        ];

        $messages = [
            'Incorrect data! Name must contain at least 1 character (from 1 to 99)',
            'Incorrect data! Email must contain at least 1 character (from 1 to 99) and be email',
            'Incorrect data! Password must contain at least 8 characters (from 8 to 25)',
        ];

        $i = 0;

        foreach ($content as $k => $v) {
            if (!Validator::validate($regexps[$i], $v))
                return $messages[$i];
            $i++;
        }

        if(!filter_var($content['email'], FILTER_VALIDATE_EMAIL))
            return $messages[1];

        return 'success';
    }

    public static function validateProduct($content)
    {
        $regexps = [
            '/^[\\w\\s]{1,254}$/',
            '/^.+$/',
            '/^[\\d]{1,9}$/',
            '/^[\\d]{1,9}$/',
        ];

        $messages = [
            'Incorrect data! Name must contain at least 1 character (from 1 to 254)',
            'Incorrect data! Description must contain at least 1 character',
            'Incorrect data! Price must contain at least 1 characters (from 1 to 9) and be integer',
            'Incorrect data! Count must contain at least 1 characters (from 1 to 9) and be integer',
        ];

        $i = 0;

        foreach ($content as $k => $v) {
            if (!Validator::validate($regexps[$i], $v))
                return $messages[$i];
            $i++;
        }

        return 'success';
    }

    public static function validateCategory($content)
    {
        $regexps = [
            '/^[\\w\\s]{1,254}$/',
        ];

        $messages = [
            'Incorrect data! Name must contain at least 1 character (from 1 to 254)',
        ];

        $i = 0;

        foreach ($content as $k => $v) {
            if (!Validator::validate($regexps[$i], $v))
                return $messages[$i];
            $i++;
        }

        return 'success';
    }
}