<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\NoiseSuppressionEngines\NoiseSuppressionEngineListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\NoiseSuppressionEnginesContract;

/**
 * Noise suppression engines that can be selected when configuring noise suppression on voice connections.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class NoiseSuppressionEnginesService implements NoiseSuppressionEnginesContract
{
    /**
     * @api
     */
    public NoiseSuppressionEnginesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new NoiseSuppressionEnginesRawService($client);
    }

    /**
     * @api
     *
     * Returns all noise suppression engines available to the authenticated user. Engines gated behind a feature flag are included only when the flag is enabled for the user's account. Results are not paginated; the number of engines is expected to remain small.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): NoiseSuppressionEngineListResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(requestOptions: $requestOptions);

        return $response->parse();
    }
}
