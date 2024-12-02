# WB_BlockedCustomerByEmail

## Description
Magento 2 module to block specific customer email accounts from logging in.

## Features
- Enable/disable the module via Admin configuration.
- Block By multiple emails (comma-separated).
- Block By multiple IP's (comma-separated).
- Displays an error message when a blocked email attempts to log in: `This email account is blocked.`

## Installation
1. Copy the module to `app/code/WB/BlockedCustomerByEmail`.
2. Run the following commands:
    ```bash
    bin/magento setup:upgrade
    bin/magento setup:di:compile
    bin/magento cache:flush
    ```

## Configuration
- Go to `Stores > Configuration > Customers > Blocked Customer By Email` to enable the module and configure blocked emails.
- Add multiple email addresses to the "Blocked Emails" field, separated by commas.

## Usage
- Once the module is enabled, any email listed in the "Blocked Emails" configuration will not be able to log in.
- Unblocked email accounts will continue to function as normal.

## Support
For issues, contact [Wajahat Bashir](mailto:wajahat.bashir786@gmail.com).
