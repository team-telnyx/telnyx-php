<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type hangup_tool_params = array{description?: string}
 */
final class HangupToolParams implements BaseModel
{
    /** @use SdkModel<hangup_tool_params> */
    use SdkModel;

    /**
     * The description of the function that will be passed to the assistant.
     */
    #[Api(optional: true)]
    public ?string $description;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $description = null): self
    {
        $obj = new self;

        null !== $description && $obj->description = $description;

        return $obj;
    }

    /**
     * The description of the function that will be passed to the assistant.
     */
    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj->description = $description;

        return $obj;
    }
}
