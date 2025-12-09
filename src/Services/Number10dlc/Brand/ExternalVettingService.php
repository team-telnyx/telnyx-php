<?php

declare(strict_types=1);

namespace Telnyx\Services\Number10dlc\Brand;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Number10dlc\Brand\ExternalVetting\ExternalVettingImportsResponse;
use Telnyx\Number10dlc\Brand\ExternalVetting\ExternalVettingListResponseItem;
use Telnyx\Number10dlc\Brand\ExternalVetting\ExternalVettingOrderResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Number10dlc\Brand\ExternalVettingContract;

final class ExternalVettingService implements ExternalVettingContract
{
    /**
     * @api
     */
    public ExternalVettingRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ExternalVettingRawService($client);
    }

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
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($brandID, requestOptions: $requestOptions);

        return $response->parse();
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
     * @throws APIException
     */
    public function imports(
        string $brandID,
        string $evpID,
        string $vettingID,
        ?string $vettingToken = null,
        ?RequestOptions $requestOptions = null,
    ): ExternalVettingImportsResponse {
        $params = [
            'evpID' => $evpID,
            'vettingID' => $vettingID,
            'vettingToken' => $vettingToken,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->imports($brandID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Order new external vetting for a brand
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
    ): ExternalVettingOrderResponse {
        $params = ['evpID' => $evpID, 'vettingClass' => $vettingClass];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->order($brandID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
