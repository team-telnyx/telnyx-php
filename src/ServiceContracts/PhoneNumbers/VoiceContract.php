<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PhoneNumbers;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\PhoneNumbers\Actions\PhoneNumberWithVoiceSettings;
use Telnyx\PhoneNumbers\Voice\CallForwarding;
use Telnyx\PhoneNumbers\Voice\CallRecording;
use Telnyx\PhoneNumbers\Voice\CnamListing;
use Telnyx\PhoneNumbers\Voice\MediaFeatures;
use Telnyx\PhoneNumbers\Voice\VoiceGetResponse;
use Telnyx\PhoneNumbers\Voice\VoiceListParams\Filter;
use Telnyx\PhoneNumbers\Voice\VoiceListParams\Page;
use Telnyx\PhoneNumbers\Voice\VoiceListParams\Sort;
use Telnyx\PhoneNumbers\Voice\VoiceUpdateParams\InboundCallScreening;
use Telnyx\PhoneNumbers\Voice\VoiceUpdateParams\UsagePaymentMethod;
use Telnyx\PhoneNumbers\Voice\VoiceUpdateResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type CallForwardingShape from \Telnyx\PhoneNumbers\Voice\CallForwarding
 * @phpstan-import-type CallRecordingShape from \Telnyx\PhoneNumbers\Voice\CallRecording
 * @phpstan-import-type CnamListingShape from \Telnyx\PhoneNumbers\Voice\CnamListing
 * @phpstan-import-type MediaFeaturesShape from \Telnyx\PhoneNumbers\Voice\MediaFeatures
 * @phpstan-import-type FilterShape from \Telnyx\PhoneNumbers\Voice\VoiceListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\PhoneNumbers\Voice\VoiceListParams\Page
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface VoiceContract
{
    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): VoiceGetResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param CallForwarding|CallForwardingShape $callForwarding the call forwarding settings for a phone number
     * @param CallRecording|CallRecordingShape $callRecording the call recording settings for a phone number
     * @param bool $callerIDNameEnabled controls whether the caller ID name is enabled for this phone number
     * @param CnamListing|CnamListingShape $cnamListing the CNAM listing settings for a phone number
     * @param InboundCallScreening|value-of<InboundCallScreening> $inboundCallScreening The inbound_call_screening setting is a phone number configuration option variable that allows users to configure their settings to block or flag fraudulent calls. It can be set to disabled, reject_calls, or flag_calls. This feature has an additional per-number monthly cost associated with it.
     * @param MediaFeatures|MediaFeaturesShape $mediaFeatures the media features settings for a phone number
     * @param bool $techPrefixEnabled controls whether a tech prefix is enabled for this phone number
     * @param string $translatedNumber This field allows you to rewrite the destination number of an inbound call before the call is routed to you. The value of this field may be any alphanumeric value, and the value will replace the number originally dialed.
     * @param UsagePaymentMethod|value-of<UsagePaymentMethod> $usagePaymentMethod controls whether a number is billed per minute or uses your concurrent channels
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $id,
        CallForwarding|array|null $callForwarding = null,
        CallRecording|array|null $callRecording = null,
        bool $callerIDNameEnabled = false,
        CnamListing|array|null $cnamListing = null,
        InboundCallScreening|string $inboundCallScreening = 'disabled',
        MediaFeatures|array|null $mediaFeatures = null,
        bool $techPrefixEnabled = false,
        ?string $translatedNumber = null,
        UsagePaymentMethod|string $usagePaymentMethod = 'pay-per-minute',
        RequestOptions|array|null $requestOptions = null,
    ): VoiceUpdateResponse;

    /**
     * @api
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[phone_number], filter[connection_name], filter[customer_reference], filter[voice.usage_payment_method]
     * @param Page|PageShape $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param Sort|value-of<Sort> $sort Specifies the sort order for results. If not given, results are sorted by created_at in descending order.
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultPagination<PhoneNumberWithVoiceSettings>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        Page|array|null $page = null,
        Sort|string|null $sort = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultPagination;
}
