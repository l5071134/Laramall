<?php

namespace LaraStore\Forms;

use App\Http\Controllers\Api\ApiController as Api;
use LaraStore\Sms\Sms;
use App\User;
use Auth;


class SmsForm extends Form{

	protected $api;
	/*
    |-------------------------------------------------------------------------------
    |
    | 注册表单验证规则
    |
    |-------------------------------------------------------------------------------
    */
    protected $rules = [
        'phone'     => 'required|digits:11',
    ];


    /*
    |-------------------------------------------------------------------------------
    |
    | 注册表单验证规则提示信息
    |
    |-------------------------------------------------------------------------------
    */
    protected $messages = [
       	'phone.digits' =>'手机为11位数字',
        'phone.unique' =>'手机号已存在',
    ];


    /*
    |-------------------------------------------------------------------------------
    |
    | 构造函数
    |
    |-------------------------------------------------------------------------------
    */
    public function __construct(Api $api,Sms $sms){
       $this->api       = $api;
       $this->sms       = $sms;
    }




    /*
    |-------------------------------------------------------------------------------
    |
    | 表单格式验证错误
    |
    |-------------------------------------------------------------------------------
    */
    public function errorRespond(){

    	if(!$this->isValid()){
            $info               = $this->errors();
    		return $this->api->respondCommonError($info);
    	}
    }



    
    /*
    |-------------------------------------------------------------------------------
    |
    |  保存成功 返回api信息
    |
    |-------------------------------------------------------------------------------
    */
    public function successRespond(){
        //发送短信验证码
        $this->send();
    	$tag 			= 'success';
    	$info 			= '我们给您的手机'.$this->phone.'发送了一条验证码短信';
    	return $this->api->respond(['data'=>compact('tag','info')]);
    }


    /*
    |-------------------------------------------------------------------------------
    |
    |   发送短信验证码
    |
    |-------------------------------------------------------------------------------
    */
    public function send(){
        $this->sms->put('phone',$this->phone)->send();
    }

    
    /*
    |-------------------------------------------------------------------------------
    |
    | 
    |
    |-------------------------------------------------------------------------------
    */
    public function persist()
    {
        return true;
    }
}