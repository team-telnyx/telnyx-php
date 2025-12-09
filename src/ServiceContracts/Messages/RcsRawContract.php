<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Messages;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Messages\Rcs\RcGenerateDeeplinkParams;
use Telnyx\Messages\Rcs\RcGenerateDeeplinkResponse;
use Telnyx\RequestOptions;

interface RcsRawContract
{
    /**
     * @api
     *
     * @param string $agentID RCS agent ID
     * @param array<mixed>|RcGenerateDeeplinkParams $params
     *
     * @return BaseResponse<RcGenerateDeeplinkResponse>
     *
     * @throws APIException
     */
    public function generateDeeplink(
        string $agentID,
        array|RcGenerateDeeplinkParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
