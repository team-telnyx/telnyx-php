<?php

declare(strict_types=1);

namespace Telnyx\Services\PortingOrders;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultPagination;
use Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionDeleteResponse;
use Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionListParams\Sort\Value;
use Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionNewResponse;
use Telnyx\PortingOrders\PhoneNumberExtensions\PortingPhoneNumberExtension;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PortingOrders\PhoneNumberExtensionsContract;

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
     * @param list<array{
     *   endAt: int, startAt: int
     * }> $activationRanges Specifies the activation ranges for this porting phone number extension. The activation range must be within the extension range and should not overlap with other activation ranges.
     * @param array{endAt: int, startAt: int} $extensionRange
     * @param string $portingPhoneNumberID identifies the porting phone number associated with this porting phone number extension
     *
     * @throws APIException
     */
    public function create(
        string $portingOrderID,
        array $activationRanges,
        array $extensionRange,
        string $portingPhoneNumberID,
        ?RequestOptions $requestOptions = null,
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
     * @param array{
     *   portingPhoneNumberID?: string
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[porting_phone_number_id]
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param array{
     *   value?: '-created_at'|'created_at'|Value
     * } $sort Consolidated sort parameter (deepObject style). Originally: sort[value]
     *
     * @return DefaultPagination<PortingPhoneNumberExtension>
     *
     * @throws APIException
     */
    public function list(
        string $portingOrderID,
        ?array $filter = null,
        ?array $page = null,
        ?array $sort = null,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination {
        $params = Util::removeNulls(
            ['filter' => $filter, 'page' => $page, 'sort' => $sort]
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
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        string $portingOrderID,
        ?RequestOptions $requestOptions = null
    ): PhoneNumberExtensionDeleteResponse {
        $params = Util::removeNulls(['portingOrderID' => $portingOrderID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
