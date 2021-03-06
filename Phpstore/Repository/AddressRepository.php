<?php

namespace Phpstore\Repository;

trait AddressRepository{

	/*
    |-------------------------------------------------------------------------------
    |
    | 检测地址是否是默认地址
    |
    |-------------------------------------------------------------------------------
    */
    public function getIsDefaultAttribute(){

    	  return  ($this->user->address_id == $this->id)? 1 : 0;
    }


    /*
    |-------------------------------------------------------------------------------
    |
    | 获取国家名称
    |
    |-------------------------------------------------------------------------------
    */
    public function getCountryNameAttribute(){

    	return ($this->country())? $this->country() : '';
    }

    /*
    |-------------------------------------------------------------------------------
    |
    | 获取省会名称
    |
    |-------------------------------------------------------------------------------
    */
    public function getProvinceNameAttribute(){

    	return ($this->province())? $this->province() : '';
    }


    /*
    |-------------------------------------------------------------------------------
    |
    | 获取城市名称
    |
    |-------------------------------------------------------------------------------
    */
    public function getCityNameAttribute(){

    	return ($this->city()) ? $this->city() : '';
    }


    /*
    |-------------------------------------------------------------------------------
    |
    | 获取地区名称
    |
    |-------------------------------------------------------------------------------
    */
    public function getDistrictNameAttribute(){

    	return ($this->district()) ? $this->district() : '';
    }


    /*
    |-------------------------------------------------------------------------------
    |
    | 获取地址名称
    |
    |-------------------------------------------------------------------------------
    */
    public function getAddressNameAttribute(){

    	return ($this->address())? $this->address() : '';
    }
}