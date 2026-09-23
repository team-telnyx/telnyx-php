<?php

declare(strict_types=1);

namespace Telnyx\Connections\ConnectionGetCountResponse;

use Telnyx\Connections\ConnectionGetCountResponse\Data\Counts;
use Telnyx\Connections\ConnectionGetCountResponse\Data\Limits\GlobalConnectionLimit;
use Telnyx\Connections\ConnectionGetCountResponse\Data\Limits\PerTypeConnectionLimits;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type LimitsVariants from \Telnyx\Connections\ConnectionGetCountResponse\Data\Limits
 * @phpstan-import-type CountsShape from \Telnyx\Connections\ConnectionGetCountResponse\Data\Counts
 * @phpstan-import-type LimitsShape from \Telnyx\Connections\ConnectionGetCountResponse\Data\Limits
 *
 * @phpstan-type DataShape = array{
 *   counts: Counts|CountsShape, limits: LimitsShape, recordType: string
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Counts of the authenticated user's connections, grouped by connection type. Forward-only connections are excluded.
     */
    #[Required]
    public Counts $counts;

    /**
     * Connection limits that apply to the user. Contains a single global_limit when a global connection limit applies, or per-type limits (standard_limit, texml_limit and uac_limit) when the user has per-type connection count capabilities.
     *
     * @var LimitsVariants $limits
     */
    #[Required]
    public GlobalConnectionLimit|PerTypeConnectionLimits $limits;

    /**
     * Identifies the type of the resource.
     */
    #[Required('record_type')]
    public string $recordType;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(counts: ..., limits: ..., recordType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)->withCounts(...)->withLimits(...)->withRecordType(...)
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
     * @param Counts|CountsShape $counts
     * @param LimitsShape $limits
     */
    public static function with(
        Counts|array $counts,
        GlobalConnectionLimit|array|PerTypeConnectionLimits $limits,
        string $recordType,
    ): self {
        $self = new self;

        $self['counts'] = $counts;
        $self['limits'] = $limits;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * Counts of the authenticated user's connections, grouped by connection type. Forward-only connections are excluded.
     *
     * @param Counts|CountsShape $counts
     */
    public function withCounts(Counts|array $counts): self
    {
        $self = clone $this;
        $self['counts'] = $counts;

        return $self;
    }

    /**
     * Connection limits that apply to the user. Contains a single global_limit when a global connection limit applies, or per-type limits (standard_limit, texml_limit and uac_limit) when the user has per-type connection count capabilities.
     *
     * @param LimitsShape $limits
     */
    public function withLimits(
        GlobalConnectionLimit|array|PerTypeConnectionLimits $limits
    ): self {
        $self = clone $this;
        $self['limits'] = $limits;

        return $self;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }
}
