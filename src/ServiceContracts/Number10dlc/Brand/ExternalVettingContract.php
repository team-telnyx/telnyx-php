<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Number10dlc\Brand;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Number10dlc\Brand\ExternalVetting\ExternalVettingImportsResponse;
use Telnyx\Number10dlc\Brand\ExternalVetting\ExternalVettingListResponseItem;
use Telnyx\Number10dlc\Brand\ExternalVetting\ExternalVettingOrderResponse;
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
     * @param string $evpID external vetting provider ID for the brand
     * @param string $vettingID Unique ID that identifies a vetting transaction performed by a vetting provider. This ID is provided by the vetting provider at time of vetting.
     * @param string $vettingToken required by some providers for vetting record confirmation
     *
     * @throws APIException
     */
    public function imports(
        string $brandID,
        string $evpID,
        string $vettingID,
        ?string $vettingToken = null,
        ?RequestOptions $requestOptions = null,
    ): ExternalVettingImportsResponse;

    /**
     * @api
     *
     * @param string $evpID external vetting provider ID for the brand
     * @param string $vettingClass identifies the vetting classification
     *
     * @throws APIException
     */
    public function order(
        string $brandID,
        string $evpID,
        string $vettingClass,
        ?RequestOptions $requestOptions = null,
    ): ExternalVettingOrderResponse;
}
