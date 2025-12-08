<?php

declare(strict_types=1);

namespace Telnyx\Documents\DocumentListParams\Filter;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type FilenameShape = array{contains?: string|null}
 */
final class Filename implements BaseModel
{
    /** @use SdkModel<FilenameShape> */
    use SdkModel;

    /**
     * Filter by string matching part of filename.
     */
    #[Optional]
    public ?string $contains;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $contains = null): self
    {
        $obj = new self;

        null !== $contains && $obj['contains'] = $contains;

        return $obj;
    }

    /**
     * Filter by string matching part of filename.
     */
    public function withContains(string $contains): self
    {
        $obj = clone $this;
        $obj['contains'] = $contains;

        return $obj;
    }
}
