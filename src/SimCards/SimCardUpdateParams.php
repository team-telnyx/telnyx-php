<?php

declare(strict_types=1);

namespace Telnyx\SimCards;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SimCards\SimCardUpdateParams\DataLimit;
use Telnyx\SimCardStatus;

/**
 * Updates SIM card data.
 *
 * @see Telnyx\SimCards->update
 *
 * @phpstan-type sim_card_update_params = array{
 *   authorizedImeis?: list<string>|null,
 *   dataLimit?: DataLimit,
 *   simCardGroupID?: string,
 *   status?: SimCardStatus,
 *   tags?: list<string>,
 * }
 */
final class SimCardUpdateParams implements BaseModel
{
    /** @use SdkModel<sim_card_update_params> */
    use SdkModel;
    use SdkParams;

    /**
     * List of IMEIs authorized to use a given SIM card.
     *
     * @var list<string>|null $authorizedImeis
     */
    #[Api('authorized_imeis', list: 'string', nullable: true, optional: true)]
    public ?array $authorizedImeis;

    /**
     * The SIM card individual data limit configuration.
     */
    #[Api('data_limit', optional: true)]
    public ?DataLimit $dataLimit;

    /**
     * The group SIMCardGroup identification. This attribute can be <code>null</code> when it's present in an associated resource.
     */
    #[Api('sim_card_group_id', optional: true)]
    public ?string $simCardGroupID;

    #[Api(optional: true)]
    public ?SimCardStatus $status;

    /**
     * Searchable tags associated with the SIM card.
     *
     * @var list<string>|null $tags
     */
    #[Api(list: 'string', optional: true)]
    public ?array $tags;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string>|null $authorizedImeis
     * @param list<string> $tags
     */
    public static function with(
        ?array $authorizedImeis = null,
        ?DataLimit $dataLimit = null,
        ?string $simCardGroupID = null,
        ?SimCardStatus $status = null,
        ?array $tags = null,
    ): self {
        $obj = new self;

        null !== $authorizedImeis && $obj->authorizedImeis = $authorizedImeis;
        null !== $dataLimit && $obj->dataLimit = $dataLimit;
        null !== $simCardGroupID && $obj->simCardGroupID = $simCardGroupID;
        null !== $status && $obj->status = $status;
        null !== $tags && $obj->tags = $tags;

        return $obj;
    }

    /**
     * List of IMEIs authorized to use a given SIM card.
     *
     * @param list<string>|null $authorizedImeis
     */
    public function withAuthorizedImeis(?array $authorizedImeis): self
    {
        $obj = clone $this;
        $obj->authorizedImeis = $authorizedImeis;

        return $obj;
    }

    /**
     * The SIM card individual data limit configuration.
     */
    public function withDataLimit(DataLimit $dataLimit): self
    {
        $obj = clone $this;
        $obj->dataLimit = $dataLimit;

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

    public function withStatus(SimCardStatus $status): self
    {
        $obj = clone $this;
        $obj->status = $status;

        return $obj;
    }

    /**
     * Searchable tags associated with the SIM card.
     *
     * @param list<string> $tags
     */
    public function withTags(array $tags): self
    {
        $obj = clone $this;
        $obj->tags = $tags;

        return $obj;
    }
}
