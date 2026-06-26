<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Dir;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\Dir\PhoneNumbers\PhoneNumberAddParams\Document;
use Telnyx\Dir\PhoneNumbers\PhoneNumberAddResponse;
use Telnyx\Dir\PhoneNumbers\PhoneNumberListParams\Status;
use Telnyx\Dir\PhoneNumbers\PhoneNumberListResponse;
use Telnyx\Dir\PhoneNumbers\PhoneNumberRemoveResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type DocumentShape from \Telnyx\Dir\PhoneNumbers\PhoneNumberAddParams\Document
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface PhoneNumbersContract
{
    /**
     * @api
     *
     * @param string $dirID The DIR id. Lowercase UUID.
     * @param int $pageNumber 1-based page number. Out-of-range values return an empty page with correct meta.
     * @param int $pageSize Items per page. Maximum 250; values above are clamped to 250.
     * @param Status|value-of<Status> $status filter by phone-number status
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<PhoneNumberListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $dirID,
        int $pageNumber = 1,
        int $pageSize = 20,
        Status|string|null $status = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;

    /**
     * @api
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
    ): PhoneNumberAddResponse;

    /**
     * @api
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
    ): PhoneNumberRemoveResponse;
}
