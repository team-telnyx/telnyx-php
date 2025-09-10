<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Tests\TestSuites\Runs;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new RunTriggerParams); // set properties as needed
 * $client->ai.assistants.tests.testSuites.runs->trigger(...$params->toArray());
 * ```
 * Executes all tests within a specific test suite as a batch operation.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->ai.assistants.tests.testSuites.runs->trigger(...$params->toArray());`
 *
 * @see Telnyx\AI\Assistants\Tests\TestSuites\Runs->trigger
 *
 * @phpstan-type run_trigger_params = array{destinationVersionID?: string}
 */
final class RunTriggerParams implements BaseModel
{
    /** @use SdkModel<run_trigger_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Optional assistant version ID to use for all test runs in this suite. If provided, the version must exist or a 400 error will be returned. If not provided, test will run on main version.
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
     * Optional assistant version ID to use for all test runs in this suite. If provided, the version must exist or a 400 error will be returned. If not provided, test will run on main version.
     */
    public function withDestinationVersionID(string $destinationVersionID): self
    {
        $obj = clone $this;
        $obj->destinationVersionID = $destinationVersionID;

        return $obj;
    }
}
