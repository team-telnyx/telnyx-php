<?php

declare(strict_types=1);

namespace Telnyx\Services\Compute\Funcs;

use Telnyx\Client;
use Telnyx\Compute\Funcs\Export\ExportCreateParams;
use Telnyx\Compute\Funcs\Export\FuncLogExportConfigResponse;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Compute\Funcs\ExportRawContract;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ExportRawService implements ExportRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Configures the external OTLP endpoint a function's runtime and/or invocation logs are pushed to as they happen. This operation is a **full replace, not a patch**: `endpoint`, `headers`, `runtime_export_enabled`, and `invocation_export_enabled` are all required on every call — omitting any of them is a 422, not "keep the current value". Headers are encrypted at rest and never returned in any response.
     *
     * The endpoint must be an HTTPS URL. When export is configured, new log records are converted to OTLP log records and delivered continuously; export never bypasses platform log storage, and delivery retries with a bounded policy while the destination is unreachable. Only logs generated after configuration are exported — there is no historical replay.
     *
     * @param string $id Function ID
     * @param array{
     *   endpoint: string,
     *   headers: array<string,string>,
     *   invocationExportEnabled: bool,
     *   runtimeExportEnabled: bool,
     * }|ExportCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FuncLogExportConfigResponse>
     *
     * @throws APIException
     */
    public function create(
        string $id,
        array|ExportCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ExportCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['compute/funcs/%1$s/logs/export', $id],
            body: (object) $parsed,
            options: $options,
            convert: FuncLogExportConfigResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns the function's configured log export destination and which log types are exported. Headers are never returned. Returns 404 (error code 10005) when no destination is configured for the function.
     *
     * @param string $id Function ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FuncLogExportConfigResponse>
     *
     * @throws APIException
     */
    public function list(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['compute/funcs/%1$s/logs/export', $id],
            options: $requestOptions,
            convert: FuncLogExportConfigResponse::class,
        );
    }

    /**
     * @api
     *
     * Stops exporting a function's logs and removes its destination configuration. Idempotent: deleting when nothing is configured succeeds.
     *
     * @param string $id Function ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteAll(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['compute/funcs/%1$s/logs/export', $id],
            options: $requestOptions,
            convert: null,
        );
    }
}
