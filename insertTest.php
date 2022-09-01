<?php
class MoHandlerTest extends \PHPUnit_Framework_TestCase {
    protected $db;
    protected $handler;
    public function setUp()
    {
        $this->db = $this->getMock(array('12','Sali','Cape Town','9','7456','1','1','','Small house with attached garage'));
        $this->handler = new MoHandler();
        $this->handler->setDatabase($this->db);
    }
    public function test_save_with_invalid_detais()
    {
        $input = array();

        $this->db
            ->expects($this->never())
            ->method('', '', '000', '', '','','','','')
        ;

        $this->assertFalse($this->handler->save($input));
    }
    public function test_save_with_valid_details()
    {
        $input = array(
            array(
                '12'=> '12',
                'Sali' => 'Sali',
                'Cape Town' => 'Cape Town',
                '9' => '9',
                '7456' => '7456',
                '1' => '1',
                '1' => '1',
                '' => '',
                'Small house with attached garage' => 'Small house with attached garage'
            )
        );
        $this->db
            ->expects ($this->exactly(10))->method('post')->withAnyParameters();

        $this->db
            ->expects($this->at(1))
            ->method('post')
            ->with(':id','id')
        ;

        $this->db
            ->expects($this->once())
            ->method('post')
        ;
        $this->assertNull($this->handler->save($input)); 
    }

}