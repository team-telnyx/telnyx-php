<?php

declare(strict_types=1);

namespace Telnyx\Compute\Funcs\Export\FuncLogExportConfigResponse;

use Telnyx\Compute\Funcs\Export\FuncLogExportConfigResponse\Data\RecordType;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Metadata-only view of a function's log export destination. Header values are write-only (encrypted server-side) and never appear in any response.
 *
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   createdAt?: \DateTimeInterface|null,
 *   enabled?: bool|null,
 *   endpoint?: string|null,
 *   funcID?: string|null,
 *   invocationExportEnabled?: bool|null,
 *   recordType?: null|RecordType|value-of<RecordType>,
 *   runtimeExportEnabled?: bool|null,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Configuration record ID.
     */
    #[Optional]
    public ?string $id;

    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * Whether export is enabled for this function.
     */
    #[Optional]
    public ?bool $enabled;

    /**
     * HTTPS OTLP endpoint URL logs are pushed to.
     */
    #[Optional]
    public ?string $endpoint;

    /**
     * Function ID this configuration belongs to.
     */
    #[Optional('func_id')]
    public ?string $funcID;

    /**
     * Whether invocation records (one per HTTP request) are exported.
     */
    #[Optional('invocation_export_enabled')]
    public ?bool $invocationExportEnabled;

    /** @var value-of<RecordType>|null $recordType */
    #[Optional('record_type', enum: RecordType::class)]
    public ?string $recordType;

    /**
     * Whether runtime logs (function stdout/stderr) are exported.
     */
    #[Optional('runtime_export_enabled')]
    public ?bool $runtimeExportEnabled;

    #[Optional('updated_at')]
    public ?\DateTimeInterface $updatedAt;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param RecordType|value-of<RecordType>|null $recordType
     */
    public static function with(
        ?string $id = null,
        ?\DateTimeInterface $createdAt = null,
        ?bool $enabled = null,
        ?string $endpoint = null,
        ?string $funcID = null,
        ?bool $invocationExportEnabled = null,
        RecordType|string|null $recordType = null,
        ?bool $runtimeExportEnabled = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $enabled && $self['enabled'] = $enabled;
        null !== $endpoint && $self['endpoint'] = $endpoint;
        null !== $funcID && $self['funcID'] = $funcID;
        null !== $invocationExportEnabled && $self['invocationExportEnabled'] = $invocationExportEnabled;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $runtimeExportEnabled && $self['runtimeExportEnabled'] = $runtimeExportEnabled;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Configuration record ID.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Whether export is enabled for this function.
     */
    public function withEnabled(bool $enabled): self
    {
        $self = clone $this;
        $self['enabled'] = $enabled;

        return $self;
    }

    /**
     * HTTPS OTLP endpoint URL logs are pushed to.
     */
    public function withEndpoint(string $endpoint): self
    {
        $self = clone $this;
        $self['endpoint'] = $endpoint;

        return $self;
    }

    /**
     * Function ID this configuration belongs to.
     */
    public function withFuncID(string $funcID): self
    {
        $self = clone $this;
        $self['funcID'] = $funcID;

        return $self;
    }

    /**
     * Whether invocation records (one per HTTP request) are exported.
     */
    public function withInvocationExportEnabled(
        bool $invocationExportEnabled
    ): self {
        $self = clone $this;
        $self['invocationExportEnabled'] = $invocationExportEnabled;

        return $self;
    }

    /**
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * Whether runtime logs (function stdout/stderr) are exported.
     */
    public function withRuntimeExportEnabled(bool $runtimeExportEnabled): self
    {
        $self = clone $this;
        $self['runtimeExportEnabled'] = $runtimeExportEnabled;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
