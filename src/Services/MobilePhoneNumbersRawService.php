<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumber;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberGetResponse;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberListParams;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateParams;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateParams\CallForwarding;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateParams\CallRecording;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateParams\CnamListing;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateParams\Inbound;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateParams\InboundCallScreening;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateParams\Outbound;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MobilePhoneNumbersRawContract;

/**
 * @phpstan-import-type CallForwardingShape from \Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateParams\CallForwarding
 * @phpstan-import-type CallRecordingShape from \Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateParams\CallRecording
 * @phpstan-import-type CnamListingShape from \Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateParams\CnamListing
 * @phpstan-import-type InboundShape from \Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateParams\Inbound
 * @phpstan-import-type OutboundShape from \Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateParams\Outbound
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class MobilePhoneNumbersRawService implements MobilePhoneNumbersRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve a Mobile Phone Number
     *
     * @param string $id The ID of the mobile phone number
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MobilePhoneNumberGetResponse>
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
     * @param string $id The ID of the mobile phone number
     * @param array{
     *   callForwarding?: CallForwarding|CallForwardingShape,
     *   callRecording?: CallRecording|CallRecordingShape,
     *   callerIDNameEnabled?: bool,
     *   cnamListing?: CnamListing|CnamListingShape,
     *   connectionID?: string|null,
     *   customerReference?: string|null,
     *   inbound?: Inbound|InboundShape,
     *   inboundCallScreening?: InboundCallScreening|value-of<InboundCallScreening>,
     *   noiseSuppression?: bool,
     *   outbound?: Outbound|OutboundShape,
     *   tags?: list<string>,
     * }|MobilePhoneNumberUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MobilePhoneNumberUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|MobilePhoneNumberUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MobilePhoneNumberUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     *   pageNumber?: int, pageSize?: int
     * }|MobilePhoneNumberListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<MobilePhoneNumber>>
     *
     * @throws APIException
     */
    public function list(
        array|MobilePhoneNumberListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MobilePhoneNumberListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'v2/mobile_phone_numbers',
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
            options: $options,
            convert: MobilePhoneNumber::class,
            page: DefaultFlatPagination::class,
        );
    }
}
