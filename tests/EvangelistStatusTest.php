<?php

class EvangelistStatusTest extends PHPUnit_Framework_TestCase
{
    public function testGetStatus()
    {
        $status = new EvangelistStatus("andela-aomondi");
        $this->assertEquals("You call yourself a programmer?!!", $status->getStatus());

        $status = new EvangelistStatus("andela-jngatia");
        $this->assertEquals("Prodigal Junior Evangelist", $status->getStatus());

        $status = new EvangelistStatus("andela-cganga");
        $this->assertEquals("Associate Evangelist", $status->getStatus());

        $status = new EvangelistStatus("vonmises");
        $this->assertEquals("Senior Evangelist", $status->getStatus());
    }
}
