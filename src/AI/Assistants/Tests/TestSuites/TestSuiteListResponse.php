<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Tests\TestSuites;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Response containing all available test suite names.
 *
 * Returns a list of distinct test suite names that can be used for
 * filtering and organizing tests.
 *
 * @phpstan-type TestSuiteListResponseShape = array{data: list<string>}
 */
final class TestSuiteListResponse implements BaseModel
{
    /** @use SdkModel<TestSuiteListResponseShape> */
    use SdkModel;

    /**
     * Array of unique test suite names available to the user.
     *
     * @var list<string> $data
     */
    #[Api(list: 'string')]
    public array $data;

    /**
     * `new TestSuiteListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TestSuiteListResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TestSuiteListResponse)->withData(...)
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
     *
     * @param list<string> $data
     */
    public static function with(array $data): self
    {
        $obj = new self;

        $obj['data'] = $data;

        return $obj;
    }

    /**
     * Array of unique test suite names available to the user.
     *
     * @param list<string> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
