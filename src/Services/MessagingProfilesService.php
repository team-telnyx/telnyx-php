<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\MessagingProfiles\MessagingProfileCreateParams;
use Telnyx\MessagingProfiles\MessagingProfileDeleteResponse;
use Telnyx\MessagingProfiles\MessagingProfileGetResponse;
use Telnyx\MessagingProfiles\MessagingProfileListParams;
use Telnyx\MessagingProfiles\MessagingProfileListPhoneNumbersParams;
use Telnyx\MessagingProfiles\MessagingProfileListPhoneNumbersResponse;
use Telnyx\MessagingProfiles\MessagingProfileListResponse;
use Telnyx\MessagingProfiles\MessagingProfileListShortCodesParams;
use Telnyx\MessagingProfiles\MessagingProfileListShortCodesResponse;
use Telnyx\MessagingProfiles\MessagingProfileNewResponse;
use Telnyx\MessagingProfiles\MessagingProfileUpdateParams;
use Telnyx\MessagingProfiles\MessagingProfileUpdateResponse;
use Telnyx\MessagingProfiles\NumberPoolSettings;
use Telnyx\MessagingProfiles\URLShortenerSettings;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MessagingProfilesContract;
use Telnyx\Services\MessagingProfiles\AutorespConfigsService;

final class MessagingProfilesService implements MessagingProfilesContract
{
    /**
     * @api
     */
    public AutorespConfigsService $autorespConfigs;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->autorespConfigs = new AutorespConfigsService($client);
    }

    /**
     * @api
     *
     * Create a messaging profile
     *
     * @param array{
     *   name: string,
     *   whitelisted_destinations: list<string>,
     *   alpha_sender?: string|null,
     *   daily_spend_limit?: string,
     *   daily_spend_limit_enabled?: bool,
     *   enabled?: bool,
     *   mms_fall_back_to_sms?: bool,
     *   mms_transcoding?: bool,
     *   mobile_only?: bool,
     *   number_pool_settings?: array{
     *     long_code_weight: float,
     *     skip_unhealthy: bool,
     *     toll_free_weight: float,
     *     geomatch?: bool,
     *     sticky_sender?: bool,
     *   }|NumberPoolSettings|null,
     *   url_shortener_settings?: array{
     *     domain: string,
     *     prefix?: string,
     *     replace_blacklist_only?: bool,
     *     send_webhooks?: bool,
     *   }|URLShortenerSettings|null,
     *   webhook_api_version?: '1'|'2'|'2010-04-01',
     *   webhook_failover_url?: string|null,
     *   webhook_url?: string|null,
     * }|MessagingProfileCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|MessagingProfileCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): MessagingProfileNewResponse {
        [$parsed, $options] = MessagingProfileCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'messaging_profiles',
            body: (object) $parsed,
            options: $options,
            convert: MessagingProfileNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a messaging profile
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): MessagingProfileGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['messaging_profiles/%1$s', $id],
            options: $requestOptions,
            convert: MessagingProfileGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Update a messaging profile
     *
     * @param array{
     *   alpha_sender?: string|null,
     *   daily_spend_limit?: string,
     *   daily_spend_limit_enabled?: bool,
     *   enabled?: bool,
     *   mms_fall_back_to_sms?: bool,
     *   mms_transcoding?: bool,
     *   mobile_only?: bool,
     *   name?: string,
     *   number_pool_settings?: array{
     *     long_code_weight: float,
     *     skip_unhealthy: bool,
     *     toll_free_weight: float,
     *     geomatch?: bool,
     *     sticky_sender?: bool,
     *   }|NumberPoolSettings|null,
     *   url_shortener_settings?: array{
     *     domain: string,
     *     prefix?: string,
     *     replace_blacklist_only?: bool,
     *     send_webhooks?: bool,
     *   }|URLShortenerSettings|null,
     *   v1_secret?: string,
     *   webhook_api_version?: '1'|'2'|'2010-04-01',
     *   webhook_failover_url?: string|null,
     *   webhook_url?: string|null,
     *   whitelisted_destinations?: list<string>,
     * }|MessagingProfileUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|MessagingProfileUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): MessagingProfileUpdateResponse {
        [$parsed, $options] = MessagingProfileUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['messaging_profiles/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: MessagingProfileUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * List messaging profiles
     *
     * @param array{
     *   filter?: array{name?: string}, page?: array{number?: int, size?: int}
     * }|MessagingProfileListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|MessagingProfileListParams $params,
        ?RequestOptions $requestOptions = null,
    ): MessagingProfileListResponse {
        [$parsed, $options] = MessagingProfileListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'messaging_profiles',
            query: $parsed,
            options: $options,
            convert: MessagingProfileListResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete a messaging profile
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): MessagingProfileDeleteResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['messaging_profiles/%1$s', $id],
            options: $requestOptions,
            convert: MessagingProfileDeleteResponse::class,
        );
    }

    /**
     * @api
     *
     * List phone numbers associated with a messaging profile
     *
     * @param array{
     *   page?: array{number?: int, size?: int}
     * }|MessagingProfileListPhoneNumbersParams $params
     *
     * @throws APIException
     */
    public function listPhoneNumbers(
        string $id,
        array|MessagingProfileListPhoneNumbersParams $params,
        ?RequestOptions $requestOptions = null,
    ): MessagingProfileListPhoneNumbersResponse {
        [$parsed, $options] = MessagingProfileListPhoneNumbersParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['messaging_profiles/%1$s/phone_numbers', $id],
            query: $parsed,
            options: $options,
            convert: MessagingProfileListPhoneNumbersResponse::class,
        );
    }

    /**
     * @api
     *
     * List short codes associated with a messaging profile
     *
     * @param array{
     *   page?: array{number?: int, size?: int}
     * }|MessagingProfileListShortCodesParams $params
     *
     * @throws APIException
     */
    public function listShortCodes(
        string $id,
        array|MessagingProfileListShortCodesParams $params,
        ?RequestOptions $requestOptions = null,
    ): MessagingProfileListShortCodesResponse {
        [$parsed, $options] = MessagingProfileListShortCodesParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['messaging_profiles/%1$s/short_codes', $id],
            query: $parsed,
            options: $options,
            convert: MessagingProfileListShortCodesResponse::class,
        );
    }
}
