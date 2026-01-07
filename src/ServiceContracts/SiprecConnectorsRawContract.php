<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\SiprecConnectors\SiprecConnectorCreateParams;
use Telnyx\SiprecConnectors\SiprecConnectorGetResponse;
use Telnyx\SiprecConnectors\SiprecConnectorNewResponse;
use Telnyx\SiprecConnectors\SiprecConnectorUpdateParams;
use Telnyx\SiprecConnectors\SiprecConnectorUpdateResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface SiprecConnectorsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|SiprecConnectorCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SiprecConnectorNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|SiprecConnectorCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $connectorName uniquely identifies a SIPREC connector
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SiprecConnectorGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $connectorName,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $connectorName uniquely identifies a SIPREC connector
     * @param array<string,mixed>|SiprecConnectorUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SiprecConnectorUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $connectorName,
        array|SiprecConnectorUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $connectorName uniquely identifies a SIPREC connector
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $connectorName,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
