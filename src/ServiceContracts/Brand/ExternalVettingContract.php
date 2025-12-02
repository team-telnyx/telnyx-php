<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Brand;

use Telnyx\Brand\ExternalVetting\ExternalVettingImportParams;
use Telnyx\Brand\ExternalVetting\ExternalVettingImportResponse;
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
     * @param array<mixed>|ExternalVettingImportParams $params
     *
     * @throws APIException
     */
    public function import(
        string $brandID,
        array|ExternalVettingImportParams $params,
        ?RequestOptions $requestOptions = null,
    ): ExternalVettingImportResponse;

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
