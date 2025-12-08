<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\NumbersFeatures\NumbersFeatureCreateParams;
use Telnyx\NumbersFeatures\NumbersFeatureNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\NumbersFeaturesContract;

final class NumbersFeaturesService implements NumbersFeaturesContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve the features for a list of numbers
     *
     * @param array{phone_numbers: list<string>}|NumbersFeatureCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|NumbersFeatureCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): NumbersFeatureNewResponse {
        [$parsed, $options] = NumbersFeatureCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<NumbersFeatureNewResponse> */
        $response = $this->client->request(
            method: 'post',
            path: 'numbers_features',
            body: (object) $parsed,
            options: $options,
            convert: NumbersFeatureNewResponse::class,
        );

        return $response->parse();
    }
}
