<?php

declare(strict_types=1);

namespace Telnyx\OAuthGrants;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\OAuthClients\PaginationMetaOAuth;

/**
 * @phpstan-type OAuthGrantListResponseShape = array{
 *   data?: list<OAuthGrant>, meta?: PaginationMetaOAuth
 * }
 */
final class OAuthGrantListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<OAuthGrantListResponseShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<OAuthGrant>|null $data */
    #[Api(list: OAuthGrant::class, optional: true)]
    public ?array $data;

    #[Api(optional: true)]
    public ?PaginationMetaOAuth $meta;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<OAuthGrant> $data
     */
    public static function with(
        ?array $data = null,
        ?PaginationMetaOAuth $meta = null
    ): self {
        $obj = new self;

        null !== $data && $obj->data = $data;
        null !== $meta && $obj->meta = $meta;

        return $obj;
    }

    /**
     * @param list<OAuthGrant> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }

    public function withMeta(PaginationMetaOAuth $meta): self
    {
        $obj = clone $this;
        $obj->meta = $meta;

        return $obj;
    }
}
