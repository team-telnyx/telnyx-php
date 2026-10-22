<?php

declare(strict_types=1);

namespace Telnyx\Services\Texml;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Texml\AccountsRawContract;
use Telnyx\Texml\Accounts\AccountGetTranscriptionsJsonResponse;
use Telnyx\Texml\Accounts\AccountRetrieveRecordingsJsonParams;
use Telnyx\Texml\Accounts\AccountRetrieveTranscriptionsJsonParams;
use Telnyx\Texml\Accounts\Calls\RecordingsJson\TexmlGetCallRecordingsResponseBody;

/**
 * TeXML REST Commands.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
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
     * @param string $accountSid The UUID of the Telnyx account that owns the resource, for example `f5586561-8ff0-4291-a51b-c7dfe4139ff9`. The `account_sid` path segment is kept for Twilio API compatibility, but the value is a Telnyx account UUID, not a Twilio `AC...` SID. It must match the account that owns the API key used to authenticate the request, otherwise the endpoint returns `404`. The same value is sent as `AccountSid` in TeXML webhooks.
     * @param array{
     *   dateCreated?: \DateTimeInterface, page?: int, pageSize?: int
     * }|AccountRetrieveRecordingsJsonParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TexmlGetCallRecordingsResponseBody>
     *
     * @throws APIException
     */
    public function retrieveRecordingsJson(
        string $accountSid,
        array|AccountRetrieveRecordingsJsonParams $params,
        RequestOptions|array|null $requestOptions = null,
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
            convert: TexmlGetCallRecordingsResponseBody::class,
        );
    }

    /**
     * @api
     *
     * Returns multiple recording transcription resources for an account.
     *
     * @param string $accountSid The UUID of the Telnyx account that owns the resource, for example `f5586561-8ff0-4291-a51b-c7dfe4139ff9`. The `account_sid` path segment is kept for Twilio API compatibility, but the value is a Telnyx account UUID, not a Twilio `AC...` SID. It must match the account that owns the API key used to authenticate the request, otherwise the endpoint returns `404`. The same value is sent as `AccountSid` in TeXML webhooks.
     * @param array{
     *   pageSize?: int, pageToken?: string
     * }|AccountRetrieveTranscriptionsJsonParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AccountGetTranscriptionsJsonResponse>
     *
     * @throws APIException
     */
    public function retrieveTranscriptionsJson(
        string $accountSid,
        array|AccountRetrieveTranscriptionsJsonParams $params,
        RequestOptions|array|null $requestOptions = null,
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
