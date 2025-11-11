<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\SimCardGroups;

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
     * @throws APIException
     */
    public function list(
        array|ActionListParams $params,
        ?RequestOptions $requestOptions = null
    ): ActionListResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function removePrivateWirelessGateway(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ActionRemovePrivateWirelessGatewayResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function removeWirelessBlocklist(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ActionRemoveWirelessBlocklistResponse;

    /**
     * @api
     *
     * @param array<mixed>|ActionSetPrivateWirelessGatewayParams $params
     *
     * @throws APIException
     */
    public function setPrivateWirelessGateway(
        string $id,
        array|ActionSetPrivateWirelessGatewayParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionSetPrivateWirelessGatewayResponse;

    /**
     * @api
     *
     * @param array<mixed>|ActionSetWirelessBlocklistParams $params
     *
     * @throws APIException
     */
    public function setWirelessBlocklist(
        string $id,
        array|ActionSetWirelessBlocklistParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionSetWirelessBlocklistResponse;
}
