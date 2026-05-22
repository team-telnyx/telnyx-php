<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\ServiceContracts\WhatsappContract;
use Telnyx\Services\Whatsapp\BusinessAccountsService;
use Telnyx\Services\Whatsapp\PhoneNumbersService;
use Telnyx\Services\Whatsapp\TemplatesService;
use Telnyx\Services\Whatsapp\UserDataService;

final class WhatsappService implements WhatsappContract
{
    /**
     * @api
     */
    public WhatsappRawService $raw;

    /**
     * @api
     */
    public BusinessAccountsService $businessAccounts;

    /**
     * @api
     */
    public TemplatesService $templates;

    /**
     * @api
     */
    public PhoneNumbersService $phoneNumbers;

    /**
     * @api
     */
    public UserDataService $userData;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new WhatsappRawService($client);
        $this->businessAccounts = new BusinessAccountsService($client);
        $this->templates = new TemplatesService($client);
        $this->phoneNumbers = new PhoneNumbersService($client);
        $this->userData = new UserDataService($client);
    }
}
