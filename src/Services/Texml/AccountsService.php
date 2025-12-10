<?php

declare(strict_types=1);

namespace Telnyx\Services\Texml;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Texml\AccountsContract;
use Telnyx\Services\Texml\Accounts\CallsService;
use Telnyx\Services\Texml\Accounts\ConferencesService;
use Telnyx\Services\Texml\Accounts\RecordingsService;
use Telnyx\Services\Texml\Accounts\TranscriptionsService;
use Telnyx\Texml\Accounts\AccountGetRecordingsJsonResponse;
use Telnyx\Texml\Accounts\AccountGetTranscriptionsJsonResponse;

final class AccountsService implements AccountsContract
{
    /**
     * @api
     */
    public AccountsRawService $raw;

    /**
     * @api
     */
    public CallsService $calls;

    /**
     * @api
     */
    public ConferencesService $conferences;

    /**
     * @api
     */
    public RecordingsService $recordings;

    /**
     * @api
     */
    public TranscriptionsService $transcriptions;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new AccountsRawService($client);
        $this->calls = new CallsService($client);
        $this->conferences = new ConferencesService($client);
        $this->recordings = new RecordingsService($client);
        $this->transcriptions = new TranscriptionsService($client);
    }

    /**
     * @api
     *
     * Returns multiple recording resources for an account.
     *
     * @param string $accountSid the id of the account the resource belongs to
     * @param string|\DateTimeInterface $dateCreated Filters recording by the creation date. Expected format is ISO8601 date or date-time, ie. {YYYY}-{MM}-{DD} or {YYYY}-{MM}-{DD}T{hh}:{mm}:{ss}Z. Also accepts inequality operators, e.g. DateCreated>=2023-05-22.
     * @param int $page the number of the page to be displayed, zero-indexed, should be used in conjuction with PageToken
     * @param int $pageSize The number of records to be displayed on a page
     *
     * @throws APIException
     */
    public function retrieveRecordingsJson(
        string $accountSid,
        string|\DateTimeInterface|null $dateCreated = null,
        ?int $page = null,
        ?int $pageSize = null,
        ?RequestOptions $requestOptions = null,
    ): AccountGetRecordingsJsonResponse {
        $params = Util::removeNulls(
            ['dateCreated' => $dateCreated, 'page' => $page, 'pageSize' => $pageSize]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveRecordingsJson($accountSid, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns multiple recording transcription resources for an account.
     *
     * @param string $accountSid the id of the account the resource belongs to
     * @param int $pageSize The number of records to be displayed on a page
     * @param string $pageToken used to request the next page of results
     *
     * @throws APIException
     */
    public function retrieveTranscriptionsJson(
        string $accountSid,
        ?int $pageSize = null,
        ?string $pageToken = null,
        ?RequestOptions $requestOptions = null,
    ): AccountGetTranscriptionsJsonResponse {
        $params = Util::removeNulls(
            ['pageSize' => $pageSize, 'pageToken' => $pageToken]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveTranscriptionsJson($accountSid, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
