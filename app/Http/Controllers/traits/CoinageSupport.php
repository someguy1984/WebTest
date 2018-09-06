<?php

    namespace App\Http\Controllers\traits;

    use Illuminate\Support\Facades\Config;

    trait CoinageSupport
    {

        private $standardCoins, $value, $result;


        private function getCoinage($value)
        {
            //UK standard coins
            $this->standardCoins = [
                0 => ['£2', 200],
                1 => ['£1', 100],
                2 => ['£0.50', 50],
                3 => ['£0.2', 20],
                4 => ['£0.1', 10],
                5 => ['£0.05', 5],
                6 => ['£0.02', 2],
                7 => ['£0.01', 1],
            ];

            //First work out if it is pounds or pence and convert to a pence int
            $this->value = $this->valueToInt($value);

            $this->divideIntoCoinage();

            return $this->result;
        }

        //Translate £ or P values to integer value
        private function valueToInt($value): int
        {
            //Remove the pence and pounds and convert into a int for processing
            $value = str_replace('£', '', $value);
            $value = str_replace('p', '', $value);
            $value = round($value, 2);

            if (strpos($value, '.')) {
                $explodedValue = explode('.', $value);
                //Convert pounds into pence
                $value = $explodedValue[0] * 100;

                if (isset($explodedValue[1])) {
                    $value += $explodedValue[1];
                }
            }

            return (int)$value;
        }

        /**
         * Calculate the coins required
         */
        public function divideIntoCoinage()
        {
            foreach ($this->standardCoins as $coin) {
                $outcome = $this->value / $coin[1];

                //Multiple the first part by the original coin divided
                $outcome = explode('.', $outcome);

                //Subtract the pence that went into x many coins from the value
                $this->value -= $outcome[0] * $coin[1];

                //Push the result into a array
                $this->result[] = [$coin[0], (int) $outcome[0]];
            }
        }
    }