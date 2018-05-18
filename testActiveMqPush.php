<?php   
/* activemq 推送示例
 * 环境搭建: jdk + activemq + php stomp扩展
 */
$stomp = new Stomp('tcp://localhost:61613');
//var_dump("ddd");
var_dump($stomp);
//exit;
$obj = array();
//下面这些数据，实际中是用户通过前端页面post来的，这里只做演示
$obj['username'] = 'test';
$obj['password'] = '123456';
$obj['call_url'] = 'http://ep.mall.weilian.cn/test2.php';
//发送一个注册消息到队列，我们这里模拟用户注册
$res = $stomp->send('/amq/allnews', json_encode($obj));
var_dump($res);
