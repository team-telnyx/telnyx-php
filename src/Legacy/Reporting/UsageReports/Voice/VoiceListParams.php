<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\UsageReports\Voice;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new VoiceListParams); // set properties as needed
 * $client->STAINLESS_FIXME_legacy.reporting.usageReports.voice->list(...$params->toArray());
 * ```
 * Fetch all previous requests for cdr usage reports.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->STAINLESS_FIXME_legacy.reporting.usageReports.voice->list(...$params->toArray());`
 *
 * @see Telnyx\Legacy\Reporting\UsageReports\Voice->list
 *
 * @phpstan-type voice_list_params = array{page?: int, perPage?: int}
 */
final class VoiceListParams implements BaseModel
{
    /** @use SdkModel<voice_list_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Page number.
     */
    #[Api(optional: true)]
    public ?int $page;

    /**
     * Size of the page.
     */
    #[Api(optional: true)]
    public ?int $perPage;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?int $page = null, ?int $perPage = null): self
    {
        $obj = new self;

        null !== $page && $obj->page = $page;
        null !== $perPage && $obj->perPage = $perPage;

        return $obj;
    }

    /**
     * Page number.
     */
    public function withPage(int $page): self
    {
        $obj = clone $this;
        $obj->page = $page;

        return $obj;
    }

    /**
     * Size of the page.
     */
    public function withPerPage(int $perPage): self
    {
        $obj = clone $this;
        $obj->perPage = $perPage;

        return $obj;
    }
}
