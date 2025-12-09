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

interface SiprecConnectorsRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|SiprecConnectorCreateParams $params
     *
     * @return BaseResponse<SiprecConnectorNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|SiprecConnectorCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $connectorName uniquely identifies a SIPREC connector
     *
     * @return BaseResponse<SiprecConnectorGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $connectorName,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $connectorName uniquely identifies a SIPREC connector
     * @param array<mixed>|SiprecConnectorUpdateParams $params
     *
     * @return BaseResponse<SiprecConnectorUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $connectorName,
        array|SiprecConnectorUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $connectorName uniquely identifies a SIPREC connector
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $connectorName,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
