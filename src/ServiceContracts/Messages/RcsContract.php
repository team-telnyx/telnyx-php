<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Messages;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Messages\Rcs\RcGenerateDeeplinkParams;
use Telnyx\Messages\Rcs\RcGenerateDeeplinkResponse;
use Telnyx\RequestOptions;

interface RcsContract
{
    /**
     * @api
     *
     * @param array<mixed>|RcGenerateDeeplinkParams $params
     *
     * @throws APIException
     */
    public function generateDeeplink(
        string $agentID,
        array|RcGenerateDeeplinkParams $params,
        ?RequestOptions $requestOptions = null,
    ): RcGenerateDeeplinkResponse;
}
