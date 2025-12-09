<?php

declare(strict_types=1);

namespace Telnyx\Services\PortingOrders;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationCreateParams;
use Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationListParams;
use Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationListParams\Filter\PortingOrder\Status;
use Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationListParams\Sort\Value;
use Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationListResponse;
use Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PortingOrders\PhoneNumberConfigurationsRawContract;

final class PhoneNumberConfigurationsRawService implements PhoneNumberConfigurationsRawContract
{
    // @phpstan-ignore-next-line
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
     *   phoneNumberConfigurations?: list<array{
     *     portingPhoneNumberID: string, userBundleID: string
     *   }>,
     * }|PhoneNumberConfigurationCreateParams $params
     *
     * @return BaseResponse<PhoneNumberConfigurationNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|PhoneNumberConfigurationCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PhoneNumberConfigurationCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     *     portingOrder?: array{
     *       status?: list<'activation-in-progress'|'cancel-pending'|'cancelled'|'draft'|'exception'|'foc-date-confirmed'|'in-process'|'ported'|'submitted'|Status>,
     *     },
     *     portingPhoneNumber?: list<string>,
     *     userBundleID?: list<string>,
     *   },
     *   page?: array{number?: int, size?: int},
     *   sort?: array{value?: 'created_at'|'-created_at'|Value},
     * }|PhoneNumberConfigurationListParams $params
     *
     * @return BaseResponse<PhoneNumberConfigurationListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|PhoneNumberConfigurationListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PhoneNumberConfigurationListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'porting_orders/phone_number_configurations',
            query: $parsed,
            options: $options,
            convert: PhoneNumberConfigurationListResponse::class,
        );
    }
}
