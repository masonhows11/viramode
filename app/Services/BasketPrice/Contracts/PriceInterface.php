<?
namespace App\Services\BasketPrice\Contracts;

interface PriceInterface
{
        public function getPrice();
        public function getTotalPrice();
        public function descriptionTitle();
        public function getSummary();
}
