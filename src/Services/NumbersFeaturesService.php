<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\NumbersFeatures\NumbersFeatureNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\NumbersFeaturesContract;

final class NumbersFeaturesService implements NumbersFeaturesContract
{
    /**
     * @api
     */
    public NumbersFeaturesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new NumbersFeaturesRawService($client);
    }

    /**
     * @api
     *
     * Retrieve the features for a list of numbers
     *
     * @param list<string> $phoneNumbers
     *
     * @throws APIException
     */
    public function create(
        array $phoneNumbers,
        ?RequestOptions $requestOptions = null
    ): NumbersFeatureNewResponse {
        $params = Util::removeNulls(['phoneNumbers' => $phoneNumbers]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
