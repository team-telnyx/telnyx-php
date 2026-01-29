<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\NumbersFeatures\NumbersFeatureNewResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface NumbersFeaturesContract
{
    /**
     * @api
     *
     * @param list<string> $phoneNumbers
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        array $phoneNumbers,
        RequestOptions|array|null $requestOptions = null
    ): NumbersFeatureNewResponse;
}
