<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\InferenceEmbeddingTransferToolParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type TargetShape = array{name?: string, to?: string}
 */
final class Target implements BaseModel
{
    /** @use SdkModel<TargetShape> */
    use SdkModel;

    /**
     * The name of the target.
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * The destination number or SIP URI of the call.
     */
    #[Api(optional: true)]
    public ?string $to;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $name = null, ?string $to = null): self
    {
        $obj = new self;

        null !== $name && $obj->name = $name;
        null !== $to && $obj->to = $to;

        return $obj;
    }

    /**
     * The name of the target.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * The destination number or SIP URI of the call.
     */
    public function withTo(string $to): self
    {
        $obj = clone $this;
        $obj->to = $to;

        return $obj;
    }
}
