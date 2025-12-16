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
 * @phpstan-import-type ItemShape from \Telnyx\BundlePricing\UserBundles\UserBundleCreateParams\Item
 *
 * @phpstan-type UserBundleCreateParamsShape = array{
 *   idempotencyKey?: string|null,
 *   items?: list<ItemShape>|null,
 *   authorizationBearer?: string|null,
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
     * @param list<ItemShape> $items
     */
    public static function with(
        ?string $idempotencyKey = null,
        ?array $items = null,
        ?string $authorizationBearer = null,
    ): self {
        $self = new self;

        null !== $idempotencyKey && $self['idempotencyKey'] = $idempotencyKey;
        null !== $items && $self['items'] = $items;
        null !== $authorizationBearer && $self['authorizationBearer'] = $authorizationBearer;

        return $self;
    }

    /**
     * Idempotency key for the request. Can be any UUID, but should always be unique for each request.
     */
    public function withIdempotencyKey(string $idempotencyKey): self
    {
        $self = clone $this;
        $self['idempotencyKey'] = $idempotencyKey;

        return $self;
    }

    /**
     * @param list<ItemShape> $items
     */
    public function withItems(array $items): self
    {
        $self = clone $this;
        $self['items'] = $items;

        return $self;
    }

    /**
     * Authenticates the request with your Telnyx API V2 KEY.
     */
    public function withAuthorizationBearer(string $authorizationBearer): self
    {
        $self = clone $this;
        $self['authorizationBearer'] = $authorizationBearer;

        return $self;
    }
}
