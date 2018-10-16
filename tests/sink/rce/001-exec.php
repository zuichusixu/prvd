<?php

use PHPUnit\Framework\TestCase;


final class exec_test extends TestCase
{
    public function testWithTaint()
    {
        global $prvd_sentry_client;
        $prvd_sentry_client = new Dummy_Sentry_Client();

        $str = 'fate0';
        prvd_xmark($str);

        @exec("id {$str}");
        $this->assertEquals(PRVD_TAINT_ENABLE, $prvd_sentry_client->captured);
    }


    public function testWithPayload()
    {
        global $prvd_sentry_client;
        $prvd_sentry_client = new Dummy_Sentry_Client();

        $str = TEST_PAYLOAD;

        @exec("id {$str}");
        $this->assertEquals(true, $prvd_sentry_client->captured);
    }
}
