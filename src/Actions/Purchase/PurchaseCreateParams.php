<?php

declare(strict_types=1);

namespace Telnyx\Actions\Purchase;

use Telnyx\Actions\Purchase\PurchaseCreateParams\Status;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new PurchaseCreateParams); // set properties as needed
 * $client->actions.purchase->create(...$params->toArray());
 * ```
 * Purchases and registers the specified amount of eSIMs to the current user's account.<br/><br/>
 * If <code>sim_card_group_id</code> is provided, the eSIMs will be associated with that group. Otherwise, the default group for the current user will be used.<br/><br/>.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->actions.purchase->create(...$params->toArray());`
 *
 * @see Telnyx\Actions\Purchase->create
 *
 * @phpstan-type purchase_create_params = array{
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
    /** @use SdkModel<purchase_create_params> */
    use SdkModel;
    use SdkParams;

    /**
     * The amount of eSIMs to be purchased.
     */
    #[Api]
    public int $amount;

    /**
     * Type of product to be purchased, specify "whitelabel" to use a custom SPN.
     */
    #[Api(optional: true)]
    public ?string $product;

    /**
     * The group SIMCardGroup identification. This attribute can be <code>null</code> when it's present in an associated resource.
     */
    #[Api('sim_card_group_id', optional: true)]
    public ?string $simCardGroupID;

    /**
     * Status on which the SIM cards will be set after being successfully registered.
     *
     * @var value-of<Status>|null $status
     */
    #[Api(enum: Status::class, optional: true)]
    public ?string $status;

    /**
     * Searchable tags associated with the SIM cards.
     *
     * @var list<string>|null $tags
     */
    #[Api(list: 'string', optional: true)]
    public ?array $tags;

    /**
     * Service Provider Name (SPN) for the Whitelabel eSIM product. It will be displayed as the mobile service name by operating systems of smartphones. This parameter must only contain letters, numbers and whitespaces.
     */
    #[Api('whitelabel_name', optional: true)]
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
        $obj = new self;

        $obj->amount = $amount;

        null !== $product && $obj->product = $product;
        null !== $simCardGroupID && $obj->simCardGroupID = $simCardGroupID;
        null !== $status && $obj->status = $status instanceof Status ? $status->value : $status;
        null !== $tags && $obj->tags = $tags;
        null !== $whitelabelName && $obj->whitelabelName = $whitelabelName;

        return $obj;
    }

    /**
     * The amount of eSIMs to be purchased.
     */
    public function withAmount(int $amount): self
    {
        $obj = clone $this;
        $obj->amount = $amount;

        return $obj;
    }

    /**
     * Type of product to be purchased, specify "whitelabel" to use a custom SPN.
     */
    public function withProduct(string $product): self
    {
        $obj = clone $this;
        $obj->product = $product;

        return $obj;
    }

    /**
     * The group SIMCardGroup identification. This attribute can be <code>null</code> when it's present in an associated resource.
     */
    public function withSimCardGroupID(string $simCardGroupID): self
    {
        $obj = clone $this;
        $obj->simCardGroupID = $simCardGroupID;

        return $obj;
    }

    /**
     * Status on which the SIM cards will be set after being successfully registered.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj->status = $status instanceof Status ? $status->value : $status;

        return $obj;
    }

    /**
     * Searchable tags associated with the SIM cards.
     *
     * @param list<string> $tags
     */
    public function withTags(array $tags): self
    {
        $obj = clone $this;
        $obj->tags = $tags;

        return $obj;
    }

    /**
     * Service Provider Name (SPN) for the Whitelabel eSIM product. It will be displayed as the mobile service name by operating systems of smartphones. This parameter must only contain letters, numbers and whitespaces.
     */
    public function withWhitelabelName(string $whitelabelName): self
    {
        $obj = clone $this;
        $obj->whitelabelName = $whitelabelName;

        return $obj;
    }
}
