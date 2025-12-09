<?php

declare(strict_types=1);

namespace Telnyx\SimCards;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SimCards\SimCardUpdateParams\DataLimit;
use Telnyx\SimCards\SimCardUpdateParams\DataLimit\Unit;
use Telnyx\SimCardStatus;
use Telnyx\SimCardStatus\Value;

/**
 * Updates SIM card data.
 *
 * @see Telnyx\Services\SimCardsService::update()
 *
 * @phpstan-type SimCardUpdateParamsShape = array{
 *   authorizedImeis?: list<string>|null,
 *   dataLimit?: DataLimit|array{amount?: string|null, unit?: value-of<Unit>|null},
 *   simCardGroupID?: string,
 *   status?: SimCardStatus|array{
 *     reason?: string|null, value?: value-of<Value>|null
 *   },
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
     * @var list<string>|null $authorizedImeis
     */
    #[Optional('authorized_imeis', list: 'string', nullable: true)]
    public ?array $authorizedImeis;

    /**
     * The SIM card individual data limit configuration.
     */
    #[Optional('data_limit')]
    public ?DataLimit $dataLimit;

    /**
     * The group SIMCardGroup identification. This attribute can be <code>null</code> when it's present in an associated resource.
     */
    #[Optional('sim_card_group_id')]
    public ?string $simCardGroupID;

    #[Optional]
    public ?SimCardStatus $status;

    /**
     * Searchable tags associated with the SIM card.
     *
     * @var list<string>|null $tags
     */
    #[Optional(list: 'string')]
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
     * @param DataLimit|array{
     *   amount?: string|null, unit?: value-of<Unit>|null
     * } $dataLimit
     * @param SimCardStatus|array{
     *   reason?: string|null, value?: value-of<Value>|null
     * } $status
     * @param list<string> $tags
     */
    public static function with(
        ?array $authorizedImeis = null,
        DataLimit|array|null $dataLimit = null,
        ?string $simCardGroupID = null,
        SimCardStatus|array|null $status = null,
        ?array $tags = null,
    ): self {
        $obj = new self;

        null !== $authorizedImeis && $obj['authorizedImeis'] = $authorizedImeis;
        null !== $dataLimit && $obj['dataLimit'] = $dataLimit;
        null !== $simCardGroupID && $obj['simCardGroupID'] = $simCardGroupID;
        null !== $status && $obj['status'] = $status;
        null !== $tags && $obj['tags'] = $tags;

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
        $obj['authorizedImeis'] = $authorizedImeis;

        return $obj;
    }

    /**
     * The SIM card individual data limit configuration.
     *
     * @param DataLimit|array{
     *   amount?: string|null, unit?: value-of<Unit>|null
     * } $dataLimit
     */
    public function withDataLimit(DataLimit|array $dataLimit): self
    {
        $obj = clone $this;
        $obj['dataLimit'] = $dataLimit;

        return $obj;
    }

    /**
     * The group SIMCardGroup identification. This attribute can be <code>null</code> when it's present in an associated resource.
     */
    public function withSimCardGroupID(string $simCardGroupID): self
    {
        $obj = clone $this;
        $obj['simCardGroupID'] = $simCardGroupID;

        return $obj;
    }

    /**
     * @param SimCardStatus|array{
     *   reason?: string|null, value?: value-of<Value>|null
     * } $status
     */
    public function withStatus(SimCardStatus|array $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

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
        $obj['tags'] = $tags;

        return $obj;
    }
}
