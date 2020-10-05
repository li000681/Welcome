<?php
require_once('abstractDAO.php');
require_once('./model/customer.php');

class customerDAO extends abstractDAO {
        
    function __construct() {
        try{
            parent::__construct();
        } catch(mysqli_sql_exception $e){
            throw $e;
        }
    }
 
    public function getmailingList(){
		$result = $this->mysqli->query('SELECT * FROM mailinglist WHERE deletedCustomerNames = "undeleted"');
        $mailingList = Array();
        
        if($result->num_rows >= 1){
            while($row = $result->fetch_assoc()){
				$customer = new Customer($row['customerName'], $row['phoneNumber'], $row['emailAddress'], $row['referrer']);
                $mailingList[] = $customer;
            }
            $result->free();
            return $mailingList;
        }
        $result->free();
        return false;
    }
      
        public function getCustomer($emailAddress){
            $query = 'SELECT * FROM mailinglist WHERE emailAddress = ? AND deletedCustomerNames = "undeleted"';
            $stmt = $this->mysqli->prepare($query);
            $stmt->bind_param('s', $emailAddress);
            $stmt->execute();
            $result = $stmt->get_result();
            if($result->num_rows == 1){
                $temp = $result->fetch_assoc();
                $customer = new customer($temp['customerName'], $temp['phoneNumber'], $temp['emailAddress'], $temp['referrer']);
                $result->free();
                return $customer;
            }
            $result->free();
            return false;
        }
    
	public function getRemoved(){
        $result = $this->mysqli->query('SELECT * FROM mailinglist WHERE deletedCustomerNames <> "undeleted"');
        $mailingList = Array();
            
        if($result->num_rows >= 1){
            while($row = $result->fetch_assoc()){
                $customer = new customer($row['customerName'], $row['phoneNumber'], $row['emailAddress'], $row['referrer']);
                $mailingList[] = $customer;
            }
            $result->free();
            return $mailingList;
            }
            $result->free();
            return false;
        }
    public function addCustomer($customer){
		if(!$this->mysqli->connect_errno){
            $query = 'INSERT INTO mailinglist (customerName, phoneNumber, emailAddress, deletedCustomerNames, referrer) VALUES (?,?,?,"undeleted",?)';
            $stmt = $this->mysqli->prepare($query);
            $stmt->bind_param('ssss', 
                        $customer->getName(), 
                        $customer->getPhoneNumber(), 
                        $customer->getEmailAddress(),
                        $customer->getReferral());
            $stmt->execute();
            if($stmt->error){
                return $stmt->error;
               } else {
                   return  ' Your information added successfully!';
               }
            } else {
                return 'Could not connect to Database.';
            }
    }
    
    public function deleteCustomer($emailAddress){
            if(!$this->mysqli->connect_errno){
                $deleted = $this->getCustomer($emailAddress);
                if ($deleted != false) {
                    $deleteInfo = $deleted->getName().",".$deleted->getPhoneNumber().",".$deleted->getEmailAddress();
                }
                $query = 'UPDATE mailinglist SET deletedCustomerNames = ? WHERE emailAddress = ?';
                $stmt = $this->mysqli->prepare($query);
                $stmt->bind_param('ss', $deleteInfo, $emailAddress);
                $stmt->execute();
                if($stmt->error){
                    return $stmt->error;
                } else {
                    return 'Customer deleted.';
                }
            } else {
                return false;
            }
        }
	}
?>
