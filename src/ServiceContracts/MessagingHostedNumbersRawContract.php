<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\MessagingHostedNumbers\MessagingHostedNumberDeleteResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface MessagingHostedNumbersRawContract
{
    /**
     * @api
     *
     * @param string $id identifies the type of resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessagingHostedNumberDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
