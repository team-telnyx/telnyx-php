<?php

declare(strict_types=1);

namespace Telnyx\Services\PhoneNumbers;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\PhoneNumbers\Voice\CallForwarding;
use Telnyx\PhoneNumbers\Voice\CallRecording;
use Telnyx\PhoneNumbers\Voice\CnamListing;
use Telnyx\PhoneNumbers\Voice\MediaFeatures;
use Telnyx\PhoneNumbers\Voice\VoiceGetResponse;
use Telnyx\PhoneNumbers\Voice\VoiceListParams;
use Telnyx\PhoneNumbers\Voice\VoiceListParams\Filter;
use Telnyx\PhoneNumbers\Voice\VoiceListParams\Page;
use Telnyx\PhoneNumbers\Voice\VoiceListParams\Sort;
use Telnyx\PhoneNumbers\Voice\VoiceListResponse;
use Telnyx\PhoneNumbers\Voice\VoiceUpdateParams;
use Telnyx\PhoneNumbers\Voice\VoiceUpdateParams\InboundCallScreening;
use Telnyx\PhoneNumbers\Voice\VoiceUpdateParams\UsagePaymentMethod;
use Telnyx\PhoneNumbers\Voice\VoiceUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PhoneNumbers\VoiceContract;

use const Telnyx\Core\OMIT as omit;

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
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['phone_numbers/%1$s/voice', $id],
            options: $requestOptions,
            convert: VoiceGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Update a phone number with voice settings
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

        return $this->updateRaw($id, $params, $requestOptions);
    }

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
    ): VoiceUpdateResponse {
        [$parsed, $options] = VoiceUpdateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['phone_numbers/%1$s/voice', $id],
            body: (object) $parsed,
            options: $options,
            convert: VoiceUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * List phone numbers with voice settings
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
    ): VoiceListResponse {
        $params = ['filter' => $filter, 'page' => $page, 'sort' => $sort];

        return $this->listRaw($params, $requestOptions);
    }

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
    ): VoiceListResponse {
        [$parsed, $options] = VoiceListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'phone_numbers/voice',
            query: $parsed,
            options: $options,
            convert: VoiceListResponse::class,
        );
    }
}
