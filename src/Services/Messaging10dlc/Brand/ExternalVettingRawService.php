<?php

declare(strict_types=1);

namespace Telnyx\Services\Messaging10dlc\Brand;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Conversion\ListOf;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Messaging10dlc\Brand\ExternalVetting\ExternalVettingImportsParams;
use Telnyx\Messaging10dlc\Brand\ExternalVetting\ExternalVettingImportsResponse;
use Telnyx\Messaging10dlc\Brand\ExternalVetting\ExternalVettingListResponseItem;
use Telnyx\Messaging10dlc\Brand\ExternalVetting\ExternalVettingOrderParams;
use Telnyx\Messaging10dlc\Brand\ExternalVetting\ExternalVettingOrderResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Messaging10dlc\Brand\ExternalVettingRawContract;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
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
     * Get list of valid external vetting record for a given brand
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<ExternalVettingListResponseItem>>
     *
     * @throws APIException
     */
    public function list(
        string $brandID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['10dlc/brand/%1$s/externalVetting', $brandID],
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
     *   evpID: string, vettingID: string, vettingToken?: string
     * }|ExternalVettingImportsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ExternalVettingImportsResponse>
     *
     * @throws APIException
     */
    public function imports(
        string $brandID,
        array|ExternalVettingImportsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ExternalVettingImportsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['10dlc/brand/%1$s/externalVetting', $brandID],
            body: (object) $parsed,
            options: $options,
            convert: ExternalVettingImportsResponse::class,
        );
    }

    /**
     * @api
     *
     * Order new external vetting for a brand
     *
     * @param array{
     *   evpID: string, vettingClass: string
     * }|ExternalVettingOrderParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ExternalVettingOrderResponse>
     *
     * @throws APIException
     */
    public function order(
        string $brandID,
        array|ExternalVettingOrderParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ExternalVettingOrderParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['10dlc/brand/%1$s/externalVetting', $brandID],
            body: (object) $parsed,
            options: $options,
            convert: ExternalVettingOrderResponse::class,
        );
    }
}
