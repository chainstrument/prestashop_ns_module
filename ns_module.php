<?php



if (!defined('_PS_VERSION_')) {
    exit;
}

class Ns_Module extends Module
{

    public function __construct()
    {
        $this->name = 'ns_monmodule';
        $this->tab = 'front_office_features';

        $this->version = '1.0.0';
        $this->author = 'New Slang';
        $this->need_instance = 0;
        $this->ps_versions_compliancy = [
            'min' => '1.7',
            'max' => _PS_VERSION_,
        ];
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Module New Slang');
        $this->description = $this->l('Mon premier module super cool');

        $this->confirmUninstall = $this->l('Êtes-vous sûr de vouloir désinstaller ce module ?');

        if (!Configuration::get('NS_MONMODULE_PAGENAME')) {
            $this->warning = $this->l('Aucun nom fourni');
        }
    }

    public function install()
    {
        if (Shop::isFeatureActive()) {
            Shop::setContext(Shop::CONTEXT_ALL);
        }
     
        if (!parent::install() ||
            !$this->registerHook('leftColumn') ||
            !$this->registerHook('header') ||
            !Configuration::updateValue('NS_MONMODULE_PAGENAME', 'Mentions légales')
        ) {
            return false;
        }
     
        return true;
    }

    public function uninstall()
    {
        if (!parent::uninstall() ||
            !Configuration::deleteByName('NS_MONMODULE_PAGENAME')
        ) {
            return false;
        }
     
        return true;
    }
}
