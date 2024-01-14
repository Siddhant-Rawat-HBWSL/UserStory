<?php
namespace Siddhant\Story15\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Customer\Api\GroupRepositoryInterface;
use Magento\Sales\Model\ResourceModel\Order\CollectionFactory as OrderCollectionFactory;
use Magento\Framework\App\ResourceConnection;
use Psr\Log\LoggerInterface;

class OrderPlaced implements ObserverInterface
{
    protected $groupRepository;
    protected $orderCollectionFactory;
    protected $resourceConnection;
    protected $logger;

    public function __construct(
        GroupRepositoryInterface $groupRepository,
        OrderCollectionFactory $orderCollectionFactory,
        ResourceConnection $resourceConnection,
        LoggerInterface $logger
    ) {
        $this->groupRepository = $groupRepository;
        $this->orderCollectionFactory = $orderCollectionFactory;
        $this->resourceConnection = $resourceConnection;
        $this->logger = $logger;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $orderId = $observer->getEvent()->getOrderIds()[0] ?? null;
        if (!$orderId) {
            return;
        }

        $orderCollection = $this->orderCollectionFactory->create();
        $orderCollection->addFieldToFilter('entity_id', $orderId);

        if ($orderCollection->getSize() === 0) {
            return;
        }

        $order = $orderCollection->getFirstItem();
        $customerId = $order->getCustomerId();

        if (!$customerId) {
            return;
        }

        $customer = $this->groupRepository->getById($customerId);

        if ($customer && $customer->getId() && $customer->getCode() === 'YOUR_CUSTOMER_GROUP_CODE') {
            $salesAmount = $order->getGrandTotal();
            $connection = $this->resourceConnection->getConnection();
            $tableName = $this->resourceConnection->getTableName('your_custom_sales_data_table');

            $existingRecord = $connection->fetchOne(
                $connection->select()->from($tableName)->where('customer_group_id = ?', $customer->getId())
            );

            if ($existingRecord) {
                $connection->update(
                    $tableName,
                    ['total_sales_amount' => new \Zend_Db_Expr('total_sales_amount + ' . $salesAmount)],
                    ['customer_group_id = ?' => $customer->getId()]
                );
            } else {
                $connection->insert(
                    $tableName,
                    ['customer_group_id' => $customer->getId(), 'total_sales_amount' => $salesAmount]
                );
            }

        }
    }
}