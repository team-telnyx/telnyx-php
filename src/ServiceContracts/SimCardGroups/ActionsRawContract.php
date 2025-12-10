<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\SimCardGroups;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\SimCardGroups\Actions\ActionGetResponse;
use Telnyx\SimCardGroups\Actions\ActionListParams;
use Telnyx\SimCardGroups\Actions\ActionListResponse;
use Telnyx\SimCardGroups\Actions\ActionRemovePrivateWirelessGatewayResponse;
use Telnyx\SimCardGroups\Actions\ActionRemoveWirelessBlocklistResponse;
use Telnyx\SimCardGroups\Actions\ActionSetPrivateWirelessGatewayParams;
use Telnyx\SimCardGroups\Actions\ActionSetPrivateWirelessGatewayResponse;
use Telnyx\SimCardGroups\Actions\ActionSetWirelessBlocklistParams;
use Telnyx\SimCardGroups\Actions\ActionSetWirelessBlocklistResponse;

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
     * @param array<mixed>|ActionListParams $params
     *
     * @return BaseResponse<ActionListResponse>
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
     * @param string $id identifies the SIM group
     *
     * @return BaseResponse<ActionRemovePrivateWirelessGatewayResponse>
     *
     * @throws APIException
     */
    public function removePrivateWirelessGateway(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the SIM group
     *
     * @return BaseResponse<ActionRemoveWirelessBlocklistResponse>
     *
     * @throws APIException
     */
    public function removeWirelessBlocklist(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the SIM group
     * @param array<mixed>|ActionSetPrivateWirelessGatewayParams $params
     *
     * @return BaseResponse<ActionSetPrivateWirelessGatewayResponse>
     *
     * @throws APIException
     */
    public function setPrivateWirelessGateway(
        string $id,
        array|ActionSetPrivateWirelessGatewayParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the SIM group
     * @param array<mixed>|ActionSetWirelessBlocklistParams $params
     *
     * @return BaseResponse<ActionSetWirelessBlocklistResponse>
     *
     * @throws APIException
     */
    public function setWirelessBlocklist(
        string $id,
        array|ActionSetWirelessBlocklistParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
