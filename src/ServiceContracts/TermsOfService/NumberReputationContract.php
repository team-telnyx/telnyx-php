<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\TermsOfService;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface NumberReputationContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function agree(
        RequestOptions|array|null $requestOptions = null
    ): mixed;
}
