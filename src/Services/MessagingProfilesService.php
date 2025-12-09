<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\MessagingProfiles\MessagingProfileCreateParams;
use Telnyx\MessagingProfiles\MessagingProfileCreateParams\WebhookAPIVersion;
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

        /** @var BaseResponse<MessagingProfileNewResponse> */
        $response = $this->client->request(
            method: 'post',
            path: 'messaging_profiles',
            body: (object) $parsed,
            options: $options,
            convert: MessagingProfileNewResponse::class,
        );

        return $response->parse();
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
        /** @var BaseResponse<MessagingProfileGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['messaging_profiles/%1$s', $id],
            options: $requestOptions,
            convert: MessagingProfileGetResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Update a messaging profile
     *
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

        /** @var BaseResponse<MessagingProfileUpdateResponse> */
        $response = $this->client->request(
            method: 'patch',
            path: ['messaging_profiles/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: MessagingProfileUpdateResponse::class,
        );

        return $response->parse();
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

        /** @var BaseResponse<MessagingProfileListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'messaging_profiles',
            query: $parsed,
            options: $options,
            convert: MessagingProfileListResponse::class,
        );

        return $response->parse();
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
        /** @var BaseResponse<MessagingProfileDeleteResponse> */
        $response = $this->client->request(
            method: 'delete',
            path: ['messaging_profiles/%1$s', $id],
            options: $requestOptions,
            convert: MessagingProfileDeleteResponse::class,
        );

        return $response->parse();
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

        /** @var BaseResponse<MessagingProfileListPhoneNumbersResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['messaging_profiles/%1$s/phone_numbers', $id],
            query: $parsed,
            options: $options,
            convert: MessagingProfileListPhoneNumbersResponse::class,
        );

        return $response->parse();
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

        /** @var BaseResponse<MessagingProfileListShortCodesResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['messaging_profiles/%1$s/short_codes', $id],
            query: $parsed,
            options: $options,
            convert: MessagingProfileListShortCodesResponse::class,
        );

        return $response->parse();
    }
}
