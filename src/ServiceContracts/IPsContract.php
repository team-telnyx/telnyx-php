<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\IPs\IPCreateParams;
use Telnyx\IPs\IPDeleteResponse;
use Telnyx\IPs\IPGetResponse;
use Telnyx\IPs\IPListParams;
use Telnyx\IPs\IPListResponse;
use Telnyx\IPs\IPNewResponse;
use Telnyx\IPs\IPUpdateParams;
use Telnyx\IPs\IPUpdateResponse;
use Telnyx\RequestOptions;

interface IPsContract
{
    /**
     * @api
     *
     * @param array<mixed>|IPCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|IPCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): IPNewResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): IPGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|IPUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|IPUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): IPUpdateResponse;

    /**
     * @api
     *
     * @param array<mixed>|IPListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|IPListParams $params,
        ?RequestOptions $requestOptions = null
    ): IPListResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): IPDeleteResponse;
}
