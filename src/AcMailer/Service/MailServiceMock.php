<?php
namespace AcMailer\Service;

use AcMailer\Service\MailServiceInterface;
use AcMailer\Result\MailResult;
use Zend\Mail\Message;

/**
 * This class is meant to supplant MailService when unit testing elements that depend on a MailServiceInterface.
 * Remember to always program to abstractions, never concretions.
 * @author Alejandro Celaya Alastrué 
 * @link http://www.alejandrocelaya.com
 */
class MailServiceMock implements MailServiceInterface
{
	
	private $sendMethodCalled = false;
	private $forceError = false;
    
	/**
	 * (non-PHPdoc)
	 * @see \AcMailer\Service\MailServiceInterface::send()
	 */
	public function send() {
	    $this->sendMethodCalled = true;
	    if ($this->forceError)
            return new MailResult(false, "Error!!");
	    else
	        return new MailResult();
	}

	/**
	 * (non-PHPdoc)
	 * @see \AcMailer\Service\MailServiceInterface::setBody()
	 */
	public function setBody($body) {
		
	}
	/**
	 * (non-PHPdoc)
	 * @see \AcMailer\Service\MailServiceInterface::setSubject()
	 */
	public function setSubject($subject) {
		
	}
	/**
	 * (non-PHPdoc)
	 * @see \AcMailer\Service\MailServiceInterface::getMessage()
	 */
	public function getMessage() {
	    return new Message();
	}
	
	/**
	 * Tells if send() method was previously called
	 * @see \AcMailer\Service\MailServiceMock::send()
	 * @return boolean True if send() was called, false otherwise
	 */
	public function isSendMethodCalled() {
	    return $this->sendMethodCalled;
	}
	
	/**
	 * Sets the type of result produced when send method is called
	 * @see \AcMailer\Service\MailServiceMock::send()
	 * @param boolean $forceError True if an error should occur. False otherwise
	 */
	public function setForceError($forceError) {
	    $this->forceError = (bool) $forceError;
	}

}