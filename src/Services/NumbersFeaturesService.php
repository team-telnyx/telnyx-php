<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
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
     */
    public function create(
        $phoneNumbers,
        ?RequestOptions $requestOptions = null
    ): NumbersFeatureNewResponse {
        [$parsed, $options] = NumbersFeatureCreateParams::parseRequest(
            ['phoneNumbers' => $phoneNumbers],
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
