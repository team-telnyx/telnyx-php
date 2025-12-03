<?php

declare(strict_types=1);

namespace Telnyx\Services\Texml;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
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

final class AccountsService implements AccountsContract
{
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
     * @param array{
     *   DateCreated?: string|\DateTimeInterface, Page?: int, PageSize?: int
     * }|AccountRetrieveRecordingsJsonParams $params
     *
     * @throws APIException
     */
    public function retrieveRecordingsJson(
        string $accountSid,
        array|AccountRetrieveRecordingsJsonParams $params,
        ?RequestOptions $requestOptions = null,
    ): AccountGetRecordingsJsonResponse {
        [$parsed, $options] = AccountRetrieveRecordingsJsonParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param array{
     *   PageSize?: int, PageToken?: string
     * }|AccountRetrieveTranscriptionsJsonParams $params
     *
     * @throws APIException
     */
    public function retrieveTranscriptionsJson(
        string $accountSid,
        array|AccountRetrieveTranscriptionsJsonParams $params,
        ?RequestOptions $requestOptions = null,
    ): AccountGetTranscriptionsJsonResponse {
        [$parsed, $options] = AccountRetrieveTranscriptionsJsonParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['texml/Accounts/%1$s/Transcriptions.json', $accountSid],
            query: $parsed,
            options: $options,
            convert: AccountGetTranscriptionsJsonResponse::class,
        );
    }
}
