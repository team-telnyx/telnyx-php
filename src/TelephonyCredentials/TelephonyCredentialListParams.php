<?php

declare(strict_types=1);

namespace Telnyx\TelephonyCredentials;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\TelephonyCredentials\TelephonyCredentialListParams\Filter;
use Telnyx\TelephonyCredentials\TelephonyCredentialListParams\Page;

/**
 * List all On-demand Credentials.
 *
 * @see Telnyx\Services\TelephonyCredentialsService::list()
 *
 * @phpstan-type TelephonyCredentialListParamsShape = array{
 *   filter?: Filter|array{
 *     name?: string|null,
 *     resource_id?: string|null,
 *     sip_username?: string|null,
 *     status?: string|null,
 *     tag?: string|null,
 *   },
 *   page?: Page|array{number?: int|null, size?: int|null},
 * }
 */
final class TelephonyCredentialListParams implements BaseModel
{
    /** @use SdkModel<TelephonyCredentialListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[tag], filter[name], filter[status], filter[resource_id], filter[sip_username].
     */
    #[Api(optional: true)]
    public ?Filter $filter;

    /**
     * Consolidated page parameter (deepObject style). Originally: page[number], page[size].
     */
    #[Api(optional: true)]
    public ?Page $page;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Filter|array{
     *   name?: string|null,
     *   resource_id?: string|null,
     *   sip_username?: string|null,
     *   status?: string|null,
     *   tag?: string|null,
     * } $filter
     * @param Page|array{number?: int|null, size?: int|null} $page
     */
    public static function with(
        Filter|array|null $filter = null,
        Page|array|null $page = null
    ): self {
        $obj = new self;

        null !== $filter && $obj['filter'] = $filter;
        null !== $page && $obj['page'] = $page;

        return $obj;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[tag], filter[name], filter[status], filter[resource_id], filter[sip_username].
     *
     * @param Filter|array{
     *   name?: string|null,
     *   resource_id?: string|null,
     *   sip_username?: string|null,
     *   status?: string|null,
     *   tag?: string|null,
     * } $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $obj = clone $this;
        $obj['filter'] = $filter;

        return $obj;
    }

    /**
     * Consolidated page parameter (deepObject style). Originally: page[number], page[size].
     *
     * @param Page|array{number?: int|null, size?: int|null} $page
     */
    public function withPage(Page|array $page): self
    {
        $obj = clone $this;
        $obj['page'] = $page;

        return $obj;
    }
}
