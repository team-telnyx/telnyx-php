<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
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
use Telnyx\ServiceContracts\MobilePhoneNumbersContract;
use Telnyx\Services\MobilePhoneNumbers\MessagingService;

/**
 * Mobile phone number operations.
 *
 * @phpstan-import-type CallForwardingShape from \Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateParams\CallForwarding
 * @phpstan-import-type CallRecordingShape from \Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateParams\CallRecording
 * @phpstan-import-type CnamListingShape from \Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateParams\CnamListing
 * @phpstan-import-type InboundShape from \Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateParams\Inbound
 * @phpstan-import-type OutboundShape from \Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateParams\Outbound
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class MobilePhoneNumbersService implements MobilePhoneNumbersContract
{
    /**
     * @api
     */
    public MobilePhoneNumbersRawService $raw;

    /**
     * @api
     */
    public MessagingService $messaging;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new MobilePhoneNumbersRawService($client);
        $this->messaging = new MessagingService($client);
    }

    /**
     * @api
     *
     * Retrieve a Mobile Phone Number
     *
     * @param string $id The ID of the mobile phone number
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): MobilePhoneNumberGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update a Mobile Phone Number
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
    ): MobilePhoneNumberUpdateResponse {
        $params = Util::removeNulls(
            [
                'callForwarding' => $callForwarding,
                'callRecording' => $callRecording,
                'callerIDNameEnabled' => $callerIDNameEnabled,
                'cnamListing' => $cnamListing,
                'connectionID' => $connectionID,
                'customerReference' => $customerReference,
                'inbound' => $inbound,
                'inboundCallScreening' => $inboundCallScreening,
                'noiseSuppression' => $noiseSuppression,
                'outbound' => $outbound,
                'tags' => $tags,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List Mobile Phone Numbers
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
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            ['pageNumber' => $pageNumber, 'pageSize' => $pageSize]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
