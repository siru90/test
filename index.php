<?php


/*
class foo {
    public $value = 42;
    public function &getValue() {
        return $this->value;
    }
}
$obj = new foo;
$myValue = &$obj->getValue(); // $myValue 的值是$obj->value的值，也就是 42.
$obj->value = 2;
echo $myValue;                // 因为$obj->value的值改变，因此作为$obj->value的指针，其值也会变化为2
exit;


echo json_encode(array("aa","bb"));
exit;
*/

/*
echo  date("Y-m-d H:i:s","1539174949");
exit;*/


/*银联网关支付*/

/*查询接口*/


$app_code = "SUNEEE1ACE11BC";
$se_payment_code = "aef7f6ab03978a8bd3c3eff82294648b";
$se_private_key = "301a35a0f0c6ace1cb3ee6eccb5c9608";
$pay_no = "P181015001712837";
$created_ts = time();
$str = md5(md5($app_code. $se_payment_code . $pay_no . $created_ts) . $se_private_key);
echo "-dd----".$created_ts."---------".$str;
exit;

/*宁家
appCode：SUNEEEBA2A6386， 
sePaymentCode: e9a392cc46997c9a6c984cad7a3a6a60， 
sePrivateKey：a86bac91081b08f7e386c823c42727ad
*/

/* me
$app_code = "SUNEEE8D0A378B";
$se_payment_code = "9e6cf176811e159a591518d89712fb24";
$se_private_key = "d4027ba9cfcc9d43c69b0319faa7f22a"; 
 *  */



/*支付第二步*/
/*
{"pay_no":"P171013001508350","created_ts":"1473407173","se_sign":"5b04e927fb3b222988e430f88be82fa8","use_json":"1"}
*/
//md5(md5(app_code+ se_payment_code + pay_no + created_ts) + se_private_key)
$app_code = "SUNEEE1ACE11BC";
$se_payment_code = "aef7f6ab03978a8bd3c3eff82294648b";
$se_private_key = "301a35a0f0c6ace1cb3ee6eccb5c9608";
$pay_no = "P180814001657480";
$created_ts = "1534216461";
$str = md5(md5($app_code. $se_payment_code . $pay_no . $created_ts) . $se_private_key);
echo "--".$str;
exit;


//得到：
// {"code":200,"message":"success","data":{"pay_no":"P171013001508350","payment_type_list":[{"payment_type_id":"7","name":"\u94f6\u8054\u7f51\u5173\u652f\u4ed8","code":"UnionPay"}]}}



/*支付第一步*/
/*
{"app_code":"SUNEEE8D0A378B","se_payment_code":"9e6cf176811e159a591518d89712fb24","bill_id":"201710131056","bill_type_id":"1","amount":"0.01","created_ts":"1473407173",
"return_url":"http://pay.weilian.cn/123","notify_url":"http://pay.weilian.cn/123","scenary_id":"1","front_url":"http://pay.weilian.cn/123","se_sign":"859572b692a34c4fc65c5542f5bcb172"}
*/

//md5( md5(app_code+ se_payment_code + bill_id + bill_type_id + amount + created_ts) + se_private_key)
//1058908708@qq.com 测试应用
$app_code = "SUNEEE8D0A378B";
$se_payment_code = "9e6cf176811e159a591518d89712fb24";
$se_private_key = "d4027ba9cfcc9d43c69b0319faa7f22a";


//正泰应用
//$app_code = "SUNEEEF3A3E58E";
//$se_payment_code = "b943dae2a58bbca99f2ca5ba67952c32";
//$se_private_key = "5eebd7797113fba7fabc1d6f5a7a8bfc";

//宁家应用
//$app_code = "SUNEEEBA2A6386";
//$se_payment_code = "e9a392cc46997c9a6c984cad7a3a6a60";
//$se_private_key = "a86bac91081b08f7e386c823c42727ad";


$app_code = "SUNEEE1ACE11BC";
$se_payment_code = "aef7f6ab03978a8bd3c3eff82294648b";
$se_private_key = "301a35a0f0c6ace1cb3ee6eccb5c9608";


$bill_id = "201808141147";
$bill_type_id = "1";
$amount = "0.01";
$created_ts = time();
$str = md5(md5($app_code. $se_payment_code . $bill_id . $bill_type_id . $amount . $created_ts) . $se_private_key);
echo "~~~".$created_ts ."~~~".$str;
exit;


//退款第一步
/*
//md5( md5(app_code+ se_payment_code + pay_no  + amount + created_ts) + se_private_key) 
//my
$app_code = "SUNEEE8D0A378B";
$se_payment_code = "9e6cf176811e159a591518d89712fb24";
$se_private_key = "d4027ba9cfcc9d43c69b0319faa7f22a";

//正泰应用
$app_code = "SUNEEEF3A3E58E";
$se_payment_code = "b943dae2a58bbca99f2ca5ba67952c32";
$se_private_key = "5eebd7797113fba7fabc1d6f5a7a8bfc";


$pay_no="P180529001570679";
$amount = "0.01";
$created_ts = time();

$str = md5(md5($app_code . $se_payment_code . $pay_no .$amount. $created_ts) . $se_private_key);
echo "退款第一步~~". $created_ts ."~~".$str;
exit;
*/

//退款第二步

$app_code = "SUNEEE8D0A378B";
$se_payment_code = "9e6cf176811e159a591518d89712fb24";
$se_private_key = "d4027ba9cfcc9d43c69b0319faa7f22a";

//正泰应用
$app_code = "SUNEEEF3A3E58E";
$se_payment_code = "b943dae2a58bbca99f2ca5ba67952c32";
$se_private_key = "5eebd7797113fba7fabc1d6f5a7a8bfc";

$refund_no="R180529000054676";
$created_ts = "1527585802"; //time();

$str = md5(md5($app_code . $se_payment_code . $refund_no . $created_ts) . $se_private_key);
//SUNEEE8D0A378B9e6cf176811e159a591518d89712fb24R1801160000015731515575596
//SUNEEE8D0A378B9e6cf176811e159a591518d89712fb24R1801160000015731515575596
echo "退款第二步~~". $created_ts ."~~".$str;
exit;


/*
//退款第三步
//{"se_payment_code":null,"refund_no":"R170914000000341","amount":"0.01","created_ts":1505377497,"result":"true","se_sign":"f58f312acd42a510d6c2a9cb4f564917"}
$se_payment_code = null;
$refund_no = "R171206000001093";
$result = "true";
$created_ts = 1512519246;
$se_private_key = "88501086f64f82fb492f34c7bd7a81d4";

$str = md5(md5($se_payment_code.$refund_no.$result.$created_ts).$se_private_key);
echo $str;
*/




/*
$app_code = "SUNEEE78CFCC27";
$se_payment_code = "69116f8c16ba8ed4355f709a1b4317a0";
$pay_no = "1709634728106414";
$created_ts = "1473407173";
$se_private_key = "88501086f64f82fb492f34c7bd7a81d4";
$str = md5(md5($app_code. $se_payment_code . $pay_no . $created_ts) . $se_private_key);
echo $str;
exit;
*/

/*
$app_code = "SUNEEE78CFCC27";
$se_payment_code = "69116f8c16ba8ed4355f709a1b4317a0";
$bill_no = "1504778919426477";
$bill_type = "1";
$amount = "0.01";
$card_no = "6230580000082051876";
$pay_user_name = "陈";
$open_bank = "平安银行";
$prov = "广东省";
$city = "深圳市";
$sub_bank = "南山前海支行";
$Purpose = "代付";
$created_ts = "1505026609";
$se_private_key = "88501086f64f82fb492f34c7bd7a81d4";

$str = md5( md5($app_code . $se_payment_code . $bill_no . $bill_type . $amount . $card_no . $pay_user_name . $open_bank. $prov. $city. $sub_bank. $Purpose . $created_ts) . $se_private_key);
echo $str;
 * 
 */



//宁家
