<?php

declare(strict_types=1);

namespace Telnyx\Services\AI;

use Telnyx\Client;
use Telnyx\ServiceContracts\AI\TypesafeRawContract;

final class TypesafeRawService implements TypesafeRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}
}
