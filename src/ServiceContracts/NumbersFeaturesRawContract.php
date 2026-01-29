<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\NumbersFeatures\NumbersFeatureCreateParams;
use Telnyx\NumbersFeatures\NumbersFeatureNewResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface NumbersFeaturesRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|NumbersFeatureCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NumbersFeatureNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|NumbersFeatureCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
