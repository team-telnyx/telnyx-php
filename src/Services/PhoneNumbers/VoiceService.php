<?php

declare(strict_types=1);

namespace Telnyx\Services\PhoneNumbers;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\PhoneNumbers\Voice\CallForwarding;
use Telnyx\PhoneNumbers\Voice\CallForwarding\ForwardingType;
use Telnyx\PhoneNumbers\Voice\CallRecording;
use Telnyx\PhoneNumbers\Voice\CallRecording\InboundCallRecordingChannels;
use Telnyx\PhoneNumbers\Voice\CallRecording\InboundCallRecordingFormat;
use Telnyx\PhoneNumbers\Voice\CnamListing;
use Telnyx\PhoneNumbers\Voice\MediaFeatures;
use Telnyx\PhoneNumbers\Voice\VoiceGetResponse;
use Telnyx\PhoneNumbers\Voice\VoiceListParams;
use Telnyx\PhoneNumbers\Voice\VoiceListParams\Filter\VoiceUsagePaymentMethod;
use Telnyx\PhoneNumbers\Voice\VoiceListParams\Sort;
use Telnyx\PhoneNumbers\Voice\VoiceListResponse;
use Telnyx\PhoneNumbers\Voice\VoiceUpdateParams;
use Telnyx\PhoneNumbers\Voice\VoiceUpdateParams\InboundCallScreening;
use Telnyx\PhoneNumbers\Voice\VoiceUpdateParams\UsagePaymentMethod;
use Telnyx\PhoneNumbers\Voice\VoiceUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PhoneNumbers\VoiceContract;

final class VoiceService implements VoiceContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve a phone number with voice settings
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): VoiceGetResponse {
        /** @var BaseResponse<VoiceGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['phone_numbers/%1$s/voice', $id],
            options: $requestOptions,
            convert: VoiceGetResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Update a phone number with voice settings
     *
     * @param array{
     *   call_forwarding?: array{
     *     call_forwarding_enabled?: bool,
     *     forwarding_type?: 'always'|'on-failure'|ForwardingType,
     *     forwards_to?: string,
     *   }|CallForwarding,
     *   call_recording?: array{
     *     inbound_call_recording_channels?: 'single'|'dual'|InboundCallRecordingChannels,
     *     inbound_call_recording_enabled?: bool,
     *     inbound_call_recording_format?: 'wav'|'mp3'|InboundCallRecordingFormat,
     *   }|CallRecording,
     *   caller_id_name_enabled?: bool,
     *   cnam_listing?: array{
     *     cnam_listing_details?: string, cnam_listing_enabled?: bool
     *   }|CnamListing,
     *   inbound_call_screening?: 'disabled'|'reject_calls'|'flag_calls'|InboundCallScreening,
     *   media_features?: array{
     *     accept_any_rtp_packets_enabled?: bool,
     *     rtp_auto_adjust_enabled?: bool,
     *     t38_fax_gateway_enabled?: bool,
     *   }|MediaFeatures,
     *   tech_prefix_enabled?: bool,
     *   translated_number?: string,
     *   usage_payment_method?: 'pay-per-minute'|'channel'|UsagePaymentMethod,
     * }|VoiceUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|VoiceUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): VoiceUpdateResponse {
        [$parsed, $options] = VoiceUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<VoiceUpdateResponse> */
        $response = $this->client->request(
            method: 'patch',
            path: ['phone_numbers/%1$s/voice', $id],
            body: (object) $parsed,
            options: $options,
            convert: VoiceUpdateResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * List phone numbers with voice settings
     *
     * @param array{
     *   filter?: array{
     *     connection_name?: array{contains?: string},
     *     customer_reference?: string,
     *     phone_number?: string,
     *     'voice.usage_payment_method'?: 'pay-per-minute'|'channel'|VoiceUsagePaymentMethod,
     *   },
     *   page?: array{number?: int, size?: int},
     *   sort?: 'purchased_at'|'phone_number'|'connection_name'|'usage_payment_method'|Sort,
     * }|VoiceListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|VoiceListParams $params,
        ?RequestOptions $requestOptions = null
    ): VoiceListResponse {
        [$parsed, $options] = VoiceListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<VoiceListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'phone_numbers/voice',
            query: $parsed,
            options: $options,
            convert: VoiceListResponse::class,
        );

        return $response->parse();
    }
}
