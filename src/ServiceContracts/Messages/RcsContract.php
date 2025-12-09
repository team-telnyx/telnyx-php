<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Messages;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Messages\Rcs\RcGenerateDeeplinkResponse;
use Telnyx\RequestOptions;

interface RcsContract
{
    /**
     * @api
     *
     * @param string $agentID RCS agent ID
     * @param string $body Pre-filled message body (URL encoded)
     * @param string $phoneNumber Phone number in E164 format (URL encoded)
     *
     * @throws APIException
     */
    public function generateDeeplink(
        string $agentID,
        ?string $body = null,
        ?string $phoneNumber = null,
        ?RequestOptions $requestOptions = null,
    ): RcGenerateDeeplinkResponse;
}
