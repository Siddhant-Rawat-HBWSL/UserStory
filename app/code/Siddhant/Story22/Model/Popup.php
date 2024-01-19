<?php

namespace Siddhant\Story22\Model;

use Siddhant\Story22\Api\Data\PopupInterface;
use Siddhant\Story22\Model\ResourceModel\PopupResource;
use Magento\Framework\Model\AbstractModel;

class Popup extends AbstractModel implements PopupInterface
{

    private const POPUP_ID = "popup_id";
    private const NAME = "name";
    private const CONTENT = "content";
    private const IS_ACTIVE = "is_active";
    private const CREATED_AT = "created_at";
    private const UPDATED_AT = "updated_at";
    private const TIMEOUT = "timeout";

    protected function _construct()
    {
        $this->_eventPrefix = "Siddhant_Story22";
        $this->_eventObject = "popup";
        $this->_idFieldName = "popup_id";
        $this->_init(PopupResource::class);
    }

    function getPopupId(): int
    {
        return (int) $this->getData(self::POPUP_ID);   
    }
    function setPopupId(int $popupId)
    {
        $this->setData(self::POPUP_ID, $popupId);
    }
    function getName(): string
    {
        return (string) $this->getData(self::NAME);
    }
    function setName(string $popupName)
    {
        $this->setData(self::NAME, $popupName);
    }
    function getContent(): string
    {
        return (string) $this->getData(self::CONTENT);
    }
    function setContent(string $content)
    {
        $this->setData(self::CONTENT, $content);
    }
    function getCreatedAt(): string
    {
        return (string) $this->getData(self::CREATED_AT);
    }
    function setCreatedAt(string $createdAt)
    {
        $this->setData(self::CREATED_AT, $createdAt);
    }
    function getUpdatedAt(): string
    {
        return (string) $this->getData(self::UPDATED_AT);
    }
    function setUpdatedAt(string $updatedAt)
    {
        $this->setData(self::UPDATED_AT, $updatedAt);
    }
    function getIsActive(): bool
    {
        return (bool) $this->getData(self::IS_ACTIVE);
    }
    function setIsActive(bool $isActive)
    {
        $this->setData(self::IS_ACTIVE, $isActive);
    }
    function getTimeout(): int
    {
        return (int) $this->getData(self::TIMEOUT);
    }
    function setTimeout(int $timeout)
    {
        $this->setData(self::TIMEOUT, $timeout);
    }
}
