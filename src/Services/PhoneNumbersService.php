<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\PhoneNumbers\PhoneNumberDeleteResponse;
use Telnyx\PhoneNumbers\PhoneNumberGetResponse;
use Telnyx\PhoneNumbers\PhoneNumberListParams;
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
        // @phpstan-ignore-next-line;
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
     * @param array{
     *   billing_group_id?: string,
     *   connection_id?: string,
     *   customer_reference?: string,
     *   external_pin?: string,
     *   hd_voice_enabled?: bool,
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

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['phone_numbers/%1$s', $id],
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
     *     billing_group_id?: string,
     *     connection_id?: string,
     *     country_iso_alpha2?: string|list<string>,
     *     customer_reference?: string,
     *     emergency_address_id?: string,
     *     number_type?: array{
     *       eq?: "local"|"national"|"toll_free"|"mobile"|"shared_cost"
     *     },
     *     phone_number?: string,
     *     source?: "ported"|"purchased",
     *     status?: "purchase-pending"|"purchase-failed"|"port-pending"|"active"|"deleted"|"port-failed"|"emergency-only"|"ported-out"|"port-out-pending",
     *     tag?: string,
     *     'voice.connection_name'?: array{
     *       contains?: string, ends_with?: string, eq?: string, starts_with?: string
     *     },
     *     'voice.usage_payment_method'?: "pay-per-minute"|"channel",
     *     without_tags?: "true"|"false",
     *   },
     *   page?: array{number?: int, size?: int},
     *   sort?: "purchased_at"|"phone_number"|"connection_name"|"usage_payment_method",
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

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'phone_numbers',
            query: $parsed,
            options: $options,
            convert: PhoneNumberListResponse::class,
        );
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
        // @phpstan-ignore-next-line;
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
     *     billing_group_id?: string,
     *     connection_id?: string,
     *     country_iso_alpha2?: string|list<string>,
     *     customer_reference?: string,
     *     emergency_address_id?: string,
     *     number_type?: array{
     *       eq?: "local"|"national"|"toll_free"|"mobile"|"shared_cost"
     *     },
     *     phone_number?: string,
     *     source?: "ported"|"purchased",
     *     status?: "purchase-pending"|"purchase-failed"|"port_pending"|"active"|"deleted"|"port-failed"|"emergency-only"|"ported-out"|"port-out-pending",
     *     tag?: string,
     *     'voice.connection_name'?: array{
     *       contains?: string, ends_with?: string, eq?: string, starts_with?: string
     *     },
     *     'voice.usage_payment_method'?: "pay-per-minute"|"channel",
     *   },
     *   include_connection?: bool,
     *   include_tags?: bool,
     *   page?: array{number?: int, size?: int},
     *   sort?: "purchased_at"|"phone_number"|"connection_name"|"usage_payment_method",
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

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'phone_numbers/slim',
            query: $parsed,
            options: $options,
            convert: PhoneNumberSlimListResponse::class,
        );
    }
}
