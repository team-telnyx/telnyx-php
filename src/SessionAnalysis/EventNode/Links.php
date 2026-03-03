<?php

declare(strict_types=1);

namespace Telnyx\SessionAnalysis\EventNode;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type LinksShape = array{records: string, self: string}
 */
final class Links implements BaseModel
{
    /** @use SdkModel<LinksShape> */
    use SdkModel;

    /**
     * Link to the underlying detail records.
     */
    #[Required]
    public string $records;

    /**
     * Link to this session analysis node.
     */
    #[Required]
    public string $self;

    /**
     * `new Links()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Links::with(records: ..., self: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Links)->withRecords(...)->withSelf(...)
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
    public static function with(string $records, string $self): self
    {
        $self1 = new self;

        $self1['records'] = $records;
        $self1['self'] = $self;

        return $self1;
    }

    /**
     * Link to the underlying detail records.
     */
    public function withRecords(string $records): self
    {
        $self = clone $this;
        $self['records'] = $records;

        return $self;
    }

    /**
     * Link to this session analysis node.
     */
    public function withSelf(string $self): self
    {
        $self1 = clone $this;
        $self1['self'] = $self;

        return $self1;
    }
}
