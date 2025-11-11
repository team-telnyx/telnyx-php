<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Tests\TestSuites\Runs;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Executes all tests within a specific test suite as a batch operation.
 *
 * @see Telnyx\AI\Assistants\Tests\TestSuites\Runs->trigger
 *
 * @phpstan-type RunTriggerParamsShape = array{destination_version_id?: string}
 */
final class RunTriggerParams implements BaseModel
{
    /** @use SdkModel<RunTriggerParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Optional assistant version ID to use for all test runs in this suite. If provided, the version must exist or a 400 error will be returned. If not provided, test will run on main version.
     */
    #[Api(optional: true)]
    public ?string $destination_version_id;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $destination_version_id = null): self
    {
        $obj = new self;

        null !== $destination_version_id && $obj->destination_version_id = $destination_version_id;

        return $obj;
    }

    /**
     * Optional assistant version ID to use for all test runs in this suite. If provided, the version must exist or a 400 error will be returned. If not provided, test will run on main version.
     */
    public function withDestinationVersionID(string $destinationVersionID): self
    {
        $obj = clone $this;
        $obj->destination_version_id = $destinationVersionID;

        return $obj;
    }
}
