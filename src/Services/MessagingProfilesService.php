<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\MessagingProfiles\MessagingProfile;
use Telnyx\MessagingProfiles\MessagingProfileCreateParams;
use Telnyx\MessagingProfiles\MessagingProfileDeleteResponse;
use Telnyx\MessagingProfiles\MessagingProfileGetResponse;
use Telnyx\MessagingProfiles\MessagingProfileListParams;
use Telnyx\MessagingProfiles\MessagingProfileListPhoneNumbersParams;
use Telnyx\MessagingProfiles\MessagingProfileListShortCodesParams;
use Telnyx\MessagingProfiles\MessagingProfileNewResponse;
use Telnyx\MessagingProfiles\MessagingProfileUpdateParams;
use Telnyx\MessagingProfiles\MessagingProfileUpdateResponse;
use Telnyx\MessagingProfiles\NumberPoolSettings;
use Telnyx\MessagingProfiles\URLShortenerSettings;
use Telnyx\PhoneNumberWithMessagingSettings;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MessagingProfilesContract;
use Telnyx\Services\MessagingProfiles\AutorespConfigsService;
use Telnyx\ShortCode;

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
        string $messagingProfileID,
        ?RequestOptions $requestOptions = null
    ): MessagingProfileGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['messaging_profiles/%1$s', $messagingProfileID],
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
        string $messagingProfileID,
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
            path: ['messaging_profiles/%1$s', $messagingProfileID],
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
     * @return DefaultPagination<MessagingProfile>
     *
     * @throws APIException
     */
    public function list(
        array|MessagingProfileListParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination {
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
            convert: MessagingProfile::class,
            page: DefaultPagination::class,
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
        string $messagingProfileID,
        ?RequestOptions $requestOptions = null
    ): MessagingProfileDeleteResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['messaging_profiles/%1$s', $messagingProfileID],
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
     * @return DefaultPagination<PhoneNumberWithMessagingSettings>
     *
     * @throws APIException
     */
    public function listPhoneNumbers(
        string $messagingProfileID,
        array|MessagingProfileListPhoneNumbersParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination {
        [$parsed, $options] = MessagingProfileListPhoneNumbersParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['messaging_profiles/%1$s/phone_numbers', $messagingProfileID],
            query: $parsed,
            options: $options,
            convert: PhoneNumberWithMessagingSettings::class,
            page: DefaultPagination::class,
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
     * @return DefaultPagination<ShortCode>
     *
     * @throws APIException
     */
    public function listShortCodes(
        string $messagingProfileID,
        array|MessagingProfileListShortCodesParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination {
        [$parsed, $options] = MessagingProfileListShortCodesParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['messaging_profiles/%1$s/short_codes', $messagingProfileID],
            query: $parsed,
            options: $options,
            convert: ShortCode::class,
            page: DefaultPagination::class,
        );
    }
}
