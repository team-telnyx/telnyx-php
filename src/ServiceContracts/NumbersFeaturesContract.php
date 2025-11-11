<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\NumbersFeatures\NumbersFeatureCreateParams;
use Telnyx\NumbersFeatures\NumbersFeatureNewResponse;
use Telnyx\RequestOptions;

interface NumbersFeaturesContract
{
    /**
     * @api
     *
     * @param array<mixed>|NumbersFeatureCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|NumbersFeatureCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): NumbersFeatureNewResponse;
}
