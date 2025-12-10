<?php

declare(strict_types=1);

namespace Telnyx\Services\Number10dlc\Brand;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Conversion\ListOf;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Number10dlc\Brand\ExternalVetting\ExternalVettingExternalVettingParams;
use Telnyx\Number10dlc\Brand\ExternalVetting\ExternalVettingExternalVettingResponse;
use Telnyx\Number10dlc\Brand\ExternalVetting\ExternalVettingGetExternalVettingResponseItem;
use Telnyx\Number10dlc\Brand\ExternalVetting\ExternalVettingUpdateExternalVettingParams;
use Telnyx\Number10dlc\Brand\ExternalVetting\ExternalVettingUpdateExternalVettingResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Number10dlc\Brand\ExternalVettingRawContract;

final class ExternalVettingRawService implements ExternalVettingRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Order new external vetting for a brand
     *
     * @param array{
     *   evpID: string, vettingClass: string
     * }|ExternalVettingExternalVettingParams $params
     *
     * @return BaseResponse<ExternalVettingExternalVettingResponse>
     *
     * @throws APIException
     */
    public function externalVetting(
        string $brandID,
        array|ExternalVettingExternalVettingParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ExternalVettingExternalVettingParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['10dlc/brand/%1$s/externalVetting', $brandID],
            body: (object) $parsed,
            options: $options,
            convert: ExternalVettingExternalVettingResponse::class,
        );
    }

    /**
     * @api
     *
     * Get list of valid external vetting record for a given brand
     *
     * @return BaseResponse<list<ExternalVettingGetExternalVettingResponseItem>>
     *
     * @throws APIException
     */
    public function retrieveExternalVetting(
        string $brandID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['10dlc/brand/%1$s/externalVetting', $brandID],
            options: $requestOptions,
            convert: new ListOf(ExternalVettingGetExternalVettingResponseItem::class),
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
     *   evpID: string, vettingID: string, vettingToken?: string
     * }|ExternalVettingUpdateExternalVettingParams $params
     *
     * @return BaseResponse<ExternalVettingUpdateExternalVettingResponse>
     *
     * @throws APIException
     */
    public function updateExternalVetting(
        string $brandID,
        array|ExternalVettingUpdateExternalVettingParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ExternalVettingUpdateExternalVettingParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['10dlc/brand/%1$s/externalVetting', $brandID],
            body: (object) $parsed,
            options: $options,
            convert: ExternalVettingUpdateExternalVettingResponse::class,
        );
    }
}
