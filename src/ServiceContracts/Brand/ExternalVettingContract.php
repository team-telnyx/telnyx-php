<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Brand;

use Telnyx\Brand\ExternalVetting\ExternalVettingImportResponse;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface ExternalVettingContract
{
    /**
     * @api
     */
    public function list(
        string $brandID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param string $evpID external vetting provider ID for the brand
     * @param string $vettingID Unique ID that identifies a vetting transaction performed by a vetting provider. This ID is provided by the vetting provider at time of vetting.
     * @param string $vettingToken required by some providers for vetting record confirmation
     *
     * @return ExternalVettingImportResponse<HasRawResponse>
     */
    public function import(
        string $brandID,
        $evpID,
        $vettingID,
        $vettingToken = omit,
        ?RequestOptions $requestOptions = null,
    ): ExternalVettingImportResponse;

    /**
     * @api
     *
     * @param string $evpID external vetting provider ID for the brand
     * @param string $vettingClass identifies the vetting classification
     */
    public function order(
        string $brandID,
        $evpID,
        $vettingClass,
        ?RequestOptions $requestOptions = null,
    ): mixed;
}
