<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Tests\TestFramework;

use Telnyx\AI\Tests\TestFramework\V1\V1GetPersonalitiesResponseItem;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface V1RawContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<V1GetPersonalitiesResponseItem>>
     *
     * @throws APIException
     */
    public function retrievePersonalities(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
