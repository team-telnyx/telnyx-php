<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Messages;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\Messages\Rcs\RcGenerateDeeplinkResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface RcsContract
{
    /**
     * @api
     *
     * @param string $body Pre-filled message body (URL encoded)
     * @param string $phoneNumber Phone number in E164 format (URL encoded)
     *
     * @return RcGenerateDeeplinkResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function generateDeeplink(
        string $agentID,
        $body = omit,
        $phoneNumber = omit,
        ?RequestOptions $requestOptions = null,
    ): RcGenerateDeeplinkResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return RcGenerateDeeplinkResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function generateDeeplinkRaw(
        string $agentID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): RcGenerateDeeplinkResponse;
}
