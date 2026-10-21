<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Texml;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Texml\Accounts\AccountGetTranscriptionsJsonResponse;
use Telnyx\Texml\Accounts\Calls\RecordingsJson\TexmlGetCallRecordingsResponseBody;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface AccountsContract
{
    /**
     * @api
     *
     * @param string $accountSid The UUID of the Telnyx account that owns the resource, for example `f5586561-8ff0-4291-a51b-c7dfe4139ff9`. The `account_sid` path segment is kept for Twilio API compatibility, but the value is a Telnyx account UUID, not a Twilio `AC...` SID. It must match the account that owns the API key used to authenticate the request, otherwise the endpoint returns `404`. The same value is sent as `AccountSid` in TeXML webhooks.
     * @param \DateTimeInterface $dateCreated Filters recording by the creation date. Expected format is ISO8601 date or date-time, ie. {YYYY}-{MM}-{DD} or {YYYY}-{MM}-{DD}T{hh}:{mm}:{ss}Z. Also accepts inequality operators, e.g. DateCreated>=2023-05-22.
     * @param int $page the number of the page to be displayed, zero-indexed, should be used in conjuction with PageToken
     * @param int $pageSize The number of records to be displayed on a page
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveRecordingsJson(
        string $accountSid,
        ?\DateTimeInterface $dateCreated = null,
        ?int $page = null,
        ?int $pageSize = null,
        RequestOptions|array|null $requestOptions = null,
    ): TexmlGetCallRecordingsResponseBody;

    /**
     * @api
     *
     * @param string $accountSid The UUID of the Telnyx account that owns the resource, for example `f5586561-8ff0-4291-a51b-c7dfe4139ff9`. The `account_sid` path segment is kept for Twilio API compatibility, but the value is a Telnyx account UUID, not a Twilio `AC...` SID. It must match the account that owns the API key used to authenticate the request, otherwise the endpoint returns `404`. The same value is sent as `AccountSid` in TeXML webhooks.
     * @param int $pageSize The number of records to be displayed on a page
     * @param string $pageToken used to request the next page of results
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveTranscriptionsJson(
        string $accountSid,
        ?int $pageSize = null,
        ?string $pageToken = null,
        RequestOptions|array|null $requestOptions = null,
    ): AccountGetTranscriptionsJsonResponse;
}
