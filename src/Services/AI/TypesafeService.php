<?php

declare(strict_types=1);

namespace Telnyx\Services\AI;

use Telnyx\Client;
use Telnyx\ServiceContracts\AI\TypesafeContract;
use Telnyx\Services\AI\Typesafe\V1Service;

final class TypesafeService implements TypesafeContract
{
    /**
     * @api
     */
    public TypesafeRawService $raw;

    /**
     * @api
     */
    public V1Service $v1;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new TypesafeRawService($client);
        $this->v1 = new V1Service($client);
    }
}
