<?php
	class Customer{
		private $name;
		private $phoneNumber;
		private $emailAddress;
		private $referral;
		function __construct($name, $phoneNumber, $emailAddress, $referral){
			$this->setName($name);
			$this->setPhoneNumber($phoneNumber);
			$this->setEmailAddress($emailAddress);
			$this->setreferral($referral);

		}
		

		public function getName(){
			return $this->name;
		}
		
		public function setName($name){
			$this->name = $name;
		}
		
		public function getPhoneNumber(){
			return $this->phoneNumber;
		}
		
		public function setPhoneNumber($phoneNumber){
			$this->phoneNumber = $phoneNumber;
		}
		public function getEmailAddress(){
			return $this->emailAddress;
		}
		
		public function setEmailAddress($emailAddress){
			$this->emailAddress = $emailAddress;
		}
		public function getReferral(){
			return $this->referral;
		}
		
		public function setReferral($referral){
			$this->referral = $referral;		
		}
	}
?>