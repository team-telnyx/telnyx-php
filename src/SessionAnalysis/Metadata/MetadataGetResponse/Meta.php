<?php

declare(strict_types=1);

namespace Telnyx\SessionAnalysis\Metadata\MetadataGetResponse;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type MetaShape = array{
 *   lastUpdated: \DateTimeInterface, totalRecordTypes: int
 * }
 */
final class Meta implements BaseModel
{
    /** @use SdkModel<MetaShape> */
    use SdkModel;

    #[Required('last_updated')]
    public \DateTimeInterface $lastUpdated;

    #[Required('total_record_types')]
    public int $totalRecordTypes;

    /**
     * `new Meta()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Meta::with(lastUpdated: ..., totalRecordTypes: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Meta)->withLastUpdated(...)->withTotalRecordTypes(...)
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
        \DateTimeInterface $lastUpdated,
        int $totalRecordTypes
    ): self {
        $self = new self;

        $self['lastUpdated'] = $lastUpdated;
        $self['totalRecordTypes'] = $totalRecordTypes;

        return $self;
    }

    public function withLastUpdated(\DateTimeInterface $lastUpdated): self
    {
        $self = clone $this;
        $self['lastUpdated'] = $lastUpdated;

        return $self;
    }

    public function withTotalRecordTypes(int $totalRecordTypes): self
    {
        $self = clone $this;
        $self['totalRecordTypes'] = $totalRecordTypes;

        return $self;
    }
}
