<?php

namespace WB\BlockedCustomerByEmail\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;

class Config
{
    const XML_PATH_ENABLED = 'wb_blockedcustomerbyemail/general/enabled';
    const XML_PATH_BLOCKED_EMAILS = 'wb_blockedcustomerbyemail/general/blocked_emails';
    const XML_PATH_BLOCKED_IPS = 'wb_blockedcustomerbyemail/general/blocked_ips';

    private $scopeConfig;

    public function __construct(ScopeConfigInterface $scopeConfig)
    {
        $this->scopeConfig = $scopeConfig;
    }

    public function isEnabled(): bool
    {
        return $this->scopeConfig->isSetFlag(self::XML_PATH_ENABLED, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }

    public function getBlockedEmails(): array
    {
        $emails = $this->scopeConfig->getValue(self::XML_PATH_BLOCKED_EMAILS, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        return $emails ? array_map('trim', explode(',', $emails)) : [];
    }

    public function getBlockedIps(): array
    {
        $ips = $this->scopeConfig->getValue(self::XML_PATH_BLOCKED_IPS, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        return $ips ? array_map('trim', explode(',', $ips)) : [];
    }
}
