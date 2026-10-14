<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Whatsapp\PhoneNumbers;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Whatsapp\PhoneNumbers\CallingRouting\CallingRoutingListResponse;
use Telnyx\Whatsapp\PhoneNumbers\CallingRouting\CallingRoutingPatchAllParams;
use Telnyx\Whatsapp\PhoneNumbers\CallingRouting\CallingRoutingPatchAllResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface CallingRoutingRawContract
{
    /**
     * @api
     *
     * @param string $id The BYON phone number in E.164 format. The leading `+` is optional.
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CallingRoutingListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id The BYON phone number in E.164 format. The leading `+` is optional.
     * @param array<string,mixed>|CallingRoutingPatchAllParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CallingRoutingPatchAllResponse>
     *
     * @throws APIException
     */
    public function patchAll(
        string $id,
        array|CallingRoutingPatchAllParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
