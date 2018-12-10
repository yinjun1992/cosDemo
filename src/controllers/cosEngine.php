<?php

namespace Controllers;

/**
 * Class cosEngine
 * @package Engine
 * 数据分析引擎
 * 分析向量的元素 必须和基准向量的元素一致，取最大个数，分析向量不足元素以0填补。
 * 求出分析向量与基准向量的余弦值
 */
class cosEngine
{
    function getMarkMod($arrParam)
    {
        $strModDouble = 0;
        foreach ($arrParam as $val) {
            $strModDouble += $val * $val;
        }
        $strMod = sqrt($strModDouble);
        //是否需要保留小数点后几位
        return $strMod;
    }

    /**
     * 获取标杆的元素个数
     * @param array $arrParam
     * @return number
     */

    function getMarkLenth($arrParam)
    {
        $intLenth = count($arrParam);
        return $intLenth;
    }

    /**
     * 对传入数组进行索引分配，基准点的索引必须为k，求夹角的向量索引必须为 'j'.
     * @param array $arrParam
     * @param unknown_type $index
     * @ruturn $arrBack
     */

    function handIndex($arrParam, $index = 'k')
    {
        foreach ($arrParam as $key => $val) {
            $in = $index . $key;
            $arrBack[$in] = $val;
        }
        return $arrBack;
    }

    /**
     *
     * @param  $arrMark 标杆向量数组（索引被处理过）|array('k0'=>1,'k1'=>2....)
     * @param  $arrAnaly 分析向量数组（索引被处理过）|array('j0'=>1,'j1'=>2....)
     * @param  float $strMarkMod 标杆向量的模
     * @param number $intLenth 向量的长度
     */

    function getCosine($arrMark, $arrAnaly, $strMarkMod, $intLenth)
    {
        $strVector = 0;
        $strCosine = 0;
        for ($i = 0; $i < $intLenth; $i++) {
            $strMarkVal = $arrMark['k' . $i];
            $strAnalyVal = $arrAnaly['j' . $i];
            $strVector += $strMarkVal * $strAnalyVal;
        }
        $arrAnalyMod = $this->getMarkMod($arrAnaly); //求分析向量的模
        $strFenzi = $strVector;
        $strFenMu = $arrAnalyMod * $strMarkMod;
        $strCosine = $strFenzi / $strFenMu;
        if (0 !== (int)$strFenMu) {
            $strCosine = $strFenzi / $strFenMu;
        }
        return $strCosine;
    }
}