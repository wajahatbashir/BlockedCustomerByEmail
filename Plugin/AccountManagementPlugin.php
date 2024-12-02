<?php

namespace WB\BlockedCustomerByEmail\Plugin;

use Magento\Framework\Exception\LocalizedException;
use WB\BlockedCustomerByEmail\Model\Config;
use Magento\Framework\App\Request\Http;

class AccountManagementPlugin
{
    private $config;
    private $request;

    public function __construct(Config $config, Http $request)
    {
        $this->config = $config;
        $this->request = $request;
    }

    public function beforeAuthenticate(
        \Magento\Customer\Model\AccountManagement $subject,
        $username,
        $password
    ) {
        if (!$this->config->isEnabled()) {
            return;
        }

        // Check for blocked email
        $blockedEmails = $this->config->getBlockedEmails();
        if (in_array($username, $blockedEmails)) {
            throw new LocalizedException(__('This account is blocked.'));
        }

        // Check for blocked IP
        $blockedIps = $this->config->getBlockedIps();
        $currentIp = $this->request->getClientIp();

        if (in_array($currentIp, $blockedIps)) {
            throw new LocalizedException(__('Access from this IP address is blocked.'));
        }
    }
}
