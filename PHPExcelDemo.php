<?php

class PHPExcelDemo {

    /**
     * 数据导出 
     * @param array $title   标题行名称 
     * @param array $data   导出数据 
     * @param string $fileName 文件名 
     * @param string $savePath 保存路径 
     * @param $type   是否下载  false--保存   true--下载 
     * @return string   返回文件全路径 
     * @throws PHPExcel_Exception 
     * @throws PHPExcel_Reader_Exception 
     */
    function exportExcel($title = array(), $data = array(), $fileName = '', $savePath = './', $isDown = false) {
        include('PHPExcel.php');
        $obj = new PHPExcel();

        //横向单元格标识  
        $cellName = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'AA', 'AB', 'AC', 'AD', 'AE', 'AF', 'AG', 'AH', 'AI', 'AJ', 'AK', 'AL', 'AM', 'AN', 'AO', 'AP', 'AQ', 'AR', 'AS', 'AT', 'AU', 'AV', 'AW', 'AX', 'AY', 'AZ');
        
        $obj->getActiveSheet(0)->setTitle('sheet名称');   //设置sheet名称  

        //填充表头信息  
        for($i = 0;$i < count($title);$i++) {  
            $obj->getActiveSheet()->setCellValue("$cellName[$i]1","$title[$i]");  
        }
        for ($i = 2;$i <= count($data) + 1;$i++) {
            $j = 0;  
            foreach ($data[$i - 2] as $key=>$value) {  
                $obj->getActiveSheet()->setCellValue("$cellName[$j]$i","$value");  
                $j++;  
            }  
        }
        
        //文件名处理  
        if (!$fileName) {
            $fileName = uniqid(time(), true);
        }
        $objWrite = PHPExcel_IOFactory::createWriter($obj, 'Excel2007');
        //$objWrite = new PHPExcel_Writer_Excel5($obj); 

        //var_dump("123");
        if ($isDown) {   //网页下载  
            header('pragma:public');
            header("Content-Disposition:attachment;filename=$fileName.xls");
            $objWrite->save('php://output');
            exit;
        }
        
        $_fileName = iconv("utf-8", "gb2312", $fileName);   //转码  
        $_savePath = $savePath . $_fileName . '.xlsx';
        $objWrite->save($_savePath);
        //$objWrite->save($_savePath);
        

        echo $savePath . $fileName . '.xlsx';
    }

    //exportExcel(array('姓名','年龄'), array(array('a',21),array('b',23)), '档案', './', true);
}

$obj = new PHPExcelDemo();
$obj->exportExcel(array('姓名', '年龄'), array(array('a', 21), array('b', 23)), '档案', './', false);
