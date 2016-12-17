<?php
/**
 *
 * Original Author: Davey Shafik <dshafik@akamai.com>
 *
 * For more information visit https://developer.akamai.com
 *
 * Copyright 2014 Akamai Technologies, Inc. All rights reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
namespace Akamai\Open\EdgeGrid\Tests\Client\Authentication;

class TimestampTest extends \PHPUnit_Framework_TestCase
{

    public function testTimestampFormat()
    {
        $timestamp = new \Akamai\Open\EdgeGrid\Authentication\Timestamp();

        $check = \DateTime::createFromFormat('Ymd\TH:i:sO', (string) $timestamp, new \DateTimeZone('UTC'));
        $this->assertEquals($check->format(\Akamai\Open\EdgeGrid\Authentication\Timestamp::FORMAT), (string) $timestamp);
    }


    public function testIsValid()
    {
        $timestamp = new \Akamai\Open\EdgeGrid\Authentication\Timestamp();
        $this->assertTrue($timestamp->isValid());
        $timestamp->setValidFor('PT0S');
        sleep(1);
        $this->assertFalse($timestamp->isValid());
    }
}
