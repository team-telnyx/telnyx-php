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
 * @see Telnyx\SimCardsService::update()
 *
 * @phpstan-type SimCardUpdateParamsShape = array{
 *   authorized_imeis?: list<string>|null,
 *   data_limit?: DataLimit,
 *   sim_card_group_id?: string,
 *   status?: SimCardStatus,
 *   tags?: list<string>,
 * }
 */
final class SimCardUpdateParams implements BaseModel
{
    /** @use SdkModel<SimCardUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * List of IMEIs authorized to use a given SIM card.
     *
     * @var list<string>|null $authorized_imeis
     */
    #[Api(list: 'string', nullable: true, optional: true)]
    public ?array $authorized_imeis;

    /**
     * The SIM card individual data limit configuration.
     */
    #[Api(optional: true)]
    public ?DataLimit $data_limit;

    /**
     * The group SIMCardGroup identification. This attribute can be <code>null</code> when it's present in an associated resource.
     */
    #[Api(optional: true)]
    public ?string $sim_card_group_id;

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
     * @param list<string>|null $authorized_imeis
     * @param list<string> $tags
     */
    public static function with(
        ?array $authorized_imeis = null,
        ?DataLimit $data_limit = null,
        ?string $sim_card_group_id = null,
        ?SimCardStatus $status = null,
        ?array $tags = null,
    ): self {
        $obj = new self;

        null !== $authorized_imeis && $obj->authorized_imeis = $authorized_imeis;
        null !== $data_limit && $obj->data_limit = $data_limit;
        null !== $sim_card_group_id && $obj->sim_card_group_id = $sim_card_group_id;
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
        $obj->authorized_imeis = $authorizedImeis;

        return $obj;
    }

    /**
     * The SIM card individual data limit configuration.
     */
    public function withDataLimit(DataLimit $dataLimit): self
    {
        $obj = clone $this;
        $obj->data_limit = $dataLimit;

        return $obj;
    }

    /**
     * The group SIMCardGroup identification. This attribute can be <code>null</code> when it's present in an associated resource.
     */
    public function withSimCardGroupID(string $simCardGroupID): self
    {
        $obj = clone $this;
        $obj->sim_card_group_id = $simCardGroupID;

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
