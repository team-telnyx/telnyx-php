<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumber;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberGetResponse;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateParams\CallForwarding;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateParams\CallRecording;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateParams\CnamListing;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateParams\Inbound;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateParams\InboundCallScreening;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateParams\Outbound;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type CallForwardingShape from \Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateParams\CallForwarding
 * @phpstan-import-type CallRecordingShape from \Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateParams\CallRecording
 * @phpstan-import-type CnamListingShape from \Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateParams\CnamListing
 * @phpstan-import-type InboundShape from \Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateParams\Inbound
 * @phpstan-import-type OutboundShape from \Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateParams\Outbound
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface MobilePhoneNumbersContract
{
    /**
     * @api
     *
     * @param string $id The ID of the mobile phone number
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): MobilePhoneNumberGetResponse;

    /**
     * @api
     *
     * @param string $id The ID of the mobile phone number
     * @param CallForwarding|CallForwardingShape $callForwarding
     * @param CallRecording|CallRecordingShape $callRecording
     * @param CnamListing|CnamListingShape $cnamListing
     * @param Inbound|InboundShape $inbound
     * @param InboundCallScreening|value-of<InboundCallScreening> $inboundCallScreening
     * @param Outbound|OutboundShape $outbound
     * @param list<string> $tags
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $id,
        CallForwarding|array|null $callForwarding = null,
        CallRecording|array|null $callRecording = null,
        ?bool $callerIDNameEnabled = null,
        CnamListing|array|null $cnamListing = null,
        ?string $connectionID = null,
        ?string $customerReference = null,
        Inbound|array|null $inbound = null,
        InboundCallScreening|string|null $inboundCallScreening = null,
        ?bool $noiseSuppression = null,
        Outbound|array|null $outbound = null,
        ?array $tags = null,
        RequestOptions|array|null $requestOptions = null,
    ): MobilePhoneNumberUpdateResponse;

    /**
     * @api
     *
     * @param int $pageNumber The page number to load
     * @param int $pageSize The size of the page
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<MobilePhoneNumber>
     *
     * @throws APIException
     */
    public function list(
        ?int $pageNumber = null,
        ?int $pageSize = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;
}
