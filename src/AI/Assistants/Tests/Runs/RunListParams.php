<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Tests\Runs;

use Telnyx\AI\Assistants\Tests\Runs\RunListParams\Page;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new RunListParams); // set properties as needed
 * $client->ai.assistants.tests.runs->list(...$params->toArray());
 * ```
 * Retrieves paginated execution history for a specific assistant test with filtering options.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->ai.assistants.tests.runs->list(...$params->toArray());`
 *
 * @see Telnyx\AI\Assistants\Tests\Runs->list
 *
 * @phpstan-type run_list_params = array{page?: Page, status?: string}
 */
final class RunListParams implements BaseModel
{
    /** @use SdkModel<run_list_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
     */
    #[Api(optional: true)]
    public ?Page $page;

    /**
     * Filter runs by execution status (pending, running, completed, failed, timeout).
     */
    #[Api(optional: true)]
    public ?string $status;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?Page $page = null, ?string $status = null): self
    {
        $obj = new self;

        null !== $page && $obj->page = $page;
        null !== $status && $obj->status = $status;

        return $obj;
    }

    /**
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
     */
    public function withPage(Page $page): self
    {
        $obj = clone $this;
        $obj->page = $page;

        return $obj;
    }

    /**
     * Filter runs by execution status (pending, running, completed, failed, timeout).
     */
    public function withStatus(string $status): self
    {
        $obj = clone $this;
        $obj->status = $status;

        return $obj;
    }
}
