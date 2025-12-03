<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\SimCards\SimCardDeleteParams;
use Telnyx\SimCards\SimCardDeleteResponse;
use Telnyx\SimCards\SimCardGetActivationCodeResponse;
use Telnyx\SimCards\SimCardGetDeviceDetailsResponse;
use Telnyx\SimCards\SimCardGetPublicIPResponse;
use Telnyx\SimCards\SimCardGetResponse;
use Telnyx\SimCards\SimCardListParams;
use Telnyx\SimCards\SimCardListWirelessConnectivityLogsParams;
use Telnyx\SimCards\SimCardListWirelessConnectivityLogsResponse;
use Telnyx\SimCards\SimCardRetrieveParams;
use Telnyx\SimCards\SimCardUpdateParams;
use Telnyx\SimCards\SimCardUpdateResponse;
use Telnyx\SimpleSimCard;

interface SimCardsContract
{
    /**
     * @api
     *
     * @param array<mixed>|SimCardRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        array|SimCardRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimCardGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|SimCardUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $simCardID,
        array|SimCardUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimCardUpdateResponse;

    /**
     * @api
     *
     * @param array<mixed>|SimCardListParams $params
     *
     * @return DefaultPagination<SimpleSimCard>
     *
     * @throws APIException
     */
    public function list(
        array|SimCardListParams $params,
        ?RequestOptions $requestOptions = null
    ): DefaultPagination;

    /**
     * @api
     *
     * @param array<mixed>|SimCardDeleteParams $params
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        array|SimCardDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimCardDeleteResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function getActivationCode(
        string $id,
        ?RequestOptions $requestOptions = null
    ): SimCardGetActivationCodeResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function getDeviceDetails(
        string $id,
        ?RequestOptions $requestOptions = null
    ): SimCardGetDeviceDetailsResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function getPublicIP(
        string $id,
        ?RequestOptions $requestOptions = null
    ): SimCardGetPublicIPResponse;

    /**
     * @api
     *
     * @param array<mixed>|SimCardListWirelessConnectivityLogsParams $params
     *
     * @return DefaultFlatPagination<SimCardListWirelessConnectivityLogsResponse>
     *
     * @throws APIException
     */
    public function listWirelessConnectivityLogs(
        string $id,
        array|SimCardListWirelessConnectivityLogsParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultFlatPagination;
}
