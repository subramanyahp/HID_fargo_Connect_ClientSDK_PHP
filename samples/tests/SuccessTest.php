<?php

class SuccessTest extends \PHPUnit\Framework\TestCase
{
    
    
    /*@test*/
    public function testOrgName(){
        $OrgName = new \App\Collections;
        $result = $OrgName->orgName();
        $this->assertEquals("Junittesting",$result);
    }
    
    /*@test*/
    public function testOrgId(){
        $OrgID = new \App\Collections;
        $result = $OrgID->OrgID();
        $this->assertEquals("ORG66EEA7F7C73141849E4D0CB4B733A0CD",$result);
    }

    /*@test*/
    public function testLocationName(){
        $LocationName = new \App\Collections;
        $result = $LocationName->Location();
        $this->assertEquals("subramanya H P",$result);
    }

     /*@test*/
     public function testLocationID(){
        $LocationID = new \App\Collections;
        $result = $LocationID->LocationID();
        $this->assertEquals("LOC7B00503775AF437FB2AAB161A70D2627",$result);
    }

    /*@test*/
    public function testProdProfileName(){
        $ProdProfileName = new \App\Collections;
        $result = $ProdProfileName->ProdProfileName();
        $this->assertEquals("testing",$result);
    }

    /*@test*/
    public function testProdProfileID(){
        $ProdProfileID = new \App\Collections;
        $result = $ProdProfileID->ProdProfileID();
        $this->assertEquals("PRAED88ED3EEA94F94B012211145E44742",$result);
    }

    /*@test*/
    public function testPrintDestName(){
        $PrintDest = new \App\Collections;
        $result = $PrintDest->PrintDestName();
        $this->assertEquals("Printer1",$result);
    }

    /*@test*/
    public function testPrintDestID(){
        $PrintDestID = new \App\Collections;
        $result = $PrintDestID->PrintDestID();
        $this->assertEquals("MFA190F19BBA9634BBE850DCE852452E814@Printer1",$result);
    }

    /*@test*/
    public function testProdCardType(){
        $ProdCardType = new \App\Collections;
        $result = $ProdCardType->ProdCardType();
        $this->assertEquals("blankcard",$result);
    }

     /*@test*/
     public function testPrintedCard(){
        $PrintedCard = new \App\Collections;
        $result = $PrintedCard->PrintedCard();
        $this->assertEquals("Printed",$result);
    }

    /*@test*/
    public function testFailedCard(){
        $FailedCard = new \App\Collections;
        $result = $FailedCard->FailedCard();
        $this->assertEquals("Failed",$result);
    }
}