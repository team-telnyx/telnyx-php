<?php

declare(strict_types=1);

namespace Telnyx\Services\Whatsapp\PhoneNumbers\Profile;

use Telnyx\Client;
use Telnyx\ServiceContracts\Whatsapp\PhoneNumbers\Profile\ModelsRawContract;

final class ModelsRawService implements ModelsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}
}
