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
 *   idempotency_key?: string,
 *   items?: list<Item|array{billing_bundle_id: string, quantity: int}>,
 *   authorization_bearer?: string,
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
    #[Optional]
    public ?string $idempotency_key;

    /** @var list<Item>|null $items */
    #[Optional(list: Item::class)]
    public ?array $items;

    /**
     * Authenticates the request with your Telnyx API V2 KEY.
     */
    #[Optional]
    public ?string $authorization_bearer;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Item|array{billing_bundle_id: string, quantity: int}> $items
     */
    public static function with(
        ?string $idempotency_key = null,
        ?array $items = null,
        ?string $authorization_bearer = null,
    ): self {
        $obj = new self;

        null !== $idempotency_key && $obj['idempotency_key'] = $idempotency_key;
        null !== $items && $obj['items'] = $items;
        null !== $authorization_bearer && $obj['authorization_bearer'] = $authorization_bearer;

        return $obj;
    }

    /**
     * Idempotency key for the request. Can be any UUID, but should always be unique for each request.
     */
    public function withIdempotencyKey(string $idempotencyKey): self
    {
        $obj = clone $this;
        $obj['idempotency_key'] = $idempotencyKey;

        return $obj;
    }

    /**
     * @param list<Item|array{billing_bundle_id: string, quantity: int}> $items
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
        $obj['authorization_bearer'] = $authorizationBearer;

        return $obj;
    }
}
