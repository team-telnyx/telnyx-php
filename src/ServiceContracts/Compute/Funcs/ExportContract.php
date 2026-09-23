<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Compute\Funcs;

use Telnyx\Compute\Funcs\Export\FuncLogExportConfigResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ExportContract
{
    /**
     * @api
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
    ): FuncLogExportConfigResponse;

    /**
     * @api
     *
     * @param string $id Function ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): FuncLogExportConfigResponse;

    /**
     * @api
     *
     * @param string $id Function ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteAll(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): mixed;
}
