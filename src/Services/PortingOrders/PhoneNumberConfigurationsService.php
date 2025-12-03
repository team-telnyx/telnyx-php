<?php

declare(strict_types=1);

namespace Telnyx\Services\PortingOrders;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationCreateParams;
use Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationListParams;
use Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationListResponse;
use Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PortingOrders\PhoneNumberConfigurationsContract;

final class PhoneNumberConfigurationsService implements PhoneNumberConfigurationsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a list of phone number configurations.
     *
     * @param array{
     *   phone_number_configurations?: list<array{
     *     porting_phone_number_id: string, user_bundle_id: string
     *   }>,
     * }|PhoneNumberConfigurationCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|PhoneNumberConfigurationCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberConfigurationNewResponse {
        [$parsed, $options] = PhoneNumberConfigurationCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'porting_orders/phone_number_configurations',
            body: (object) $parsed,
            options: $options,
            convert: PhoneNumberConfigurationNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns a list of phone number configurations paginated.
     *
     * @param array{
     *   filter?: array{
     *     porting_order?: array{
     *       status?: list<'activation-in-progress'|'cancel-pending'|'cancelled'|'draft'|'exception'|'foc-date-confirmed'|'in-process'|'ported'|'submitted'>,
     *     },
     *     porting_phone_number?: list<string>,
     *     user_bundle_id?: list<string>,
     *   },
     *   page?: array{number?: int, size?: int},
     *   sort?: array{value?: 'created_at'|'-created_at'},
     * }|PhoneNumberConfigurationListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|PhoneNumberConfigurationListParams $params,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberConfigurationListResponse {
        [$parsed, $options] = PhoneNumberConfigurationListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'porting_orders/phone_number_configurations',
            query: $parsed,
            options: $options,
            convert: PhoneNumberConfigurationListResponse::class,
        );
    }
}
