<?php

declare(strict_types=1);

namespace Telnyx\Services\PortingOrders;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationListParams\Filter\PortingOrder\Status;
use Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationListParams\Sort\Value;
use Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationListResponse;
use Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PortingOrders\PhoneNumberConfigurationsContract;

final class PhoneNumberConfigurationsService implements PhoneNumberConfigurationsContract
{
    /**
     * @api
     */
    public PhoneNumberConfigurationsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new PhoneNumberConfigurationsRawService($client);
    }

    /**
     * @api
     *
     * Creates a list of phone number configurations.
     *
     * @param list<array{
     *   portingPhoneNumberID: string, userBundleID: string
     * }> $phoneNumberConfigurations
     *
     * @throws APIException
     */
    public function create(
        ?array $phoneNumberConfigurations = null,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberConfigurationNewResponse {
        $params = ['phoneNumberConfigurations' => $phoneNumberConfigurations];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns a list of phone number configurations paginated.
     *
     * @param array{
     *   portingOrder?: array{
     *     status?: list<'activation-in-progress'|'cancel-pending'|'cancelled'|'draft'|'exception'|'foc-date-confirmed'|'in-process'|'ported'|'submitted'|Status>,
     *   },
     *   portingPhoneNumber?: list<string>,
     *   userBundleID?: list<string>,
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[porting_order.status][in][], filter[porting_phone_number][in][], filter[user_bundle_id][in][]
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param array{
     *   value?: 'created_at'|'-created_at'|Value
     * } $sort Consolidated sort parameter (deepObject style). Originally: sort[value]
     *
     * @return DefaultPagination<PhoneNumberConfigurationListResponse>
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?array $page = null,
        ?array $sort = null,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination {
        $params = ['filter' => $filter, 'page' => $page, 'sort' => $sort];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
