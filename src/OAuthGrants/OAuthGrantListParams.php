<?php

declare(strict_types=1);

namespace Telnyx\OAuthGrants;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new OAuthGrantListParams); // set properties as needed
 * $client->oauthGrants->list(...$params->toArray());
 * ```
 * Retrieve a paginated list of OAuth grants for the authenticated user.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->oauthGrants->list(...$params->toArray());`
 *
 * @see Telnyx\OAuthGrants->list
 *
 * @phpstan-type oauth_grant_list_params = array{pageNumber?: int, pageSize?: int}
 */
final class OAuthGrantListParams implements BaseModel
{
    /** @use SdkModel<oauth_grant_list_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Page number.
     */
    #[Api(optional: true)]
    public ?int $pageNumber;

    /**
     * Number of results per page.
     */
    #[Api(optional: true)]
    public ?int $pageSize;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?int $pageNumber = null,
        ?int $pageSize = null
    ): self {
        $obj = new self;

        null !== $pageNumber && $obj->pageNumber = $pageNumber;
        null !== $pageSize && $obj->pageSize = $pageSize;

        return $obj;
    }

    /**
     * Page number.
     */
    public function withPageNumber(int $pageNumber): self
    {
        $obj = clone $this;
        $obj->pageNumber = $pageNumber;

        return $obj;
    }

    /**
     * Number of results per page.
     */
    public function withPageSize(int $pageSize): self
    {
        $obj = clone $this;
        $obj->pageSize = $pageSize;

        return $obj;
    }
}
