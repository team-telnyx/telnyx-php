<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\NumbersFeatures\NumbersFeatureNewResponse;
use Telnyx\RequestOptions;

interface NumbersFeaturesContract
{
    /**
     * @api
     *
     * @param list<string> $phoneNumbers
     *
     * @return NumbersFeatureNewResponse<HasRawResponse>
     */
    public function create(
        $phoneNumbers,
        ?RequestOptions $requestOptions = null
    ): NumbersFeatureNewResponse;
}
