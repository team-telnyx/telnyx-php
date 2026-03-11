<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\ServiceContracts\WhatsappContract;
use Telnyx\Services\Whatsapp\BusinessAccountsService;
use Telnyx\Services\Whatsapp\MessageTemplatesService;
use Telnyx\Services\Whatsapp\PhoneNumbersService;

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
    public MessageTemplatesService $messageTemplates;

    /**
     * @api
     */
    public PhoneNumbersService $phoneNumbers;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new WhatsappRawService($client);
        $this->businessAccounts = new BusinessAccountsService($client);
        $this->messageTemplates = new MessageTemplatesService($client);
        $this->phoneNumbers = new PhoneNumbersService($client);
    }
}
