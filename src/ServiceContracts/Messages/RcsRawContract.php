<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Messages;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Messages\Rcs\RcGenerateDeeplinkParams;
use Telnyx\Messages\Rcs\RcGenerateDeeplinkResponse;
use Telnyx\Messages\Rcs\RcSendParams;
use Telnyx\Messages\Rcs\RcSendResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface RcsRawContract
{
    /**
     * @api
     *
     * @param string $agentID RCS agent ID
     * @param array<string,mixed>|RcGenerateDeeplinkParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RcGenerateDeeplinkResponse>
     *
     * @throws APIException
     */
    public function generateDeeplink(
        string $agentID,
        array|RcGenerateDeeplinkParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|RcSendParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RcSendResponse>
     *
     * @throws APIException
     */
    public function send(
        array|RcSendParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
