<?php

declare(strict_types=1);

namespace Telnyx\Compute\Funcs\Export;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Configures the external OTLP endpoint a function's runtime and/or invocation logs are pushed to as they happen. This operation is a **full replace, not a patch**: `endpoint`, `headers`, `runtime_export_enabled`, and `invocation_export_enabled` are all required on every call — omitting any of them is a 422, not "keep the current value". Headers are encrypted at rest and never returned in any response.
 *
 * The endpoint must be an HTTPS URL. When export is configured, new log records are converted to OTLP log records and delivered continuously; export never bypasses platform log storage, and delivery retries with a bounded policy while the destination is unreachable. Only logs generated after configuration are exported — there is no historical replay.
 *
 * @see Telnyx\Services\Compute\Funcs\ExportService::create()
 *
 * @phpstan-type ExportCreateParamsShape = array{
 *   endpoint: string,
 *   headers: array<string,string>,
 *   invocationExportEnabled: bool,
 *   runtimeExportEnabled: bool,
 * }
 */
final class ExportCreateParams implements BaseModel
{
    /** @use SdkModel<ExportCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * HTTPS URL to push logs to.
     */
    #[Required]
    public string $endpoint;

    /**
     * Headers attached to every export push, as key-value pairs (e.g. an auth token the collector expects). Required even when empty — {} means "no headers". Encrypted at rest; never returned.
     *
     * @var array<string,string> $headers
     */
    #[Required(map: 'string')]
    public array $headers;

    /**
     * Export invocation records (one per HTTP request) to this destination.
     */
    #[Required('invocation_export_enabled')]
    public bool $invocationExportEnabled;

    /**
     * Export runtime logs (function stdout/stderr) to this destination.
     */
    #[Required('runtime_export_enabled')]
    public bool $runtimeExportEnabled;

    /**
     * `new ExportCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExportCreateParams::with(
     *   endpoint: ...,
     *   headers: ...,
     *   invocationExportEnabled: ...,
     *   runtimeExportEnabled: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExportCreateParams)
     *   ->withEndpoint(...)
     *   ->withHeaders(...)
     *   ->withInvocationExportEnabled(...)
     *   ->withRuntimeExportEnabled(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param array<string,string> $headers
     */
    public static function with(
        string $endpoint,
        array $headers,
        bool $invocationExportEnabled,
        bool $runtimeExportEnabled,
    ): self {
        $self = new self;

        $self['endpoint'] = $endpoint;
        $self['headers'] = $headers;
        $self['invocationExportEnabled'] = $invocationExportEnabled;
        $self['runtimeExportEnabled'] = $runtimeExportEnabled;

        return $self;
    }

    /**
     * HTTPS URL to push logs to.
     */
    public function withEndpoint(string $endpoint): self
    {
        $self = clone $this;
        $self['endpoint'] = $endpoint;

        return $self;
    }

    /**
     * Headers attached to every export push, as key-value pairs (e.g. an auth token the collector expects). Required even when empty — {} means "no headers". Encrypted at rest; never returned.
     *
     * @param array<string,string> $headers
     */
    public function withHeaders(array $headers): self
    {
        $self = clone $this;
        $self['headers'] = $headers;

        return $self;
    }

    /**
     * Export invocation records (one per HTTP request) to this destination.
     */
    public function withInvocationExportEnabled(
        bool $invocationExportEnabled
    ): self {
        $self = clone $this;
        $self['invocationExportEnabled'] = $invocationExportEnabled;

        return $self;
    }

    /**
     * Export runtime logs (function stdout/stderr) to this destination.
     */
    public function withRuntimeExportEnabled(bool $runtimeExportEnabled): self
    {
        $self = clone $this;
        $self['runtimeExportEnabled'] = $runtimeExportEnabled;

        return $self;
    }
}
