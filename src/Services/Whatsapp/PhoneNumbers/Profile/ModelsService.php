<?php

declare(strict_types=1);

namespace Telnyx\Services\Whatsapp\PhoneNumbers\Profile;

use Telnyx\Client;
use Telnyx\ServiceContracts\Whatsapp\PhoneNumbers\Profile\ModelsContract;

final class ModelsService implements ModelsContract
{
    /**
     * @api
     */
    public ModelsRawService $raw;

    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ModelsRawService($client);
    }
}
