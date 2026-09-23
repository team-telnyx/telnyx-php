<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\NoiseSuppressionEngines\NoiseSuppressionEngineListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\NoiseSuppressionEnginesRawContract;

/**
 * Noise suppression engines that can be selected when configuring noise suppression on voice connections.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class NoiseSuppressionEnginesRawService implements NoiseSuppressionEnginesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Returns all noise suppression engines available to the authenticated user. Engines gated behind a feature flag are included only when the flag is enabled for the user's account. Results are not paginated; the number of engines is expected to remain small.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NoiseSuppressionEngineListResponse>
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'noise_suppression_engines',
            options: $requestOptions,
            convert: NoiseSuppressionEngineListResponse::class,
        );
    }
}
