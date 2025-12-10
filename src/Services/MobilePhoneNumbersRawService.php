<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberGetResponse;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberListParams;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberListResponse;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateParams;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateParams\CallForwarding\ForwardingType;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateParams\CallRecording\InboundCallRecordingChannels;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateParams\CallRecording\InboundCallRecordingFormat;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateParams\InboundCallScreening;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MobilePhoneNumbersRawContract;

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
     *
     * @return BaseResponse<MobilePhoneNumberGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
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
     *   callForwarding?: array{
     *     callForwardingEnabled?: bool,
     *     forwardingType?: 'always'|'on-failure'|ForwardingType|null,
     *     forwardsTo?: string|null,
     *   },
     *   callRecording?: array{
     *     inboundCallRecordingChannels?: 'single'|'dual'|InboundCallRecordingChannels,
     *     inboundCallRecordingEnabled?: bool,
     *     inboundCallRecordingFormat?: 'wav'|'mp3'|InboundCallRecordingFormat,
     *   },
     *   callerIDNameEnabled?: bool,
     *   cnamListing?: array{
     *     cnamListingDetails?: string|null, cnamListingEnabled?: bool
     *   },
     *   connectionID?: string|null,
     *   customerReference?: string|null,
     *   inbound?: array{interceptionAppID?: string|null},
     *   inboundCallScreening?: 'disabled'|'reject_calls'|'flag_calls'|InboundCallScreening,
     *   noiseSuppression?: bool,
     *   outbound?: array{interceptionAppID?: string|null},
     *   tags?: list<string>,
     * }|MobilePhoneNumberUpdateParams $params
     *
     * @return BaseResponse<MobilePhoneNumberUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|MobilePhoneNumberUpdateParams $params,
        ?RequestOptions $requestOptions = null,
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
     *
     * @return BaseResponse<MobilePhoneNumberListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|MobilePhoneNumberListParams $params,
        ?RequestOptions $requestOptions = null,
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
            convert: MobilePhoneNumberListResponse::class,
        );
    }
}
