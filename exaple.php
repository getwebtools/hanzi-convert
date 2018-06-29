<?php
/**
 * PHP转换程序示例代码
 *
 */

use sqhlib\Hanzi\HanziConvert;

include "vendor/autoload.php";

//繁体转简体
echo '繁体转简体：<br/>';
$str = '平時已秉班揚筆，暇處不妨甘石經。吾里忻傳日邊信，君言頻中斗杓星。會稽夫子餘詩禮，巴蜀君平舊典型。歷歷周天三百度，更參璿玉到虞廷。';
echo HanziConvert::convert($str);

echo "<br/><br/>";

//简体转繁体
echo '简体转繁体：<br/>';
$str = '平时已秉班扬笔，暇处不妨甘石经。吾里忻传日边信，君言频中斗杓星。会稽夫子余诗礼，巴蜀君平旧典型。歷歷周天三百度，更参璇玉到虞廷。';
echo HanziConvert::convert($str,1);