<?php

declare(strict_types=1);

namespace Telnyx\LlmTokenGateway\Spend\SpendGetEventsResponse;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\LlmTokenGateway\Spend\SpendGetEventsResponse\Data\Biller;
use Telnyx\LlmTokenGateway\Spend\SpendGetEventsResponse\Data\Metadata;
use Telnyx\LlmTokenGateway\Spend\SpendGetEventsResponse\Data\Status;
use Telnyx\LlmTokenGateway\Spend\SpendGetEventsResponse\Data\UsageStatus;

/**
 * @phpstan-import-type MetadataVariants from \Telnyx\LlmTokenGateway\Spend\SpendGetEventsResponse\Data\Metadata
 * @phpstan-import-type MetadataShape from \Telnyx\LlmTokenGateway\Spend\SpendGetEventsResponse\Data\Metadata
 *
 * @phpstan-type DataShape = array{
 *   id: string,
 *   attempts: int,
 *   biller: Biller|value-of<Biller>,
 *   cacheHit: bool,
 *   configurationVersion: int,
 *   cost: float|null,
 *   createdAt: \DateTimeInterface,
 *   endUserID: string|null,
 *   inputTokens: int|null,
 *   metadata: array<string,MetadataShape>,
 *   model: string,
 *   outputTokens: int|null,
 *   providerKeyID: string|null,
 *   rateVersion: string,
 *   requestID: string,
 *   requestedModel: string,
 *   reservationMicroUsd: int,
 *   status: Status|value-of<Status>,
 *   tokenGroupID: string,
 *   tokenKeyID: string,
 *   tokenUserID: string|null,
 *   usageStatus: UsageStatus|value-of<UsageStatus>,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Required]
    public string $id;

    /**
     * Provider attempts begun for the request (fallbacks included); 0 for a cache hit. Token and cost totals sum every attempt.
     */
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
     * USD, decimal precision at most 6 places; parse exactly to integer micro-USD, never binary float accounting.
     */
    #[Required]
    public ?float $cost;

    #[Required('created_at')]
    public \DateTimeInterface $createdAt;

    #[Required('end_user_id')]
    public ?string $endUserID;

    #[Required('input_tokens')]
    public ?int $inputTokens;

    /**
     * Customer request tags from the x-ltg-metadata header: up to 5 entries. Keys are case-sensitive; keys starting with ltg_, telnyx_, litellm_ or cf_ (any case) are reserved. Values are strings (1-256 characters, no control or format characters), integers within +/-9007199254740991, or booleans; floats, null, objects and arrays are rejected. Values that look like credentials are rejected. Tags are attribution only: never forwarded upstream, never part of the response cache key, never used for budgets or routing. An untagged request reports {}.
     *
     * @var array<string,MetadataVariants> $metadata
     */
    #[Required(map: Metadata::class)]
    public array $metadata;

    /**
     * Public alias that served (the last attempt); rate_version, biller and provider_key_id follow it.
     */
    #[Required]
    public string $model;

    #[Required('output_tokens')]
    public ?int $outputTokens;

    #[Required('provider_key_id')]
    public ?string $providerKeyID;

    #[Required('rate_version')]
    public string $rateVersion;

    #[Required('request_id')]
    public string $requestID;

    /**
     * Public alias the caller requested; differs from model only when a group fallback served.
     */
    #[Required('requested_model')]
    public string $requestedModel;

    #[Required('reservation_micro_usd')]
    public int $reservationMicroUsd;

    /** @var value-of<Status> $status */
    #[Required(enum: Status::class)]
    public string $status;

    #[Required('token_group_id')]
    public string $tokenGroupID;

    #[Required('token_key_id')]
    public string $tokenKeyID;

    #[Required('token_user_id')]
    public ?string $tokenUserID;

    /** @var value-of<UsageStatus> $usageStatus */
    #[Required('usage_status', enum: UsageStatus::class)]
    public string $usageStatus;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(
     *   id: ...,
     *   attempts: ...,
     *   biller: ...,
     *   cacheHit: ...,
     *   configurationVersion: ...,
     *   cost: ...,
     *   createdAt: ...,
     *   endUserID: ...,
     *   inputTokens: ...,
     *   metadata: ...,
     *   model: ...,
     *   outputTokens: ...,
     *   providerKeyID: ...,
     *   rateVersion: ...,
     *   requestID: ...,
     *   requestedModel: ...,
     *   reservationMicroUsd: ...,
     *   status: ...,
     *   tokenGroupID: ...,
     *   tokenKeyID: ...,
     *   tokenUserID: ...,
     *   usageStatus: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)
     *   ->withID(...)
     *   ->withAttempts(...)
     *   ->withBiller(...)
     *   ->withCacheHit(...)
     *   ->withConfigurationVersion(...)
     *   ->withCost(...)
     *   ->withCreatedAt(...)
     *   ->withEndUserID(...)
     *   ->withInputTokens(...)
     *   ->withMetadata(...)
     *   ->withModel(...)
     *   ->withOutputTokens(...)
     *   ->withProviderKeyID(...)
     *   ->withRateVersion(...)
     *   ->withRequestID(...)
     *   ->withRequestedModel(...)
     *   ->withReservationMicroUsd(...)
     *   ->withStatus(...)
     *   ->withTokenGroupID(...)
     *   ->withTokenKeyID(...)
     *   ->withTokenUserID(...)
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
     * @param Status|value-of<Status> $status
     * @param UsageStatus|value-of<UsageStatus> $usageStatus
     */
    public static function with(
        string $id,
        int $attempts,
        Biller|string $biller,
        bool $cacheHit,
        int $configurationVersion,
        ?float $cost,
        \DateTimeInterface $createdAt,
        ?string $endUserID,
        ?int $inputTokens,
        array $metadata,
        string $model,
        ?int $outputTokens,
        ?string $providerKeyID,
        string $rateVersion,
        string $requestID,
        string $requestedModel,
        int $reservationMicroUsd,
        Status|string $status,
        string $tokenGroupID,
        string $tokenKeyID,
        ?string $tokenUserID,
        UsageStatus|string $usageStatus,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['attempts'] = $attempts;
        $self['biller'] = $biller;
        $self['cacheHit'] = $cacheHit;
        $self['configurationVersion'] = $configurationVersion;
        $self['cost'] = $cost;
        $self['createdAt'] = $createdAt;
        $self['endUserID'] = $endUserID;
        $self['inputTokens'] = $inputTokens;
        $self['metadata'] = $metadata;
        $self['model'] = $model;
        $self['outputTokens'] = $outputTokens;
        $self['providerKeyID'] = $providerKeyID;
        $self['rateVersion'] = $rateVersion;
        $self['requestID'] = $requestID;
        $self['requestedModel'] = $requestedModel;
        $self['reservationMicroUsd'] = $reservationMicroUsd;
        $self['status'] = $status;
        $self['tokenGroupID'] = $tokenGroupID;
        $self['tokenKeyID'] = $tokenKeyID;
        $self['tokenUserID'] = $tokenUserID;
        $self['usageStatus'] = $usageStatus;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Provider attempts begun for the request (fallbacks included); 0 for a cache hit. Token and cost totals sum every attempt.
     */
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
     * USD, decimal precision at most 6 places; parse exactly to integer micro-USD, never binary float accounting.
     */
    public function withCost(?float $cost): self
    {
        $self = clone $this;
        $self['cost'] = $cost;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

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
     * Customer request tags from the x-ltg-metadata header: up to 5 entries. Keys are case-sensitive; keys starting with ltg_, telnyx_, litellm_ or cf_ (any case) are reserved. Values are strings (1-256 characters, no control or format characters), integers within +/-9007199254740991, or booleans; floats, null, objects and arrays are rejected. Values that look like credentials are rejected. Tags are attribution only: never forwarded upstream, never part of the response cache key, never used for budgets or routing. An untagged request reports {}.
     *
     * @param array<string,MetadataShape> $metadata
     */
    public function withMetadata(array $metadata): self
    {
        $self = clone $this;
        $self['metadata'] = $metadata;

        return $self;
    }

    /**
     * Public alias that served (the last attempt); rate_version, biller and provider_key_id follow it.
     */
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

    public function withProviderKeyID(?string $providerKeyID): self
    {
        $self = clone $this;
        $self['providerKeyID'] = $providerKeyID;

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

    /**
     * Public alias the caller requested; differs from model only when a group fallback served.
     */
    public function withRequestedModel(string $requestedModel): self
    {
        $self = clone $this;
        $self['requestedModel'] = $requestedModel;

        return $self;
    }

    public function withReservationMicroUsd(int $reservationMicroUsd): self
    {
        $self = clone $this;
        $self['reservationMicroUsd'] = $reservationMicroUsd;

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
     * @param UsageStatus|value-of<UsageStatus> $usageStatus
     */
    public function withUsageStatus(UsageStatus|string $usageStatus): self
    {
        $self = clone $this;
        $self['usageStatus'] = $usageStatus;

        return $self;
    }
}
