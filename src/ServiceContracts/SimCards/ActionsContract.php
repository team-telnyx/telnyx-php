<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\SimCards;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\SimCards\Actions\ActionBulkSetPublicIPsParams;
use Telnyx\SimCards\Actions\ActionBulkSetPublicIPsResponse;
use Telnyx\SimCards\Actions\ActionDisableResponse;
use Telnyx\SimCards\Actions\ActionEnableResponse;
use Telnyx\SimCards\Actions\ActionGetResponse;
use Telnyx\SimCards\Actions\ActionListParams;
use Telnyx\SimCards\Actions\ActionRemovePublicIPResponse;
use Telnyx\SimCards\Actions\ActionSetPublicIPParams;
use Telnyx\SimCards\Actions\ActionSetPublicIPResponse;
use Telnyx\SimCards\Actions\ActionSetStandbyResponse;
use Telnyx\SimCards\Actions\ActionValidateRegistrationCodesParams;
use Telnyx\SimCards\Actions\ActionValidateRegistrationCodesResponse;
use Telnyx\SimCards\Actions\SimCardAction;

interface ActionsContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ActionGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|ActionListParams $params
     *
     * @return DefaultPagination<SimCardAction>
     *
     * @throws APIException
     */
    public function list(
        array|ActionListParams $params,
        ?RequestOptions $requestOptions = null
    ): DefaultPagination;

    /**
     * @api
     *
     * @param array<mixed>|ActionBulkSetPublicIPsParams $params
     *
     * @throws APIException
     */
    public function bulkSetPublicIPs(
        array|ActionBulkSetPublicIPsParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionBulkSetPublicIPsResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function disable(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ActionDisableResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function enable(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ActionEnableResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function removePublicIP(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ActionRemovePublicIPResponse;

    /**
     * @api
     *
     * @param array<mixed>|ActionSetPublicIPParams $params
     *
     * @throws APIException
     */
    public function setPublicIP(
        string $id,
        array|ActionSetPublicIPParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionSetPublicIPResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function setStandby(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ActionSetStandbyResponse;

    /**
     * @api
     *
     * @param array<mixed>|ActionValidateRegistrationCodesParams $params
     *
     * @throws APIException
     */
    public function validateRegistrationCodes(
        array|ActionValidateRegistrationCodesParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionValidateRegistrationCodesResponse;
}
