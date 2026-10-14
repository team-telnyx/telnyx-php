<?php

declare(strict_types=1);

namespace Telnyx\LlmTokenGateway\Usage\UsageGetExportResponse\Data;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\LlmTokenGateway\Usage\UsageGetExportResponse\Data\UsageExportInferenceRequest\Biller;
use Telnyx\LlmTokenGateway\Usage\UsageGetExportResponse\Data\UsageExportInferenceRequest\Metadata;
use Telnyx\LlmTokenGateway\Usage\UsageGetExportResponse\Data\UsageExportInferenceRequest\Protocol;
use Telnyx\LlmTokenGateway\Usage\UsageGetExportResponse\Data\UsageExportInferenceRequest\RouteMode;
use Telnyx\LlmTokenGateway\Usage\UsageGetExportResponse\Data\UsageExportInferenceRequest\Status;
use Telnyx\LlmTokenGateway\Usage\UsageGetExportResponse\Data\UsageExportInferenceRequest\Timings;
use Telnyx\LlmTokenGateway\Usage\UsageGetExportResponse\Data\UsageExportInferenceRequest\UsageSource;
use Telnyx\LlmTokenGateway\Usage\UsageGetExportResponse\Data\UsageExportInferenceRequest\UsageStatus;

/**
 * @phpstan-import-type MetadataVariants from \Telnyx\LlmTokenGateway\Usage\UsageGetExportResponse\Data\UsageExportInferenceRequest\Metadata
 * @phpstan-import-type MetadataShape from \Telnyx\LlmTokenGateway\Usage\UsageGetExportResponse\Data\UsageExportInferenceRequest\Metadata
 * @phpstan-import-type TimingsShape from \Telnyx\LlmTokenGateway\Usage\UsageGetExportResponse\Data\UsageExportInferenceRequest\Timings
 *
 * @phpstan-type UsageExportInferenceRequestShape = array{
 *   id: string,
 *   attempts: int,
 *   biller: Biller|value-of<Biller>,
 *   cacheHit: bool,
 *   configurationVersion: int,
 *   cost: string|null,
 *   endUserID: string|null,
 *   inputTokens: int|null,
 *   metadata: array<string,MetadataShape>,
 *   model: string,
 *   outputTokens: int|null,
 *   protocol: Protocol|value-of<Protocol>,
 *   provider: string,
 *   providerKeyID: string|null,
 *   providerModel: string,
 *   rateVersion: string,
 *   requestID: string,
 *   revision: int,
 *   routeMode: RouteMode|value-of<RouteMode>,
 *   schemaVersion: 1,
 *   status: Status|value-of<Status>,
 *   stream: bool,
 *   supersedes: string|null,
 *   timings: Timings|TimingsShape,
 *   tokenGroupID: string,
 *   tokenKeyID: string,
 *   tokenUserID: string|null,
 *   type: 'inference.request',
 *   usageSource: null|UsageSource|value-of<UsageSource>,
 *   usageStatus: UsageStatus|value-of<UsageStatus>,
 * }
 */
final class UsageExportInferenceRequest implements BaseModel
{
    /** @use SdkModel<UsageExportInferenceRequestShape> */
    use SdkModel;

    /** @var 1 $schemaVersion */
    #[Required('schema_version')]
    public int $schemaVersion = 1;

    /** @var 'inference.request' $type */
    #[Required]
    public string $type = 'inference.request';

    /**
     * Deterministic: req_{request_id}_r{revision}. Deduplicate on id.
     */
    #[Required]
    public string $id;

    #[Required]
    public int $attempts;

    /** @var value-of<Biller> $biller */
    #[Required(enum: Biller::class)]
    public string $biller;

    #[Required('cache_hit')]
    public bool $cacheHit;

    #[Required('configuration_version')]
    public int $configurationVersion;

    /**
     * USD decimal string with exactly 6 places, 0 to 1000000000.000000 (the Money bound); enforcement basis, not invoice truth.
     */
    #[Required]
    public ?string $cost;

    #[Required('end_user_id')]
    public ?string $endUserID;

    #[Required('input_tokens')]
    public ?int $inputTokens;

    /**
     * Customer request tags captured at admission; {} when untagged.
     *
     * @var array<string,MetadataVariants> $metadata
     */
    #[Required(map: Metadata::class)]
    public array $metadata;

    #[Required]
    public string $model;

    #[Required('output_tokens')]
    public ?int $outputTokens;

    /** @var value-of<Protocol> $protocol */
    #[Required(enum: Protocol::class)]
    public string $protocol;

    #[Required]
    public string $provider;

    #[Required('provider_key_id')]
    public ?string $providerKeyID;

    #[Required('provider_model')]
    public string $providerModel;

    #[Required('rate_version')]
    public string $rateVersion;

    #[Required('request_id')]
    public string $requestID;

    #[Required]
    public int $revision;

    /** @var value-of<RouteMode> $routeMode */
    #[Required('route_mode', enum: RouteMode::class)]
    public string $routeMode;

    /** @var value-of<Status> $status */
    #[Required(enum: Status::class)]
    public string $status;

    #[Required]
    public bool $stream;

    /**
     * Previous revision id; keep the highest revision per request_id.
     */
    #[Required]
    public ?string $supersedes;

    #[Required]
    public Timings $timings;

    #[Required('token_group_id')]
    public string $tokenGroupID;

    #[Required('token_key_id')]
    public string $tokenKeyID;

    #[Required('token_user_id')]
    public ?string $tokenUserID;

    /** @var value-of<UsageSource>|null $usageSource */
    #[Required('usage_source', enum: UsageSource::class)]
    public ?string $usageSource;

    /** @var value-of<UsageStatus> $usageStatus */
    #[Required('usage_status', enum: UsageStatus::class)]
    public string $usageStatus;

    /**
     * `new UsageExportInferenceRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * UsageExportInferenceRequest::with(
     *   id: ...,
     *   attempts: ...,
     *   biller: ...,
     *   cacheHit: ...,
     *   configurationVersion: ...,
     *   cost: ...,
     *   endUserID: ...,
     *   inputTokens: ...,
     *   metadata: ...,
     *   model: ...,
     *   outputTokens: ...,
     *   protocol: ...,
     *   provider: ...,
     *   providerKeyID: ...,
     *   providerModel: ...,
     *   rateVersion: ...,
     *   requestID: ...,
     *   revision: ...,
     *   routeMode: ...,
     *   status: ...,
     *   stream: ...,
     *   supersedes: ...,
     *   timings: ...,
     *   tokenGroupID: ...,
     *   tokenKeyID: ...,
     *   tokenUserID: ...,
     *   usageSource: ...,
     *   usageStatus: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new UsageExportInferenceRequest)
     *   ->withID(...)
     *   ->withAttempts(...)
     *   ->withBiller(...)
     *   ->withCacheHit(...)
     *   ->withConfigurationVersion(...)
     *   ->withCost(...)
     *   ->withEndUserID(...)
     *   ->withInputTokens(...)
     *   ->withMetadata(...)
     *   ->withModel(...)
     *   ->withOutputTokens(...)
     *   ->withProtocol(...)
     *   ->withProvider(...)
     *   ->withProviderKeyID(...)
     *   ->withProviderModel(...)
     *   ->withRateVersion(...)
     *   ->withRequestID(...)
     *   ->withRevision(...)
     *   ->withRouteMode(...)
     *   ->withStatus(...)
     *   ->withStream(...)
     *   ->withSupersedes(...)
     *   ->withTimings(...)
     *   ->withTokenGroupID(...)
     *   ->withTokenKeyID(...)
     *   ->withTokenUserID(...)
     *   ->withUsageSource(...)
     *   ->withUsageStatus(...)
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
     * @param Biller|value-of<Biller> $biller
     * @param array<string,MetadataShape> $metadata
     * @param Protocol|value-of<Protocol> $protocol
     * @param RouteMode|value-of<RouteMode> $routeMode
     * @param Status|value-of<Status> $status
     * @param Timings|TimingsShape $timings
     * @param UsageSource|value-of<UsageSource>|null $usageSource
     * @param UsageStatus|value-of<UsageStatus> $usageStatus
     */
    public static function with(
        string $id,
        int $attempts,
        Biller|string $biller,
        bool $cacheHit,
        int $configurationVersion,
        ?string $cost,
        ?string $endUserID,
        ?int $inputTokens,
        array $metadata,
        string $model,
        ?int $outputTokens,
        Protocol|string $protocol,
        string $provider,
        ?string $providerKeyID,
        string $providerModel,
        string $rateVersion,
        string $requestID,
        int $revision,
        RouteMode|string $routeMode,
        Status|string $status,
        bool $stream,
        ?string $supersedes,
        Timings|array $timings,
        string $tokenGroupID,
        string $tokenKeyID,
        ?string $tokenUserID,
        UsageSource|string|null $usageSource,
        UsageStatus|string $usageStatus,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['attempts'] = $attempts;
        $self['biller'] = $biller;
        $self['cacheHit'] = $cacheHit;
        $self['configurationVersion'] = $configurationVersion;
        $self['cost'] = $cost;
        $self['endUserID'] = $endUserID;
        $self['inputTokens'] = $inputTokens;
        $self['metadata'] = $metadata;
        $self['model'] = $model;
        $self['outputTokens'] = $outputTokens;
        $self['protocol'] = $protocol;
        $self['provider'] = $provider;
        $self['providerKeyID'] = $providerKeyID;
        $self['providerModel'] = $providerModel;
        $self['rateVersion'] = $rateVersion;
        $self['requestID'] = $requestID;
        $self['revision'] = $revision;
        $self['routeMode'] = $routeMode;
        $self['status'] = $status;
        $self['stream'] = $stream;
        $self['supersedes'] = $supersedes;
        $self['timings'] = $timings;
        $self['tokenGroupID'] = $tokenGroupID;
        $self['tokenKeyID'] = $tokenKeyID;
        $self['tokenUserID'] = $tokenUserID;
        $self['usageSource'] = $usageSource;
        $self['usageStatus'] = $usageStatus;

        return $self;
    }

    /**
     * Deterministic: req_{request_id}_r{revision}. Deduplicate on id.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withAttempts(int $attempts): self
    {
        $self = clone $this;
        $self['attempts'] = $attempts;

        return $self;
    }

    /**
     * @param Biller|value-of<Biller> $biller
     */
    public function withBiller(Biller|string $biller): self
    {
        $self = clone $this;
        $self['biller'] = $biller;

        return $self;
    }

    public function withCacheHit(bool $cacheHit): self
    {
        $self = clone $this;
        $self['cacheHit'] = $cacheHit;

        return $self;
    }

    public function withConfigurationVersion(int $configurationVersion): self
    {
        $self = clone $this;
        $self['configurationVersion'] = $configurationVersion;

        return $self;
    }

    /**
     * USD decimal string with exactly 6 places, 0 to 1000000000.000000 (the Money bound); enforcement basis, not invoice truth.
     */
    public function withCost(?string $cost): self
    {
        $self = clone $this;
        $self['cost'] = $cost;

        return $self;
    }

    public function withEndUserID(?string $endUserID): self
    {
        $self = clone $this;
        $self['endUserID'] = $endUserID;

        return $self;
    }

    public function withInputTokens(?int $inputTokens): self
    {
        $self = clone $this;
        $self['inputTokens'] = $inputTokens;

        return $self;
    }

    /**
     * Customer request tags captured at admission; {} when untagged.
     *
     * @param array<string,MetadataShape> $metadata
     */
    public function withMetadata(array $metadata): self
    {
        $self = clone $this;
        $self['metadata'] = $metadata;

        return $self;
    }

    public function withModel(string $model): self
    {
        $self = clone $this;
        $self['model'] = $model;

        return $self;
    }

    public function withOutputTokens(?int $outputTokens): self
    {
        $self = clone $this;
        $self['outputTokens'] = $outputTokens;

        return $self;
    }

    /**
     * @param Protocol|value-of<Protocol> $protocol
     */
    public function withProtocol(Protocol|string $protocol): self
    {
        $self = clone $this;
        $self['protocol'] = $protocol;

        return $self;
    }

    public function withProvider(string $provider): self
    {
        $self = clone $this;
        $self['provider'] = $provider;

        return $self;
    }

    public function withProviderKeyID(?string $providerKeyID): self
    {
        $self = clone $this;
        $self['providerKeyID'] = $providerKeyID;

        return $self;
    }

    public function withProviderModel(string $providerModel): self
    {
        $self = clone $this;
        $self['providerModel'] = $providerModel;

        return $self;
    }

    public function withRateVersion(string $rateVersion): self
    {
        $self = clone $this;
        $self['rateVersion'] = $rateVersion;

        return $self;
    }

    public function withRequestID(string $requestID): self
    {
        $self = clone $this;
        $self['requestID'] = $requestID;

        return $self;
    }

    public function withRevision(int $revision): self
    {
        $self = clone $this;
        $self['revision'] = $revision;

        return $self;
    }

    /**
     * @param RouteMode|value-of<RouteMode> $routeMode
     */
    public function withRouteMode(RouteMode|string $routeMode): self
    {
        $self = clone $this;
        $self['routeMode'] = $routeMode;

        return $self;
    }

    /**
     * @param 1 $schemaVersion
     */
    public function withSchemaVersion(int $schemaVersion): self
    {
        $self = clone $this;
        $self['schemaVersion'] = $schemaVersion;

        return $self;
    }

    /**
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    public function withStream(bool $stream): self
    {
        $self = clone $this;
        $self['stream'] = $stream;

        return $self;
    }

    /**
     * Previous revision id; keep the highest revision per request_id.
     */
    public function withSupersedes(?string $supersedes): self
    {
        $self = clone $this;
        $self['supersedes'] = $supersedes;

        return $self;
    }

    /**
     * @param Timings|TimingsShape $timings
     */
    public function withTimings(Timings|array $timings): self
    {
        $self = clone $this;
        $self['timings'] = $timings;

        return $self;
    }

    public function withTokenGroupID(string $tokenGroupID): self
    {
        $self = clone $this;
        $self['tokenGroupID'] = $tokenGroupID;

        return $self;
    }

    public function withTokenKeyID(string $tokenKeyID): self
    {
        $self = clone $this;
        $self['tokenKeyID'] = $tokenKeyID;

        return $self;
    }

    public function withTokenUserID(?string $tokenUserID): self
    {
        $self = clone $this;
        $self['tokenUserID'] = $tokenUserID;

        return $self;
    }

    /**
     * @param 'inference.request' $type
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * @param UsageSource|value-of<UsageSource>|null $usageSource
     */
    public function withUsageSource(UsageSource|string|null $usageSource): self
    {
        $self = clone $this;
        $self['usageSource'] = $usageSource;

        return $self;
    }

    /**
     * @param UsageStatus|value-of<UsageStatus> $usageStatus
     */
    public function withUsageStatus(UsageStatus|string $usageStatus): self
    {
        $self = clone $this;
        $self['usageStatus'] = $usageStatus;

        return $self;
    }
}
