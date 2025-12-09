<?php

declare(strict_types=1);

namespace Telnyx\Services\Texml;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Texml\AccountsRawContract;
use Telnyx\Texml\Accounts\AccountGetRecordingsJsonResponse;
use Telnyx\Texml\Accounts\AccountGetTranscriptionsJsonResponse;
use Telnyx\Texml\Accounts\AccountRetrieveRecordingsJsonParams;
use Telnyx\Texml\Accounts\AccountRetrieveTranscriptionsJsonParams;

final class AccountsRawService implements AccountsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Returns multiple recording resources for an account.
     *
     * @param string $accountSid the id of the account the resource belongs to
     * @param array{
     *   dateCreated?: string|\DateTimeInterface, page?: int, pageSize?: int
     * }|AccountRetrieveRecordingsJsonParams $params
     *
     * @return BaseResponse<AccountGetRecordingsJsonResponse>
     *
     * @throws APIException
     */
    public function retrieveRecordingsJson(
        string $accountSid,
        array|AccountRetrieveRecordingsJsonParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AccountRetrieveRecordingsJsonParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
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
    }

    /**
     * @api
     *
     * Returns multiple recording transcription resources for an account.
     *
     * @param string $accountSid the id of the account the resource belongs to
     * @param array{
     *   pageSize?: int, pageToken?: string
     * }|AccountRetrieveTranscriptionsJsonParams $params
     *
     * @return BaseResponse<AccountGetTranscriptionsJsonResponse>
     *
     * @throws APIException
     */
    public function retrieveTranscriptionsJson(
        string $accountSid,
        array|AccountRetrieveTranscriptionsJsonParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AccountRetrieveTranscriptionsJsonParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['texml/Accounts/%1$s/Transcriptions.json', $accountSid],
            query: Util::array_transform_keys(
                $parsed,
                ['pageSize' => 'PageSize', 'pageToken' => 'PageToken']
            ),
            options: $options,
            convert: AccountGetTranscriptionsJsonResponse::class,
        );
    }
}
