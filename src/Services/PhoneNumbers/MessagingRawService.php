<?php

declare(strict_types=1);

namespace Telnyx\Services\PhoneNumbers;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\PhoneNumbers\Messaging\MessagingGetResponse;
use Telnyx\PhoneNumbers\Messaging\MessagingListParams;
use Telnyx\PhoneNumbers\Messaging\MessagingListParams\FilterType;
use Telnyx\PhoneNumbers\Messaging\MessagingListParams\SortPhoneNumber;
use Telnyx\PhoneNumbers\Messaging\MessagingUpdateParams;
use Telnyx\PhoneNumbers\Messaging\MessagingUpdateResponse;
use Telnyx\PhoneNumberWithMessagingSettings;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PhoneNumbers\MessagingRawContract;

/**
 * Configure your phone numbers.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class MessagingRawService implements MessagingRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve a phone number with messaging settings
     *
     * @param string $id identifies the type of resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessagingGetResponse>
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
            path: ['phone_numbers/%1$s/messaging', $id],
            options: $requestOptions,
            convert: MessagingGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Update the messaging profile and/or messaging product of a phone number
     *
     * @param string $id the phone number to update
     * @param array{
     *   messagingProduct?: string, messagingProfileID?: string, tags?: list<string>
     * }|MessagingUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessagingUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|MessagingUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MessagingUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['phone_numbers/%1$s/messaging', $id],
            body: (object) $parsed,
            options: $options,
            convert: MessagingUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * List phone numbers with messaging settings
     *
     * @param array{
     *   filterMessagingProfileID?: string,
     *   filterPhoneNumber?: string,
     *   filterPhoneNumberContains?: string,
     *   filterType?: FilterType|value-of<FilterType>,
     *   pageNumber?: int,
     *   pageSize?: int,
     *   sortPhoneNumber?: SortPhoneNumber|value-of<SortPhoneNumber>,
     * }|MessagingListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<PhoneNumberWithMessagingSettings>>
     *
     * @throws APIException
     */
    public function list(
        array|MessagingListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MessagingListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'phone_numbers/messaging',
            query: Util::array_transform_keys(
                $parsed,
                [
                    'filterMessagingProfileID' => 'filter[messaging_profile_id]',
                    'filterPhoneNumber' => 'filter[phone_number]',
                    'filterPhoneNumberContains' => 'filter[phone_number][contains]',
                    'filterType' => 'filter[type]',
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
}
