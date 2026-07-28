<?php

declare(strict_types=1);

namespace Telnyx\EmailMessages\EmailMessageBatchResponse;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type MetaShape = array{failed: int, succeeded: int, total: int}
 */
final class Meta implements BaseModel
{
    /** @use SdkModel<MetaShape> */
    use SdkModel;

    #[Required]
    public int $failed;

    #[Required]
    public int $succeeded;

    #[Required]
    public int $total;

    /**
     * `new Meta()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Meta::with(failed: ..., succeeded: ..., total: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Meta)->withFailed(...)->withSucceeded(...)->withTotal(...)
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
    public static function with(int $failed, int $succeeded, int $total): self
    {
        $self = new self;

        $self['failed'] = $failed;
        $self['succeeded'] = $succeeded;
        $self['total'] = $total;

        return $self;
    }

    public function withFailed(int $failed): self
    {
        $self = clone $this;
        $self['failed'] = $failed;

        return $self;
    }

    public function withSucceeded(int $succeeded): self
    {
        $self = clone $this;
        $self['succeeded'] = $succeeded;

        return $self;
    }

    public function withTotal(int $total): self
    {
        $self = clone $this;
        $self['total'] = $total;

        return $self;
    }
}
