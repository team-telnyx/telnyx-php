<?php

declare(strict_types=1);

namespace Telnyx\RcsAgents;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type RcsAgentResponseShape = array{data?: RcsAgent}
 */
final class RcsAgentResponse implements BaseModel
{
    /** @use SdkModel<RcsAgentResponseShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?RcsAgent $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?RcsAgent $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(RcsAgent $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
