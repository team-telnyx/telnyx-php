<?php

declare(strict_types=1);

namespace Telnyx\Services\PortingOrders;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionCreateParams;
use Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionCreateParams\ActivationRange;
use Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionCreateParams\ExtensionRange;
use Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionDeleteParams;
use Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionDeleteResponse;
use Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionListParams;
use Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionListParams\Filter;
use Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionListParams\Sort;
use Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionNewResponse;
use Telnyx\PortingOrders\PhoneNumberExtensions\PortingPhoneNumberExtension;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PortingOrders\PhoneNumberExtensionsRawContract;

/**
 * Endpoints related to porting orders management.
 *
 * @phpstan-import-type ActivationRangeShape from \Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionCreateParams\ActivationRange
 * @phpstan-import-type ExtensionRangeShape from \Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionCreateParams\ExtensionRange
 * @phpstan-import-type FilterShape from \Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionListParams\Filter
 * @phpstan-import-type SortShape from \Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionListParams\Sort
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class PhoneNumberExtensionsRawService implements PhoneNumberExtensionsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a new phone number extension.
     *
     * @param string $portingOrderID Identifies the Porting Order associated with the phone number extension
     * @param array{
     *   activationRanges: list<ActivationRange|ActivationRangeShape>,
     *   extensionRange: ExtensionRange|ExtensionRangeShape,
     *   portingPhoneNumberID: string,
     * }|PhoneNumberExtensionCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PhoneNumberExtensionNewResponse>
     *
     * @throws APIException
     */
    public function create(
        string $portingOrderID,
        array|PhoneNumberExtensionCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PhoneNumberExtensionCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $portingOrderID Identifies the Porting Order associated with the phone number extensions
     * @param array{
     *   filter?: Filter|FilterShape,
     *   pageNumber?: int,
     *   pageSize?: int,
     *   sort?: Sort|SortShape,
     * }|PhoneNumberExtensionListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<PortingPhoneNumberExtension>>
     *
     * @throws APIException
     */
    public function list(
        string $portingOrderID,
        array|PhoneNumberExtensionListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PhoneNumberExtensionListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['porting_orders/%1$s/phone_number_extensions', $portingOrderID],
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
            options: $options,
            convert: PortingPhoneNumberExtension::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Deletes a phone number extension.
     *
     * @param string $id Identifies the phone number extension to be deleted
     * @param array{portingOrderID: string}|PhoneNumberExtensionDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PhoneNumberExtensionDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        array|PhoneNumberExtensionDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PhoneNumberExtensionDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $portingOrderID = $parsed['portingOrderID'];
        unset($parsed['portingOrderID']);

        // @phpstan-ignore-next-line return.type
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
