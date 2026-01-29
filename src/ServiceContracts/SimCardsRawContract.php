<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
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

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface SimCardsRawContract
{
    /**
     * @api
     *
     * @param string $id identifies the SIM
     * @param array<string,mixed>|SimCardRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SimCardGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        array|SimCardRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $simCardID identifies the SIM
     * @param array<string,mixed>|SimCardUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SimCardUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $simCardID,
        array|SimCardUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|SimCardListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultPagination<SimpleSimCard>>
     *
     * @throws APIException
     */
    public function list(
        array|SimCardListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the SIM
     * @param array<string,mixed>|SimCardDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SimCardDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        array|SimCardDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the SIM
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SimCardGetActivationCodeResponse>
     *
     * @throws APIException
     */
    public function getActivationCode(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the SIM
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SimCardGetDeviceDetailsResponse>
     *
     * @throws APIException
     */
    public function getDeviceDetails(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the SIM
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SimCardGetPublicIPResponse>
     *
     * @throws APIException
     */
    public function getPublicIP(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the SIM
     * @param array<string,mixed>|SimCardListWirelessConnectivityLogsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<SimCardListWirelessConnectivityLogsResponse,>,>
     *
     * @throws APIException
     */
    public function listWirelessConnectivityLogs(
        string $id,
        array|SimCardListWirelessConnectivityLogsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
