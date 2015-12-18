<?php
class BBCodeConverter
{
    private static function getBalisesBbcode()
    {
        return array(
            '~\[b\](.*?)\[/b\]~s',
            '~\[i\](.*?)\[/i\]~s',
            '~\[u\](.*?)\[/u\]~s',
            '~\[size=(.*?)\](.*?)\[/size\]~s',
            '~\[color=(.*?)\](.*?)\[/color\]~s',
            '~\[url\]((?:ftp|https?)://.*?)\[/url\]~s'
        );
    }

    private static function getBalisesHtml()
    {
        return array(
            '<b>$1</b>',
            '<i>$1</i>',
            '<span style="text-decoration:underline;">$1</span>',
            '<span style="font-size:$1px;">$2</span>',
            '<span style="color:$1;">$2</span>',
            '<a href="$1">$1</a>'
        );
    }

    public static function bbcodeToHtml($texte)
    {
        return preg_replace(self::getBalisesBbcode(), self::getBalisesHtml(), $texte);
    }

    public static function bbcodeToSimpleTexte($texte)
    {
        $original = array(
            '$1',
            '$1',
            '$1',
            '$2',
            '$2',
            '$1'
        );
        return preg_replace(self::getBalisesBbcode(), $original, $texte);
    }

}