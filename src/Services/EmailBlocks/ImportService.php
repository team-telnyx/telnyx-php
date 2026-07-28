<?php

declare(strict_types=1);

namespace Telnyx\Services\EmailBlocks;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\FileParam;
use Telnyx\Core\Util;
use Telnyx\EmailBlocks\Import\EmailBlockImportResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\EmailBlocks\ImportContract;

/**
 * Async CSV import of competitor suppression lists.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ImportService implements ImportContract
{
    /**
     * @api
     */
    public ImportRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ImportRawService($client);
    }

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
     * @param string|FileParam $file The CSV file (Plug.Upload). Missing/non-upload → 400.
     * @param int $blockTtlDays TTL for imported `manual_block` rows; other reasons get `expires_at: null`. Invalid/missing → falls back to 30.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string|FileParam $file,
        int $blockTtlDays = 30,
        RequestOptions|array|null $requestOptions = null,
    ): EmailBlockImportResponse {
        $params = Util::removeNulls(
            ['file' => $file, 'blockTtlDays' => $blockTtlDays]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
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
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): EmailBlockImportResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
