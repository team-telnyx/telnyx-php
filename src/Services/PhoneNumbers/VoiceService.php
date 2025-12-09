<?php

declare(strict_types=1);

namespace Telnyx\Services\PhoneNumbers;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\PhoneNumbers\Voice\CallForwarding;
use Telnyx\PhoneNumbers\Voice\CallForwarding\ForwardingType;
use Telnyx\PhoneNumbers\Voice\CallRecording;
use Telnyx\PhoneNumbers\Voice\CallRecording\InboundCallRecordingChannels;
use Telnyx\PhoneNumbers\Voice\CallRecording\InboundCallRecordingFormat;
use Telnyx\PhoneNumbers\Voice\CnamListing;
use Telnyx\PhoneNumbers\Voice\MediaFeatures;
use Telnyx\PhoneNumbers\Voice\VoiceGetResponse;
use Telnyx\PhoneNumbers\Voice\VoiceListParams\Filter\VoiceUsagePaymentMethod;
use Telnyx\PhoneNumbers\Voice\VoiceListParams\Sort;
use Telnyx\PhoneNumbers\Voice\VoiceListResponse;
use Telnyx\PhoneNumbers\Voice\VoiceUpdateParams\InboundCallScreening;
use Telnyx\PhoneNumbers\Voice\VoiceUpdateParams\UsagePaymentMethod;
use Telnyx\PhoneNumbers\Voice\VoiceUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PhoneNumbers\VoiceContract;

final class VoiceService implements VoiceContract
{
    /**
     * @api
     */
    public VoiceRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new VoiceRawService($client);
    }

    /**
     * @api
     *
     * Retrieve a phone number with voice settings
     *
     * @param string $id identifies the resource
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): VoiceGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update a phone number with voice settings
     *
     * @param string $id identifies the resource
     * @param array{
     *   callForwardingEnabled?: bool,
     *   forwardingType?: 'always'|'on-failure'|ForwardingType,
     *   forwardsTo?: string,
     * }|CallForwarding $callForwarding The call forwarding settings for a phone number
     * @param array{
     *   inboundCallRecordingChannels?: 'single'|'dual'|InboundCallRecordingChannels,
     *   inboundCallRecordingEnabled?: bool,
     *   inboundCallRecordingFormat?: 'wav'|'mp3'|InboundCallRecordingFormat,
     * }|CallRecording $callRecording The call recording settings for a phone number
     * @param bool $callerIDNameEnabled controls whether the caller ID name is enabled for this phone number
     * @param array{
     *   cnamListingDetails?: string, cnamListingEnabled?: bool
     * }|CnamListing $cnamListing The CNAM listing settings for a phone number
     * @param 'disabled'|'reject_calls'|'flag_calls'|InboundCallScreening $inboundCallScreening The inbound_call_screening setting is a phone number configuration option variable that allows users to configure their settings to block or flag fraudulent calls. It can be set to disabled, reject_calls, or flag_calls. This feature has an additional per-number monthly cost associated with it.
     * @param array{
     *   acceptAnyRtpPacketsEnabled?: bool,
     *   rtpAutoAdjustEnabled?: bool,
     *   t38FaxGatewayEnabled?: bool,
     * }|MediaFeatures $mediaFeatures The media features settings for a phone number
     * @param bool $techPrefixEnabled controls whether a tech prefix is enabled for this phone number
     * @param string $translatedNumber This field allows you to rewrite the destination number of an inbound call before the call is routed to you. The value of this field may be any alphanumeric value, and the value will replace the number originally dialed.
     * @param 'pay-per-minute'|'channel'|UsagePaymentMethod $usagePaymentMethod controls whether a number is billed per minute or uses your concurrent channels
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|CallForwarding|null $callForwarding = null,
        array|CallRecording|null $callRecording = null,
        bool $callerIDNameEnabled = false,
        array|CnamListing|null $cnamListing = null,
        string|InboundCallScreening $inboundCallScreening = 'disabled',
        array|MediaFeatures|null $mediaFeatures = null,
        bool $techPrefixEnabled = false,
        ?string $translatedNumber = null,
        string|UsagePaymentMethod $usagePaymentMethod = 'pay-per-minute',
        ?RequestOptions $requestOptions = null,
    ): VoiceUpdateResponse {
        $params = [
            'callForwarding' => $callForwarding,
            'callRecording' => $callRecording,
            'callerIDNameEnabled' => $callerIDNameEnabled,
            'cnamListing' => $cnamListing,
            'inboundCallScreening' => $inboundCallScreening,
            'mediaFeatures' => $mediaFeatures,
            'techPrefixEnabled' => $techPrefixEnabled,
            'translatedNumber' => $translatedNumber,
            'usagePaymentMethod' => $usagePaymentMethod,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List phone numbers with voice settings
     *
     * @param array{
     *   connectionName?: array{contains?: string},
     *   customerReference?: string,
     *   phoneNumber?: string,
     *   voiceUsagePaymentMethod?: 'pay-per-minute'|'channel'|VoiceUsagePaymentMethod,
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[phone_number], filter[connection_name], filter[customer_reference], filter[voice.usage_payment_method]
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param 'purchased_at'|'phone_number'|'connection_name'|'usage_payment_method'|Sort $sort Specifies the sort order for results. If not given, results are sorted by created_at in descending order.
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?array $page = null,
        string|Sort|null $sort = null,
        ?RequestOptions $requestOptions = null,
    ): VoiceListResponse {
        $params = ['filter' => $filter, 'page' => $page, 'sort' => $sort];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
