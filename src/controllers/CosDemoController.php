<?php
/**
 * Created by PhpStorm.
 * User: yinjun
 * Date: 2018/12/6
 * Time: 下午4:27
 */
namespace Controllers;




class CosDemoController
{
    private $cosEngine;

    public function __construct()
    {
        $this->cosEngine = new cosEngine();
    }

    public function index()
    {
        echo 'cosDemo';
    }

    public function getCosineVal()
    {
        //基准点的N维向量
        $arrMark = array(1, 1, 1, 1, 1);
        //分析点的N维向量
        $arrAnaly = array(1, 2, 3, 4, 5);
        //向量的模
        $MarkMod = $this->cosEngine->getMarkMod($arrMark);
        //向量的长度
        $MarkLenth = $this->cosEngine->getMarkLenth($arrMark);
        //标杆向量数组
        $Index1 = $this->cosEngine->handIndex($arrMark, "k");
        //分析向量数组
        $Index2 = $this->cosEngine->handIndex($arrAnaly, "j");
        //分析向量与基准向量的余弦值
        $Cosine = $this->cosEngine->getCosine($Index1, $Index2, $MarkMod, $MarkLenth);
        echo "向量的模：" . $MarkMod;
        echo "<br>";
        echo "向量的长度：" . $MarkLenth;
        echo "<br>";
        echo "标杆向量数组：";
        print_r($Index1);
        echo "<br>";
        echo "分析向量数组：";
        print_r($Index2);
        echo "<br>";
        echo "分析向量与基准向量的余弦值：" . $Cosine;
    }


}