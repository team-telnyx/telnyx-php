<?php

declare(strict_types=1);

namespace Telnyx\Services\Dir;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\Dir\Document;
use Telnyx\Dir\PhoneNumberBatches\DirPhoneNumberStatus;
use Telnyx\Dir\PhoneNumbers\DirPhoneNumber;
use Telnyx\Dir\PhoneNumbers\PhoneNumberAddResponse;
use Telnyx\Dir\PhoneNumbers\PhoneNumberRemoveResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Dir\PhoneNumbersContract;

/**
 * Associate phone numbers with a verified DIR so calls from those numbers carry the DIR's display identity.
 *
 * @phpstan-import-type DocumentShape from \Telnyx\Dir\Document
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class PhoneNumbersService implements PhoneNumbersContract
{
    /**
     * @api
     */
    public PhoneNumbersRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new PhoneNumbersRawService($client);
    }

    /**
     * @api
     *
     * List the phone numbers registered under a DIR. The enterprise is resolved server-side from the DIR id.
     *
     * @param string $dirID The DIR id. Lowercase UUID.
     * @param int $pageNumber 1-based page number. Out-of-range values return an empty page with correct meta.
     * @param int $pageSize Items per page. Maximum 250; values above are clamped to 250.
     * @param DirPhoneNumberStatus|value-of<DirPhoneNumberStatus> $status filter by phone-number status
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<DirPhoneNumber>
     *
     * @throws APIException
     */
    public function list(
        string $dirID,
        int $pageNumber = 1,
        int $pageSize = 20,
        DirPhoneNumberStatus|string|null $status = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            [
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
                'status' => $status,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($dirID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Register phone numbers under a DIR. The enterprise is resolved server-side from the DIR id. Same body, failure modes, and batch semantics whichever path form you use.
     *
     * **Pricing:** This is a billable action. See https://telnyx.com/pricing/numbers for current pricing.
     *
     * @param string $dirID The DIR id. Lowercase UUID.
     * @param list<Document|DocumentShape> $documents Supporting documents covering this batch. At least one entry with `document_type: letter_of_authorization` is required - the LOA authorises Telnyx to register these numbers under the DIR. Each `document_id` must come from the Telnyx Documents API. Additional document types (e.g. business registration) may be included alongside the LOA.
     * @param list<string> $phoneNumbers 1–15 phone numbers in E.164 format. 10-digit US numbers are auto-prefixed with `1`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function add(
        string $dirID,
        array $documents,
        array $phoneNumbers,
        RequestOptions|array|null $requestOptions = null,
    ): PhoneNumberAddResponse {
        $params = Util::removeNulls(
            ['documents' => $documents, 'phoneNumbers' => $phoneNumbers]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->add($dirID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Deregister phone numbers from a DIR. The enterprise is resolved server-side from the DIR id. Returns a partial-success envelope.
     *
     * @param string $dirID The DIR id. Lowercase UUID.
     * @param list<string> $phoneNumbers
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function remove(
        string $dirID,
        array $phoneNumbers,
        RequestOptions|array|null $requestOptions = null,
    ): PhoneNumberRemoveResponse {
        $params = Util::removeNulls(['phoneNumbers' => $phoneNumbers]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->remove($dirID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
