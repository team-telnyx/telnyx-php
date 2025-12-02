<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\GlobalIPs\GlobalIPCreateParams;
use Telnyx\GlobalIPs\GlobalIPDeleteResponse;
use Telnyx\GlobalIPs\GlobalIPGetResponse;
use Telnyx\GlobalIPs\GlobalIPListParams;
use Telnyx\GlobalIPs\GlobalIPListResponse;
use Telnyx\GlobalIPs\GlobalIPNewResponse;
use Telnyx\RequestOptions;

interface GlobalIPsContract
{
    /**
     * @api
     *
     * @param array<mixed>|GlobalIPCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|GlobalIPCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): GlobalIPNewResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): GlobalIPGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|GlobalIPListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|GlobalIPListParams $params,
        ?RequestOptions $requestOptions = null
    ): GlobalIPListResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): GlobalIPDeleteResponse;
}
