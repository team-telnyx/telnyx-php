<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PhoneNumbers;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\PhoneNumbers\Actions\ActionChangeBundleStatusParams;
use Telnyx\PhoneNumbers\Actions\ActionChangeBundleStatusResponse;
use Telnyx\PhoneNumbers\Actions\ActionEnableEmergencyParams;
use Telnyx\PhoneNumbers\Actions\ActionEnableEmergencyResponse;
use Telnyx\PhoneNumbers\Actions\ActionVerifyOwnershipParams;
use Telnyx\PhoneNumbers\Actions\ActionVerifyOwnershipResponse;
use Telnyx\RequestOptions;

interface ActionsRawContract
{
    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param array<mixed>|ActionChangeBundleStatusParams $params
     *
     * @return BaseResponse<ActionChangeBundleStatusResponse>
     *
     * @throws APIException
     */
    public function changeBundleStatus(
        string $id,
        array|ActionChangeBundleStatusParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param array<mixed>|ActionEnableEmergencyParams $params
     *
     * @return BaseResponse<ActionEnableEmergencyResponse>
     *
     * @throws APIException
     */
    public function enableEmergency(
        string $id,
        array|ActionEnableEmergencyParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|ActionVerifyOwnershipParams $params
     *
     * @return BaseResponse<ActionVerifyOwnershipResponse>
     *
     * @throws APIException
     */
    public function verifyOwnership(
        array|ActionVerifyOwnershipParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
