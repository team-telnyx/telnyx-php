<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\NumbersFeatures\NumbersFeatureNewResponse;
use Telnyx\RequestOptions;

interface NumbersFeaturesContract
{
    /**
     * @api
     *
     * @param list<string> $phoneNumbers
     */
    public function create(
        $phoneNumbers,
        ?RequestOptions $requestOptions = null
    ): NumbersFeatureNewResponse;
}
