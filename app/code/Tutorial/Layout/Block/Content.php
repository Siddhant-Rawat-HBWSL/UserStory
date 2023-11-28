<?php
namespace Tutorial\Layout\Block;

use Magento\Framework\View\Element\Template;

class Content extends Template {

    protected function _prepareLayout() {
        parent::_prepareLayout();

        $pageMainTitle = $this->getLayout()->getBlock("page.main.title");
        if($pageMainTitle) {
            $pageMainTitle->setPageTitle('Developer');
        }

        return $this;
    }

    public function getSubtitle(): string {
        return "Learn Magento 2 Development";
    }

    // This is a different way to create blocks on the fly. It will not look in .xml file so we need to add the file path in note.phtml
    public function getNodeHtml() :string {
        return $this->getLayout()->createBlock(Note::class)->toHtml();
    }
}
