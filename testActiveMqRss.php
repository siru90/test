<?php
/*
    activemq 订阅端示例
 *  */
$stomp = new Stomp('tcp://localhost:61613');

//订阅只对一个有效，如果启动多个脚本，只有一个会接收到消息
$stomp->subscribe('/amq/allnews');

var_dump($stomp);
//exit;
//while(true) {
while(TRUE == $stomp->hasFrame()){
    //判断是否有读取的信息
    //var_dump($stomp->hasFrame());
    $frame = $stomp->readFrame();

    $data = json_decode($frame->body, true);
    var_dump($data);

    //我们通过获取的数据
    //处理相应的逻辑，比如存入数据库，发送验证码等一系列操作。
    //$db->query("insert into user values('{$username}','{$password}')");
    //sendVerify();

    //表示消息被处理掉了，ack()函数很重要
    $stomp->ack($frame);
    sleep(1);
}