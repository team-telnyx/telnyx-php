<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberGetResponse;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberListParams;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberListResponse;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateParams;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MobilePhoneNumbersContract;

final class MobilePhoneNumbersService implements MobilePhoneNumbersContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve a Mobile Phone Number
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): MobilePhoneNumberGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['v2/mobile_phone_numbers/%1$s', $id],
            options: $requestOptions,
            convert: MobilePhoneNumberGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Update a Mobile Phone Number
     *
     * @param array{
     *   call_forwarding?: array{
     *     call_forwarding_enabled?: bool,
     *     forwarding_type?: 'always'|'on-failure'|null,
     *     forwards_to?: string|null,
     *   },
     *   call_recording?: array{
     *     inbound_call_recording_channels?: 'single'|'dual',
     *     inbound_call_recording_enabled?: bool,
     *     inbound_call_recording_format?: 'wav'|'mp3',
     *   },
     *   caller_id_name_enabled?: bool,
     *   cnam_listing?: array{
     *     cnam_listing_details?: string|null, cnam_listing_enabled?: bool
     *   },
     *   connection_id?: string|null,
     *   customer_reference?: string|null,
     *   inbound?: array{interception_app_id?: string|null},
     *   inbound_call_screening?: 'disabled'|'reject_calls'|'flag_calls',
     *   noise_suppression?: bool,
     *   outbound?: array{interception_app_id?: string|null},
     *   tags?: list<string>,
     * }|MobilePhoneNumberUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|MobilePhoneNumberUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): MobilePhoneNumberUpdateResponse {
        [$parsed, $options] = MobilePhoneNumberUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['v2/mobile_phone_numbers/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: MobilePhoneNumberUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * List Mobile Phone Numbers
     *
     * @param array{
     *   page_number_?: int, page_size_?: int
     * }|MobilePhoneNumberListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|MobilePhoneNumberListParams $params,
        ?RequestOptions $requestOptions = null,
    ): MobilePhoneNumberListResponse {
        [$parsed, $options] = MobilePhoneNumberListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'v2/mobile_phone_numbers',
            query: $parsed,
            options: $options,
            convert: MobilePhoneNumberListResponse::class,
        );
    }
}
