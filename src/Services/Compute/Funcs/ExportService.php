<?php

declare(strict_types=1);

namespace Telnyx\Services\Compute\Funcs;

use Telnyx\Client;
use Telnyx\Compute\Funcs\Export\FuncLogExportConfigResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Compute\Funcs\ExportContract;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ExportService implements ExportContract
{
    /**
     * @api
     */
    public ExportRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ExportRawService($client);
    }

    /**
     * @api
     *
     * Configures the external OTLP endpoint a function's runtime and/or invocation logs are pushed to as they happen. This operation is a **full replace, not a patch**: `endpoint`, `headers`, `runtime_export_enabled`, and `invocation_export_enabled` are all required on every call — omitting any of them is a 422, not "keep the current value". Headers are encrypted at rest and never returned in any response.
     *
     * The endpoint must be an HTTPS URL. When export is configured, new log records are converted to OTLP log records and delivered continuously; export never bypasses platform log storage, and delivery retries with a bounded policy while the destination is unreachable. Only logs generated after configuration are exported — there is no historical replay.
     *
     * @param string $id Function ID
     * @param string $endpoint HTTPS URL to push logs to
     * @param array<string,string> $headers Headers attached to every export push, as key-value pairs (e.g. an auth token the collector expects). Required even when empty — {} means "no headers". Encrypted at rest; never returned.
     * @param bool $invocationExportEnabled Export invocation records (one per HTTP request) to this destination
     * @param bool $runtimeExportEnabled Export runtime logs (function stdout/stderr) to this destination
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $id,
        string $endpoint,
        array $headers,
        bool $invocationExportEnabled,
        bool $runtimeExportEnabled,
        RequestOptions|array|null $requestOptions = null,
    ): FuncLogExportConfigResponse {
        $params = [
            'endpoint' => $endpoint,
            'headers' => $headers,
            'invocationExportEnabled' => $invocationExportEnabled,
            'runtimeExportEnabled' => $runtimeExportEnabled,
        ];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns the function's configured log export destination and which log types are exported. Headers are never returned. Returns 404 (error code 10005) when no destination is configured for the function.
     *
     * @param string $id Function ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): FuncLogExportConfigResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Stops exporting a function's logs and removes its destination configuration. Idempotent: deleting when nothing is configured succeeds.
     *
     * @param string $id Function ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteAll(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->deleteAll($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
