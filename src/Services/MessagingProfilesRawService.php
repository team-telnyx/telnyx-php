<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\MessagingProfiles\MessagingProfile;
use Telnyx\MessagingProfiles\MessagingProfileCreateParams;
use Telnyx\MessagingProfiles\MessagingProfileCreateParams\WebhookAPIVersion;
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
use Telnyx\ServiceContracts\MessagingProfilesRawContract;
use Telnyx\ShortCode;

final class MessagingProfilesRawService implements MessagingProfilesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a messaging profile
     *
     * @param array{
     *   name: string,
     *   whitelistedDestinations: list<string>,
     *   alphaSender?: string|null,
     *   dailySpendLimit?: string,
     *   dailySpendLimitEnabled?: bool,
     *   enabled?: bool,
     *   mmsFallBackToSMS?: bool,
     *   mmsTranscoding?: bool,
     *   mobileOnly?: bool,
     *   numberPoolSettings?: array{
     *     longCodeWeight: float,
     *     skipUnhealthy: bool,
     *     tollFreeWeight: float,
     *     geomatch?: bool,
     *     stickySender?: bool,
     *   }|NumberPoolSettings|null,
     *   urlShortenerSettings?: array{
     *     domain: string,
     *     prefix?: string,
     *     replaceBlacklistOnly?: bool,
     *     sendWebhooks?: bool,
     *   }|URLShortenerSettings|null,
     *   webhookAPIVersion?: '1'|'2'|'2010-04-01'|WebhookAPIVersion,
     *   webhookFailoverURL?: string|null,
     *   webhookURL?: string|null,
     * }|MessagingProfileCreateParams $params
     *
     * @return BaseResponse<MessagingProfileNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|MessagingProfileCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MessagingProfileCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $messagingProfileID The id of the messaging profile to retrieve
     *
     * @return BaseResponse<MessagingProfileGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $messagingProfileID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * @param string $messagingProfileID The id of the messaging profile to retrieve
     * @param array{
     *   alphaSender?: string|null,
     *   dailySpendLimit?: string,
     *   dailySpendLimitEnabled?: bool,
     *   enabled?: bool,
     *   mmsFallBackToSMS?: bool,
     *   mmsTranscoding?: bool,
     *   mobileOnly?: bool,
     *   name?: string,
     *   numberPoolSettings?: array{
     *     longCodeWeight: float,
     *     skipUnhealthy: bool,
     *     tollFreeWeight: float,
     *     geomatch?: bool,
     *     stickySender?: bool,
     *   }|NumberPoolSettings|null,
     *   urlShortenerSettings?: array{
     *     domain: string,
     *     prefix?: string,
     *     replaceBlacklistOnly?: bool,
     *     sendWebhooks?: bool,
     *   }|URLShortenerSettings|null,
     *   v1Secret?: string,
     *   webhookAPIVersion?: '1'|'2'|'2010-04-01'|MessagingProfileUpdateParams\WebhookAPIVersion,
     *   webhookFailoverURL?: string|null,
     *   webhookURL?: string|null,
     *   whitelistedDestinations?: list<string>,
     * }|MessagingProfileUpdateParams $params
     *
     * @return BaseResponse<MessagingProfileUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $messagingProfileID,
        array|MessagingProfileUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MessagingProfileUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @return BaseResponse<DefaultPagination<MessagingProfile>>
     *
     * @throws APIException
     */
    public function list(
        array|MessagingProfileListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MessagingProfileListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $messagingProfileID The id of the messaging profile to retrieve
     *
     * @return BaseResponse<MessagingProfileDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $messagingProfileID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * @param string $messagingProfileID The id of the messaging profile to retrieve
     * @param array{
     *   page?: array{number?: int, size?: int}
     * }|MessagingProfileListPhoneNumbersParams $params
     *
     * @return BaseResponse<DefaultPagination<PhoneNumberWithMessagingSettings>>
     *
     * @throws APIException
     */
    public function listPhoneNumbers(
        string $messagingProfileID,
        array|MessagingProfileListPhoneNumbersParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MessagingProfileListPhoneNumbersParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $messagingProfileID The id of the messaging profile to retrieve
     * @param array{
     *   page?: array{number?: int, size?: int}
     * }|MessagingProfileListShortCodesParams $params
     *
     * @return BaseResponse<DefaultPagination<ShortCode>>
     *
     * @throws APIException
     */
    public function listShortCodes(
        string $messagingProfileID,
        array|MessagingProfileListShortCodesParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MessagingProfileListShortCodesParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
