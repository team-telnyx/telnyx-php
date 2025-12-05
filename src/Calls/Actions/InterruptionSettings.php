<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Settings for handling user interruptions during assistant speech.
 *
 * @phpstan-type InterruptionSettingsShape = array{enable?: bool|null}
 */
final class InterruptionSettings implements BaseModel
{
    /** @use SdkModel<InterruptionSettingsShape> */
    use SdkModel;

    /**
     * When true, allows users to interrupt the assistant while speaking.
     */
    #[Api(optional: true)]
    public ?bool $enable;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?bool $enable = null): self
    {
        $obj = new self;

        null !== $enable && $obj['enable'] = $enable;

        return $obj;
    }

    /**
     * When true, allows users to interrupt the assistant while speaking.
     */
    public function withEnable(bool $enable): self
    {
        $obj = clone $this;
        $obj['enable'] = $enable;

        return $obj;
    }
}
