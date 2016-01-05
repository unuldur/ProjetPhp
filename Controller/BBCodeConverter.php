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
            '~\[url\]((?:ftp|https?)://.*?)\[/url\]~s',
            '~\:\)~s',
            '~\;\)~s',
            '~\:\(~s',
            '~Oo~s',
            '~OO~s',
            '~\:p~s',
            '~xx~s',
            '~\[computer\]~',
            '~\[lol\]~'
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
            '<a href="$1">$1</a>',
            '<img src="Vue/Image/Emoticon/icon_smile.gif" alt=":)">',
            '<img src="Vue/Image/Emoticon/icon_wink.gif" alt=";)">',
            '<img src="Vue/Image/Emoticon/icon_sad.gif" alt=":(">',
            '<img src="Vue/Image/Emoticon/icon_eek.gif" alt="oO">',
            '<img src="Vue/Image/Emoticon/icon_affraid.gif" alt="OO">',
            '<img src="Vue/Image/Emoticon/icon_razz.gif" alt=":p">',
            '<img src="Vue/Image/Emoticon/icon_evil.gif" alt="xx">',
            '<img src="Vue/Image/Emoticon/icon_computer.gif" alt="[computer]">',
            '<img src="Vue/Image/Emoticon/icon_lol.gif" alt="lol">'
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
            '$1',
            '<img src="Vue/Image/Emoticon/icon_smile.gif" alt=":)">',
            '<img src="Vue/Image/Emoticon/icon_wink.gif" alt=";)">',
            '<img src="Vue/Image/Emoticon/icon_sad.gif" alt=":(">',
            '<img src="Vue/Image/Emoticon/icon_eek.gif" alt="oO">',
            '<img src="Vue/Image/Emoticon/icon_affraid.gif" alt="OO">',
            '<img src="Vue/Image/Emoticon/icon_razz.gif" alt=":p">',
            '<img src="Vue/Image/Emoticon/icon_evil.gif" alt="xx">',
            '<img src="Vue/Image/Emoticon/icon_computer.gif" alt="[computer]">',
            '<img src="Vue/Image/Emoticon/icon_lol.gif" alt="lol">'
        );
        return preg_replace(self::getBalisesBbcode(), $original, $texte);
    }

}