<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\PhoneNumbers\PhoneNumberDeleteResponse;
use Telnyx\PhoneNumbers\PhoneNumberDetailed;
use Telnyx\PhoneNumbers\PhoneNumberGetResponse;
use Telnyx\PhoneNumbers\PhoneNumberListParams;
use Telnyx\PhoneNumbers\PhoneNumberListParams\Filter;
use Telnyx\PhoneNumbers\PhoneNumberListParams\HandleMessagingProfileError;
use Telnyx\PhoneNumbers\PhoneNumberListParams\Sort;
use Telnyx\PhoneNumbers\PhoneNumberSlimListParams;
use Telnyx\PhoneNumbers\PhoneNumberSlimListResponse;
use Telnyx\PhoneNumbers\PhoneNumberUpdateParams;
use Telnyx\PhoneNumbers\PhoneNumberUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PhoneNumbersRawContract;

/**
 * Configure your phone numbers.
 *
 * @phpstan-import-type FilterShape from \Telnyx\PhoneNumbers\PhoneNumberListParams\Filter
 * @phpstan-import-type FilterShape from \Telnyx\PhoneNumbers\PhoneNumberSlimListParams\Filter as FilterShape1
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PhoneNumberGetResponse>
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
     *   addressID?: string,
     *   billingGroupID?: string,
     *   connectionID?: string,
     *   customerReference?: string,
     *   externalPin?: string,
     *   hdVoiceEnabled?: bool,
     *   tags?: list<string>,
     * }|PhoneNumberUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PhoneNumberUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $phoneNumberID,
        array|PhoneNumberUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
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
     *   filter?: Filter|FilterShape,
     *   handleMessagingProfileError?: HandleMessagingProfileError|value-of<HandleMessagingProfileError>,
     *   pageNumber?: int,
     *   pageSize?: int,
     *   sort?: Sort|value-of<Sort>,
     * }|PhoneNumberListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<PhoneNumberDetailed>>
     *
     * @throws APIException
     */
    public function list(
        array|PhoneNumberListParams $params,
        RequestOptions|array|null $requestOptions = null,
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
                [
                    'handleMessagingProfileError' => 'handle_messaging_profile_error',
                    'pageNumber' => 'page[number]',
                    'pageSize' => 'page[size]',
                ],
            ),
            options: $options,
            convert: PhoneNumberDetailed::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Delete a phone number
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PhoneNumberDeleteResponse>
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
     *   filter?: PhoneNumberSlimListParams\Filter|FilterShape1,
     *   includeConnection?: bool,
     *   includeTags?: bool,
     *   pageNumber?: int,
     *   pageSize?: int,
     *   sort?: PhoneNumberSlimListParams\Sort|value-of<PhoneNumberSlimListParams\Sort>,
     * }|PhoneNumberSlimListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<PhoneNumberSlimListResponse>>
     *
     * @throws APIException
     */
    public function slimList(
        array|PhoneNumberSlimListParams $params,
        RequestOptions|array|null $requestOptions = null,
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
                    'pageNumber' => 'page[number]',
                    'pageSize' => 'page[size]',
                ],
            ),
            options: $options,
            convert: PhoneNumberSlimListResponse::class,
            page: DefaultFlatPagination::class,
        );
    }
}
