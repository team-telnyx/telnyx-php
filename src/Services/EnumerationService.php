<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Enumeration\EnumerationGetResponse;
use Telnyx\Enumeration\EnumerationRetrieveParams\Endpoint;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\EnumerationContract;

final class EnumerationService implements EnumerationContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get Enum
     *
     * @param Endpoint|value-of<Endpoint> $endpoint
     *
     * @return mixed|list<string>
     *
     * @throws APIException
     */
    public function retrieve(
        Endpoint|string $endpoint,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['enum/%1$s', $endpoint],
            options: $requestOptions,
            convert: EnumerationGetResponse::class,
        );
    }
}
