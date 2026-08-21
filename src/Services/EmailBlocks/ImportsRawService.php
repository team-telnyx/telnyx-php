<?php

declare(strict_types=1);

namespace Telnyx\Services\EmailBlocks;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\FileParam;
use Telnyx\EmailBlocks\Imports\EmailBlockImportResponse;
use Telnyx\EmailBlocks\Imports\ImportCreateParams;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\EmailBlocks\ImportsRawContract;

/**
 * Async CSV import of competitor suppression lists.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ImportsRawService implements ImportsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Accepts `multipart/form-data` with a `file` field (the CSV) and an
     * optional `block_ttl_days` (integer >0, default 30). Validates:
     *   - content ≤ 25 MiB, else `413`
     *   - row count ≤ 250 000, else `413`
     *   - header-only / all-blank / undetectable provider → `400`
     * Returns `202` with the import record (status `pending`); an Oban
     * worker (`EmailBlockImportWorker`, max_attempts 3) transitions
     * `pending → processing → completed | failed`. `block_ttl_days`
     * applies only to imported `manual_block` rows; other reasons get
     * `expires_at: nil`. Provider is auto-detected from the CSV header
     * (`sendgrid` / `mailgun` / `ses` / `generic`).
     *
     * @param array{
     *   file: string|FileParam, blockTtlDays?: int
     * }|ImportCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailBlockImportResponse>
     *
     * @throws APIException
     */
    public function create(
        array|ImportCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ImportCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'email_blocks/import',
            headers: ['Content-Type' => 'multipart/form-data'],
            body: (object) $parsed,
            options: $options,
            convert: EmailBlockImportResponse::class,
        );
    }

    /**
     * @api
     *
     * Account-scoped fetch (cross-account → 404; malformed UUID → 404).
     * Nullable fields are omitted until terminal: `provider`/`completed_at`
     * when nil; `processed_rows`/`created_count`/`existing_count`/
     * `skipped_count`/`error_count` only when `status == completed`;
     * `errors` only when non-empty; `failure_reason` only on terminal
     * failure.
     *
     * @param string $id Resource UUID. Malformed UUIDs are treated as not-found (not 400).
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailBlockImportResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['email_blocks/import/%1$s', $id],
            options: $requestOptions,
            convert: EmailBlockImportResponse::class,
        );
    }
}
