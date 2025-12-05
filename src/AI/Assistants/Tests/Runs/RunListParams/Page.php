<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Tests\Runs\RunListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
 *
 * @phpstan-type PageShape = array{number?: int|null, size?: int|null}
 */
final class Page implements BaseModel
{
    /** @use SdkModel<PageShape> */
    use SdkModel;

    /**
     * Page number to retrieve (1-based indexing).
     */
    #[Api(optional: true)]
    public ?int $number;

    /**
     * Number of test runs to return per page (1-100).
     */
    #[Api(optional: true)]
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
        $obj = new self;

        null !== $number && $obj['number'] = $number;
        null !== $size && $obj['size'] = $size;

        return $obj;
    }

    /**
     * Page number to retrieve (1-based indexing).
     */
    public function withNumber(int $number): self
    {
        $obj = clone $this;
        $obj['number'] = $number;

        return $obj;
    }

    /**
     * Number of test runs to return per page (1-100).
     */
    public function withSize(int $size): self
    {
        $obj = clone $this;
        $obj['size'] = $size;

        return $obj;
    }
}
