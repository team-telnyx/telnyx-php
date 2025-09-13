<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
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
     * @param list<string> $phoneNumbers
     *
     * @return NumbersFeatureNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function create(
        $phoneNumbers,
        ?RequestOptions $requestOptions = null
    ): NumbersFeatureNewResponse {
        $params = ['phoneNumbers' => $phoneNumbers];

        return $this->createRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return NumbersFeatureNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): NumbersFeatureNewResponse {
        [$parsed, $options] = NumbersFeatureCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'numbers_features',
            body: (object) $parsed,
            options: $options,
            convert: NumbersFeatureNewResponse::class,
        );
    }
}
