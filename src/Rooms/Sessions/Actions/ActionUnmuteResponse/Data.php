<?php

declare(strict_types=1);

namespace Telnyx\Rooms\Sessions\Actions\ActionUnmuteResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{result?: string|null}
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?string $result;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $result = null): self
    {
        $obj = new self;

        null !== $result && $obj['result'] = $result;

        return $obj;
    }

    public function withResult(string $result): self
    {
        $obj = clone $this;
        $obj['result'] = $result;

        return $obj;
    }
}
