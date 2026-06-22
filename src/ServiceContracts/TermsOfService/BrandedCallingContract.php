<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\TermsOfService;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\TermsOfService\Agreements\TosAgreementWrapped;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface BrandedCallingContract
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
    ): TosAgreementWrapped;
}
