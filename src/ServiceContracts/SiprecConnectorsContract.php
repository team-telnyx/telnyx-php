<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\SiprecConnectors\SiprecConnectorCreateParams;
use Telnyx\SiprecConnectors\SiprecConnectorGetResponse;
use Telnyx\SiprecConnectors\SiprecConnectorNewResponse;
use Telnyx\SiprecConnectors\SiprecConnectorUpdateParams;
use Telnyx\SiprecConnectors\SiprecConnectorUpdateResponse;

interface SiprecConnectorsContract
{
    /**
     * @api
     *
     * @param array<mixed>|SiprecConnectorCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|SiprecConnectorCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): SiprecConnectorNewResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $connectorName,
        ?RequestOptions $requestOptions = null
    ): SiprecConnectorGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|SiprecConnectorUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $connectorName,
        array|SiprecConnectorUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): SiprecConnectorUpdateResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $connectorName,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
