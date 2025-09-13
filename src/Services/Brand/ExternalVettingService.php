<?php

declare(strict_types=1);

namespace Telnyx\Services\Brand;

use Telnyx\Brand\ExternalVetting\ExternalVettingImportParams;
use Telnyx\Brand\ExternalVetting\ExternalVettingImportResponse;
use Telnyx\Brand\ExternalVetting\ExternalVettingOrderParams;
use Telnyx\Client;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Brand\ExternalVettingContract;

use const Telnyx\Core\OMIT as omit;

final class ExternalVettingService implements ExternalVettingContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get list of valid external vetting record for a given brand
     */
    public function list(
        string $brandID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['brand/%1$s/externalVetting', $brandID],
            options: $requestOptions,
            convert: 'mixed',
        );
    }

    /**
     * @api
     *
     * This operation can be used to import an external vetting record from a TCR-approved
     * vetting provider. If the vetting provider confirms validity of the record, it will be
     * saved with the brand and will be considered for future campaign qualification.
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
    ): ExternalVettingImportResponse {
        [$parsed, $options] = ExternalVettingImportParams::parseRequest(
            [
                'evpID' => $evpID,
                'vettingID' => $vettingID,
                'vettingToken' => $vettingToken,
            ],
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'put',
            path: ['brand/%1$s/externalVetting', $brandID],
            body: (object) $parsed,
            options: $options,
            convert: ExternalVettingImportResponse::class,
        );
    }

    /**
     * @api
     *
     * Order new external vetting for a brand
     *
     * @param string $evpID external vetting provider ID for the brand
     * @param string $vettingClass identifies the vetting classification
     */
    public function order(
        string $brandID,
        $evpID,
        $vettingClass,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = ExternalVettingOrderParams::parseRequest(
            ['evpID' => $evpID, 'vettingClass' => $vettingClass],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['brand/%1$s/externalVetting', $brandID],
            body: (object) $parsed,
            options: $options,
            convert: 'mixed',
        );
    }
}
