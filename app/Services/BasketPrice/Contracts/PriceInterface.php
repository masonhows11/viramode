<?php
namespace App\Services\BasketPrice\Contracts;

interface PriceInterface
{
        public function getPrice($user = null);
        public function getTotalPrice();
        public function descriptionTitle();
        public function getSummary(int $user = null);
}
