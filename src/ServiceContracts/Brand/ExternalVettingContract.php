<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Brand;

use Telnyx\Brand\ExternalVetting\ExternalVettingImportsParams;
use Telnyx\Brand\ExternalVetting\ExternalVettingImportsResponse;
use Telnyx\Brand\ExternalVetting\ExternalVettingListResponseItem;
use Telnyx\Brand\ExternalVetting\ExternalVettingOrderParams;
use Telnyx\Brand\ExternalVetting\ExternalVettingOrderResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface ExternalVettingContract
{
    /**
     * @api
     *
     * @return list<ExternalVettingListResponseItem>
     *
     * @throws APIException
     */
    public function list(
        string $brandID,
        ?RequestOptions $requestOptions = null
    ): array;

    /**
     * @api
     *
     * @param array<mixed>|ExternalVettingImportsParams $params
     *
     * @throws APIException
     */
    public function imports(
        string $brandID,
        array|ExternalVettingImportsParams $params,
        ?RequestOptions $requestOptions = null,
    ): ExternalVettingImportsResponse;

    /**
     * @api
     *
     * @param array<mixed>|ExternalVettingOrderParams $params
     *
     * @throws APIException
     */
    public function order(
        string $brandID,
        array|ExternalVettingOrderParams $params,
        ?RequestOptions $requestOptions = null,
    ): ExternalVettingOrderResponse;
}
