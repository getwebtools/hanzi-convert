<?php
namespace sqhlib\Hanzi;

/**
 * 汉字转换，繁体转简体或简体转繁体
 *
 * 如需还有未收录的字库，请打开HanziDict.php文件添加
 *
 */
class HanziConvert
{
    private static $hanziDict;//繁体->简体数组
    private static $hanziReverseDict;//简体->繁体数组

    /**
     * 执行文字转换
     *
     * @param string $str 需要转换的字符串
     * @param boolean $isSc2tc 是否是简体转繁体
     * @return string 转换后的字符串
     */
    public static function convert($str, $isSc2tc = false)
    {
        //检查输入参数
        if (empty($str)) {
            return $str;
        }

        //初始化字库
        self::initConvert($isSc2tc);

        //开始处理
        $strArr = preg_split('/(?<!^)(?!$)/u', $str);//将字符串转成数组
        array_walk($strArr, function (&$value) use ($isSc2tc) {//循环处理字符
            if ($isSc2tc) {//如果是简体转繁体
                $value = isset(self::$hanziReverseDict[$value]) ? self::$hanziReverseDict[$value] : $value;
            } else {
                $value = isset(self::$hanziDict[$value]) ? self::$hanziDict[$value] : $value;
            }
        });
        return implode('', $strArr);//将数组合并成字符串
    }

    /**
     * 初始化中文转换
     *
     * @param boolean $isSC2tc 是否是简体转繁体
     *
     */
    public static function initConvert($isSC2tc = false)
    {
        if ($isSC2tc) {
            if (empty(self::$hanziReverseDict)) {
                self::$hanziReverseDict = require('HanziDict.php');
                self::$hanziReverseDict = array_flip(self::$hanziReverseDict);//繁简体数组翻转
            }
        } else {
            if (empty(self::$hanziDict)) {
                self::$hanziDict = require('HanziDict.php');
            }
        }
    }

}

