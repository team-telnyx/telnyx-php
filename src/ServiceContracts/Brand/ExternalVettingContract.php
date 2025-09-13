<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Brand;

use Telnyx\Brand\ExternalVetting\ExternalVettingImportResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface ExternalVettingContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function list(
        string $brandID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function listRaw(
        string $brandID,
        mixed $params,
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
     *
     * @throws APIException
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
     * @param array<string, mixed> $params
     *
     * @return ExternalVettingImportResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function importRaw(
        string $brandID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ExternalVettingImportResponse;

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
        $evpID,
        $vettingClass,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function orderRaw(
        string $brandID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
