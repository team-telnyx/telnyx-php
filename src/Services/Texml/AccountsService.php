<?php

declare(strict_types=1);

namespace Telnyx\Services\Texml;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
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
     *   dateCreated?: string|\DateTimeInterface, page?: int, pageSize?: int
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

        /** @var BaseResponse<AccountGetRecordingsJsonResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['texml/Accounts/%1$s/Recordings.json', $accountSid],
            query: Util::array_transform_keys(
                $parsed,
                [
                    'dateCreated' => 'DateCreated',
                    'page' => 'Page',
                    'pageSize' => 'PageSize',
                ],
            ),
            options: $options,
            convert: AccountGetRecordingsJsonResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns multiple recording transcription resources for an account.
     *
     * @param array{
     *   pageSize?: int, pageToken?: string
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

        /** @var BaseResponse<AccountGetTranscriptionsJsonResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['texml/Accounts/%1$s/Transcriptions.json', $accountSid],
            query: Util::array_transform_keys(
                $parsed,
                ['pageSize' => 'PageSize', 'pageToken' => 'PageToken']
            ),
            options: $options,
            convert: AccountGetTranscriptionsJsonResponse::class,
        );

        return $response->parse();
    }
}
