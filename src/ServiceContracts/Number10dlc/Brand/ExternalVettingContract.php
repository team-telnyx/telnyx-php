<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Number10dlc\Brand;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Number10dlc\Brand\ExternalVetting\ExternalVettingExternalVettingResponse;
use Telnyx\Number10dlc\Brand\ExternalVetting\ExternalVettingGetExternalVettingResponseItem;
use Telnyx\Number10dlc\Brand\ExternalVetting\ExternalVettingUpdateExternalVettingResponse;
use Telnyx\RequestOptions;

interface ExternalVettingContract
{
    /**
     * @api
     *
     * @param string $evpID external vetting provider ID for the brand
     * @param string $vettingClass identifies the vetting classification
     *
     * @throws APIException
     */
    public function externalVetting(
        string $brandID,
        string $evpID,
        string $vettingClass,
        ?RequestOptions $requestOptions = null,
    ): ExternalVettingExternalVettingResponse;

    /**
     * @api
     *
     * @return list<ExternalVettingGetExternalVettingResponseItem>
     *
     * @throws APIException
     */
    public function retrieveExternalVetting(
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
    public function updateExternalVetting(
        string $brandID,
        string $evpID,
        string $vettingID,
        ?string $vettingToken = null,
        ?RequestOptions $requestOptions = null,
    ): ExternalVettingUpdateExternalVettingResponse;
}
