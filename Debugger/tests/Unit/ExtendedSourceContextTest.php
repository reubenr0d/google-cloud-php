<?php
/**
 * Copyright 2017 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace Google\Cloud\Debugger\Tests\Unit;

use Google\Cloud\Debugger\ExtendedSourceContext;
use Google\Cloud\Debugger\GitSourceContext;
use PHPUnit\Framework\TestCase;

/**
 * @group debugger
 */
class ExtendedSourceContextTest extends TestCase
{
    public function testSerializes()
    {
        $sourceContext = new ExtendedSourceContext(new GitSourceContext('url', 'revisionId'), ['foo' => 'bar']);
        $expected = [
            'context' => [
                'git' => [
                    'url' => 'url',
                    'revisionId' => 'revisionId'
                ]
            ],
            'labels' => [
                'foo' => 'bar'
            ]
        ];
        $this->assertEquals($expected, $sourceContext->info());
    }
}
