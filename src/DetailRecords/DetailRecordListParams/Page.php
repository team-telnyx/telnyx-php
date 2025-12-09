<?php

declare(strict_types=1);

namespace Telnyx\DetailRecords\DetailRecordListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Consolidated page parameter (deepObject style). Originally: page[number], page[size].
 *
 * @phpstan-type PageShape = array{number?: int|null, size?: int|null}
 */
final class Page implements BaseModel
{
    /** @use SdkModel<PageShape> */
    use SdkModel;

    /**
     * Page number.
     */
    #[Optional]
    public ?int $number;

    /**
     * Page size.
     */
    #[Optional]
    public ?int $size;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?int $number = null, ?int $size = null): self
    {
        $self = new self;

        null !== $number && $self['number'] = $number;
        null !== $size && $self['size'] = $size;

        return $self;
    }

    /**
     * Page number.
     */
    public function withNumber(int $number): self
    {
        $self = clone $this;
        $self['number'] = $number;

        return $self;
    }

    /**
     * Page size.
     */
    public function withSize(int $size): self
    {
        $self = clone $this;
        $self['size'] = $size;

        return $self;
    }
}
