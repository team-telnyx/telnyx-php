<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Email\IPPools;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Email\IPPools\IPs\IPCreateParams;
use Telnyx\Email\IPPools\IPs\IPDeleteParams;
use Telnyx\Email\IPPools\IPs\IPNewResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface IPsRawContract
{
    /**
     * @api
     *
     * @param string $id the IP pool identifier (UUID)
     * @param array<string,mixed>|IPCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<IPNewResponse>
     *
     * @throws APIException
     */
    public function create(
        string $id,
        array|IPCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $ipID path param: The dedicated IP identifier (UUID)
     * @param array<string,mixed>|IPDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $ipID,
        array|IPDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
