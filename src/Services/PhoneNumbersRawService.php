<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultPagination;
use Telnyx\PhoneNumbers\PhoneNumberDeleteResponse;
use Telnyx\PhoneNumbers\PhoneNumberDetailed;
use Telnyx\PhoneNumbers\PhoneNumberGetResponse;
use Telnyx\PhoneNumbers\PhoneNumberListParams;
use Telnyx\PhoneNumbers\PhoneNumberListParams\Filter\NumberType\Eq;
use Telnyx\PhoneNumbers\PhoneNumberListParams\Filter\Source;
use Telnyx\PhoneNumbers\PhoneNumberListParams\Filter\Status;
use Telnyx\PhoneNumbers\PhoneNumberListParams\Filter\VoiceUsagePaymentMethod;
use Telnyx\PhoneNumbers\PhoneNumberListParams\Filter\WithoutTags;
use Telnyx\PhoneNumbers\PhoneNumberListParams\HandleMessagingProfileError;
use Telnyx\PhoneNumbers\PhoneNumberListParams\Sort;
use Telnyx\PhoneNumbers\PhoneNumberSlimListParams;
use Telnyx\PhoneNumbers\PhoneNumberSlimListResponse;
use Telnyx\PhoneNumbers\PhoneNumberUpdateParams;
use Telnyx\PhoneNumbers\PhoneNumberUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PhoneNumbersRawContract;

final class PhoneNumbersRawService implements PhoneNumbersRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve a phone number
     *
     * @param string $id identifies the resource
     *
     * @return BaseResponse<PhoneNumberGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['phone_numbers/%1$s', $id],
            options: $requestOptions,
            convert: PhoneNumberGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Update a phone number
     *
     * @param string $phoneNumberID identifies the resource
     * @param array{
     *   billingGroupID?: string,
     *   connectionID?: string,
     *   customerReference?: string,
     *   externalPin?: string,
     *   hdVoiceEnabled?: bool,
     *   tags?: list<string>,
     * }|PhoneNumberUpdateParams $params
     *
     * @return BaseResponse<PhoneNumberUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $phoneNumberID,
        array|PhoneNumberUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PhoneNumberUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['phone_numbers/%1$s', $phoneNumberID],
            body: (object) $parsed,
            options: $options,
            convert: PhoneNumberUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * List phone numbers
     *
     * @param array{
     *   filter?: array{
     *     billingGroupID?: string,
     *     connectionID?: string,
     *     countryISOAlpha2?: string|list<string>,
     *     customerReference?: string,
     *     emergencyAddressID?: string,
     *     numberType?: array{
     *       eq?: 'local'|'national'|'toll_free'|'mobile'|'shared_cost'|Eq
     *     },
     *     phoneNumber?: string,
     *     source?: 'ported'|'purchased'|Source,
     *     status?: 'purchase-pending'|'purchase-failed'|'port-pending'|'active'|'deleted'|'port-failed'|'emergency-only'|'ported-out'|'port-out-pending'|Status,
     *     tag?: string,
     *     voiceConnectionName?: array{
     *       contains?: string, endsWith?: string, eq?: string, startsWith?: string
     *     },
     *     voiceUsagePaymentMethod?: 'pay-per-minute'|'channel'|VoiceUsagePaymentMethod,
     *     withoutTags?: 'true'|'false'|WithoutTags,
     *   },
     *   handleMessagingProfileError?: 'true'|'false'|HandleMessagingProfileError,
     *   page?: array{number?: int, size?: int},
     *   sort?: 'purchased_at'|'phone_number'|'connection_name'|'usage_payment_method'|Sort,
     * }|PhoneNumberListParams $params
     *
     * @return BaseResponse<DefaultPagination<PhoneNumberDetailed>>
     *
     * @throws APIException
     */
    public function list(
        array|PhoneNumberListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = PhoneNumberListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'phone_numbers',
            query: Util::array_transform_keys(
                $parsed,
                ['handleMessagingProfileError' => 'handle_messaging_profile_error'],
            ),
            options: $options,
            convert: PhoneNumberDetailed::class,
            page: DefaultPagination::class,
        );
    }

    /**
     * @api
     *
     * Delete a phone number
     *
     * @param string $id identifies the resource
     *
     * @return BaseResponse<PhoneNumberDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['phone_numbers/%1$s', $id],
            options: $requestOptions,
            convert: PhoneNumberDeleteResponse::class,
        );
    }

    /**
     * @api
     *
     * List phone numbers, This endpoint is a lighter version of the /phone_numbers endpoint having higher performance and rate limit.
     *
     * @param array{
     *   filter?: array{
     *     billingGroupID?: string,
     *     connectionID?: string,
     *     countryISOAlpha2?: string|list<string>,
     *     customerReference?: string,
     *     emergencyAddressID?: string,
     *     numberType?: array{
     *       eq?: 'local'|'national'|'toll_free'|'mobile'|'shared_cost'|PhoneNumberSlimListParams\Filter\NumberType\Eq,
     *     },
     *     phoneNumber?: string,
     *     source?: 'ported'|'purchased'|PhoneNumberSlimListParams\Filter\Source,
     *     status?: 'purchase-pending'|'purchase-failed'|'port_pending'|'active'|'deleted'|'port-failed'|'emergency-only'|'ported-out'|'port-out-pending'|PhoneNumberSlimListParams\Filter\Status,
     *     tag?: string,
     *     voiceConnectionName?: array{
     *       contains?: string, endsWith?: string, eq?: string, startsWith?: string
     *     },
     *     voiceUsagePaymentMethod?: 'pay-per-minute'|'channel'|PhoneNumberSlimListParams\Filter\VoiceUsagePaymentMethod,
     *   },
     *   includeConnection?: bool,
     *   includeTags?: bool,
     *   page?: array{number?: int, size?: int},
     *   sort?: 'purchased_at'|'phone_number'|'connection_name'|'usage_payment_method'|PhoneNumberSlimListParams\Sort,
     * }|PhoneNumberSlimListParams $params
     *
     * @return BaseResponse<DefaultPagination<PhoneNumberSlimListResponse>>
     *
     * @throws APIException
     */
    public function slimList(
        array|PhoneNumberSlimListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PhoneNumberSlimListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'phone_numbers/slim',
            query: Util::array_transform_keys(
                $parsed,
                [
                    'includeConnection' => 'include_connection',
                    'includeTags' => 'include_tags',
                ],
            ),
            options: $options,
            convert: PhoneNumberSlimListResponse::class,
            page: DefaultPagination::class,
        );
    }
}
