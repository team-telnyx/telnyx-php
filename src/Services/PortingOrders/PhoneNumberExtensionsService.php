<?php

declare(strict_types=1);

namespace Telnyx\Services\PortingOrders;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionCreateParams\ActivationRange;
use Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionCreateParams\ExtensionRange;
use Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionDeleteResponse;
use Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionListParams\Filter;
use Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionListParams\Sort;
use Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionNewResponse;
use Telnyx\PortingOrders\PhoneNumberExtensions\PortingPhoneNumberExtension;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PortingOrders\PhoneNumberExtensionsContract;

/**
 * Endpoints related to porting orders management.
 *
 * @phpstan-import-type ActivationRangeShape from \Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionCreateParams\ActivationRange
 * @phpstan-import-type ExtensionRangeShape from \Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionCreateParams\ExtensionRange
 * @phpstan-import-type FilterShape from \Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionListParams\Filter
 * @phpstan-import-type SortShape from \Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionListParams\Sort
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class PhoneNumberExtensionsService implements PhoneNumberExtensionsContract
{
    /**
     * @api
     */
    public PhoneNumberExtensionsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new PhoneNumberExtensionsRawService($client);
    }

    /**
     * @api
     *
     * Creates a new phone number extension.
     *
     * @param string $portingOrderID Identifies the Porting Order associated with the phone number extension
     * @param list<ActivationRange|ActivationRangeShape> $activationRanges Specifies the activation ranges for this porting phone number extension. The activation range must be within the extension range and should not overlap with other activation ranges.
     * @param ExtensionRange|ExtensionRangeShape $extensionRange
     * @param string $portingPhoneNumberID identifies the porting phone number associated with this porting phone number extension
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $portingOrderID,
        array $activationRanges,
        ExtensionRange|array $extensionRange,
        string $portingPhoneNumberID,
        RequestOptions|array|null $requestOptions = null,
    ): PhoneNumberExtensionNewResponse {
        $params = Util::removeNulls(
            [
                'activationRanges' => $activationRanges,
                'extensionRange' => $extensionRange,
                'portingPhoneNumberID' => $portingPhoneNumberID,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($portingOrderID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns a list of all phone number extensions of a porting order.
     *
     * @param string $portingOrderID Identifies the Porting Order associated with the phone number extensions
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[porting_phone_number_id]
     * @param Sort|SortShape $sort Consolidated sort parameter (deepObject style). Originally: sort[value]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<PortingPhoneNumberExtension>
     *
     * @throws APIException
     */
    public function list(
        string $portingOrderID,
        Filter|array|null $filter = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        Sort|array|null $sort = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            [
                'filter' => $filter,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
                'sort' => $sort,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($portingOrderID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Deletes a phone number extension.
     *
     * @param string $id Identifies the phone number extension to be deleted
     * @param string $portingOrderID Identifies the Porting Order associated with the phone number extension
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        string $portingOrderID,
        RequestOptions|array|null $requestOptions = null,
    ): PhoneNumberExtensionDeleteResponse {
        $params = Util::removeNulls(['portingOrderID' => $portingOrderID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
