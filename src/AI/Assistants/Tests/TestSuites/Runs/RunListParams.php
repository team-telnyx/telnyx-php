<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Tests\TestSuites\Runs;

use Telnyx\AI\Assistants\Tests\TestSuites\Runs\RunListParams\Page;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Retrieves paginated history of test runs for a specific test suite with filtering options.
 *
 * @see Telnyx\Services\AI\Assistants\Tests\TestSuites\RunsService::list()
 *
 * @phpstan-type RunListParamsShape = array{
 *   page?: Page|array{number?: int|null, size?: int|null},
 *   status?: string,
 *   testSuiteRunID?: string,
 * }
 */
final class RunListParams implements BaseModel
{
    /** @use SdkModel<RunListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
     */
    #[Optional]
    public ?Page $page;

    /**
     * Filter runs by execution status (pending, running, completed, failed, timeout).
     */
    #[Optional]
    public ?string $status;

    /**
     * Filter runs by specific suite execution batch ID.
     */
    #[Optional]
    public ?string $testSuiteRunID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Page|array{number?: int|null, size?: int|null} $page
     */
    public static function with(
        Page|array|null $page = null,
        ?string $status = null,
        ?string $testSuiteRunID = null,
    ): self {
        $self = new self;

        null !== $page && $self['page'] = $page;
        null !== $status && $self['status'] = $status;
        null !== $testSuiteRunID && $self['testSuiteRunID'] = $testSuiteRunID;

        return $self;
    }

    /**
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
     *
     * @param Page|array{number?: int|null, size?: int|null} $page
     */
    public function withPage(Page|array $page): self
    {
        $self = clone $this;
        $self['page'] = $page;

        return $self;
    }

    /**
     * Filter runs by execution status (pending, running, completed, failed, timeout).
     */
    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * Filter runs by specific suite execution batch ID.
     */
    public function withTestSuiteRunID(string $testSuiteRunID): self
    {
        $self = clone $this;
        $self['testSuiteRunID'] = $testSuiteRunID;

        return $self;
    }
}
