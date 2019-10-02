<?php

namespace App\Http\Helpers;

class Url
{
    /**
     * @param $id
     * @return array|string
     * @throws \Exception
     */
    public static function encode($id)
    {
        if ($id == 0) {
            throw new \Exception('Id can\'t be less or equal 0');
        }

        $dictionary = self::getDictionary();

        $encodedId = [];
        $base = count($dictionary);

        while ($id > 0) {
            $encodedId[] = $dictionary[($id % $base)];
            $id = floor($id / $base);
        }

        $encodedId = join("", array_reverse($encodedId));

        return $encodedId;
    }

    /**
     * @param $input
     * @return false|float|int|string
     */
    public static function decode($input)
    {
        $id = 0;
        $dictionary = self::getDictionary();
        $base = count($dictionary);

        $input = str_split($input);

        foreach($input as $char) {
            $characterPosition = array_search($char, $dictionary);

            $id = $id * $base + $characterPosition;
        }

        return $id;
    }

    private static function getDictionary()
    {
        return str_split("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789");
    }
}
