<?php

declare(strict_types=1);

namespace Telnyx\Services\EmailMessages;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\EmailCursorPagination;
use Telnyx\EmailMessages\Recipients\EmailRecipient;
use Telnyx\EmailMessages\Recipients\RecipientGetResponse;
use Telnyx\EmailMessages\Recipients\RecipientListParams;
use Telnyx\EmailMessages\Recipients\RecipientListParams\Kind;
use Telnyx\EmailMessages\Recipients\RecipientListParams\Status;
use Telnyx\EmailMessages\Recipients\RecipientRetrieveParams;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\EmailMessages\RecipientsRawContract;

/**
 * Send and manage email messages. Legacy `/v2/emails` routes are aliases for these endpoints.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class RecipientsRawService implements RecipientsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Returns the current delivery state of a single recipient, including status,
     * billable flag, SMTP detail, and lifecycle timestamps.
     * BCC recipient addresses are redacted (returned as null).
     *
     * @param string $recipientID recipient UUID
     * @param array{emailID: string}|RecipientRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RecipientGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $recipientID,
        array|RecipientRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RecipientRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );
        $emailID = $parsed['emailID'];
        unset($parsed['emailID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['email_messages/%1$s/recipients/%2$s', $emailID, $recipientID],
            options: $options,
            convert: RecipientGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Lists per-recipient delivery states for a single message with cursor pagination.
     * Each recipient has an independent status, billable flag, and lifecycle timestamps.
     * BCC recipient addresses are redacted (returned as null) to protect BCC privacy.
     * Default page size is 25, maximum is 100.
     *
     * @param string $emailID email message UUID
     * @param array{
     *   kind?: Kind|value-of<Kind>,
     *   pageCursor?: string,
     *   pageSize?: int,
     *   status?: value-of<Status>,
     * }|RecipientListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailCursorPagination<EmailRecipient>>
     *
     * @throws APIException
     */
    public function list(
        string $emailID,
        array|RecipientListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RecipientListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['email_messages/%1$s/recipients', $emailID],
            query: Util::array_transform_keys(
                $parsed,
                ['pageCursor' => 'page_cursor', 'pageSize' => 'page_size']
            ),
            options: $options,
            convert: EmailRecipient::class,
            page: EmailCursorPagination::class,
        );
    }
}
