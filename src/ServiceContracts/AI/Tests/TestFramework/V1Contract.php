<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Tests\TestFramework;

use Telnyx\AI\Tests\TestFramework\V1\V1GetPersonalitiesResponseItem;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface V1Contract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return list<V1GetPersonalitiesResponseItem>
     *
     * @throws APIException
     */
    public function retrievePersonalities(
        RequestOptions|array|null $requestOptions = null
    ): array;
}
