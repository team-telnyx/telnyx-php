<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\SimCards;

use Telnyx\Core\Contracts\BaseResponse;
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

interface ActionsRawContract
{
    /**
     * @api
     *
     * @param string $id identifies the resource
     *
     * @return BaseResponse<ActionGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ActionListParams $params
     *
     * @return BaseResponse<DefaultPagination<SimCardAction>>
     *
     * @throws APIException
     */
    public function list(
        array|ActionListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ActionBulkSetPublicIPsParams $params
     *
     * @return BaseResponse<ActionBulkSetPublicIPsResponse>
     *
     * @throws APIException
     */
    public function bulkSetPublicIPs(
        array|ActionBulkSetPublicIPsParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the SIM
     *
     * @return BaseResponse<ActionDisableResponse>
     *
     * @throws APIException
     */
    public function disable(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the SIM
     *
     * @return BaseResponse<ActionEnableResponse>
     *
     * @throws APIException
     */
    public function enable(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the SIM
     *
     * @return BaseResponse<ActionRemovePublicIPResponse>
     *
     * @throws APIException
     */
    public function removePublicIP(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the SIM
     * @param array<string,mixed>|ActionSetPublicIPParams $params
     *
     * @return BaseResponse<ActionSetPublicIPResponse>
     *
     * @throws APIException
     */
    public function setPublicIP(
        string $id,
        array|ActionSetPublicIPParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the SIM
     *
     * @return BaseResponse<ActionSetStandbyResponse>
     *
     * @throws APIException
     */
    public function setStandby(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ActionValidateRegistrationCodesParams $params
     *
     * @return BaseResponse<ActionValidateRegistrationCodesResponse>
     *
     * @throws APIException
     */
    public function validateRegistrationCodes(
        array|ActionValidateRegistrationCodesParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
