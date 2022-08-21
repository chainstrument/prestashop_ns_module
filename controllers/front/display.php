<?php 

class ns_monmoduledisplayModuleFrontController extends ModuleFrontController
    {
        public function initContent()
        {
            parent::initContent();
            $this->setTemplate('module:ns_monmodule/views/templates/front/display.tpl');
        }
    }