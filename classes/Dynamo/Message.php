<?php defined('SYSPATH') OR die('No direct script access.');

class Dynamo_Message extends AWS_Dynamo {
    
    static protected $_prefix = 'Dynamo_';
    
    protected $_fields = array(
        'user_id'   => AWS_Dynamo::T_NUM,
        'sender_id' => AWS_Dynamo::T_NUM,
        'is_read'   => AWS_Dynamo::T_NUM,
        'type'      => AWS_Dynamo::T_NUM,
        'message'   => AWS_Dynamo::T_STR,
        'time'      => AWS_Dynamo::T_NUM,
    );
    
     protected $_key = array(
        AWS_Dynamo::K_HASH   => array('user_id'  => AWS_Dynamo::T_NUM),
        AWS_Dynamo::K_RANGE  => array('time'     => AWS_Dynamo::T_NUM),
     );
    
    protected $_table_name = 'dynamo_messages';
}