<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Tests\Runs;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Retrieves detailed information about a specific test run execution.
 *
 * @see Telnyx\AI\Assistants\Tests\Runs->retrieve
 *
 * @phpstan-type RunRetrieveParamsShape = array{testID: string}
 */
final class RunRetrieveParams implements BaseModel
{
    /** @use SdkModel<RunRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $testID;

    /**
     * `new RunRetrieveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RunRetrieveParams::with(testID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RunRetrieveParams)->withTestID(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(string $testID): self
    {
        $obj = new self;

        $obj->testID = $testID;

        return $obj;
    }

    public function withTestID(string $testID): self
    {
        $obj = clone $this;
        $obj->testID = $testID;

        return $obj;
    }
}
