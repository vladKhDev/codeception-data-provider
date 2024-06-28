<?php

declare(strict_types=1);

namespace Tests\Acceptance;

use Codeception\Example;
use Tests\Support\AcceptanceTester;

use function json_decode;

class SampleCest
{
    /**
     * @dataProvider dataProvider
     */
    public function tryToTest(AcceptanceTester $I, Example $example)
    {
        $I->assertEquals([1,2,3], (array)$example->getIterator());
    }

    private function dataProvider(AcceptanceTester $I): \Generator
    {
        $I->runShellCommand('/app/bin/dataProvider');
        $I->seeResultCodeIs(0);
        $additionalData = json_decode($I->grabShellOutput());

        yield 'test1' => [$additionalData];
    }
}
