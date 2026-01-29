<?php

declare(strict_types=1);

namespace Telnyx\Services\PhoneNumbers;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\PhoneNumbers\Actions\PhoneNumberWithVoiceSettings;
use Telnyx\PhoneNumbers\Voice\CallForwarding;
use Telnyx\PhoneNumbers\Voice\CallRecording;
use Telnyx\PhoneNumbers\Voice\CnamListing;
use Telnyx\PhoneNumbers\Voice\MediaFeatures;
use Telnyx\PhoneNumbers\Voice\VoiceGetResponse;
use Telnyx\PhoneNumbers\Voice\VoiceListParams\Filter;
use Telnyx\PhoneNumbers\Voice\VoiceListParams\Sort;
use Telnyx\PhoneNumbers\Voice\VoiceUpdateParams\InboundCallScreening;
use Telnyx\PhoneNumbers\Voice\VoiceUpdateParams\UsagePaymentMethod;
use Telnyx\PhoneNumbers\Voice\VoiceUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PhoneNumbers\VoiceContract;

/**
 * @phpstan-import-type CallForwardingShape from \Telnyx\PhoneNumbers\Voice\CallForwarding
 * @phpstan-import-type CallRecordingShape from \Telnyx\PhoneNumbers\Voice\CallRecording
 * @phpstan-import-type CnamListingShape from \Telnyx\PhoneNumbers\Voice\CnamListing
 * @phpstan-import-type MediaFeaturesShape from \Telnyx\PhoneNumbers\Voice\MediaFeatures
 * @phpstan-import-type FilterShape from \Telnyx\PhoneNumbers\Voice\VoiceListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
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
    ): VoiceUpdateResponse {
        $params = Util::removeNulls(
            [
                'callForwarding' => $callForwarding,
                'callRecording' => $callRecording,
                'callerIDNameEnabled' => $callerIDNameEnabled,
                'cnamListing' => $cnamListing,
                'inboundCallScreening' => $inboundCallScreening,
                'mediaFeatures' => $mediaFeatures,
                'techPrefixEnabled' => $techPrefixEnabled,
                'translatedNumber' => $translatedNumber,
                'usagePaymentMethod' => $usagePaymentMethod,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List phone numbers with voice settings
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[phone_number], filter[connection_name], filter[customer_reference], filter[voice.usage_payment_method]
     * @param Sort|value-of<Sort> $sort Specifies the sort order for results. If not given, results are sorted by created_at in descending order.
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<PhoneNumberWithVoiceSettings>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        Sort|string|null $sort = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            [
                'filter' => $filter,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
                'sort' => $sort,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
