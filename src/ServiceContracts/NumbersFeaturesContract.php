<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\NumbersFeatures\NumbersFeatureNewResponse;
use Telnyx\RequestOptions;

interface NumbersFeaturesContract
{
    /**
     * @api
     *
     * @param list<string> $phoneNumbers
     *
     * @throws APIException
     */
    public function create(
        $phoneNumbers,
        ?RequestOptions $requestOptions = null
    ): NumbersFeatureNewResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): NumbersFeatureNewResponse;
}
