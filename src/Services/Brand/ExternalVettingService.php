<?php

declare(strict_types=1);

namespace Telnyx\Services\Brand;

use Telnyx\Brand\ExternalVetting\ExternalVettingImportParams;
use Telnyx\Brand\ExternalVetting\ExternalVettingImportResponse;
use Telnyx\Brand\ExternalVetting\ExternalVettingListResponseItem;
use Telnyx\Brand\ExternalVetting\ExternalVettingOrderParams;
use Telnyx\Brand\ExternalVetting\ExternalVettingOrderResponse;
use Telnyx\Client;
use Telnyx\Core\Conversion\ListOf;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Brand\ExternalVettingContract;

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
     *
     * @return list<ExternalVettingListResponseItem>
     *
     * @throws APIException
     */
    public function list(
        string $brandID,
        ?RequestOptions $requestOptions = null
    ): array {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['brand/%1$s/externalVetting', $brandID],
            options: $requestOptions,
            convert: new ListOf(ExternalVettingListResponseItem::class),
        );
    }

    /**
     * @api
     *
     * This operation can be used to import an external vetting record from a TCR-approved
     * vetting provider. If the vetting provider confirms validity of the record, it will be
     * saved with the brand and will be considered for future campaign qualification.
     *
     * @param array{
     *   evpId: string, vettingId: string, vettingToken?: string
     * }|ExternalVettingImportParams $params
     *
     * @throws APIException
     */
    public function import(
        string $brandID,
        array|ExternalVettingImportParams $params,
        ?RequestOptions $requestOptions = null,
    ): ExternalVettingImportResponse {
        [$parsed, $options] = ExternalVettingImportParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param array{
     *   evpId: string, vettingClass: string
     * }|ExternalVettingOrderParams $params
     *
     * @throws APIException
     */
    public function order(
        string $brandID,
        array|ExternalVettingOrderParams $params,
        ?RequestOptions $requestOptions = null,
    ): ExternalVettingOrderResponse {
        [$parsed, $options] = ExternalVettingOrderParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['brand/%1$s/externalVetting', $brandID],
            body: (object) $parsed,
            options: $options,
            convert: ExternalVettingOrderResponse::class,
        );
    }
}
