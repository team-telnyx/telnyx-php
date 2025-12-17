<?php

declare(strict_types=1);

namespace Telnyx\SimCards;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SimCards\SimCardUpdateParams\DataLimit;
use Telnyx\SimCardStatus;

/**
 * Updates SIM card data.
 *
 * @see Telnyx\Services\SimCardsService::update()
 *
 * @phpstan-import-type DataLimitShape from \Telnyx\SimCards\SimCardUpdateParams\DataLimit
 * @phpstan-import-type SimCardStatusShape from \Telnyx\SimCardStatus
 *
 * @phpstan-type SimCardUpdateParamsShape = array{
 *   authorizedImeis?: list<string>|null,
 *   dataLimit?: null|DataLimit|DataLimitShape,
 *   simCardGroupID?: string|null,
 *   status?: null|SimCardStatus|SimCardStatusShape,
 *   tags?: list<string>|null,
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
     * @param DataLimit|DataLimitShape|null $dataLimit
     * @param SimCardStatus|SimCardStatusShape|null $status
     * @param list<string>|null $tags
     */
    public static function with(
        ?array $authorizedImeis = null,
        DataLimit|array|null $dataLimit = null,
        ?string $simCardGroupID = null,
        SimCardStatus|array|null $status = null,
        ?array $tags = null,
    ): self {
        $self = new self;

        null !== $authorizedImeis && $self['authorizedImeis'] = $authorizedImeis;
        null !== $dataLimit && $self['dataLimit'] = $dataLimit;
        null !== $simCardGroupID && $self['simCardGroupID'] = $simCardGroupID;
        null !== $status && $self['status'] = $status;
        null !== $tags && $self['tags'] = $tags;

        return $self;
    }

    /**
     * List of IMEIs authorized to use a given SIM card.
     *
     * @param list<string>|null $authorizedImeis
     */
    public function withAuthorizedImeis(?array $authorizedImeis): self
    {
        $self = clone $this;
        $self['authorizedImeis'] = $authorizedImeis;

        return $self;
    }

    /**
     * The SIM card individual data limit configuration.
     *
     * @param DataLimit|DataLimitShape $dataLimit
     */
    public function withDataLimit(DataLimit|array $dataLimit): self
    {
        $self = clone $this;
        $self['dataLimit'] = $dataLimit;

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
     * @param SimCardStatus|SimCardStatusShape $status
     */
    public function withStatus(SimCardStatus|array $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * Searchable tags associated with the SIM card.
     *
     * @param list<string> $tags
     */
    public function withTags(array $tags): self
    {
        $self = clone $this;
        $self['tags'] = $tags;

        return $self;
    }
}
