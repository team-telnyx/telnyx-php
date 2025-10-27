<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Tests\Runs;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Initiates immediate execution of a specific assistant test.
 *
 * @see Telnyx\AI\Assistants\Tests\Runs->trigger
 *
 * @phpstan-type run_trigger_params = array{destinationVersionID?: string}
 */
final class RunTriggerParams implements BaseModel
{
    /** @use SdkModel<run_trigger_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Optional assistant version ID to use for this test run. If provided, the version must exist or a 400 error will be returned. If not provided, test will run on main version.
     */
    #[Api('destination_version_id', optional: true)]
    public ?string $destinationVersionID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $destinationVersionID = null): self
    {
        $obj = new self;

        null !== $destinationVersionID && $obj->destinationVersionID = $destinationVersionID;

        return $obj;
    }

    /**
     * Optional assistant version ID to use for this test run. If provided, the version must exist or a 400 error will be returned. If not provided, test will run on main version.
     */
    public function withDestinationVersionID(string $destinationVersionID): self
    {
        $obj = clone $this;
        $obj->destinationVersionID = $destinationVersionID;

        return $obj;
    }
}
