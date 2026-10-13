<?php

declare(strict_types=1);

namespace Telnyx\LlmTokenGateway\Spend\SpendGetSummaryResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * @phpstan-type DataShape = array{
 *   dimensionID: string|null,
 *   inputTokens: int,
 *   name: string|null,
 *   outputTokens: int,
 *   requests: int,
 *   reservedSpend: float,
 *   spend: float,
 *   unknownRequests: int,
 *   endUserID?: string|null,
 *   metadataKey?: string|null,
 *   tokenGroupID?: string|null,
 *   tokenKeyID?: string|null,
 *   tokenUserID?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Required('dimension_id')]
    public ?string $dimensionID;

    #[Required('input_tokens')]
    public int $inputTokens;

    #[Required]
    public ?string $name;

    #[Required('output_tokens')]
    public int $outputTokens;

    #[Required]
    public int $requests;

    /**
     * USD, decimal precision at most 6 places; parse exactly to integer micro-USD, never binary float accounting.
     */
    #[Required('reserved_spend')]
    public float $reservedSpend;

    /**
     * USD, decimal precision at most 6 places; parse exactly to integer micro-USD, never binary float accounting.
     */
    #[Required]
    public float $spend;

    #[Required('unknown_requests')]
    public int $unknownRequests;

    #[Optional('end_user_id', nullable: true)]
    public ?string $endUserID;

    /**
     * Present only for group_by=metadata:<key>: the tag key. dimension_id is then the tag value in text form (booleans as true/false, integers in decimal), or null for requests without the key; name is null.
     */
    #[Optional('metadata_key')]
    public ?string $metadataKey;

    #[Optional('token_group_id', nullable: true)]
    public ?string $tokenGroupID;

    #[Optional('token_key_id', nullable: true)]
    public ?string $tokenKeyID;

    #[Optional('token_user_id', nullable: true)]
    public ?string $tokenUserID;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(
     *   dimensionID: ...,
     *   inputTokens: ...,
     *   name: ...,
     *   outputTokens: ...,
     *   requests: ...,
     *   reservedSpend: ...,
     *   spend: ...,
     *   unknownRequests: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)
     *   ->withDimensionID(...)
     *   ->withInputTokens(...)
     *   ->withName(...)
     *   ->withOutputTokens(...)
     *   ->withRequests(...)
     *   ->withReservedSpend(...)
     *   ->withSpend(...)
     *   ->withUnknownRequests(...)
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
     */
    public static function with(
        ?string $dimensionID,
        int $inputTokens,
        ?string $name,
        int $outputTokens,
        int $requests,
        float $reservedSpend,
        float $spend,
        int $unknownRequests,
        string|Omitted|null $endUserID = Omitted::VALUE,
        string|Omitted|null $tokenGroupID = Omitted::VALUE,
        string|Omitted|null $tokenKeyID = Omitted::VALUE,
        string|Omitted|null $tokenUserID = Omitted::VALUE,
        ?string $metadataKey = null,
    ): self {
        $self = new self;

        $self['dimensionID'] = $dimensionID;
        $self['inputTokens'] = $inputTokens;
        $self['name'] = $name;
        $self['outputTokens'] = $outputTokens;
        $self['requests'] = $requests;
        $self['reservedSpend'] = $reservedSpend;
        $self['spend'] = $spend;
        $self['unknownRequests'] = $unknownRequests;

        Omitted::VALUE !== $endUserID && $self['endUserID'] = $endUserID;
        null !== $metadataKey && $self['metadataKey'] = $metadataKey;
        Omitted::VALUE !== $tokenGroupID && $self['tokenGroupID'] = $tokenGroupID;
        Omitted::VALUE !== $tokenKeyID && $self['tokenKeyID'] = $tokenKeyID;
        Omitted::VALUE !== $tokenUserID && $self['tokenUserID'] = $tokenUserID;

        return $self;
    }

    public function withDimensionID(?string $dimensionID): self
    {
        $self = clone $this;
        $self['dimensionID'] = $dimensionID;

        return $self;
    }

    public function withInputTokens(int $inputTokens): self
    {
        $self = clone $this;
        $self['inputTokens'] = $inputTokens;

        return $self;
    }

    public function withName(?string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withOutputTokens(int $outputTokens): self
    {
        $self = clone $this;
        $self['outputTokens'] = $outputTokens;

        return $self;
    }

    public function withRequests(int $requests): self
    {
        $self = clone $this;
        $self['requests'] = $requests;

        return $self;
    }

    /**
     * USD, decimal precision at most 6 places; parse exactly to integer micro-USD, never binary float accounting.
     */
    public function withReservedSpend(float $reservedSpend): self
    {
        $self = clone $this;
        $self['reservedSpend'] = $reservedSpend;

        return $self;
    }

    /**
     * USD, decimal precision at most 6 places; parse exactly to integer micro-USD, never binary float accounting.
     */
    public function withSpend(float $spend): self
    {
        $self = clone $this;
        $self['spend'] = $spend;

        return $self;
    }

    public function withUnknownRequests(int $unknownRequests): self
    {
        $self = clone $this;
        $self['unknownRequests'] = $unknownRequests;

        return $self;
    }

    public function withEndUserID(?string $endUserID): self
    {
        $self = clone $this;
        $self['endUserID'] = $endUserID;

        return $self;
    }

    /**
     * Present only for group_by=metadata:<key>: the tag key. dimension_id is then the tag value in text form (booleans as true/false, integers in decimal), or null for requests without the key; name is null.
     */
    public function withMetadataKey(string $metadataKey): self
    {
        $self = clone $this;
        $self['metadataKey'] = $metadataKey;

        return $self;
    }

    public function withTokenGroupID(?string $tokenGroupID): self
    {
        $self = clone $this;
        $self['tokenGroupID'] = $tokenGroupID;

        return $self;
    }

    public function withTokenKeyID(?string $tokenKeyID): self
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
}
