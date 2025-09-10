<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Texml;

use Telnyx\RequestOptions;
use Telnyx\Texml\Accounts\AccountGetRecordingsJsonResponse;
use Telnyx\Texml\Accounts\AccountGetTranscriptionsJsonResponse;

use const Telnyx\Core\OMIT as omit;

interface AccountsContract
{
    /**
     * @api
     *
     * @param \DateTimeInterface $dateCreated Filters recording by the creation date. Expected format is ISO8601 date or date-time, ie. {YYYY}-{MM}-{DD} or {YYYY}-{MM}-{DD}T{hh}:{mm}:{ss}Z. Also accepts inequality operators, e.g. DateCreated>=2023-05-22.
     * @param int $page the number of the page to be displayed, zero-indexed, should be used in conjuction with PageToken
     * @param int $pageSize The number of records to be displayed on a page
     */
    public function retrieveRecordingsJson(
        string $accountSid,
        $dateCreated = omit,
        $page = omit,
        $pageSize = omit,
        ?RequestOptions $requestOptions = null,
    ): AccountGetRecordingsJsonResponse;

    /**
     * @api
     *
     * @param int $pageSize The number of records to be displayed on a page
     * @param string $pageToken used to request the next page of results
     */
    public function retrieveTranscriptionsJson(
        string $accountSid,
        $pageSize = omit,
        $pageToken = omit,
        ?RequestOptions $requestOptions = null,
    ): AccountGetTranscriptionsJsonResponse;
}
