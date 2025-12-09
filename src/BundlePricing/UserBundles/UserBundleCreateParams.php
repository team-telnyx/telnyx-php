<?php

declare(strict_types=1);

namespace Telnyx\BundlePricing\UserBundles;

use Telnyx\BundlePricing\UserBundles\UserBundleCreateParams\Item;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Creates multiple user bundles for the user.
 *
 * @see Telnyx\Services\BundlePricing\UserBundlesService::create()
 *
 * @phpstan-type UserBundleCreateParamsShape = array{
 *   idempotencyKey?: string,
 *   items?: list<Item|array{billingBundleID: string, quantity: int}>,
 *   authorizationBearer?: string,
 * }
 */
final class UserBundleCreateParams implements BaseModel
{
    /** @use SdkModel<UserBundleCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Idempotency key for the request. Can be any UUID, but should always be unique for each request.
     */
    #[Optional('idempotency_key')]
    public ?string $idempotencyKey;

    /** @var list<Item>|null $items */
    #[Optional(list: Item::class)]
    public ?array $items;

    /**
     * Authenticates the request with your Telnyx API V2 KEY.
     */
    #[Optional]
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
     * @param list<Item|array{billingBundleID: string, quantity: int}> $items
     */
    public static function with(
        ?string $idempotencyKey = null,
        ?array $items = null,
        ?string $authorizationBearer = null,
    ): self {
        $obj = new self;

        null !== $idempotencyKey && $obj['idempotencyKey'] = $idempotencyKey;
        null !== $items && $obj['items'] = $items;
        null !== $authorizationBearer && $obj['authorizationBearer'] = $authorizationBearer;

        return $obj;
    }

    /**
     * Idempotency key for the request. Can be any UUID, but should always be unique for each request.
     */
    public function withIdempotencyKey(string $idempotencyKey): self
    {
        $obj = clone $this;
        $obj['idempotencyKey'] = $idempotencyKey;

        return $obj;
    }

    /**
     * @param list<Item|array{billingBundleID: string, quantity: int}> $items
     */
    public function withItems(array $items): self
    {
        $obj = clone $this;
        $obj['items'] = $items;

        return $obj;
    }

    /**
     * Authenticates the request with your Telnyx API V2 KEY.
     */
    public function withAuthorizationBearer(string $authorizationBearer): self
    {
        $obj = clone $this;
        $obj['authorizationBearer'] = $authorizationBearer;

        return $obj;
    }
}
