<?php

declare(strict_types=1);

namespace Tests\Acceptance;

use Codeception\Example;
use Tests\Support\AcceptanceTester;

use function iterator_to_array;
use function json_decode;

class SampleCest
{
    /**
     * @dataProvider dataProvider
     */
    public function tryToTest(AcceptanceTester $I, Example $example)
    {
        $I->assertEquals(
            ['test1' => [1,2,3]],
            iterator_to_array($example->getIterator()));
    }

    private function dataProvider(AcceptanceTester $I): \Generator
    {
        $I->runShellCommand('/app/bin/dataProvider');
        $I->seeResultCodeIs(0);
        $additionalData = json_decode($I->grabShellOutput(), true);

        yield 'test1' => $additionalData;
    }
}
