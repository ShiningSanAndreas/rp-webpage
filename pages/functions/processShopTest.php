<?php

use PHPUnit\Framework\TestCase;

class ProcessShopTest extends TestCase
{
    public function testCustomProdIdIsInvalid()
    {
        $_POST['customProdId'] = 'invalidId';
        $expectedResponse = [
            'success' => false,
            'error' => 'Invalid customProdId'
        ];

        $this->expectOutputString(json_encode($expectedResponse));

        include '/data02/virt124063/domeenid/www.shiningrp.ee/htdocs/loputoo/rp-webpage/pages/functions/processShop.php';
    }

    public function testNotEnoughBalance()
    {
        $_POST['customProdId'] = 'customCharacter';
        $_POST['discordId'] = '123456789';
        $_POST['customProdPrice'] = 1000;
        $_POST['customProdTitle'] = 'Custom Character';

        // Mock getUserBalance() to return a balance lower than the product price
        $this->getMockBuilder('ProcessShopTest')
            ->setMethods(['getUserBalance'])
            ->getMock();

        $this->method('getUserBalance')
            ->willReturn(500);

        $expectedResponse = [
            'success' => false,
            'error' => 'Not enough balance'
        ];

        $this->expectOutputString(json_encode($expectedResponse));

        include '/data02/virt124063/domeenid/www.shiningrp.ee/htdocs/loputoo/rp-webpage/pages/functions/processShop.php';
    }

    // Add more test cases for the other conditions and scenarios in your code

    // ...

    // End of test cases
}