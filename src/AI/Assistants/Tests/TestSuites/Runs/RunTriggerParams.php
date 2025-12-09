<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Tests\TestSuites\Runs;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Executes all tests within a specific test suite as a batch operation.
 *
 * @see Telnyx\Services\AI\Assistants\Tests\TestSuites\RunsService::trigger()
 *
 * @phpstan-type RunTriggerParamsShape = array{destinationVersionID?: string}
 */
final class RunTriggerParams implements BaseModel
{
    /** @use SdkModel<RunTriggerParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Optional assistant version ID to use for all test runs in this suite. If provided, the version must exist or a 400 error will be returned. If not provided, test will run on main version.
     */
    #[Optional('destination_version_id')]
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
        $self = new self;

        null !== $destinationVersionID && $self['destinationVersionID'] = $destinationVersionID;

        return $self;
    }

    /**
     * Optional assistant version ID to use for all test runs in this suite. If provided, the version must exist or a 400 error will be returned. If not provided, test will run on main version.
     */
    public function withDestinationVersionID(string $destinationVersionID): self
    {
        $self = clone $this;
        $self['destinationVersionID'] = $destinationVersionID;

        return $self;
    }
}
