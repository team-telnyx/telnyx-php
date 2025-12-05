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
 * @see Telnyx\Services\AI\Assistants\Tests\RunsService::retrieve()
 *
 * @phpstan-type RunRetrieveParamsShape = array{test_id: string}
 */
final class RunRetrieveParams implements BaseModel
{
    /** @use SdkModel<RunRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $test_id;

    /**
     * `new RunRetrieveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RunRetrieveParams::with(test_id: ...)
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
    public static function with(string $test_id): self
    {
        $obj = new self;

        $obj['test_id'] = $test_id;

        return $obj;
    }

    public function withTestID(string $testID): self
    {
        $obj = clone $this;
        $obj['test_id'] = $testID;

        return $obj;
    }
}
