<?php
/*
 * TLSoft
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the TLSoft license that is
 * available through the world-wide-web at this URL:
 * https://tlsoft.hu/license
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category    TLSoft
 * @package     TLSoft_PaymentFramework
 * @copyright   Copyright (c) TLSoft (https://tlsoft.hu/)
 * @license     https://tlsoft.hu/license
 */

namespace TLSoft\PaymentFramework\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;
use Magento\Customer\Model\Session\Storage as CustomerSession;

/**
 * AddOrderIdToSession
 *
 * @property CustomerSession $customerSession
 */
class AddOrderIdToSession implements ObserverInterface
{

    public function __construct(CustomerSession $customerSession)
    {
        $this->customerSession = $customerSession;
    }

    /**
     * Execute
     *
     * @param Observer $observer Observer
     *
     * @return void
     */
    public function execute(Observer $observer): void
    {
        $customerSession = $this->customerSession;
        $order = $observer->getEvent()->getOrder();
        $customerSession->setOrderIncrementId($order->getIncrementId());
    }
}
