<?php

declare(strict_types=1);

namespace Telnyx\Services\Texml;

use Telnyx\Client;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Texml\AccountsContract;
use Telnyx\Services\Texml\Accounts\CallsService;
use Telnyx\Services\Texml\Accounts\ConferencesService;
use Telnyx\Services\Texml\Accounts\RecordingsService;
use Telnyx\Services\Texml\Accounts\TranscriptionsService;
use Telnyx\Texml\Accounts\AccountGetRecordingsJsonResponse;
use Telnyx\Texml\Accounts\AccountGetTranscriptionsJsonResponse;
use Telnyx\Texml\Accounts\AccountRetrieveRecordingsJsonParams;
use Telnyx\Texml\Accounts\AccountRetrieveTranscriptionsJsonParams;

use const Telnyx\Core\OMIT as omit;

final class AccountsService implements AccountsContract
{
    /**
     * @@api
     */
    public CallsService $calls;

    /**
     * @@api
     */
    public ConferencesService $conferences;

    /**
     * @@api
     */
    public RecordingsService $recordings;

    /**
     * @@api
     */
    public TranscriptionsService $transcriptions;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->calls = new CallsService($this->client);
        $this->conferences = new ConferencesService($this->client);
        $this->recordings = new RecordingsService($this->client);
        $this->transcriptions = new TranscriptionsService($this->client);
    }

    /**
     * @api
     *
     * Returns multiple recording resources for an account.
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
    ): AccountGetRecordingsJsonResponse {
        [$parsed, $options] = AccountRetrieveRecordingsJsonParams::parseRequest(
            ['dateCreated' => $dateCreated, 'page' => $page, 'pageSize' => $pageSize],
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['texml/Accounts/%1$s/Recordings.json', $accountSid],
            query: $parsed,
            options: $options,
            convert: AccountGetRecordingsJsonResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns multiple recording transcription resources for an account.
     *
     * @param int $pageSize The number of records to be displayed on a page
     * @param string $pageToken used to request the next page of results
     */
    public function retrieveTranscriptionsJson(
        string $accountSid,
        $pageSize = omit,
        $pageToken = omit,
        ?RequestOptions $requestOptions = null,
    ): AccountGetTranscriptionsJsonResponse {
        [$parsed, $options] = AccountRetrieveTranscriptionsJsonParams::parseRequest(
            ['pageSize' => $pageSize, 'pageToken' => $pageToken],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['texml/Accounts/%1$s/Transcriptions.json', $accountSid],
            query: $parsed,
            options: $options,
            convert: AccountGetTranscriptionsJsonResponse::class,
        );
    }
}
