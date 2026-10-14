<?php

declare(strict_types=1);

namespace Telnyx\LlmTokenGateway\Usage\UsageGetSummaryResponse;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type MetaShape = array{
 *   endDate: string,
 *   metadata: array<string,string>,
 *   startDate: string,
 *   tokenGroupID: string,
 * }
 */
final class Meta implements BaseModel
{
    /** @use SdkModel<MetaShape> */
    use SdkModel;

    #[Required('end_date')]
    public string $endDate;

    /**
     * The metadata[<key>] filters applied to every section; {} when unfiltered.
     *
     * @var array<string,string> $metadata
     */
    #[Required(map: 'string')]
    public array $metadata;

    #[Required('start_date')]
    public string $startDate;

    #[Required('token_group_id')]
    public string $tokenGroupID;

    /**
     * `new Meta()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Meta::with(endDate: ..., metadata: ..., startDate: ..., tokenGroupID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Meta)
     *   ->withEndDate(...)
     *   ->withMetadata(...)
     *   ->withStartDate(...)
     *   ->withTokenGroupID(...)
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
     * @param array<string,string> $metadata
     */
    public static function with(
        string $endDate,
        array $metadata,
        string $startDate,
        string $tokenGroupID
    ): self {
        $self = new self;

        $self['endDate'] = $endDate;
        $self['metadata'] = $metadata;
        $self['startDate'] = $startDate;
        $self['tokenGroupID'] = $tokenGroupID;

        return $self;
    }

    public function withEndDate(string $endDate): self
    {
        $self = clone $this;
        $self['endDate'] = $endDate;

        return $self;
    }

    /**
     * The metadata[<key>] filters applied to every section; {} when unfiltered.
     *
     * @param array<string,string> $metadata
     */
    public function withMetadata(array $metadata): self
    {
        $self = clone $this;
        $self['metadata'] = $metadata;

        return $self;
    }

    public function withStartDate(string $startDate): self
    {
        $self = clone $this;
        $self['startDate'] = $startDate;

        return $self;
    }

    public function withTokenGroupID(string $tokenGroupID): self
    {
        $self = clone $this;
        $self['tokenGroupID'] = $tokenGroupID;

        return $self;
    }
}
