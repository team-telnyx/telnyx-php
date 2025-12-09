<?php

declare(strict_types=1);

namespace Telnyx\Actions\Purchase;

use Telnyx\Actions\Purchase\PurchaseCreateParams\Status;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Purchases and registers the specified amount of eSIMs to the current user's account.<br/><br/>
 * If <code>sim_card_group_id</code> is provided, the eSIMs will be associated with that group. Otherwise, the default group for the current user will be used.<br/><br/>.
 *
 * @see Telnyx\Services\Actions\PurchaseService::create()
 *
 * @phpstan-type PurchaseCreateParamsShape = array{
 *   amount: int,
 *   product?: string,
 *   simCardGroupID?: string,
 *   status?: Status|value-of<Status>,
 *   tags?: list<string>,
 *   whitelabelName?: string,
 * }
 */
final class PurchaseCreateParams implements BaseModel
{
    /** @use SdkModel<PurchaseCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The amount of eSIMs to be purchased.
     */
    #[Required]
    public int $amount;

    /**
     * Type of product to be purchased, specify "whitelabel" to use a custom SPN.
     */
    #[Optional]
    public ?string $product;

    /**
     * The group SIMCardGroup identification. This attribute can be <code>null</code> when it's present in an associated resource.
     */
    #[Optional('sim_card_group_id')]
    public ?string $simCardGroupID;

    /**
     * Status on which the SIM cards will be set after being successfully registered.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    /**
     * Searchable tags associated with the SIM cards.
     *
     * @var list<string>|null $tags
     */
    #[Optional(list: 'string')]
    public ?array $tags;

    /**
     * Service Provider Name (SPN) for the Whitelabel eSIM product. It will be displayed as the mobile service name by operating systems of smartphones. This parameter must only contain letters, numbers and whitespaces.
     */
    #[Optional('whitelabel_name')]
    public ?string $whitelabelName;

    /**
     * `new PurchaseCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PurchaseCreateParams::with(amount: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PurchaseCreateParams)->withAmount(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Status|value-of<Status> $status
     * @param list<string> $tags
     */
    public static function with(
        int $amount,
        ?string $product = null,
        ?string $simCardGroupID = null,
        Status|string|null $status = null,
        ?array $tags = null,
        ?string $whitelabelName = null,
    ): self {
        $self = new self;

        $self['amount'] = $amount;

        null !== $product && $self['product'] = $product;
        null !== $simCardGroupID && $self['simCardGroupID'] = $simCardGroupID;
        null !== $status && $self['status'] = $status;
        null !== $tags && $self['tags'] = $tags;
        null !== $whitelabelName && $self['whitelabelName'] = $whitelabelName;

        return $self;
    }

    /**
     * The amount of eSIMs to be purchased.
     */
    public function withAmount(int $amount): self
    {
        $self = clone $this;
        $self['amount'] = $amount;

        return $self;
    }

    /**
     * Type of product to be purchased, specify "whitelabel" to use a custom SPN.
     */
    public function withProduct(string $product): self
    {
        $self = clone $this;
        $self['product'] = $product;

        return $self;
    }

    /**
     * The group SIMCardGroup identification. This attribute can be <code>null</code> when it's present in an associated resource.
     */
    public function withSimCardGroupID(string $simCardGroupID): self
    {
        $self = clone $this;
        $self['simCardGroupID'] = $simCardGroupID;

        return $self;
    }

    /**
     * Status on which the SIM cards will be set after being successfully registered.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * Searchable tags associated with the SIM cards.
     *
     * @param list<string> $tags
     */
    public function withTags(array $tags): self
    {
        $self = clone $this;
        $self['tags'] = $tags;

        return $self;
    }

    /**
     * Service Provider Name (SPN) for the Whitelabel eSIM product. It will be displayed as the mobile service name by operating systems of smartphones. This parameter must only contain letters, numbers and whitespaces.
     */
    public function withWhitelabelName(string $whitelabelName): self
    {
        $self = clone $this;
        $self['whitelabelName'] = $whitelabelName;

        return $self;
    }
}
