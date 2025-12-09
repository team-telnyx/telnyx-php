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
use Telnyx\ServiceContracts\MobilePhoneNumbersContract;
use Telnyx\Services\MobilePhoneNumbers\MessagingService;

final class MobilePhoneNumbersService implements MobilePhoneNumbersContract
{
    /**
     * @api
     */
    public MessagingService $messaging;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->messaging = new MessagingService($client);
    }

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
        /** @var BaseResponse<MobilePhoneNumberGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['v2/mobile_phone_numbers/%1$s', $id],
            options: $requestOptions,
            convert: MobilePhoneNumberGetResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Update a Mobile Phone Number
     *
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

        /** @var BaseResponse<MobilePhoneNumberUpdateResponse> */
        $response = $this->client->request(
            method: 'patch',
            path: ['v2/mobile_phone_numbers/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: MobilePhoneNumberUpdateResponse::class,
        );

        return $response->parse();
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

        /** @var BaseResponse<MobilePhoneNumberListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'v2/mobile_phone_numbers',
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
            options: $options,
            convert: MobilePhoneNumberListResponse::class,
        );

        return $response->parse();
    }
}
