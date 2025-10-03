<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PhoneNumbers;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\PhoneNumbers\Voice\CallForwarding;
use Telnyx\PhoneNumbers\Voice\CallRecording;
use Telnyx\PhoneNumbers\Voice\CnamListing;
use Telnyx\PhoneNumbers\Voice\MediaFeatures;
use Telnyx\PhoneNumbers\Voice\VoiceGetResponse;
use Telnyx\PhoneNumbers\Voice\VoiceListParams\Filter;
use Telnyx\PhoneNumbers\Voice\VoiceListParams\Page;
use Telnyx\PhoneNumbers\Voice\VoiceListParams\Sort;
use Telnyx\PhoneNumbers\Voice\VoiceListResponse;
use Telnyx\PhoneNumbers\Voice\VoiceUpdateParams\InboundCallScreening;
use Telnyx\PhoneNumbers\Voice\VoiceUpdateParams\UsagePaymentMethod;
use Telnyx\PhoneNumbers\Voice\VoiceUpdateResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface VoiceContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): VoiceGetResponse;

    /**
     * @api
     *
     * @param CallForwarding $callForwarding the call forwarding settings for a phone number
     * @param CallRecording $callRecording the call recording settings for a phone number
     * @param bool $callerIDNameEnabled controls whether the caller ID name is enabled for this phone number
     * @param CnamListing $cnamListing the CNAM listing settings for a phone number
     * @param InboundCallScreening|value-of<InboundCallScreening> $inboundCallScreening The inbound_call_screening setting is a phone number configuration option variable that allows users to configure their settings to block or flag fraudulent calls. It can be set to disabled, reject_calls, or flag_calls. This feature has an additional per-number monthly cost associated with it.
     * @param MediaFeatures $mediaFeatures the media features settings for a phone number
     * @param bool $techPrefixEnabled controls whether a tech prefix is enabled for this phone number
     * @param string $translatedNumber This field allows you to rewrite the destination number of an inbound call before the call is routed to you. The value of this field may be any alphanumeric value, and the value will replace the number originally dialed.
     * @param UsagePaymentMethod|value-of<UsagePaymentMethod> $usagePaymentMethod controls whether a number is billed per minute or uses your concurrent channels
     *
     * @throws APIException
     */
    public function update(
        string $id,
        $callForwarding = omit,
        $callRecording = omit,
        $callerIDNameEnabled = omit,
        $cnamListing = omit,
        $inboundCallScreening = omit,
        $mediaFeatures = omit,
        $techPrefixEnabled = omit,
        $translatedNumber = omit,
        $usagePaymentMethod = omit,
        ?RequestOptions $requestOptions = null,
    ): VoiceUpdateResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): VoiceUpdateResponse;

    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[phone_number], filter[connection_name], filter[customer_reference], filter[voice.usage_payment_method]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param Sort|value-of<Sort> $sort Specifies the sort order for results. If not given, results are sorted by created_at in descending order.
     *
     * @throws APIException
     */
    public function list(
        $filter = omit,
        $page = omit,
        $sort = omit,
        ?RequestOptions $requestOptions = null,
    ): VoiceListResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): VoiceListResponse;
}
