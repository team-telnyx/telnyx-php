<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumber;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberGetResponse;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateParams\CallForwarding\ForwardingType;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateParams\CallRecording\InboundCallRecordingChannels;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateParams\CallRecording\InboundCallRecordingFormat;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateParams\InboundCallScreening;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateResponse;
use Telnyx\RequestOptions;

interface MobilePhoneNumbersContract
{
    /**
     * @api
     *
     * @param string $id The ID of the mobile phone number
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): MobilePhoneNumberGetResponse;

    /**
     * @api
     *
     * @param string $id The ID of the mobile phone number
     * @param array{
     *   callForwardingEnabled?: bool,
     *   forwardingType?: 'always'|'on-failure'|ForwardingType|null,
     *   forwardsTo?: string|null,
     * } $callForwarding
     * @param array{
     *   inboundCallRecordingChannels?: 'single'|'dual'|InboundCallRecordingChannels,
     *   inboundCallRecordingEnabled?: bool,
     *   inboundCallRecordingFormat?: 'wav'|'mp3'|InboundCallRecordingFormat,
     * } $callRecording
     * @param array{
     *   cnamListingDetails?: string|null, cnamListingEnabled?: bool
     * } $cnamListing
     * @param array{interceptionAppID?: string|null} $inbound
     * @param 'disabled'|'reject_calls'|'flag_calls'|InboundCallScreening $inboundCallScreening
     * @param array{interceptionAppID?: string|null} $outbound
     * @param list<string> $tags
     *
     * @throws APIException
     */
    public function update(
        string $id,
        ?array $callForwarding = null,
        ?array $callRecording = null,
        ?bool $callerIDNameEnabled = null,
        ?array $cnamListing = null,
        ?string $connectionID = null,
        ?string $customerReference = null,
        ?array $inbound = null,
        string|InboundCallScreening|null $inboundCallScreening = null,
        ?bool $noiseSuppression = null,
        ?array $outbound = null,
        ?array $tags = null,
        ?RequestOptions $requestOptions = null,
    ): MobilePhoneNumberUpdateResponse;

    /**
     * @api
     *
     * @param int $pageNumber The page number to load
     * @param int $pageSize The size of the page
     *
     * @return DefaultFlatPagination<MobilePhoneNumber>
     *
     * @throws APIException
     */
    public function list(
        ?int $pageNumber = null,
        ?int $pageSize = null,
        ?RequestOptions $requestOptions = null,
    ): DefaultFlatPagination;
}
