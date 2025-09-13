<?php

declare(strict_types=1);

namespace Telnyx\Services\PortingOrders;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionCreateParams;
use Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionCreateParams\ActivationRange;
use Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionCreateParams\ExtensionRange;
use Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionDeleteParams;
use Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionDeleteResponse;
use Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionListParams;
use Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionListParams\Filter;
use Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionListParams\Page;
use Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionListParams\Sort;
use Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionListResponse;
use Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PortingOrders\PhoneNumberExtensionsContract;

use const Telnyx\Core\OMIT as omit;

final class PhoneNumberExtensionsService implements PhoneNumberExtensionsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a new phone number extension.
     *
     * @param list<ActivationRange> $activationRanges Specifies the activation ranges for this porting phone number extension. The activation range must be within the extension range and should not overlap with other activation ranges.
     * @param ExtensionRange $extensionRange
     * @param string $portingPhoneNumberID identifies the porting phone number associated with this porting phone number extension
     *
     * @return PhoneNumberExtensionNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function create(
        string $portingOrderID,
        $activationRanges,
        $extensionRange,
        $portingPhoneNumberID,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberExtensionNewResponse {
        $params = [
            'activationRanges' => $activationRanges,
            'extensionRange' => $extensionRange,
            'portingPhoneNumberID' => $portingPhoneNumberID,
        ];

        return $this->createRaw($portingOrderID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return PhoneNumberExtensionNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function createRaw(
        string $portingOrderID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberExtensionNewResponse {
        [$parsed, $options] = PhoneNumberExtensionCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['porting_orders/%1$s/phone_number_extensions', $portingOrderID],
            body: (object) $parsed,
            options: $options,
            convert: PhoneNumberExtensionNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns a list of all phone number extensions of a porting order.
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[porting_phone_number_id]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param Sort $sort Consolidated sort parameter (deepObject style). Originally: sort[value]
     *
     * @return PhoneNumberExtensionListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        string $portingOrderID,
        $filter = omit,
        $page = omit,
        $sort = omit,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberExtensionListResponse {
        $params = ['filter' => $filter, 'page' => $page, 'sort' => $sort];

        return $this->listRaw($portingOrderID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return PhoneNumberExtensionListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        string $portingOrderID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberExtensionListResponse {
        [$parsed, $options] = PhoneNumberExtensionListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['porting_orders/%1$s/phone_number_extensions', $portingOrderID],
            query: $parsed,
            options: $options,
            convert: PhoneNumberExtensionListResponse::class,
        );
    }

    /**
     * @api
     *
     * Deletes a phone number extension.
     *
     * @param string $portingOrderID
     *
     * @return PhoneNumberExtensionDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        $portingOrderID,
        ?RequestOptions $requestOptions = null
    ): PhoneNumberExtensionDeleteResponse {
        $params = ['portingOrderID' => $portingOrderID];

        return $this->deleteRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return PhoneNumberExtensionDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): PhoneNumberExtensionDeleteResponse {
        [$parsed, $options] = PhoneNumberExtensionDeleteParams::parseRequest(
            $params,
            $requestOptions
        );
        $portingOrderID = $parsed['portingOrderID'];
        unset($parsed['portingOrderID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: [
                'porting_orders/%1$s/phone_number_extensions/%2$s', $portingOrderID, $id,
            ],
            options: $options,
            convert: PhoneNumberExtensionDeleteResponse::class,
        );
    }
}
