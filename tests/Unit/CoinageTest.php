<?php

    namespace Tests\Unit;

    use App\Http\Controllers\traits\CoinageSupport;
    use Illuminate\Support\Facades\Config;
    use Tests\TestCase;

    class CoinageTest extends TestCase
    {

        use CoinageSupport;

        public function __construct()
        {
            parent::__construct();
            // Your construct here
        }

        private function createExpected($expected): array
        {
            $result = [];
            foreach ($this->standardCoins as $key => $coin) {
                $result[] = [$coin[0], (int)$expected[$key]];
            }

            return $result;
        }

        public function testSingleDigit()
        {
            $coinage = $this->getCoinage('4');
            $correct = $this->createExpected([0, 0, 0, 0, 0, 0, 2, 0]);
            $this->assertEquals($correct, $coinage);
        }

        public function testDoubleDigit()
        {
            $coinage = $this->getCoinage('85');
            $correct = $this->createExpected([0, 0, 1, 1, 1, 1, 0, 0]);
            $this->assertEquals($correct, $coinage);
        }

        public function testDoubleDigitWithPoundAndPence()
        {
            $coinage = $this->getCoinage('£1.87p');
            $correct = $this->createExpected([0, 1, 1, 1, 1, 1, 1, 0]);
            $this->assertEquals($correct, $coinage);
        }

    }
