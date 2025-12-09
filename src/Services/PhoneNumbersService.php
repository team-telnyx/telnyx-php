<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\PhoneNumbers\PhoneNumberDeleteResponse;
use Telnyx\PhoneNumbers\PhoneNumberGetResponse;
use Telnyx\PhoneNumbers\PhoneNumberListParams;
use Telnyx\PhoneNumbers\PhoneNumberListParams\Filter\NumberType\Eq;
use Telnyx\PhoneNumbers\PhoneNumberListParams\Filter\Source;
use Telnyx\PhoneNumbers\PhoneNumberListParams\Filter\Status;
use Telnyx\PhoneNumbers\PhoneNumberListParams\Filter\VoiceUsagePaymentMethod;
use Telnyx\PhoneNumbers\PhoneNumberListParams\Filter\WithoutTags;
use Telnyx\PhoneNumbers\PhoneNumberListParams\Sort;
use Telnyx\PhoneNumbers\PhoneNumberListResponse;
use Telnyx\PhoneNumbers\PhoneNumberSlimListParams;
use Telnyx\PhoneNumbers\PhoneNumberSlimListResponse;
use Telnyx\PhoneNumbers\PhoneNumberUpdateParams;
use Telnyx\PhoneNumbers\PhoneNumberUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PhoneNumbersContract;
use Telnyx\Services\PhoneNumbers\ActionsService;
use Telnyx\Services\PhoneNumbers\CsvDownloadsService;
use Telnyx\Services\PhoneNumbers\JobsService;
use Telnyx\Services\PhoneNumbers\MessagingService;
use Telnyx\Services\PhoneNumbers\VoicemailService;
use Telnyx\Services\PhoneNumbers\VoiceService;

final class PhoneNumbersService implements PhoneNumbersContract
{
    /**
     * @api
     */
    public ActionsService $actions;

    /**
     * @api
     */
    public CsvDownloadsService $csvDownloads;

    /**
     * @api
     */
    public JobsService $jobs;

    /**
     * @api
     */
    public MessagingService $messaging;

    /**
     * @api
     */
    public VoiceService $voice;

    /**
     * @api
     */
    public VoicemailService $voicemail;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->actions = new ActionsService($client);
        $this->csvDownloads = new CsvDownloadsService($client);
        $this->jobs = new JobsService($client);
        $this->messaging = new MessagingService($client);
        $this->voice = new VoiceService($client);
        $this->voicemail = new VoicemailService($client);
    }

    /**
     * @api
     *
     * Retrieve a phone number
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): PhoneNumberGetResponse {
        /** @var BaseResponse<PhoneNumberGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['phone_numbers/%1$s', $id],
            options: $requestOptions,
            convert: PhoneNumberGetResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Update a phone number
     *
     * @param array{
     *   billingGroupID?: string,
     *   connectionID?: string,
     *   customerReference?: string,
     *   externalPin?: string,
     *   hdVoiceEnabled?: bool,
     *   tags?: list<string>,
     * }|PhoneNumberUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|PhoneNumberUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberUpdateResponse {
        [$parsed, $options] = PhoneNumberUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<PhoneNumberUpdateResponse> */
        $response = $this->client->request(
            method: 'patch',
            path: ['phone_numbers/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: PhoneNumberUpdateResponse::class,
        );

        return $response->parse();
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
     *   page?: array{number?: int, size?: int},
     *   sort?: 'purchased_at'|'phone_number'|'connection_name'|'usage_payment_method'|Sort,
     * }|PhoneNumberListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|PhoneNumberListParams $params,
        ?RequestOptions $requestOptions = null
    ): PhoneNumberListResponse {
        [$parsed, $options] = PhoneNumberListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<PhoneNumberListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'phone_numbers',
            query: $parsed,
            options: $options,
            convert: PhoneNumberListResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a phone number
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): PhoneNumberDeleteResponse {
        /** @var BaseResponse<PhoneNumberDeleteResponse> */
        $response = $this->client->request(
            method: 'delete',
            path: ['phone_numbers/%1$s', $id],
            options: $requestOptions,
            convert: PhoneNumberDeleteResponse::class,
        );

        return $response->parse();
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
     * @throws APIException
     */
    public function slimList(
        array|PhoneNumberSlimListParams $params,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberSlimListResponse {
        [$parsed, $options] = PhoneNumberSlimListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<PhoneNumberSlimListResponse> */
        $response = $this->client->request(
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
        );

        return $response->parse();
    }
}
