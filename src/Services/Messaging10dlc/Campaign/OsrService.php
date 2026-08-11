<?php

declare(strict_types=1);

namespace Telnyx\Services\Messaging10dlc\Campaign;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Messaging10dlc\Campaign\OsrContract;

/**
 * Campaign operations.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class OsrService implements OsrContract
{
    /**
     * @api
     */
    public OsrRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new OsrRawService($client);
    }

    /**
     * @api
     *
     * Returns the optional shared-responsibility attributes recorded for the campaign. Use these values to inspect the campaign configuration submitted to the registry.
     *
     * @param string $campaignID unique identifier of the campaign
     * @param RequestOpts|null $requestOptions
     *
     * @return array<string,mixed>
     *
     * @throws APIException
     */
    public function getAttributes(
        string $campaignID,
        RequestOptions|array|null $requestOptions = null
    ): array {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getAttributes($campaignID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
