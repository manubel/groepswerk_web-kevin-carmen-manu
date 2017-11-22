<?php
require_once ('application/models/contact.php');

use PHPUnit\Framework\TestCase;


class contact_repository_test extends TestCase
{
    public function setUp()
    {
        $this->mock_contactDao =
            $this->getMockBuilder('\models\contact_dao')
                ->disableOriginalConstructor()
                ->getMock();
    }
    public function tearDown()
    {
        $this->mock_contactDao = null;
    }
    public function testGetContactByID_idExists_ContactObject()
    {
        $id = 1;
        $data['id'] = $id;
        $data['name']= 'testcontact';
        $data['email']= 'test@mail';
        $contact = new contact($data);
        $this->mock_contactDao->expects($this->atLeastOnce())
            ->method('get_contact_by_id')
            ->with($this->equalTo($id))
            ->will($this->returnValue($contact));
        $contactRepository = new contact_repository($this->mock_contactDao);
        $actualContact = $contactRepository->get_contact_by_id($id);
        $this->assertEquals($contact, $actualContact);
    }


}
