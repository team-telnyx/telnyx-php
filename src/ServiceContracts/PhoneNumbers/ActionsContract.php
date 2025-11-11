<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PhoneNumbers;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\PhoneNumbers\Actions\ActionChangeBundleStatusParams;
use Telnyx\PhoneNumbers\Actions\ActionChangeBundleStatusResponse;
use Telnyx\PhoneNumbers\Actions\ActionEnableEmergencyParams;
use Telnyx\PhoneNumbers\Actions\ActionEnableEmergencyResponse;
use Telnyx\PhoneNumbers\Actions\ActionVerifyOwnershipParams;
use Telnyx\PhoneNumbers\Actions\ActionVerifyOwnershipResponse;
use Telnyx\RequestOptions;

interface ActionsContract
{
    /**
     * @api
     *
     * @param array<mixed>|ActionChangeBundleStatusParams $params
     *
     * @throws APIException
     */
    public function changeBundleStatus(
        string $id,
        array|ActionChangeBundleStatusParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionChangeBundleStatusResponse;

    /**
     * @api
     *
     * @param array<mixed>|ActionEnableEmergencyParams $params
     *
     * @throws APIException
     */
    public function enableEmergency(
        string $id,
        array|ActionEnableEmergencyParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionEnableEmergencyResponse;

    /**
     * @api
     *
     * @param array<mixed>|ActionVerifyOwnershipParams $params
     *
     * @throws APIException
     */
    public function verifyOwnership(
        array|ActionVerifyOwnershipParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionVerifyOwnershipResponse;
}
