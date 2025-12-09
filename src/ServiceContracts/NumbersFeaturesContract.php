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
        array $phoneNumbers,
        ?RequestOptions $requestOptions = null
    ): NumbersFeatureNewResponse;
}
