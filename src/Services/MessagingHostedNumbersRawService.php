<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\MessagingHostedNumbers\MessagingHostedNumberDeleteResponse;
use Telnyx\MessagingHostedNumbers\MessagingHostedNumberGetResponse;
use Telnyx\MessagingHostedNumbers\MessagingHostedNumberListParams;
use Telnyx\MessagingHostedNumbers\MessagingHostedNumberListParams\SortPhoneNumber;
use Telnyx\MessagingHostedNumbers\MessagingHostedNumberUpdateParams;
use Telnyx\MessagingHostedNumbers\MessagingHostedNumberUpdateResponse;
use Telnyx\PhoneNumberWithMessagingSettings;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MessagingHostedNumbersRawContract;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class MessagingHostedNumbersRawService implements MessagingHostedNumbersRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve a specific messaging hosted number by its ID or phone number.
     *
     * @param string $id the ID or phone number of the hosted number
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessagingHostedNumberGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['messaging_hosted_numbers/%1$s', $id],
            options: $requestOptions,
            convert: MessagingHostedNumberGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Update the messaging settings for a hosted number.
     *
     * @param string $id the ID or phone number of the hosted number
     * @param array{
     *   messagingProduct?: string, messagingProfileID?: string, tags?: list<string>
     * }|MessagingHostedNumberUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessagingHostedNumberUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|MessagingHostedNumberUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MessagingHostedNumberUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['messaging_hosted_numbers/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: MessagingHostedNumberUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * List all hosted numbers associated with the authenticated user.
     *
     * @param array{
     *   filterMessagingProfileID?: string,
     *   filterPhoneNumber?: string,
     *   filterPhoneNumberContains?: string,
     *   pageNumber?: int,
     *   pageSize?: int,
     *   sortPhoneNumber?: SortPhoneNumber|value-of<SortPhoneNumber>,
     * }|MessagingHostedNumberListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<PhoneNumberWithMessagingSettings>>
     *
     * @throws APIException
     */
    public function list(
        array|MessagingHostedNumberListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MessagingHostedNumberListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'messaging_hosted_numbers',
            query: Util::array_transform_keys(
                $parsed,
                [
                    'filterMessagingProfileID' => 'filter[messaging_profile_id]',
                    'filterPhoneNumber' => 'filter[phone_number]',
                    'filterPhoneNumberContains' => 'filter[phone_number][contains]',
                    'pageNumber' => 'page[number]',
                    'pageSize' => 'page[size]',
                    'sortPhoneNumber' => 'sort[phone_number]',
                ],
            ),
            options: $options,
            convert: PhoneNumberWithMessagingSettings::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Delete a messaging hosted number
     *
     * @param string $id identifies the type of resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessagingHostedNumberDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['messaging_hosted_numbers/%1$s', $id],
            options: $requestOptions,
            convert: MessagingHostedNumberDeleteResponse::class,
        );
    }
}
