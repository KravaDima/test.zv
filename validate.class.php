<?php
/**
*  Класс валидации данных
*/
class Validate
{
	public $email;			// Идентификатор email
	public $phone;			// Идентификатор телефона
	public $valid;			// Правильность указанных данных
	
	public function __construct($email='', $phone='', $valid=false) {
		$this->email = $email;
		$this->phone = $phone;
		$this->valid = $valid;
	}

	/**
	* Проверка email
	*
	* @param $email
	* @return true
	*/
	public static function checkEmail($email)
	{
		if (filter_var($email, FILTER_VALIDATE_EMAIL)){
			return true;
		}
	}

	/**
	* Проверка Телефона
	*
	* @param $email
	* @return true
	*/
	public static function checkPhone($phone) 
	{
		if (strlen($phone) >= 10) {
			if(preg_match('/\+380[0-9]{9}/', $phone)){
				return true;
			} else {
				return false;
			}
		}
	}

	/**
	* Метод обработки данных email и телефона
	*
	* @param $array
	* @return true
	*/
	public static function validate($data)
	{
		$email = $data->email;
		$phone = $data->phone;
		if (Validate::checkPhone($phone) && Validate::checkEmail($email)) {
			return true;
		} else {
			return false;
		}
	}
}