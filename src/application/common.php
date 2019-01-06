<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------
include('../extend/accessRole.php');
include('../extend/api/Apps.php');
include('../extend/api/soup.php');
require_once("../extend/ucloud/proxy.php");
require_once("../extend/ucloud/conf.php");
require_once("../extend/ucloud/http.php");
require_once("../extend/ucloud/utils.php");
require_once("../extend/ucloud/digest.php");
function get_rand_str($len){
    $str = "1234567890asdfghjklqwertyuiopzxcvbnmASDFGHJKLZXCVBNMPOIUYTREWQ";
    return substr(str_shuffle($str),0,$len);
}