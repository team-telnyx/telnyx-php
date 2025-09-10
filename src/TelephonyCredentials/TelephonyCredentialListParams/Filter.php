<?php

declare(strict_types=1);

namespace Telnyx\TelephonyCredentials\TelephonyCredentialListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[tag], filter[name], filter[status], filter[resource_id], filter[sip_username].
 *
 * @phpstan-type filter_alias = array{
 *   name?: string|null,
 *   resourceID?: string|null,
 *   sipUsername?: string|null,
 *   status?: string|null,
 *   tag?: string|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<filter_alias> */
    use SdkModel;

    /**
     * Filter by name.
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * Filter by resource_id.
     */
    #[Api('resource_id', optional: true)]
    public ?string $resourceID;

    /**
     * Filter by sip_username.
     */
    #[Api('sip_username', optional: true)]
    public ?string $sipUsername;

    /**
     * Filter by status.
     */
    #[Api(optional: true)]
    public ?string $status;

    /**
     * Filter by tag.
     */
    #[Api(optional: true)]
    public ?string $tag;

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
        ?string $name = null,
        ?string $resourceID = null,
        ?string $sipUsername = null,
        ?string $status = null,
        ?string $tag = null,
    ): self {
        $obj = new self;

        null !== $name && $obj->name = $name;
        null !== $resourceID && $obj->resourceID = $resourceID;
        null !== $sipUsername && $obj->sipUsername = $sipUsername;
        null !== $status && $obj->status = $status;
        null !== $tag && $obj->tag = $tag;

        return $obj;
    }

    /**
     * Filter by name.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * Filter by resource_id.
     */
    public function withResourceID(string $resourceID): self
    {
        $obj = clone $this;
        $obj->resourceID = $resourceID;

        return $obj;
    }

    /**
     * Filter by sip_username.
     */
    public function withSipUsername(string $sipUsername): self
    {
        $obj = clone $this;
        $obj->sipUsername = $sipUsername;

        return $obj;
    }

    /**
     * Filter by status.
     */
    public function withStatus(string $status): self
    {
        $obj = clone $this;
        $obj->status = $status;

        return $obj;
    }

    /**
     * Filter by tag.
     */
    public function withTag(string $tag): self
    {
        $obj = clone $this;
        $obj->tag = $tag;

        return $obj;
    }
}
