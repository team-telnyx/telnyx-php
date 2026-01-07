<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\NumbersFeatures\NumbersFeatureCreateParams;
use Telnyx\NumbersFeatures\NumbersFeatureNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\NumbersFeaturesRawContract;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class NumbersFeaturesRawService implements NumbersFeaturesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve the features for a list of numbers
     *
     * @param array{phoneNumbers: list<string>}|NumbersFeatureCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NumbersFeatureNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|NumbersFeatureCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = NumbersFeatureCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'numbers_features',
            body: (object) $parsed,
            options: $options,
            convert: NumbersFeatureNewResponse::class,
        );
    }
}
