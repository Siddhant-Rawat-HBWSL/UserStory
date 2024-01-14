<?php
namespace Siddhant\Story19\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Catalog\Model\ProductRepository;
use Magento\Checkout\Model\Cart;

class DisplayCross implements ObserverInterface
{
    protected $productRepository;
    protected $cart;
    protected static $isExc=true;

    public function __construct(ProductRepository $productRepository,
    Cart $cart
    )
    {
        $this->productRepository = $productRepository;
        $this->cart = $cart;
    }

    public function execute(Observer $observer)
    {   
        $product = $observer->getEvent()->getProduct();
        $cart = $observer->getEvent()->getCart();
        $items = $cart->getQuote()->getAllItems();

        if(DisplayCross::$isExc){
            foreach ($items as $item) {
                $product = $item->getProduct();
                $crossSellProducts = $product->getCrossSellProductCollection()->getItems();
                $crossSellProducts = array_slice($crossSellProducts, 0, 3);

                foreach ($crossSellProducts as $prod){
                    $productId = $prod->getId();
                    $qty = 1;

                    try {
                        $product = $this->productRepository->getById($productId);
                        $this->cart->addProduct($product, ['qty' => $qty]);
                        $this->cart->save();
                    }catch(\Exception $e){

                    }
                }
                return;
            }
            DisplayCross::$isExc=false;
        }
    }
}