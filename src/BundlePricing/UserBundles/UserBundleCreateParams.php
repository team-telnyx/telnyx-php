<?php

declare(strict_types=1);

namespace Telnyx\BundlePricing\UserBundles;

use Telnyx\BundlePricing\UserBundles\UserBundleCreateParams\Item;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Creates multiple user bundles for the user.
 *
 * @see Telnyx\BundlePricing\UserBundles->create
 *
 * @phpstan-type user_bundle_create_params = array{
 *   idempotencyKey?: string, items?: list<Item>, authorizationBearer?: string
 * }
 */
final class UserBundleCreateParams implements BaseModel
{
    /** @use SdkModel<user_bundle_create_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Idempotency key for the request. Can be any UUID, but should always be unique for each request.
     */
    #[Api('idempotency_key', optional: true)]
    public ?string $idempotencyKey;

    /** @var list<Item>|null $items */
    #[Api(list: Item::class, optional: true)]
    public ?array $items;

    /**
     * Authenticates the request with your Telnyx API V2 KEY.
     */
    #[Api(optional: true)]
    public ?string $authorizationBearer;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Item> $items
     */
    public static function with(
        ?string $idempotencyKey = null,
        ?array $items = null,
        ?string $authorizationBearer = null,
    ): self {
        $obj = new self;

        null !== $idempotencyKey && $obj->idempotencyKey = $idempotencyKey;
        null !== $items && $obj->items = $items;
        null !== $authorizationBearer && $obj->authorizationBearer = $authorizationBearer;

        return $obj;
    }

    /**
     * Idempotency key for the request. Can be any UUID, but should always be unique for each request.
     */
    public function withIdempotencyKey(string $idempotencyKey): self
    {
        $obj = clone $this;
        $obj->idempotencyKey = $idempotencyKey;

        return $obj;
    }

    /**
     * @param list<Item> $items
     */
    public function withItems(array $items): self
    {
        $obj = clone $this;
        $obj->items = $items;

        return $obj;
    }

    /**
     * Authenticates the request with your Telnyx API V2 KEY.
     */
    public function withAuthorizationBearer(string $authorizationBearer): self
    {
        $obj = clone $this;
        $obj->authorizationBearer = $authorizationBearer;

        return $obj;
    }
}
