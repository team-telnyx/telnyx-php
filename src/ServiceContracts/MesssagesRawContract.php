<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Messsages\MesssageRcsParams;
use Telnyx\Messsages\MesssageRcsResponse;
use Telnyx\Messsages\MesssageWhatsappParams;
use Telnyx\Messsages\MesssageWhatsappResponse;
use Telnyx\RequestOptions;

interface MesssagesRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|MesssageRcsParams $params
     *
     * @return BaseResponse<MesssageRcsResponse>
     *
     * @throws APIException
     */
    public function rcs(
        array|MesssageRcsParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|MesssageWhatsappParams $params
     *
     * @return BaseResponse<MesssageWhatsappResponse>
     *
     * @throws APIException
     */
    public function whatsapp(
        array|MesssageWhatsappParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
