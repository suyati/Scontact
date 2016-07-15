<?php
/*!
 * http://suyati.com/
 * Suyati_Contactforpin 1.7
 * Copyright (C) 2016, Suyati Technologies
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.
This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
   You should have received a copy of the GNU General Public License along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
*/
class Suyati_Contactforpin_IndexController extends Mage_Core_Controller_Front_Action
{
    /**
     * [indexAction description]
     * @return [type] [description]
     */
    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

    /**
     * [postAction contact info action]
     * @return 
     */
    public function postAction()
    {
        $post = $this->getRequest()->getPost();

        if ($this->getRequest()->isPost() && $this->getRequest()->getPost('email')) {

            $session            = Mage::getSingleton('core/session');
            $customerSession    = Mage::getSingleton('customer/session');
            $firstname          = $this->getRequest()->getPost('firstname');
            $email              = (string) $this->getRequest()->getPost('email');
            $telephone          = $this->getRequest()->getPost('phone1');
            $pincode            = $this->getRequest()->getPost('pincode');
            $location           = $this->getRequest()->getPost('location');
            

            
            try {

                if (!Zend_Validate::is($email, 'EmailAddress')) {
                    Mage::throwException($this->__('Please enter a valid email address.'));
                }

                if (!Zend_Validate::is(trim($firstname), 'NotEmpty')) {
                    Mage::throwException($this->__('Please enter a First name.'));
                }

                if (!Zend_Validate::is(trim($telephone), 'NotEmpty')) {
                    Mage::throwException($this->__('Please enter a Telephone.'));
                }

                


                $emailTemplate  = Mage::getModel('core/email_template')->loadDefault('suyati_contactforpin');


                //Create an array of template variables to assign to template
                $emailTemplateVariables = array();
                $emailTemplateVariables['firstname'] = $firstname;
                $emailTemplateVariables['email'] = $email;
                $emailTemplateVariables['telephone'] = $telephone;
                $emailTemplateVariables['pincode'] = $pincode;
                $emailTemplateVariables['location'] = $location;

                /**
                 * [$actualTemplate passing tempalte variables and receiving the actual template]
                 * 
                 */
                $actualTemplate = $emailTemplate->getProcessedTemplate($emailTemplateVariables);
                
                // Getting the admin assigned general email contact
                
                
                $toadmin_email = Mage::getStoreConfig('trans_email/ident_general/email');
                if ($toadmin_email!="") {
                    $toadmin_email = $toadmin_email;
                } else {
                    $toadmin1_email = Mage::getStoreConfig('trans_email/ident_support/email');
                    if ($toadmin1_email!="") {
                        $toadmin_email = $toadmin1_email;
                    } else {
                        $toadmin_email = Mage::getStoreConfig('trans_email/ident_general/email');
                    }
                        
                }
                    $dt = date('d-m-Y H:i:s');
                    $mail = Mage::getModel("core/email")
                            ->setToEmail($toadmin_email)
                            ->setBody($actualTemplate)
                            ->setSubject("Contact details submitted for adding pin on date $dt")
                            ->setFromEmail($email)
                            ->setFromName($firstname)
                            ->setType("html");
                

                    
                    $contact = Mage::getModel('contactforpin/contactforpin');
                    $contact->setData('name', $firstname);
                    $contact->setData('email', $email);
                    $contact->setData('mobile', $telephone);
                    $contact->setData('location', $location);
                    $contact->setData('pincode', $pincode);
                    $contact->setData('created_date', $dt);
                    $contact->save();
                    $session->addSuccess($this->__('Your Request has been received. One of our sales representatives will contact you shortly.'));
                    if ($mail->send()) {
                        
                    }
                
                $this->_redirectReferer();
                
            } catch (Mage_Core_Exception $e) {
                $session->addException($e, $this->__('There was a problem with the sign up: %s', $e->getMessage()));
                $this->_redirectReferer();
            }
            catch (Exception $e) {
                $session->addException($e, $this->__('There was a problem with the sign up.'));
                $this->_redirectReferer();
            }

        } else {
            $this->_redirect('*/*/');
        }
    }

    


}
